<?php
/*********************************************************************
 *
 * $Id: pic24config.php 30633 2018-04-16 12:50:21Z seb $
 *
 * Implements YAnButton, the high-level API for AnButton functions
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

//--- (YAnButton return codes)
//--- (end of YAnButton return codes)
//--- (YAnButton definitions)
if(!defined('Y_ANALOGCALIBRATION_OFF'))      define('Y_ANALOGCALIBRATION_OFF',     0);
if(!defined('Y_ANALOGCALIBRATION_ON'))       define('Y_ANALOGCALIBRATION_ON',      1);
if(!defined('Y_ANALOGCALIBRATION_INVALID'))  define('Y_ANALOGCALIBRATION_INVALID', -1);
if(!defined('Y_ISPRESSED_FALSE'))            define('Y_ISPRESSED_FALSE',           0);
if(!defined('Y_ISPRESSED_TRUE'))             define('Y_ISPRESSED_TRUE',            1);
if(!defined('Y_ISPRESSED_INVALID'))          define('Y_ISPRESSED_INVALID',         -1);
if(!defined('Y_CALIBRATEDVALUE_INVALID'))    define('Y_CALIBRATEDVALUE_INVALID',   YAPI_INVALID_UINT);
if(!defined('Y_RAWVALUE_INVALID'))           define('Y_RAWVALUE_INVALID',          YAPI_INVALID_UINT);
if(!defined('Y_CALIBRATIONMAX_INVALID'))     define('Y_CALIBRATIONMAX_INVALID',    YAPI_INVALID_UINT);
if(!defined('Y_CALIBRATIONMIN_INVALID'))     define('Y_CALIBRATIONMIN_INVALID',    YAPI_INVALID_UINT);
if(!defined('Y_SENSITIVITY_INVALID'))        define('Y_SENSITIVITY_INVALID',       YAPI_INVALID_UINT);
if(!defined('Y_LASTTIMEPRESSED_INVALID'))    define('Y_LASTTIMEPRESSED_INVALID',   YAPI_INVALID_LONG);
if(!defined('Y_LASTTIMERELEASED_INVALID'))   define('Y_LASTTIMERELEASED_INVALID',  YAPI_INVALID_LONG);
if(!defined('Y_PULSECOUNTER_INVALID'))       define('Y_PULSECOUNTER_INVALID',      YAPI_INVALID_LONG);
if(!defined('Y_PULSETIMER_INVALID'))         define('Y_PULSETIMER_INVALID',        YAPI_INVALID_LONG);
//--- (end of YAnButton definitions)

//--- (YAnButton declaration)
/**
 * YAnButton Class: AnButton function interface
 *
 * Yoctopuce application programming interface allows you to measure the state
 * of a simple button as well as to read an analog potentiometer (variable resistance).
 * This can be use for instance with a continuous rotating knob, a throttle grip
 * or a joystick. The module is capable to calibrate itself on min and max values,
 * in order to compute a calibrated value that varies proportionally with the
 * potentiometer position, regardless of its total resistance.
 */
class YAnButton extends YFunction
{
    const CALIBRATEDVALUE_INVALID        = YAPI_INVALID_UINT;
    const RAWVALUE_INVALID               = YAPI_INVALID_UINT;
    const ANALOGCALIBRATION_OFF          = 0;
    const ANALOGCALIBRATION_ON           = 1;
    const ANALOGCALIBRATION_INVALID      = -1;
    const CALIBRATIONMAX_INVALID         = YAPI_INVALID_UINT;
    const CALIBRATIONMIN_INVALID         = YAPI_INVALID_UINT;
    const SENSITIVITY_INVALID            = YAPI_INVALID_UINT;
    const ISPRESSED_FALSE                = 0;
    const ISPRESSED_TRUE                 = 1;
    const ISPRESSED_INVALID              = -1;
    const LASTTIMEPRESSED_INVALID        = YAPI_INVALID_LONG;
    const LASTTIMERELEASED_INVALID       = YAPI_INVALID_LONG;
    const PULSECOUNTER_INVALID           = YAPI_INVALID_LONG;
    const PULSETIMER_INVALID             = YAPI_INVALID_LONG;
    //--- (end of YAnButton declaration)

    //--- (YAnButton attributes)
    protected $_calibratedValue          = Y_CALIBRATEDVALUE_INVALID;    // UInt31
    protected $_rawValue                 = Y_RAWVALUE_INVALID;           // UInt31
    protected $_analogCalibration        = Y_ANALOGCALIBRATION_INVALID;  // OnOff
    protected $_calibrationMax           = Y_CALIBRATIONMAX_INVALID;     // UInt31
    protected $_calibrationMin           = Y_CALIBRATIONMIN_INVALID;     // UInt31
    protected $_sensitivity              = Y_SENSITIVITY_INVALID;        // UInt31
    protected $_isPressed                = Y_ISPRESSED_INVALID;          // Bool
    protected $_lastTimePressed          = Y_LASTTIMEPRESSED_INVALID;    // Time
    protected $_lastTimeReleased         = Y_LASTTIMERELEASED_INVALID;   // Time
    protected $_pulseCounter             = Y_PULSECOUNTER_INVALID;       // UInt
    protected $_pulseTimer               = Y_PULSETIMER_INVALID;         // Time
    //--- (end of YAnButton attributes)

    function __construct($str_func)
    {
        //--- (YAnButton constructor)
        parent::__construct($str_func);
        $this->_className = 'AnButton';

        //--- (end of YAnButton constructor)
    }

    //--- (YAnButton implementation)

    function _parseAttr($name, $val)
    {
        switch($name) {
        case 'calibratedValue':
            $this->_calibratedValue = intval($val);
            return 1;
        case 'rawValue':
            $this->_rawValue = intval($val);
            return 1;
        case 'analogCalibration':
            $this->_analogCalibration = intval($val);
            return 1;
        case 'calibrationMax':
            $this->_calibrationMax = intval($val);
            return 1;
        case 'calibrationMin':
            $this->_calibrationMin = intval($val);
            return 1;
        case 'sensitivity':
            $this->_sensitivity = intval($val);
            return 1;
        case 'isPressed':
            $this->_isPressed = intval($val);
            return 1;
        case 'lastTimePressed':
            $this->_lastTimePressed = intval($val);
            return 1;
        case 'lastTimeReleased':
            $this->_lastTimeReleased = intval($val);
            return 1;
        case 'pulseCounter':
            $this->_pulseCounter = intval($val);
            return 1;
        case 'pulseTimer':
            $this->_pulseTimer = intval($val);
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns the current calibrated input value (between 0 and 1000, included).
     *
     * @return integer : an integer corresponding to the current calibrated input value (between 0 and 1000, included)
     *
     * On failure, throws an exception or returns Y_CALIBRATEDVALUE_INVALID.
     */
    public function get_calibratedValue()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALIBRATEDVALUE_INVALID;
            }
        }
        $res = $this->_calibratedValue;
        return $res;
    }

    /**
     * Returns the current measured input value as-is (between 0 and 4095, included).
     *
     * @return integer : an integer corresponding to the current measured input value as-is (between 0 and
     * 4095, included)
     *
     * On failure, throws an exception or returns Y_RAWVALUE_INVALID.
     */
    public function get_rawValue()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_RAWVALUE_INVALID;
            }
        }
        $res = $this->_rawValue;
        return $res;
    }

    /**
     * Tells if a calibration process is currently ongoing.
     *
     * @return integer : either Y_ANALOGCALIBRATION_OFF or Y_ANALOGCALIBRATION_ON
     *
     * On failure, throws an exception or returns Y_ANALOGCALIBRATION_INVALID.
     */
    public function get_analogCalibration()
    {
        // $res                    is a enumONOFF;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_ANALOGCALIBRATION_INVALID;
            }
        }
        $res = $this->_analogCalibration;
        return $res;
    }

    /**
     * Starts or stops the calibration process. Remember to call the saveToFlash()
     * method of the module at the end of the calibration if the modification must be kept.
     *
     * @param integer $newval : either Y_ANALOGCALIBRATION_OFF or Y_ANALOGCALIBRATION_ON
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_analogCalibration($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("analogCalibration",$rest_val);
    }

    /**
     * Returns the maximal value measured during the calibration (between 0 and 4095, included).
     *
     * @return integer : an integer corresponding to the maximal value measured during the calibration
     * (between 0 and 4095, included)
     *
     * On failure, throws an exception or returns Y_CALIBRATIONMAX_INVALID.
     */
    public function get_calibrationMax()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALIBRATIONMAX_INVALID;
            }
        }
        $res = $this->_calibrationMax;
        return $res;
    }

    /**
     * Changes the maximal calibration value for the input (between 0 and 4095, included), without actually
     * starting the automated calibration.  Remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param integer $newval : an integer corresponding to the maximal calibration value for the input
     * (between 0 and 4095, included), without actually
     *         starting the automated calibration
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_calibrationMax($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("calibrationMax",$rest_val);
    }

    /**
     * Returns the minimal value measured during the calibration (between 0 and 4095, included).
     *
     * @return integer : an integer corresponding to the minimal value measured during the calibration
     * (between 0 and 4095, included)
     *
     * On failure, throws an exception or returns Y_CALIBRATIONMIN_INVALID.
     */
    public function get_calibrationMin()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALIBRATIONMIN_INVALID;
            }
        }
        $res = $this->_calibrationMin;
        return $res;
    }

    /**
     * Changes the minimal calibration value for the input (between 0 and 4095, included), without actually
     * starting the automated calibration.  Remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param integer $newval : an integer corresponding to the minimal calibration value for the input
     * (between 0 and 4095, included), without actually
     *         starting the automated calibration
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_calibrationMin($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("calibrationMin",$rest_val);
    }

    /**
     * Returns the sensibility for the input (between 1 and 1000) for triggering user callbacks.
     *
     * @return integer : an integer corresponding to the sensibility for the input (between 1 and 1000)
     * for triggering user callbacks
     *
     * On failure, throws an exception or returns Y_SENSITIVITY_INVALID.
     */
    public function get_sensitivity()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_SENSITIVITY_INVALID;
            }
        }
        $res = $this->_sensitivity;
        return $res;
    }

    /**
     * Changes the sensibility for the input (between 1 and 1000) for triggering user callbacks.
     * The sensibility is used to filter variations around a fixed value, but does not preclude the
     * transmission of events when the input value evolves constantly in the same direction.
     * Special case: when the value 1000 is used, the callback will only be thrown when the logical state
     * of the input switches from pressed to released and back.
     * Remember to call the saveToFlash() method of the module if the modification must be kept.
     *
     * @param integer $newval : an integer corresponding to the sensibility for the input (between 1 and
     * 1000) for triggering user callbacks
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_sensitivity($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("sensitivity",$rest_val);
    }

    /**
     * Returns true if the input (considered as binary) is active (closed contact), and false otherwise.
     *
     * @return integer : either Y_ISPRESSED_FALSE or Y_ISPRESSED_TRUE, according to true if the input
     * (considered as binary) is active (closed contact), and false otherwise
     *
     * On failure, throws an exception or returns Y_ISPRESSED_INVALID.
     */
    public function get_isPressed()
    {
        // $res                    is a enumBOOL;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_ISPRESSED_INVALID;
            }
        }
        $res = $this->_isPressed;
        return $res;
    }

    /**
     * Returns the number of elapsed milliseconds between the module power on and the last time
     * the input button was pressed (the input contact transitioned from open to closed).
     *
     * @return integer : an integer corresponding to the number of elapsed milliseconds between the module
     * power on and the last time
     *         the input button was pressed (the input contact transitioned from open to closed)
     *
     * On failure, throws an exception or returns Y_LASTTIMEPRESSED_INVALID.
     */
    public function get_lastTimePressed()
    {
        // $res                    is a long;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_LASTTIMEPRESSED_INVALID;
            }
        }
        $res = $this->_lastTimePressed;
        return $res;
    }

    /**
     * Returns the number of elapsed milliseconds between the module power on and the last time
     * the input button was released (the input contact transitioned from closed to open).
     *
     * @return integer : an integer corresponding to the number of elapsed milliseconds between the module
     * power on and the last time
     *         the input button was released (the input contact transitioned from closed to open)
     *
     * On failure, throws an exception or returns Y_LASTTIMERELEASED_INVALID.
     */
    public function get_lastTimeReleased()
    {
        // $res                    is a long;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_LASTTIMERELEASED_INVALID;
            }
        }
        $res = $this->_lastTimeReleased;
        return $res;
    }

    /**
     * Returns the pulse counter value. The value is a 32 bit integer. In case
     * of overflow (>=2^32), the counter will wrap. To reset the counter, just
     * call the resetCounter() method.
     *
     * @return integer : an integer corresponding to the pulse counter value
     *
     * On failure, throws an exception or returns Y_PULSECOUNTER_INVALID.
     */
    public function get_pulseCounter()
    {
        // $res                    is a long;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_PULSECOUNTER_INVALID;
            }
        }
        $res = $this->_pulseCounter;
        return $res;
    }

    public function set_pulseCounter($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("pulseCounter",$rest_val);
    }

    /**
     * Returns the timer of the pulses counter (ms).
     *
     * @return integer : an integer corresponding to the timer of the pulses counter (ms)
     *
     * On failure, throws an exception or returns Y_PULSETIMER_INVALID.
     */
    public function get_pulseTimer()
    {
        // $res                    is a long;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_PULSETIMER_INVALID;
            }
        }
        $res = $this->_pulseTimer;
        return $res;
    }

    /**
     * Retrieves an analog input for a given identifier.
     * The identifier can be specified using several formats:
     * <ul>
     * <li>FunctionLogicalName</li>
     * <li>ModuleSerialNumber.FunctionIdentifier</li>
     * <li>ModuleSerialNumber.FunctionLogicalName</li>
     * <li>ModuleLogicalName.FunctionIdentifier</li>
     * <li>ModuleLogicalName.FunctionLogicalName</li>
     * </ul>
     *
     * This function does not require that the analog input is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method YAnButton.isOnline() to test if the analog input is
     * indeed online at a given time. In case of ambiguity when looking for
     * an analog input by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the matching device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string that uniquely characterizes the analog input
     *
     * @return YAnButton : a YAnButton object allowing you to drive the analog input.
     */
    public static function FindAnButton($func)
    {
        // $obj                    is a YAnButton;
        $obj = YFunction::_FindFromCache('AnButton', $func);
        if ($obj == null) {
            $obj = new YAnButton($func);
            YFunction::_AddToCache('AnButton', $func, $obj);
        }
        return $obj;
    }

    /**
     * Returns the pulse counter value as well as its timer.
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function resetCounter()
    {
        return $this->set_pulseCounter(0);
    }

    public function calibratedValue()
    { return $this->get_calibratedValue(); }

    public function rawValue()
    { return $this->get_rawValue(); }

    public function analogCalibration()
    { return $this->get_analogCalibration(); }

    public function setAnalogCalibration($newval)
    { return $this->set_analogCalibration($newval); }

    public function calibrationMax()
    { return $this->get_calibrationMax(); }

    public function setCalibrationMax($newval)
    { return $this->set_calibrationMax($newval); }

    public function calibrationMin()
    { return $this->get_calibrationMin(); }

    public function setCalibrationMin($newval)
    { return $this->set_calibrationMin($newval); }

    public function sensitivity()
    { return $this->get_sensitivity(); }

    public function setSensitivity($newval)
    { return $this->set_sensitivity($newval); }

    public function isPressed()
    { return $this->get_isPressed(); }

    public function lastTimePressed()
    { return $this->get_lastTimePressed(); }

    public function lastTimeReleased()
    { return $this->get_lastTimeReleased(); }

    public function pulseCounter()
    { return $this->get_pulseCounter(); }

    public function setPulseCounter($newval)
    { return $this->set_pulseCounter($newval); }

    public function pulseTimer()
    { return $this->get_pulseTimer(); }

    /**
     * Continues the enumeration of analog inputs started using yFirstAnButton().
     *
     * @return YAnButton : a pointer to a YAnButton object, corresponding to
     *         an analog input currently online, or a null pointer
     *         if there are no more analog inputs to enumerate.
     */
    public function nextAnButton()
    {   $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if($resolve->errorType != YAPI_SUCCESS) return null;
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if($next_hwid == null) return null;
        return self::FindAnButton($next_hwid);
    }

    /**
     * Starts the enumeration of analog inputs currently accessible.
     * Use the method YAnButton.nextAnButton() to iterate on
     * next analog inputs.
     *
     * @return YAnButton : a pointer to a YAnButton object, corresponding to
     *         the first analog input currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstAnButton()
    {   $next_hwid = YAPI::getFirstHardwareId('AnButton');
        if($next_hwid == null) return null;
        return self::FindAnButton($next_hwid);
    }

    //--- (end of YAnButton implementation)

};

//--- (YAnButton functions)

/**
 * Retrieves an analog input for a given identifier.
 * The identifier can be specified using several formats:
 * <ul>
 * <li>FunctionLogicalName</li>
 * <li>ModuleSerialNumber.FunctionIdentifier</li>
 * <li>ModuleSerialNumber.FunctionLogicalName</li>
 * <li>ModuleLogicalName.FunctionIdentifier</li>
 * <li>ModuleLogicalName.FunctionLogicalName</li>
 * </ul>
 *
 * This function does not require that the analog input is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method YAnButton.isOnline() to test if the analog input is
 * indeed online at a given time. In case of ambiguity when looking for
 * an analog input by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the matching device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string that uniquely characterizes the analog input
 *
 * @return YAnButton : a YAnButton object allowing you to drive the analog input.
 */
function yFindAnButton($func)
{
    return YAnButton::FindAnButton($func);
}

/**
 * Starts the enumeration of analog inputs currently accessible.
 * Use the method YAnButton.nextAnButton() to iterate on
 * next analog inputs.
 *
 * @return YAnButton : a pointer to a YAnButton object, corresponding to
 *         the first analog input currently online, or a null pointer
 *         if there are none.
 */
function yFirstAnButton()
{
    return YAnButton::FirstAnButton();
}

//--- (end of YAnButton functions)
?>