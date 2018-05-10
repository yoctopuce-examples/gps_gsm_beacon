<?php

/*
 This a PHP/JavaScript code using Leafletjs to track a 
 Yocto-GPS connected to a Yocto-GSM. More details available
 here:
    www.yoctopuce.com/EN/article/free-geolocalization-using-leaflet

 INSTALLATION:
 copy this script and all the yocto_*.php file listed below
 on a PHP server. Create a data sub-folder with read/write
 permission for the server: this is where the script will
 store logs, configuration file and tracking data.
 Depending on your PHP server configuration, you might 
 have to create .htaccess file containing the following line:
 php_flag "allow_url_fopen" "On"
 
 CONFIGURATION:
 Configure your Yocto-GSM to make sure it can connect
 to a GSM network and add a Yocto-API outgoing call
 back pointing to this script.  You can handle several
 beacons by adding to the url ?feed=FEEDNAME where 
 FEEDNAME is a arbitrary name, different for each beacon.
 
 USAGE:
 Open your web browser and open this script's URL,
 if needed add the ?feed=FEEDNAME to monitor an alternate
 beacon.
 
*/
include("yocto_api.php");
include("yocto_gps.php");
include("yocto_temperature.php");
include("yocto_anbutton.php");
include("yocto_cellular.php");
include("yocto_network.php");
include("yocto_wakeupmonitor.php");
include('yocto_wakeupschedule.php');
include("yocto_realtimeclock.php");
define('DATAFOLDER', 'data');
define("CONFIG_FILE", DATAFOLDER . '/config.ini');
define("LOG_FILE", DATAFOLDER . '/log.txt');

// this is where the map will point if no data is found
define("DEFAULT_LAT", 46.207403);
define("DEFAULT_LON", 6.155902);
define("DEFAULT_ZOOM", 12);

date_default_timezone_set('Europe/Paris');

$logdata = '';
define("LOG_FILE_MAXSIZE", 131072);  // 128K
define("TAIL_MAXLENGTH", 1024);  // max count positions stored.


function logmsg($msg)
{
    global $logdata;
    print("$msg\r\n");
    $logdata .= $msg . "\r\n";
}

// loads the config file from data folder, if found.
function LoadConfig()
{
    $config = Array();
    $config["int_callbackdelay"] = 90;
    $config["int_taillength"] = 60 * 60 * 10;
    if (file_exists(CONFIG_FILE)) {
        $ini = parse_ini_file(CONFIG_FILE, true);
        if (Array_Key_Exists('config', $ini)) {
            foreach ($config as $key => $value) {
                if (Array_Key_Exists($key, $ini['config'])) {
                    if (substr($key, 0, 3) == 'int') $config[$key] = intVal($ini['config'][$key]);
                    if (substr($key, 0, 3) == 'str') $config[$key] = $ini['config'][$key];
                    if (substr($key, 0, 5) == 'float') $config[$key] = floatVal($ini['config'][$key]);
                }
            }
        }
    }
    if ($config["int_callbackdelay"] < 1) $config["int_callbackdelay"] = 1;
    return $config;
}

function feedName()
{
    $feed = '';
    if (array_key_exists('feed', $_GET)) {
        $feed = basename($_GET['feed']);
    }
    if ($feed == '') $feed = 'default';
    return $feed;
}

function beaconFile()
{
    return DATAFOLDER . "/feed-" . feedName() . ".ini";
}

// write the log in the log file, trim it if necessary
// and stops the execution  
function abort($msg)
{
    global $logdata;
    logmsg($msg);
    $log = '';
    if (file_exists(LOG_FILE)) {
        $data = file_get_contents(LOG_FILE);
    }
    $data .= $logdata;
    if (strlen($data) > LOG_FILE_MAXSIZE) {
        $data = substr($data, -LOG_FILE_MAXSIZE);
    }
    file_put_contents(LOG_FILE, $data);
    die();
}

// checks for data subfolder
if (!file_exists(DATAFOLDER) || !is_dir(DATAFOLDER)) die("<tt>No subfolder named '.DATAFOLDER.', please create one.</tt>");
if (!is_writable(DATAFOLDER)) die("<tt>'.DATAFOLDER.' folder is not writable, please check permissions.</tt>");

// checks if the caller is a YoctoHub, if so that means we have to serve a Yocto-API call-back
if (substr($_SERVER['HTTP_USER_AGENT'], 0, 8) == 'YoctoHub') {
    logmsg("\r\n***** " . gmdate("Y-m-d\TH:i:s\Z", time()));
    logmsg("feed=" . feedName() . "\r\n");
    try {
        if (YtestHub("callback", 100, $errmsg) == YAPI_SUCCESS) {
            if (YRegisterHub("callback", $errmsg) != YAPI_SUCCESS) {
                abort('YRegisterHub failed :' . $errsmg);
            }
            $now = time();
            $latitude = 'N/A';
            $longitude = 'N/A';
            $speed = 'N/A';
            $temperature = 'N/A';
            $powered = 'N/A';
            $cell = 'N/A';
            $uptime = 'N/A';
            $operator = 'N/A';

            $gps = yFirstGps();
            $serial = 'N/A';
            $config = LoadConfig();

            // check if a cellular function is available, gather
            // some data about the connection do do some setup
            // if necessary
            $cellular = yFirstCellular();
            if (!is_null($cellular)) {
                $cell = $cellular->get_cellIdentifier();
                $uptime = $cellular->get_module()->get_upTime();
                $serial = $cellular->get_module()->get_serialNumber();
                $operator = sprintf("%s (%d%%)", $cellular->get_cellOperator(), $cellular->get_linkQuality());
                logmsg(sprintf("uptime: %d sec", $uptime / 1000));
                logmsg(sprintf("gsm link: %d%%", $cellular->get_linkQuality()));
                logmsg(sprintf("gsm operator: %s", $cellular->get_cellOperator()));
                logmsg(sprintf("gsm last error: %s", $cellular->get_errorMessage()));
                $cellular->get_module()->log('pouet');
                $network = YFindNetwork("$serial.network");
                if ($network->isOnline()) {
                    if ($network->get_callbackMinDelay() != intVal($config["int_callbackdelay"])) {
                        logmsg('setting callbackMinDelay to ' . $config["int_callbackdelay"]);
                        $network->set_callbackMinDelay(intVal($config["int_callbackdelay"]));
                        $cellular->get_module()->saveToFlash();
                    }
                } else abort('No Network Function available');
            } else abort('No Cellular available');

            // make sure the hub will wake up automatically at 0,4,8,12,16 and 20h
            $wakeSchedule = yFirstWakeUpSchedule();
            if (!is_null($wakeSchedule)) {
                if (($wakeSchedule->get_minutes() != 1)
                    || ($wakeSchedule->get_hours() != 0x111111)
                    || ($wakeSchedule->get_monthDays() != 0)
                    || ($wakeSchedule->get_monthDays() != 0)
                    || ($wakeSchedule->get_months() != 0)
                    || ($wakeSchedule->get_weekDays() != 0)) {
                    logmsg("Wakeup schedule not propely set, fixing");
                    $wakeSchedule->set_minutes(1);
                    $wakeSchedule->set_hours(0x111111);
                    $wakeSchedule->set_monthDays(0);
                    $wakeSchedule->set_monthDays(0);
                    $wakeSchedule->set_months(0);
                    $wakeSchedule->set_weekDays(0);
                    $wakeSchedule->get_module()->saveToFlash();
                }
            }

            // fix the RTC UTC offset if necessary, that way the hub
            // will have a 0,4,8,12,16 and 20H, local time.
            // Time zone is defined at the beginning of this file
            $clock = yFirstRealTimeClock();
            if ($clock->isOnline()) {
                if ($clock->get_utcOffset() != intVal(date('Z'))) {
                    logmsg("fixing clock UTC ofset\n");
                    $clock->set_utcOffset(intVal(date('Z')));
                    $clock->get_module()->SaveToFlash();
                }
                logmsg(sprintf("System time: %s ", $clock->get_dateTime()));

            }

            $monitor = yfirstWakeUpMonitor();
            if (!is_null($monitor)) {
                if ($monitor->get_powerDuration() != 300) {
                    logmsg("fixing default power duration \n");
                    $monitor->set_powerDuration(300);
                    $monitor->get_module()->SaveToFlash();
                }

            }

            // setup the GPS coordinate system if necessary
            // and retrieve GPS coordinates
            if (!is_null($gps)) {
                if ($gps->get_coordSystem() != Y_COORDSYSTEM_GPS_D) {
                    logmsg("fixing GPS coordinate system");
                    $gps->set_coordSystem(Y_COORDSYSTEM_GPS_D);
                    $gps->get_module()->saveToFlash();
                    abort('done');
                }


                logmsg(sprintf("GPS: %s sat", $gps->get_satCount()));
                if ($gps->isFixed()) {
                    $latitude = $gps->get_latitude();
                    $longitude = $gps->get_longitude();
                    $speed = $gps->get_groundSpeed();
                } else logmsg("GPS: no fix");
            } else abort('NO GPS available');

            // retrieve temperature
            $temp = yFirstTemperature();
            if (!is_null($temp)) {
                $temperature = $temp->get_currentValue();
            } else logmsg('No temperature sensor available');

            // check if the box is powered or not
            $input = yFirstAnButton();
            if (!is_null($input)) {
                $serial = $input->get_module()->get_serialNumber();
                $input = YFindAnButton($serial . '.anButton1');
                $powered = ($input->get_isPressed() == Y_ISPRESSED_TRUE ? '1' : '0');
            } else abort('No Powerindicator available');

            logmsg("longitude=$longitude");
            logmsg("latitude=$latitude");
            logmsg("speed=$speed");
            logmsg("power=$powered");
            logmsg("temperature=$temperature");
            logmsg("cell=$cell");

            // Append current data in the BEACON ini file,
            // trim the file if necessary
            $ini = array();
            $filename = beaconFile();
            if (file_exists($filename)) {
                $ini = parse_ini_file($filename, true);
            }

            $newini = '';
            foreach ($ini as $key => $value) {
                if ($now - intVal($key) < 7 * 86400) // forget data older than one week
                    $newini .=
                        "\r\n;" . gmdate("Y-m-d\TH:i:s\Z", $key) . "\r\n"
                        . "[$key]\r\n"
                        . "lat=\"{$ini[$key]['lat']}\"\r\n"
                        . "lon=\"{$ini[$key]['lon']}\"\r\n"
                        . "spd=\"{$ini[$key]['spd']}\"\r\n"
                        . "tmp=\"{$ini[$key]['tmp']}\"\r\n"
                        . "pwr=\"{$ini[$key]['pwr']}\"\r\n"
                        . "ope=\"{$ini[$key]['ope']}\"\r\n"
                        . "upt=\"{$ini[$key]['upt']}\"\r\n"
                        . "cel=\"{$ini[$key]['cel']}\"\r\n";

            }

            $newini .= "\r\n;" . gmdate("Y-m-d\TH:i:s\Z", $now) . "\r\n"
                . "[$now]\r\n"
                . "lat=\"$latitude\"\r\n"
                . "lon=\"$longitude\"\r\n"
                . "spd=\"$speed\"\r\n"
                . "tmp=\"$temperature\"\r\n"
                . "pwr=\"$powered\"\r\n"
                . "ope=\"$operator\"\r\n"
                . "cel=\"$cell\"\r\n"
                . "upt=\"$uptime\"\r\n";

            file_put_contents($filename, $newini);


            // send the box to sleep if the box is not powered

            if (!is_null($monitor)) {
                if (intVal($powered) <= 0) {
                    if ($gps->isFixed()) {
                        logmsg("System not powered, GPS is fixed: going to sleep.");
                        $monitor->sleep(1);
                    } else {
                        if ($uptime < 15 * 60 * 1000) {
                            logmsg("System not powered, GPS is not fixed, keeping alive ");
                            $monitor->set_powerDuration(300);
                        } else {
                            logmsg("System not powered, GPS is not fixed, uptime>30min, giving up, going to sleep  ");
                            $monitor->sleep(1);
                        }
                    }
                } else {
                    logmsg("System is powered: keeping alive.");
                    $monitor->set_powerDuration(300); // postspone the system automatic shutdown
                }
            }


            abort('done, see you.');
        } else abort('YTestHub failed :' . $errsmg);
    } catch (Throwable $e) {
        $msg = "Error (php7) \n";
        $msg .= "=============\n";
        $msg .= "Message: " . $e->getMessage() . "\n";
        $msg .= "Code:    " . $e->getCode() . "\n";
        $msg .= "File:    " . $e->getFile() . "\n";
        $msg .= "Line:    " . $e->getLine() . "\n";
        $msg .= "Stack trace:\n" . $e->getTraceAsString() . "\n";
        $msg .= "Raw data posted:\n";
        foreach (YAPI::$_hubs as $hub) {
            /** @var $hub YTcpHub */
            $msg .= $hub->callbackData;
        }
        print($msg);
        die();
    }
}
// there is a CMD parameter on the url, we have to serve one of the IFRAME request
if (array_key_exists('cmd', $_GET)) {
    $filename = beaconFile();
    // update, check if there is new position writen in the beacon ini file
    if ($_GET['cmd'] == 'update')
        if (array_key_exists('filetimestamp', $_GET) && array_key_exists('postimestamp', $_GET)) {
            if (!file_exists($filename)) {
                Printf("<script>\r\n");
                Printf("window.parent.noUpdate()\r\n");
                Printf("</script>\r\n");
                Printf("No file\r\n");
                die();
            }
            $filetimestamp = intVal($_GET['filetimestamp']);

            if (filemtime($filename) <= $filetimestamp) {
                Printf("<script>\r\n");
                Printf("window.parent.noUpdate()\r\n");
                Printf("</script>\r\n");
                Printf("No update detected\r\n");
                die();
            }
            $postimestamp = intVal($_GET['postimestamp']);
            $ini = parse_ini_file($filename, true);
            $count = 0;
            Printf("<script>\r\n");
            foreach ($ini as $key => $value) {
                if ($key > $postimestamp) {
                    Printf("window.parent.addRecord('%d','%f','%f','%f','%f','%d','%s','%s','%d');\r\n",
                        $key,
                        $ini[$key]['lon'],
                        $ini[$key]['lat'],
                        $ini[$key]['spd'],
                        $ini[$key]['tmp'],
                        $ini[$key]['pwr'],
                        $ini[$key]['ope'],
                        $ini[$key]['cel'],
                        $ini[$key]['upt']);
                    $count++;
                    $lastpostTimestamp = $key;
                }
            }
            Printf("window.parent.AutoUpdate(%d)\r\n", filemtime($filename));
            Printf("</script>\r\n");
            Printf("%d points added\r\n", $count);
            die();
        }

    if ($_GET['cmd'] == 'android') {
        logmsg("\r\n##### " . gmdate("Y-m-d\TH:i:s\Z", time()));
        foreach ($_GET as $key => $value)
            if ($key != 'cmd')
                logmsg(sprintf("%s=%s", $key, $value));

        abort('done');
    }

    // show log file contents
    if ($_GET['cmd'] == 'showLog') {
        if (file_exists(LOG_FILE))
            $log = file_get_contents(LOG_FILE);
        else
            $log = 'Empty log file.';
        printf("<HTML><BODY>");
        Print("<pre style='font-size:1em;'>$log</pre>");
        print("<div id='bottom'></div>");
        Print("<script>document.getElementById('bottom').scrollIntoView();</script>");
        printf("</BODY><HTML>");

        die();
    }

    // load config file data and shoow the config window
    if ($_GET['cmd'] == 'loadConfig') {
        $conf = loadConfig();
        Printf("<script>");
        Printf("window.parent.ShowConfigWindow(%d,%d);", $conf["int_callbackdelay"], $conf["int_taillength"]);
        Printf("</script>");
        die('done');

    }
    // saves the config window
    if ($_GET['cmd'] == 'saveConfig') {
        $conf = loadConfig();
        foreach ($conf as $key => $value) {
            if (Array_key_exists($key, $_GET)) {
                $conf[$key] = $_GET[$key];
            }
        }

        $newini = "[config]\r\n";
        foreach ($conf as $key => $value) {
            $newini .= $key . '="' . $value . "\"\r\n";
        }
        file_put_contents(CONFIG_FILE, $newini);
        die('done');
    }
}
// UI HTML PART
?>
<html>
<head>
    <title>Where is my car?</title>
    <link rel="icon" sizes="128x128"
          href=" data:image/png;base64,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">

    <style type="text/css">
        html, body, #map-canvas {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 1em;
        }

        input {
            font-size: 1.1em;
        }

        a {
            font-size: 1.1em;
            font-weight: bold;
        }

        div#positiondata {
            position: absolute;
            right: 10px;
            top: 10px;
            border: 1px solid black;
            background-color: #FFFFE0;
            border-radius: 5px;
            z-index: 1000;
        }

        div#configdata {
            position: absolute;
            left: 10px;
            top: 10px;
            border: 1px solid black;
            background-color: #FFFFFF;
            border-radius: 5px;
            z-index: 1000;
        }

        div#logdata {
            position: absolute;
            left: 20px;
            top: 20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid black;
            background-color: #f0f0f0;
            z-index: 1000;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
          integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
            integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin=""></script>
    <script type="text/javascript">
        var positions = new Array();
        var map = null;
        var mouserOver = 0;
        var loadtime = Math.round((new Date()).getTime() / 1000);

        <?php

        // load all position data from the Beacon ini file and
        // generates javascript init code
        $conf = LoadConfig();
        $feed = feedName();
        $filename = beaconFile();
        $lastlon = null;
        $lastlat = null;
        printf(" var phpnow = %d;\r\n", time());
        printf(" var feed   = '%s'; ", $feed);
        printf(" var lastFileTimeStamp = 0;\r\n");
        printf(" var tailLength = %d;\r\n", intVal($conf["int_taillength"]));


        if (file_exists($filename)) {
            printf(" lastFileTimeStamp = %d;\r\n", filemtime($filename));
            if (file_exists($filename)) {
                $ini = parse_ini_file($filename, true);
                foreach ($ini as $key => $value)
                    if (filter_var($key, FILTER_VALIDATE_INT) !== false) {
                        if ($ini[$key]['lat'] != 'N/A') {
                            $lastlon = $ini[$key]['lon'];
                            $lastlat = $ini[$key]['lat'];

                            Print("positions.push({tim:$key,spd:'{$ini[$key]['spd']}'"
                                . ",tmp:'{$ini[$key]['tmp']}'"
                                . ",pwr:'{$ini[$key]['pwr']}'"
                                . ",ope:'{$ini[$key]['ope']}'"
                                . ",cel:'{$ini[$key]['cel']}'"
                                . ",upt:'{$ini[$key]['upt']}'"
                                . ",mrk:null"
                                . ",pos:  L.latLng($lastlat,$lastlon ) });\r\n");

                        }
                    }
            }
        }
        ?>

        // GPS DD to DMS convertion (thanks Pedro Soares @ stackoverflow)
        function getDD2DMS(dms, type) {
            var sign = 1, Abs = 0;
            var days, minutes, secounds, direction;

            if (dms < 0) {
                sign = -1;
            }
            Abs = Math.abs(Math.round(dms * 1000000.));
            //Math.round is used to eliminate the small error caused by rounding in the computer:
            //e.g. 0.2 is not the same as 0.20000000000284
            //Error checks
            if (type == "lat" && Abs > (90 * 1000000)) {
                //alert(" Degrees Latitude must be in the range of -90. to 90. ");
                return false;
            } else if (type == "lon" && Abs > (180 * 1000000)) {
                //alert(" Degrees Longitude must be in the range of -180 to 180. ");
                return false;
            }

            days = Math.floor(Abs / 1000000);
            minutes = Math.floor(((Abs / 1000000) - days) * 60);
            secounds = (Math.floor(((((Abs / 1000000) - days) * 60) - minutes) * 100000) * 60 / 100000).toFixed();
            days = days * sign;
            if (type == 'lat') direction = days < 0 ? 'S' : 'N';
            if (type == 'lon') direction = days < 0 ? 'W' : 'E';
            //else return value
            return (days * sign) + '&deg; ' + minutes + "' " + secounds + "'' " + direction;
        }


        // update the top right data frame
        function UpdateData(index) {
            var absoluteTime = true;
            if (index < 0) {
                index = positions.length - 1;
                absoluteTime = false;
            }
            var now = Math.round((new Date()).getTime() / 1000);

            var t = 'N/A';
            if (index >= 0) {
                var sec = (now - loadtime) + (phpnow - positions[index].tim);
                if (!absoluteTime) {
                    document.getElementById('lupdate').innerHTML = 'Last update:'
                    if (sec < 60) t = '' + sec + ' sec ago'
                    else if (sec < 3600) t = '' + Math.floor(sec / 60) + ' min ago';
                    else if (sec < 86400) t = '' + Math.floor(sec / 3600) + 'h ' + (Math.floor(sec / 60) % 60) + 'm ago';
                    else t = Math.floor(sec / 3600) + 'hours ago';
                }
                else {
                    document.getElementById('lupdate').innerHTML = 'Position at'
                    var date = new Date(positions[index].tim * 1000);
                    var hours = date.getHours();
                    var minutes = "0" + date.getMinutes();
                    var seconds = "0" + date.getSeconds();
                    var month = date.getMonth() + 1;
                    var day = date.getDate();
                    var year = date.getFullYear();
                    t = day + '/' + month + '/' + year + ' ' + hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
                }
            }
            document.getElementById('lastupd').innerHTML = t;
            document.getElementById('lastlat').innerHTML = (index >= 0) ? getDD2DMS(positions[index].pos.lat, 'lat') : 'N/A';
            document.getElementById('lastlon').innerHTML = (index >= 0) ? getDD2DMS(positions[index].pos.lng, 'lon') : 'N/A';
            document.getElementById('lastpwr').innerHTML = (index >= 0) ? positions[index].pwr > 0 ? 'Yes' : 'No' : 'N/A';
            document.getElementById('lastspd').innerHTML = (index >= 0) ? Math.round(positions[index].spd) + ' km/h' : 'N/A';
            document.getElementById('lasttemp').innerHTML = (index >= 0) ? positions[index].tmp != 'N/A' ? Math.round(positions[index].tmp) + '&deg;C' : 'N/A' : 'N/A';
            document.getElementById('lastupt').innerHTML = (index >= 0) ? Math.round(positions[index].upt / 1000) + ' sec' : 'N/A';
            document.getElementById('lastope').innerHTML = (index >= 0) ? positions[index].ope : 'N/A';
            document.getElementById('lastcell').innerHTML = (index >= 0) ? positions[index].cel : 'N/A';
        }

        // data automatic refresh
        function AutoUpdate(lastFileUpdate) {
            if (refreshtimeout) clearTimeout(refreshtimeout);
            refreshtimeout = null;
            lastFileTimeStamp = lastFileUpdate;
            if (mouserOver <= 0) UpdateData(-1);
            setTimeout('refresh()', 1000);
        }

        function hideLocalInfo() {
            UpdateData(-1);
        }

        function showLocalInfo(index) {
            UpdateData(index);
        }

        // called from refresh iframe, no new data found, next
        // update in 10 sec
        function noUpdate() {
            if (refreshtimeout) clearTimeout(refreshtimeout);
            refreshtimeout = null;
            if (mouserOver <= 0) UpdateData(-1);
            setTimeout('refresh()', 10000);
        }

        // called from refresh iframe, new data found,
        // add the data structure and redraw
        function addRecord(timestamp, lon, lat, spd, temp, pwr, ope, cel, upt) {
            if (positions.length > 0) {
                positions[positions.length - 1].mrk.setRadius(4);
                positions[positions.length - 1].mrk.setWeight(1);
            }
            positions.push({
                tim: timestamp,
                spd: spd,
                tmp: temp,
                pwr: pwr,
                upt: upt,
                ope: ope,
                cel: cel,
                mrk: null,
                pos: L.latLng(lat, lon)
            });
            var i = positions.length - 1;
            var options = {
                color: 'black',
                fillColor: 'red',
                fillOpacity: 1,
                radius: 6,
                weight: 1.5,
                opacity: 1.0
            };
            positions[i].mrk = L.circleMarker(positions[i].pos, options);
            positions[i].mrk.positionsIndex = parseInt(i);
            positions[i].mrk.addTo(map);
            positions[i].mrk.on({
                "mouseover": (ev) => {
                    mouserOver++;
                    showLocalInfo(ev.target.positionsIndex);
                },
                "mouseout": (ev) => {
                    mouserOver--;
                    hideLocalInfo();
                }
            });
            refreshtail();

        }

        var refreshtimeout = null;

        // starts a refresh, and sets up a timeout do
        // make a retry if in case of failure

        function refresh() {
            var last = 0;
            if (positions.length > 0) last = positions[positions.length - 1].tim;
            refreshtimeout = setTimeout(refresh, 5000);
            document.getElementById('refreshframe').src = 'index.php?cmd=update&filetimestamp=' + (lastFileTimeStamp) + '&postimestamp=' + (last) + '&feed=' + feed;
        }

        // intiates config edit
        function showConfig() {
            document.getElementById('controlframe').src = 'index.php?cmd=loadConfig';
        }

        // redraw the markers tail
        function refreshtail() {
            var now = Math.round((new Date()).getTime() / 1000);
            for (var i = 0; i < positions.length - 1; i++) {
                positions[i].mrk.setVisible((now - loadtime) + (phpnow - positions[i].tim) <= tailLength);
            }
            positions[positions.length - 1].mrk.setVisible(true);
        }

        // save the config throug Iframe
        function SaveConfig() {
            var url = 'index.php?cmd=saveConfig';
            var inputs = document.getElementsByTagName("INPUT");
            for (var i = 0; i < inputs.length; i++) {
                url = url + '&' + inputs[i].id + '=' + encodeURIComponent(inputs[i].value);
            }
            document.getElementById('controlframe').src = url;
            tailLength = parseInt(document.getElementById('int_taillength').value);
            HideConfig();
            refreshtail();


        }

        // hides the config window
        function HideConfig() {
            document.getElementById("configdata").style.display = 'none';
        }

        // show the config windows
        function ShowConfigWindow(int_refreshDelay, int_taillength) {
            document.getElementById("int_callbackdelay").value = int_refreshDelay;
            document.getElementById("int_taillength").value = int_taillength;
            document.getElementById("configdata").style.display = '';
        }

        // show the logfile window
        function showLog() {
            document.getElementById('logframe').src = 'index.php?cmd=showLog';
            document.getElementById('logdata').style.display = '';
        }

        // hide the config window
        function hideLog() {
            document.getElementById('logdata').style.display = 'none';
        }

        // initialise the system (Leaflet/OpenStreetMap map)
        function initialize() {
            <?php
            Printf("currentPosition =  L.latLng(%f, %f);\r\n", is_null($lastlat) ? DEFAULT_LAT : $lastlat, is_null($lastlon) ? DEFAULT_LON : $lastlon);
            ?>

            var mapOptions = {center: currentPosition, zoom: <?php print(DEFAULT_ZOOM);?>};            
            map = L.map(document.getElementById('map-canvas'), mapOptions);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            // draw all positions
            for (var i = 0; i < positions.length; i++) {
                var options = {
                    stroke: true,
                    color: 'black',
                    fillColor: 'red',
                };
                if(i < positions.length - 1) {  // intermediate marker
                    options.radius = 4;
                    options.weight = 1;
                    options.opacity = ((phpnow - positions[i].tim <= tailLength) ? 1.0 : 0.0);
                } else {                        // tail marker
                    options.radius = 6;
                    options.weight = 1.5;
                    options.opacity = 1.0;
                }
                options.fillOpacity = options.opacity;
                positions[i].mrk = L.circleMarker(positions[i].pos, options);
                positions[i].mrk.positionsIndex = parseInt(i);
                positions[i].mrk.addTo(map);
                positions[i].mrk.on({
                    "mouseover": (ev) => {
                        mouserOver++;
                        showLocalInfo(ev.target.positionsIndex);
                    },
                    "mouseout": (ev) => {
                        mouserOver--;
                        hideLocalInfo();
                    }
                });
            }
            if (positions.length > 0) UpdateData(-1);

            setTimeout('refresh()', 1000);
        }
    </script>
</head>
<body onload="initialize()">
<!-- map -->
<div id="map-canvas"></div>
<!-- top-right data frame -->
<div id="positiondata">
    <table>
        <tr>
            <td id='lupdate'>Last update:</td>
            <td id='lastupd'>N/A</td>
        </tr>
        <tr>
            <td>Latitude:</td>
            <td id='lastlat'>N/A</td>
        </tr>
        <tr>
            <td>Longitude:</td>
            <td id='lastlon'>N/A</td>
        </tr>
        <tr>
            <td>Powered:</td>
            <td id='lastpwr'>N/A</td>
        </tr>
        <tr>
            <td>Speed:</td>
            <td id='lastspd'>N/A</td>
        </tr>
        <tr>
            <td>Temperature:</td>
            <td id='lasttemp'>N/A</td>
        </tr>
        <tr>
            <td>Uptime:</td>
            <td id='lastupt'>N/A</td>
        </tr>
        <tr>
            <td>Operator:</td>
            <td id='lastope'>N/A</td>
        </tr>
        <tr>
            <td>Cell:</td>
            <td id='lastcell'>N/A</td>
        </tr>
        <tr>
            <td style='text-align:left'><a href='javascript:showLog()'>Log file</a></td>
            <td style='text-align:right'><a href='javascript:showConfig()'>Configure system</a></td>
        </tr>
    </table>
</div>
<!-- top-left config window -->
<div id="configdata" style='display:none'>
    <table>
        <tr>
            <td colspan=2 style='text-align:center'><b>System Config<b></td>
        </tr>
        <tr>
            <td>Callback delay:</td>
            <td><input id='int_callbackdelay' style='text-align:right' size=6 value=''> sec</td>
        </tr>
        <tr>
            <td>Tail length:</td>
            <td><input id='int_taillength' style='text-align:right' size=6 value=''> sec</td>
        </tr>
        <tr>
            <td colspan=2 style='text-align:right'><a href='javascript:SaveConfig()'>Save</a>&nbsp;&nbsp;<a
                        href='javascript:HideConfig()'>Cancel</a></td>
        </tr>
    </table>
</div>
<!--  log window -->
<div id="logdata" style='display:none'>
    <iframe id='logframe' style='width:100%;height:100%;border:0px solid black;'></iframe>
    <a href='javascript:hideLog()' style='position:absolute;right:25px;top:10px;'>Close</a><
</div>
<!--  control iframes -->
<iframe id='refreshframe' style='display:none;'></iframe>
<iframe id='controlframe' style='display:none;'></iframe>
</body>
</html>