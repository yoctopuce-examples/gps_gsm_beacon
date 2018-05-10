<?php
/*********************************************************************
 *
 * $Id: pic24config.php 30633 2018-04-16 12:50:21Z seb $
 *
 * Implements YTemperature, the high-level API for Temperature functions
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

//--- (YTemperature return codes)
//--- (end of YTemperature return codes)
//--- (YTemperature definitions)
if(!defined('Y_SENSORTYPE_DIGITAL'))         define('Y_SENSORTYPE_DIGITAL',        0);
if(!defined('Y_SENSORTYPE_TYPE_K'))          define('Y_SENSORTYPE_TYPE_K',         1);
if(!defined('Y_SENSORTYPE_TYPE_E'))          define('Y_SENSORTYPE_TYPE_E',         2);
if(!defined('Y_SENSORTYPE_TYPE_J'))          define('Y_SENSORTYPE_TYPE_J',         3);
if(!defined('Y_SENSORTYPE_TYPE_N'))          define('Y_SENSORTYPE_TYPE_N',         4);
if(!defined('Y_SENSORTYPE_TYPE_R'))          define('Y_SENSORTYPE_TYPE_R',         5);
if(!defined('Y_SENSORTYPE_TYPE_S'))          define('Y_SENSORTYPE_TYPE_S',         6);
if(!defined('Y_SENSORTYPE_TYPE_T'))          define('Y_SENSORTYPE_TYPE_T',         7);
if(!defined('Y_SENSORTYPE_PT100_4WIRES'))    define('Y_SENSORTYPE_PT100_4WIRES',   8);
if(!defined('Y_SENSORTYPE_PT100_3WIRES'))    define('Y_SENSORTYPE_PT100_3WIRES',   9);
if(!defined('Y_SENSORTYPE_PT100_2WIRES'))    define('Y_SENSORTYPE_PT100_2WIRES',   10);
if(!defined('Y_SENSORTYPE_RES_OHM'))         define('Y_SENSORTYPE_RES_OHM',        11);
if(!defined('Y_SENSORTYPE_RES_NTC'))         define('Y_SENSORTYPE_RES_NTC',        12);
if(!defined('Y_SENSORTYPE_RES_LINEAR'))      define('Y_SENSORTYPE_RES_LINEAR',     13);
if(!defined('Y_SENSORTYPE_RES_INTERNAL'))    define('Y_SENSORTYPE_RES_INTERNAL',   14);
if(!defined('Y_SENSORTYPE_INVALID'))         define('Y_SENSORTYPE_INVALID',        -1);
if(!defined('Y_SIGNALVALUE_INVALID'))        define('Y_SIGNALVALUE_INVALID',       YAPI_INVALID_DOUBLE);
if(!defined('Y_SIGNALUNIT_INVALID'))         define('Y_SIGNALUNIT_INVALID',        YAPI_INVALID_STRING);
if(!defined('Y_COMMAND_INVALID'))            define('Y_COMMAND_INVALID',           YAPI_INVALID_STRING);
//--- (end of YTemperature definitions)

//--- (YTemperature declaration)
/**
 * YTemperature Class: Temperature function interface
 *
 * The Yoctopuce class YTemperature allows you to read and configure Yoctopuce temperature
 * sensors. It inherits from YSensor class the core functions to read measurements, to
 * register callback functions, to access the autonomous datalogger.
 * This class adds the ability to configure some specific parameters for some
 * sensors (connection type, temperature mapping table).
 */
class YTemperature extends YSensor
{
    const SENSORTYPE_DIGITAL             = 0;
    const SENSORTYPE_TYPE_K              = 1;
    const SENSORTYPE_TYPE_E              = 2;
    const SENSORTYPE_TYPE_J              = 3;
    const SENSORTYPE_TYPE_N              = 4;
    const SENSORTYPE_TYPE_R              = 5;
    const SENSORTYPE_TYPE_S              = 6;
    const SENSORTYPE_TYPE_T              = 7;
    const SENSORTYPE_PT100_4WIRES        = 8;
    const SENSORTYPE_PT100_3WIRES        = 9;
    const SENSORTYPE_PT100_2WIRES        = 10;
    const SENSORTYPE_RES_OHM             = 11;
    const SENSORTYPE_RES_NTC             = 12;
    const SENSORTYPE_RES_LINEAR          = 13;
    const SENSORTYPE_RES_INTERNAL        = 14;
    const SENSORTYPE_INVALID             = -1;
    const SIGNALVALUE_INVALID            = YAPI_INVALID_DOUBLE;
    const SIGNALUNIT_INVALID             = YAPI_INVALID_STRING;
    const COMMAND_INVALID                = YAPI_INVALID_STRING;
    //--- (end of YTemperature declaration)

    //--- (YTemperature attributes)
    protected $_sensorType               = Y_SENSORTYPE_INVALID;         // TempSensorTypeAll
    protected $_signalValue              = Y_SIGNALVALUE_INVALID;        // MeasureVal
    protected $_signalUnit               = Y_SIGNALUNIT_INVALID;         // Text
    protected $_command                  = Y_COMMAND_INVALID;            // Text
    //--- (end of YTemperature attributes)

    function __construct($str_func)
    {
        //--- (YTemperature constructor)
        parent::__construct($str_func);
        $this->_className = 'Temperature';

        //--- (end of YTemperature constructor)
    }

    //--- (YTemperature implementation)

    function _parseAttr($name, $val)
    {
        switch($name) {
        case 'sensorType':
            $this->_sensorType = intval($val);
            return 1;
        case 'signalValue':
            $this->_signalValue = round($val * 1000.0 / 65536.0) / 1000.0;
            return 1;
        case 'signalUnit':
            $this->_signalUnit = $val;
            return 1;
        case 'command':
            $this->_command = $val;
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Changes the measuring unit for the measured temperature. That unit is a string.
     * If that strings end with the letter F all temperatures values will returned in
     * Fahrenheit degrees. If that String ends with the letter K all values will be
     * returned in Kelvin degrees. If that string ends with the letter C all values will be
     * returned in Celsius degrees.  If the string ends with any other character the
     * change will be ignored. Remember to call the
     * saveToFlash() method of the module if the modification must be kept.
     * WARNING: if a specific calibration is defined for the temperature function, a
     * unit system change will probably break it.
     *
     * @param string $newval : a string corresponding to the measuring unit for the measured temperature
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_unit($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("unit",$rest_val);
    }

    /**
     * Returns the temperature sensor type.
     *
     * @return integer : a value among Y_SENSORTYPE_DIGITAL, Y_SENSORTYPE_TYPE_K, Y_SENSORTYPE_TYPE_E,
     * Y_SENSORTYPE_TYPE_J, Y_SENSORTYPE_TYPE_N, Y_SENSORTYPE_TYPE_R, Y_SENSORTYPE_TYPE_S,
     * Y_SENSORTYPE_TYPE_T, Y_SENSORTYPE_PT100_4WIRES, Y_SENSORTYPE_PT100_3WIRES,
     * Y_SENSORTYPE_PT100_2WIRES, Y_SENSORTYPE_RES_OHM, Y_SENSORTYPE_RES_NTC, Y_SENSORTYPE_RES_LINEAR and
     * Y_SENSORTYPE_RES_INTERNAL corresponding to the temperature sensor type
     *
     * On failure, throws an exception or returns Y_SENSORTYPE_INVALID.
     */
    public function get_sensorType()
    {
        // $res                    is a enumTEMPSENSORTYPEALL;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_SENSORTYPE_INVALID;
            }
        }
        $res = $this->_sensorType;
        return $res;
    }

    /**
     * Changes the temperature sensor type.  This function is used
     * to define the type of thermocouple (K,E...) used with the device.
     * It has no effect if module is using a digital sensor or a thermistor.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param integer $newval : a value among Y_SENSORTYPE_DIGITAL, Y_SENSORTYPE_TYPE_K,
     * Y_SENSORTYPE_TYPE_E, Y_SENSORTYPE_TYPE_J, Y_SENSORTYPE_TYPE_N, Y_SENSORTYPE_TYPE_R,
     * Y_SENSORTYPE_TYPE_S, Y_SENSORTYPE_TYPE_T, Y_SENSORTYPE_PT100_4WIRES, Y_SENSORTYPE_PT100_3WIRES,
     * Y_SENSORTYPE_PT100_2WIRES, Y_SENSORTYPE_RES_OHM, Y_SENSORTYPE_RES_NTC, Y_SENSORTYPE_RES_LINEAR and
     * Y_SENSORTYPE_RES_INTERNAL corresponding to the temperature sensor type
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_sensorType($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("sensorType",$rest_val);
    }

    /**
     * Returns the current value of the electrical signal measured by the sensor.
     *
     * @return double : a floating point number corresponding to the current value of the electrical
     * signal measured by the sensor
     *
     * On failure, throws an exception or returns Y_SIGNALVALUE_INVALID.
     */
    public function get_signalValue()
    {
        // $res                    is a double;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_SIGNALVALUE_INVALID;
            }
        }
        $res = round($this->_signalValue * 1000) / 1000;
        return $res;
    }

    /**
     * Returns the measuring unit of the electrical signal used by the sensor.
     *
     * @return string : a string corresponding to the measuring unit of the electrical signal used by the sensor
     *
     * On failure, throws an exception or returns Y_SIGNALUNIT_INVALID.
     */
    public function get_signalUnit()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_SIGNALUNIT_INVALID;
            }
        }
        $res = $this->_signalUnit;
        return $res;
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
     * Retrieves a temperature sensor for a given identifier.
     * The identifier can be specified using several formats:
     * <ul>
     * <li>FunctionLogicalName</li>
     * <li>ModuleSerialNumber.FunctionIdentifier</li>
     * <li>ModuleSerialNumber.FunctionLogicalName</li>
     * <li>ModuleLogicalName.FunctionIdentifier</li>
     * <li>ModuleLogicalName.FunctionLogicalName</li>
     * </ul>
     *
     * This function does not require that the temperature sensor is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method YTemperature.isOnline() to test if the temperature sensor is
     * indeed online at a given time. In case of ambiguity when looking for
     * a temperature sensor by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the matching device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string that uniquely characterizes the temperature sensor
     *
     * @return YTemperature : a YTemperature object allowing you to drive the temperature sensor.
     */
    public static function FindTemperature($func)
    {
        // $obj                    is a YTemperature;
        $obj = YFunction::_FindFromCache('Temperature', $func);
        if ($obj == null) {
            $obj = new YTemperature($func);
            YFunction::_AddToCache('Temperature', $func, $obj);
        }
        return $obj;
    }

    /**
     * Configures NTC thermistor parameters in order to properly compute the temperature from
     * the measured resistance. For increased precision, you can enter a complete mapping
     * table using set_thermistorResponseTable. This function can only be used with a
     * temperature sensor based on thermistors.
     *
     * @param double $res25 : thermistor resistance at 25 degrees Celsius
     * @param double $beta : Beta value
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_ntcParameters($res25,$beta)
    {
        // $t0                     is a float;
        // $t1                     is a float;
        // $res100                 is a float;
        $tempValues = Array();  // floatArr;
        $resValues = Array();   // floatArr;
        $t0 = 25.0+275.15;
        $t1 = 100.0+275.15;
        $res100 = $res25 * exp($beta*(1.0/$t1 - 1.0/$t0));
        while(sizeof($tempValues) > 0) { array_pop($tempValues); };
        while(sizeof($resValues) > 0) { array_pop($resValues); };
        $tempValues[] = 25.0;
        $resValues[] = $res25;
        $tempValues[] = 100.0;
        $resValues[] = $res100;
        return $this->set_thermistorResponseTable($tempValues, $resValues);
    }

    /**
     * Records a thermistor response table, in order to interpolate the temperature from
     * the measured resistance. This function can only be used with a temperature
     * sensor based on thermistors.
     *
     * @param double[] $tempValues : array of floating point numbers, corresponding to all
     *         temperatures (in degrees Celcius) for which the resistance of the
     *         thermistor is specified.
     * @param double[] $resValues : array of floating point numbers, corresponding to the resistance
     *         values (in Ohms) for each of the temperature included in the first
     *         argument, index by index.
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_thermistorResponseTable($tempValues,$resValues)
    {
        // $siz                    is a int;
        // $res                    is a int;
        // $idx                    is a int;
        // $found                  is a int;
        // $prev                   is a float;
        // $curr                   is a float;
        // $currTemp               is a float;
        // $idxres                 is a float;
        $siz = sizeof($tempValues);
        if (!($siz >= 2)) return $this->_throw( YAPI_INVALID_ARGUMENT, 'thermistor response table must have at least two points',YAPI_INVALID_ARGUMENT);
        if (!($siz == sizeof($resValues))) return $this->_throw( YAPI_INVALID_ARGUMENT, 'table sizes mismatch',YAPI_INVALID_ARGUMENT);

        $res = $this->set_command('Z');
        if (!($res==YAPI_SUCCESS)) return $this->_throw( YAPI_IO_ERROR, 'unable to reset thermistor parameters',YAPI_IO_ERROR);
        // add records in growing resistance value
        $found = 1;
        $prev = 0.0;
        while ($found > 0) {
            $found = 0;
            $curr = 99999999.0;
            $currTemp = -999999.0;
            $idx = 0;
            while ($idx < $siz) {
                $idxres = $resValues[$idx];
                if (($idxres > $prev) && ($idxres < $curr)) {
                    $curr = $idxres;
                    $currTemp = $tempValues[$idx];
                    $found = 1;
                }
                $idx = $idx + 1;
            }
            if ($found > 0) {
                $res = $this->set_command(sprintf('m%d:%d', round(1000*$curr), round(1000*$currTemp)));
                if (!($res==YAPI_SUCCESS)) return $this->_throw( YAPI_IO_ERROR, 'unable to reset thermistor parameters',YAPI_IO_ERROR);
                $prev = $curr;
            }
        }
        return YAPI_SUCCESS;
    }

    /**
     * Retrieves the thermistor response table previously configured using the
     * set_thermistorResponseTable function. This function can only be used with a
     * temperature sensor based on thermistors.
     *
     * @param double[] $tempValues : array of floating point numbers, that is filled by the function
     *         with all temperatures (in degrees Celcius) for which the resistance
     *         of the thermistor is specified.
     * @param double[] $resValues : array of floating point numbers, that is filled by the function
     *         with the value (in Ohms) for each of the temperature included in the
     *         first argument, index by index.
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function loadThermistorResponseTable(&$tempValues,&$resValues)
    {
        // $id                     is a str;
        // $bin_json               is a bin;
        $paramlist = Array();   // strArr;
        $templist = Array();    // floatArr;
        // $siz                    is a int;
        // $idx                    is a int;
        // $temp                   is a float;
        // $found                  is a int;
        // $prev                   is a float;
        // $curr                   is a float;
        // $currRes                is a float;
        while(sizeof($tempValues) > 0) { array_pop($tempValues); };
        while(sizeof($resValues) > 0) { array_pop($resValues); };

        $id = $this->get_functionId();
        $id = substr($id,  11, strlen($id) - 11);
        $bin_json = $this->_download(sprintf('extra.json?page=%s', $id));
        $paramlist = $this->_json_get_array($bin_json);
        // first convert all temperatures to float
        $siz = ((sizeof($paramlist)) >> (1));
        while(sizeof($templist) > 0) { array_pop($templist); };
        $idx = 0;
        while ($idx < $siz) {
            $temp = floatval($paramlist[2*$idx+1])/1000.0;
            $templist[] = $temp;
            $idx = $idx + 1;
        }
        // then add records in growing temperature value
        while(sizeof($tempValues) > 0) { array_pop($tempValues); };
        while(sizeof($resValues) > 0) { array_pop($resValues); };
        $found = 1;
        $prev = -999999.0;
        while ($found > 0) {
            $found = 0;
            $curr = 999999.0;
            $currRes = -999999.0;
            $idx = 0;
            while ($idx < $siz) {
                $temp = $templist[$idx];
                if (($temp > $prev) && ($temp < $curr)) {
                    $curr = $temp;
                    $currRes = floatval($paramlist[2*$idx])/1000.0;
                    $found = 1;
                }
                $idx = $idx + 1;
            }
            if ($found > 0) {
                $tempValues[] = $curr;
                $resValues[] = $currRes;
                $prev = $curr;
            }
        }
        return YAPI_SUCCESS;
    }

    public function setUnit($newval)
    { return $this->set_unit($newval); }

    public function sensorType()
    { return $this->get_sensorType(); }

    public function setSensorType($newval)
    { return $this->set_sensorType($newval); }

    public function signalValue()
    { return $this->get_signalValue(); }

    public function signalUnit()
    { return $this->get_signalUnit(); }

    public function command()
    { return $this->get_command(); }

    public function setCommand($newval)
    { return $this->set_command($newval); }

    /**
     * Continues the enumeration of temperature sensors started using yFirstTemperature().
     *
     * @return YTemperature : a pointer to a YTemperature object, corresponding to
     *         a temperature sensor currently online, or a null pointer
     *         if there are no more temperature sensors to enumerate.
     */
    public function nextTemperature()
    {   $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if($resolve->errorType != YAPI_SUCCESS) return null;
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if($next_hwid == null) return null;
        return self::FindTemperature($next_hwid);
    }

    /**
     * Starts the enumeration of temperature sensors currently accessible.
     * Use the method YTemperature.nextTemperature() to iterate on
     * next temperature sensors.
     *
     * @return YTemperature : a pointer to a YTemperature object, corresponding to
     *         the first temperature sensor currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstTemperature()
    {   $next_hwid = YAPI::getFirstHardwareId('Temperature');
        if($next_hwid == null) return null;
        return self::FindTemperature($next_hwid);
    }

    //--- (end of YTemperature implementation)

};

//--- (YTemperature functions)

/**
 * Retrieves a temperature sensor for a given identifier.
 * The identifier can be specified using several formats:
 * <ul>
 * <li>FunctionLogicalName</li>
 * <li>ModuleSerialNumber.FunctionIdentifier</li>
 * <li>ModuleSerialNumber.FunctionLogicalName</li>
 * <li>ModuleLogicalName.FunctionIdentifier</li>
 * <li>ModuleLogicalName.FunctionLogicalName</li>
 * </ul>
 *
 * This function does not require that the temperature sensor is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method YTemperature.isOnline() to test if the temperature sensor is
 * indeed online at a given time. In case of ambiguity when looking for
 * a temperature sensor by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the matching device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string that uniquely characterizes the temperature sensor
 *
 * @return YTemperature : a YTemperature object allowing you to drive the temperature sensor.
 */
function yFindTemperature($func)
{
    return YTemperature::FindTemperature($func);
}

/**
 * Starts the enumeration of temperature sensors currently accessible.
 * Use the method YTemperature.nextTemperature() to iterate on
 * next temperature sensors.
 *
 * @return YTemperature : a pointer to a YTemperature object, corresponding to
 *         the first temperature sensor currently online, or a null pointer
 *         if there are none.
 */
function yFirstTemperature()
{
    return YTemperature::FirstTemperature();
}

//--- (end of YTemperature functions)
?>