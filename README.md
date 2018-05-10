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
 beacon.con
