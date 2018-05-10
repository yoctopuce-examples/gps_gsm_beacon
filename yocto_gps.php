<?php
/*********************************************************************
 *
 * $Id: pic24config.php 30633 2018-04-16 12:50:21Z seb $
 *
 * Implements YGps, the high-level API for Gps functions
 *
 * - - - - - - - - - License information: - - - - - - - - -
 *
 *  Copyright (C) 2011 and beyond by Yoctopuce Sarl, Switzerland.
 *
 *  Yoctopuce Sarl (hereafter Licensor) grants to you a perpetual
 *  non-exclusive license to use, modify, copy and integrate this
 *  file into your software for the sole purpose of interfacing
 *  with Yoctopuce products.
 *
 *  You may reproduce and distribute copies of this file in
 *  source or object form, as long as the sole purpose of this
 *  code is to interface with Yoctopuce products. You must retain
 *  this notice in the distributed source file.
 *
 *  You should refer to Yoctopuce General Terms and Conditions
 *  for additional information regarding your rights and
 *  obligations.
 *
 *  THE SOFTWARE AND DOCUMENTATION ARE PROVIDED 'AS IS' WITHOUT
 *  WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING
 *  WITHOUT LIMITATION, ANY WARRANTY OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT. IN NO
 *  EVENT SHALL LICENSOR BE LIABLE FOR ANY INCIDENTAL, SPECIAL,
 *  INDIRECT OR CONSEQUENTIAL DAMAGES, LOST PROFITS OR LOST DATA,
 *  COST OF PROCUREMENT OF SUBSTITUTE GOODS, TECHNOLOGY OR
 *  SERVICES, ANY CLAIMS BY THIRD PARTIES (INCLUDING BUT NOT
 *  LIMITED TO ANY DEFENSE THEREOF), ANY CLAIMS FOR INDEMNITY OR
 *  CONTRIBUTION, OR OTHER SIMILAR COSTS, WHETHER ASSERTED ON THE
 *  BASIS OF CONTRACT, TORT (INCLUDING NEGLIGENCE), BREACH OF
 *  WARRANTY, OR OTHERWISE.
 *
 *********************************************************************/

//--- (YGps return codes)
//--- (end of YGps return codes)
//--- (YGps definitions)
if(!defined('Y_ISFIXED_FALSE'))              define('Y_ISFIXED_FALSE',             0);
if(!defined('Y_ISFIXED_TRUE'))               define('Y_ISFIXED_TRUE',              1);
if(!defined('Y_ISFIXED_INVALID'))            define('Y_ISFIXED_INVALID',           -1);
if(!defined('Y_COORDSYSTEM_GPS_DMS'))        define('Y_COORDSYSTEM_GPS_DMS',       0);
if(!defined('Y_COORDSYSTEM_GPS_DM'))         define('Y_COORDSYSTEM_GPS_DM',        1);
if(!defined('Y_COORDSYSTEM_GPS_D'))          define('Y_COORDSYSTEM_GPS_D',         2);
if(!defined('Y_COORDSYSTEM_INVALID'))        define('Y_COORDSYSTEM_INVALID',       -1);
if(!defined('Y_SATCOUNT_INVALID'))           define('Y_SATCOUNT_INVALID',          YAPI_INVALID_LONG);
if(!defined('Y_LATITUDE_INVALID'))           define('Y_LATITUDE_INVALID',          YAPI_INVALID_STRING);
if(!defined('Y_LONGITUDE_INVALID'))          define('Y_LONGITUDE_INVALID',         YAPI_INVALID_STRING);
if(!defined('Y_DILUTION_INVALID'))           define('Y_DILUTION_INVALID',          YAPI_INVALID_DOUBLE);
if(!defined('Y_ALTITUDE_INVALID'))           define('Y_ALTITUDE_INVALID',          YAPI_INVALID_DOUBLE);
if(!defined('Y_GROUNDSPEED_INVALID'))        define('Y_GROUNDSPEED_INVALID',       YAPI_INVALID_DOUBLE);
if(!defined('Y_DIRECTION_INVALID'))          define('Y_DIRECTION_INVALID',         YAPI_INVALID_DOUBLE);
if(!defined('Y_UNIXTIME_INVALID'))           define('Y_UNIXTIME_INVALID',          YAPI_INVALID_LONG);
if(!defined('Y_DATETIME_INVALID'))           define('Y_DATETIME_INVALID',          YAPI_INVALID_STRING);
if(!defined('Y_UTCOFFSET_INVALID'))          define('Y_UTCOFFSET_INVALID',         YAPI_INVALID_INT);
if(!defined('Y_COMMAND_INVALID'))            define('Y_COMMAND_INVALID',           YAPI_INVALID_STRING);
//--- (end of YGps definitions)

//--- (YGps declaration)
/**
 * YGps Class: GPS function interface
 *
 * The Gps function allows you to extract positionning
 * data from the GPS device. This class can provides
 * complete positionning information: However, if you
 * whish to define callbacks on position changes, you
 * should use the YLatitude et YLongitude classes.
 */
class YGps extends YFunction
{
    const ISFIXED_FALSE                  = 0;
    const ISFIXED_TRUE                   = 1;
    const ISFIXED_INVALID                = -1;
    const SATCOUNT_INVALID               = YAPI_INVALID_LONG;
    const COORDSYSTEM_GPS_DMS            = 0;
    const COORDSYSTEM_GPS_DM             = 1;
    const COORDSYSTEM_GPS_D              = 2;
    const COORDSYSTEM_INVALID            = -1;
    const LATITUDE_INVALID               = YAPI_INVALID_STRING;
    const LONGITUDE_INVALID              = YAPI_INVALID_STRING;
    const DILUTION_INVALID               = YAPI_INVALID_DOUBLE;
    const ALTITUDE_INVALID               = YAPI_INVALID_DOUBLE;
    const GROUNDSPEED_INVALID            = YAPI_INVALID_DOUBLE;
    const DIRECTION_INVALID              = YAPI_INVALID_DOUBLE;
    const UNIXTIME_INVALID               = YAPI_INVALID_LONG;
    const DATETIME_INVALID               = YAPI_INVALID_STRING;
    const UTCOFFSET_INVALID              = YAPI_INVALID_INT;
    const COMMAND_INVALID                = YAPI_INVALID_STRING;
    //--- (end of YGps declaration)

    //--- (YGps attributes)
    protected $_isFixed                  = Y_ISFIXED_INVALID;            // Bool
    protected $_satCount                 = Y_SATCOUNT_INVALID;           // UInt
    protected $_coordSystem              = Y_COORDSYSTEM_INVALID;        // GPSCoordinateSystem
    protected $_latitude                 = Y_LATITUDE_INVALID;           // Text
    protected $_longitude                = Y_LONGITUDE_INVALID;          // Text
    protected $_dilution                 = Y_DILUTION_INVALID;           // MeasureVal
    protected $_altitude                 = Y_ALTITUDE_INVALID;           // MeasureVal
    protected $_groundSpeed              = Y_GROUNDSPEED_INVALID;        // MeasureVal
    protected $_direction                = Y_DIRECTION_INVALID;          // MeasureVal
    protected $_unixTime                 = Y_UNIXTIME_INVALID;           // UTCTime
    protected $_dateTime                 = Y_DATETIME_INVALID;           // Text
    protected $_utcOffset                = Y_UTCOFFSET_INVALID;          // Int
    protected $_command                  = Y_COMMAND_INVALID;            // Text
    //--- (end of YGps attributes)

    function __construct($str_func)
    {
        //--- (YGps constructor)
        parent::__construct($str_func);
        $this->_className = 'Gps';

        //--- (end of YGps constructor)
    }

    //--- (YGps implementation)

    function _parseAttr($name, $val)
    {
        switch($name) {
        case 'isFixed':
            $this->_isFixed = intval($val);
            return 1;
        case 'satCount':
            $this->_satCount = intval($val);
            return 1;
        case 'coordSystem':
            $this->_coordSystem = intval($val);
            return 1;
        case 'latitude':
            $this->_latitude = $val;
            return 1;
        case 'longitude':
            $this->_longitude = $val;
            return 1;
        case 'dilution':
            $this->_dilution = round($val * 1000.0 / 65536.0) / 1000.0;
            return 1;
        case 'altitude':
            $this->_altitude = round($val * 1000.0 / 65536.0) / 1000.0;
            return 1;
        case 'groundSpeed':
            $this->_groundSpeed = round($val * 1000.0 / 65536.0) / 1000.0;
            return 1;
        case 'direction':
            $this->_direction = round($val * 1000.0 / 65536.0) / 1000.0;
            return 1;
        case 'unixTime':
            $this->_unixTime = intval($val);
            return 1;
        case 'dateTime':
            $this->_dateTime = $val;
            return 1;
        case 'utcOffset':
            $this->_utcOffset = intval($val);
            return 1;
        case 'command':
            $this->_command = $val;
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns TRUE if the receiver has found enough satellites to work.
     *
     * @return integer : either Y_ISFIXED_FALSE or Y_ISFIXED_TRUE, according to TRUE if the receiver has
     * found enough satellites to work
     *
     * On failure, throws an exception or returns Y_ISFIXED_INVALID.
     */
    public function get_isFixed()
    {
        // $res                    is a enumBOOL;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_ISFIXED_INVALID;
            }
        }
        $res = $this->_isFixed;
        return $res;
    }

    /**
     * Returns the count of visible satellites.
     *
     * @return integer : an integer corresponding to the count of visible satellites
     *
     * On failure, throws an exception or returns Y_SATCOUNT_INVALID.
     */
    public function get_satCount()
    {
        // $res                    is a long;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_SATCOUNT_INVALID;
            }
        }
        $res = $this->_satCount;
        return $res;
    }

    /**
     * Returns the representation system used for positioning data.
     *
     * @return integer : a value among Y_COORDSYSTEM_GPS_DMS, Y_COORDSYSTEM_GPS_DM and Y_COORDSYSTEM_GPS_D
     * corresponding to the representation system used for positioning data
     *
     * On failure, throws an exception or returns Y_COORDSYSTEM_INVALID.
     */
    public function get_coordSystem()
    {
        // $res                    is a enumGPSCOORDINATESYSTEM;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_COORDSYSTEM_INVALID;
            }
        }
        $res = $this->_coordSystem;
        return $res;
    }

    /**
     * Changes the representation system used for positioning data.
     *
     * @param integer $newval : a value among Y_COORDSYSTEM_GPS_DMS, Y_COORDSYSTEM_GPS_DM and
     * Y_COORDSYSTEM_GPS_D corresponding to the representation system used for positioning data
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_coordSystem($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("coordSystem",$rest_val);
    }

    /**
     * Returns the current latitude.
     *
     * @return string : a string corresponding to the current latitude
     *
     * On failure, throws an exception or returns Y_LATITUDE_INVALID.
     */
    public function get_latitude()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_LATITUDE_INVALID;
            }
        }
        $res = $this->_latitude;
        return $res;
    }

    /**
     * Returns the current longitude.
     *
     * @return string : a string corresponding to the current longitude
     *
     * On failure, throws an exception or returns Y_LONGITUDE_INVALID.
     */
    public function get_longitude()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_LONGITUDE_INVALID;
            }
        }
        $res = $this->_longitude;
        return $res;
    }

    /**
     * Returns the current horizontal dilution of precision,
     * the smaller that number is, the better .
     *
     * @return double : a floating point number corresponding to the current horizontal dilution of precision,
     *         the smaller that number is, the better
     *
     * On failure, throws an exception or returns Y_DILUTION_INVALID.
     */
    public function get_dilution()
    {
        // $res                    is a double;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_DILUTION_INVALID;
            }
        }
        $res = $this->_dilution;
        return $res;
    }

    /**
     * Returns the current altitude. Beware:  GPS technology
     * is very inaccurate regarding altitude.
     *
     * @return double : a floating point number corresponding to the current altitude
     *
     * On failure, throws an exception or returns Y_ALTITUDE_INVALID.
     */
    public function get_altitude()
    {
        // $res                    is a double;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_ALTITUDE_INVALID;
            }
        }
        $res = $this->_altitude;
        return $res;
    }

    /**
     * Returns the current ground speed in Km/h.
     *
     * @return double : a floating point number corresponding to the current ground speed in Km/h
     *
     * On failure, throws an exception or returns Y_GROUNDSPEED_INVALID.
     */
    public function get_groundSpeed()
    {
        // $res                    is a double;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_GROUNDSPEED_INVALID;
            }
        }
        $res = $this->_groundSpeed;
        return $res;
    }

    /**
     * Returns the current move bearing in degrees, zero
     * is the true (geographic) north.
     *
     * @return double : a floating point number corresponding to the current move bearing in degrees, zero
     *         is the true (geographic) north
     *
     * On failure, throws an exception or returns Y_DIRECTION_INVALID.
     */
    public function get_direction()
    {
        // $res                    is a double;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_DIRECTION_INVALID;
            }
        }
        $res = $this->_direction;
        return $res;
    }

    /**
     * Returns the current time in Unix format (number of
     * seconds elapsed since Jan 1st, 1970).
     *
     * @return integer : an integer corresponding to the current time in Unix format (number of
     *         seconds elapsed since Jan 1st, 1970)
     *
     * On failure, throws an exception or returns Y_UNIXTIME_INVALID.
     */
    public function get_unixTime()
    {
        // $res                    is a long;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_UNIXTIME_INVALID;
            }
        }
        $res = $this->_unixTime;
        return $res;
    }

    /**
     * Returns the current time in the form "YYYY/MM/DD hh:mm:ss".
     *
     * @return string : a string corresponding to the current time in the form "YYYY/MM/DD hh:mm:ss"
     *
     * On failure, throws an exception or returns Y_DATETIME_INVALID.
     */
    public function get_dateTime()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_DATETIME_INVALID;
            }
        }
        $res = $this->_dateTime;
        return $res;
    }

    /**
     * Returns the number of seconds between current time and UTC time (time zone).
     *
     * @return integer : an integer corresponding to the number of seconds between current time and UTC
     * time (time zone)
     *
     * On failure, throws an exception or returns Y_UTCOFFSET_INVALID.
     */
    public function get_utcOffset()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_UTCOFFSET_INVALID;
            }
        }
        $res = $this->_utcOffset;
        return $res;
    }

    /**
     * Changes the number of seconds between current time and UTC time (time zone).
     * The timezone is automatically rounded to the nearest multiple of 15 minutes.
     * If current UTC time is known, the current time is automatically be updated according to the selected time zone.
     *
     * @param integer $newval : an integer corresponding to the number of seconds between current time and
     * UTC time (time zone)
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_utcOffset($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("utcOffset",$rest_val);
    }

    public function get_command()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_COMMAND_INVALID;
            }
        }
        $res = $this->_command;
        return $res;
    }

    public function set_command($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("command",$rest_val);
    }

    /**
     * Retrieves a GPS for a given identifier.
     * The identifier can be specified using several formats:
     * <ul>
     * <li>FunctionLogicalName</li>
     * <li>ModuleSerialNumber.FunctionIdentifier</li>
     * <li>ModuleSerialNumber.FunctionLogicalName</li>
     * <li>ModuleLogicalName.FunctionIdentifier</li>
     * <li>ModuleLogicalName.FunctionLogicalName</li>
     * </ul>
     *
     * This function does not require that the GPS is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method YGps.isOnline() to test if the GPS is
     * indeed online at a given time. In case of ambiguity when looking for
     * a GPS by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the matching device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string that uniquely characterizes the GPS
     *
     * @return YGps : a YGps object allowing you to drive the GPS.
     */
    public static function FindGps($func)
    {
        // $obj                    is a YGps;
        $obj = YFunction::_FindFromCache('Gps', $func);
        if ($obj == null) {
            $obj = new YGps($func);
            YFunction::_AddToCache('Gps', $func, $obj);
        }
        return $obj;
    }

    public function isFixed()
    { return $this->get_isFixed(); }

    public function satCount()
    { return $this->get_satCount(); }

    public function coordSystem()
    { return $this->get_coordSystem(); }

    public function setCoordSystem($newval)
    { return $this->set_coordSystem($newval); }

    public function latitude()
    { return $this->get_latitude(); }

    public function longitude()
    { return $this->get_longitude(); }

    public function dilution()
    { return $this->get_dilution(); }

    public function altitude()
    { return $this->get_altitude(); }

    public function groundSpeed()
    { return $this->get_groundSpeed(); }

    public function direction()
    { return $this->get_direction(); }

    public function unixTime()
    { return $this->get_unixTime(); }

    public function dateTime()
    { return $this->get_dateTime(); }

    public function utcOffset()
    { return $this->get_utcOffset(); }

    public function setUtcOffset($newval)
    { return $this->set_utcOffset($newval); }

    public function command()
    { return $this->get_command(); }

    public function setCommand($newval)
    { return $this->set_command($newval); }

    /**
     * Continues the enumeration of GPS started using yFirstGps().
     *
     * @return YGps : a pointer to a YGps object, corresponding to
     *         a GPS currently online, or a null pointer
     *         if there are no more GPS to enumerate.
     */
    public function nextGps()
    {   $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if($resolve->errorType != YAPI_SUCCESS) return null;
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if($next_hwid == null) return null;
        return self::FindGps($next_hwid);
    }

    /**
     * Starts the enumeration of GPS currently accessible.
     * Use the method YGps.nextGps() to iterate on
     * next GPS.
     *
     * @return YGps : a pointer to a YGps object, corresponding to
     *         the first GPS currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstGps()
    {   $next_hwid = YAPI::getFirstHardwareId('Gps');
        if($next_hwid == null) return null;
        return self::FindGps($next_hwid);
    }

    //--- (end of YGps implementation)

};

//--- (YGps functions)

/**
 * Retrieves a GPS for a given identifier.
 * The identifier can be specified using several formats:
 * <ul>
 * <li>FunctionLogicalName</li>
 * <li>ModuleSerialNumber.FunctionIdentifier</li>
 * <li>ModuleSerialNumber.FunctionLogicalName</li>
 * <li>ModuleLogicalName.FunctionIdentifier</li>
 * <li>ModuleLogicalName.FunctionLogicalName</li>
 * </ul>
 *
 * This function does not require that the GPS is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method YGps.isOnline() to test if the GPS is
 * indeed online at a given time. In case of ambiguity when looking for
 * a GPS by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the matching device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string that uniquely characterizes the GPS
 *
 * @return YGps : a YGps object allowing you to drive the GPS.
 */
function yFindGps($func)
{
    return YGps::FindGps($func);
}

/**
 * Starts the enumeration of GPS currently accessible.
 * Use the method YGps.nextGps() to iterate on
 * next GPS.
 *
 * @return YGps : a pointer to a YGps object, corresponding to
 *         the first GPS currently online, or a null pointer
 *         if there are none.
 */
function yFirstGps()
{
    return YGps::FirstGps();
}

//--- (end of YGps functions)
?>