<?php
/*********************************************************************
 *
 * $Id: yocto_cellular.php 28743 2017-10-03 08:13:15Z seb $
 *
 * Implements YCellular, the high-level API for Cellular functions
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

//--- (generated code: YCellRecord return codes)
//--- (end of generated code: YCellRecord return codes)
//--- (generated code: YCellRecord definitions)
//--- (end of generated code: YCellRecord definitions)

//--- (generated code: YCellRecord declaration)
/**
 * YCellRecord Class: Description of a cellular antenna
 *
 *
 */
class YCellRecord
{
    //--- (end of generated code: YCellRecord declaration)

    //--- (generated code: YCellRecord attributes)
    protected $_oper                     = "";                           // str
    protected $_mcc                      = 0;                            // int
    protected $_mnc                      = 0;                            // int
    protected $_lac                      = 0;                            // int
    protected $_cid                      = 0;                            // int
    protected $_dbm                      = 0;                            // int
    protected $_tad                      = 0;                            // int
    //--- (end of generated code: YCellRecord attributes)

    function __construct($int_mcc, $int_mnc, $int_lac, $int_cellId, $int_dbm, $int_tad, $str_oper)
    {
        //--- (generated code: YCellRecord constructor)
        //--- (end of generated code: YCellRecord constructor)
        $this->_oper = $str_oper;
        $this->_mcc = $int_mcc;
        $this->_mnc = $int_mnc;
        $this->_lac = $int_lac;
        $this->_cid = $int_cellId;
        $this->_dbm = $int_dbm;
        $this->_tad = $int_tad;
    }

    //--- (generated code: YCellRecord implementation)

    public function get_cellOperator()
    {
        return $this->_oper;
    }

    public function get_mobileCountryCode()
    {
        return $this->_mcc;
    }

    public function get_mobileNetworkCode()
    {
        return $this->_mnc;
    }

    public function get_locationAreaCode()
    {
        return $this->_lac;
    }

    public function get_cellId()
    {
        return $this->_cid;
    }

    public function get_signalStrength()
    {
        return $this->_dbm;
    }

    public function get_timingAdvance()
    {
        return $this->_tad;
    }

    //--- (end of generated code: YCellRecord implementation)

};

//--- (generated code: YCellRecord functions)

//--- (end of generated code: YCellRecord functions)

//--- (generated code: YCellular return codes)
//--- (end of generated code: YCellular return codes)
//--- (generated code: YCellular definitions)
if(!defined('Y_CELLTYPE_GPRS'))              define('Y_CELLTYPE_GPRS',             0);
if(!defined('Y_CELLTYPE_EGPRS'))             define('Y_CELLTYPE_EGPRS',            1);
if(!defined('Y_CELLTYPE_WCDMA'))             define('Y_CELLTYPE_WCDMA',            2);
if(!defined('Y_CELLTYPE_HSDPA'))             define('Y_CELLTYPE_HSDPA',            3);
if(!defined('Y_CELLTYPE_NONE'))              define('Y_CELLTYPE_NONE',             4);
if(!defined('Y_CELLTYPE_CDMA'))              define('Y_CELLTYPE_CDMA',             5);
if(!defined('Y_CELLTYPE_INVALID'))           define('Y_CELLTYPE_INVALID',          -1);
if(!defined('Y_AIRPLANEMODE_OFF'))           define('Y_AIRPLANEMODE_OFF',          0);
if(!defined('Y_AIRPLANEMODE_ON'))            define('Y_AIRPLANEMODE_ON',           1);
if(!defined('Y_AIRPLANEMODE_INVALID'))       define('Y_AIRPLANEMODE_INVALID',      -1);
if(!defined('Y_ENABLEDATA_HOMENETWORK'))     define('Y_ENABLEDATA_HOMENETWORK',    0);
if(!defined('Y_ENABLEDATA_ROAMING'))         define('Y_ENABLEDATA_ROAMING',        1);
if(!defined('Y_ENABLEDATA_NEVER'))           define('Y_ENABLEDATA_NEVER',          2);
if(!defined('Y_ENABLEDATA_NEUTRALITY'))      define('Y_ENABLEDATA_NEUTRALITY',     3);
if(!defined('Y_ENABLEDATA_INVALID'))         define('Y_ENABLEDATA_INVALID',        -1);
if(!defined('Y_LINKQUALITY_INVALID'))        define('Y_LINKQUALITY_INVALID',       YAPI_INVALID_UINT);
if(!defined('Y_CELLOPERATOR_INVALID'))       define('Y_CELLOPERATOR_INVALID',      YAPI_INVALID_STRING);
if(!defined('Y_CELLIDENTIFIER_INVALID'))     define('Y_CELLIDENTIFIER_INVALID',    YAPI_INVALID_STRING);
if(!defined('Y_IMSI_INVALID'))               define('Y_IMSI_INVALID',              YAPI_INVALID_STRING);
if(!defined('Y_MESSAGE_INVALID'))            define('Y_MESSAGE_INVALID',           YAPI_INVALID_STRING);
if(!defined('Y_PIN_INVALID'))                define('Y_PIN_INVALID',               YAPI_INVALID_STRING);
if(!defined('Y_LOCKEDOPERATOR_INVALID'))     define('Y_LOCKEDOPERATOR_INVALID',    YAPI_INVALID_STRING);
if(!defined('Y_APN_INVALID'))                define('Y_APN_INVALID',               YAPI_INVALID_STRING);
if(!defined('Y_APNSECRET_INVALID'))          define('Y_APNSECRET_INVALID',         YAPI_INVALID_STRING);
if(!defined('Y_PINGINTERVAL_INVALID'))       define('Y_PINGINTERVAL_INVALID',      YAPI_INVALID_UINT);
if(!defined('Y_DATASENT_INVALID'))           define('Y_DATASENT_INVALID',          YAPI_INVALID_UINT);
if(!defined('Y_DATARECEIVED_INVALID'))       define('Y_DATARECEIVED_INVALID',      YAPI_INVALID_UINT);
if(!defined('Y_COMMAND_INVALID'))            define('Y_COMMAND_INVALID',           YAPI_INVALID_STRING);
//--- (end of generated code: YCellular definitions)

//--- (generated code: YCellular declaration)
/**
 * YCellular Class: Cellular function interface
 *
 * YCellular functions provides control over cellular network parameters
 * and status for devices that are GSM-enabled.
 */
class YCellular extends YFunction
{
    const LINKQUALITY_INVALID            = YAPI_INVALID_UINT;
    const CELLOPERATOR_INVALID           = YAPI_INVALID_STRING;
    const CELLIDENTIFIER_INVALID         = YAPI_INVALID_STRING;
    const CELLTYPE_GPRS                  = 0;
    const CELLTYPE_EGPRS                 = 1;
    const CELLTYPE_WCDMA                 = 2;
    const CELLTYPE_HSDPA                 = 3;
    const CELLTYPE_NONE                  = 4;
    const CELLTYPE_CDMA                  = 5;
    const CELLTYPE_INVALID               = -1;
    const IMSI_INVALID                   = YAPI_INVALID_STRING;
    const MESSAGE_INVALID                = YAPI_INVALID_STRING;
    const PIN_INVALID                    = YAPI_INVALID_STRING;
    const LOCKEDOPERATOR_INVALID         = YAPI_INVALID_STRING;
    const AIRPLANEMODE_OFF               = 0;
    const AIRPLANEMODE_ON                = 1;
    const AIRPLANEMODE_INVALID           = -1;
    const ENABLEDATA_HOMENETWORK         = 0;
    const ENABLEDATA_ROAMING             = 1;
    const ENABLEDATA_NEVER               = 2;
    const ENABLEDATA_NEUTRALITY          = 3;
    const ENABLEDATA_INVALID             = -1;
    const APN_INVALID                    = YAPI_INVALID_STRING;
    const APNSECRET_INVALID              = YAPI_INVALID_STRING;
    const PINGINTERVAL_INVALID           = YAPI_INVALID_UINT;
    const DATASENT_INVALID               = YAPI_INVALID_UINT;
    const DATARECEIVED_INVALID           = YAPI_INVALID_UINT;
    const COMMAND_INVALID                = YAPI_INVALID_STRING;
    //--- (end of generated code: YCellular declaration)

    //--- (generated code: YCellular attributes)
    protected $_linkQuality              = Y_LINKQUALITY_INVALID;        // Percent
    protected $_cellOperator             = Y_CELLOPERATOR_INVALID;       // Text
    protected $_cellIdentifier           = Y_CELLIDENTIFIER_INVALID;     // Text
    protected $_cellType                 = Y_CELLTYPE_INVALID;           // CellType
    protected $_imsi                     = Y_IMSI_INVALID;               // IMSI
    protected $_message                  = Y_MESSAGE_INVALID;            // YFSText
    protected $_pin                      = Y_PIN_INVALID;                // PinPassword
    protected $_lockedOperator           = Y_LOCKEDOPERATOR_INVALID;     // Text
    protected $_airplaneMode             = Y_AIRPLANEMODE_INVALID;       // OnOff
    protected $_enableData               = Y_ENABLEDATA_INVALID;         // ServiceScope
    protected $_apn                      = Y_APN_INVALID;                // Text
    protected $_apnSecret                = Y_APNSECRET_INVALID;          // APNPassword
    protected $_pingInterval             = Y_PINGINTERVAL_INVALID;       // UInt31
    protected $_dataSent                 = Y_DATASENT_INVALID;           // UInt31
    protected $_dataReceived             = Y_DATARECEIVED_INVALID;       // UInt31
    protected $_command                  = Y_COMMAND_INVALID;            // Text
    //--- (end of generated code: YCellular attributes)

    function __construct($str_func)
    {
        //--- (generated code: YCellular constructor)
        parent::__construct($str_func);
        $this->_className = 'Cellular';

        //--- (end of generated code: YCellular constructor)
    }

    //--- (generated code: YCellular implementation)

    function _parseAttr($name, $val)
    {
        switch($name) {
        case 'linkQuality':
            $this->_linkQuality = intval($val);
            return 1;
        case 'cellOperator':
            $this->_cellOperator = $val;
            return 1;
        case 'cellIdentifier':
            $this->_cellIdentifier = $val;
            return 1;
        case 'cellType':
            $this->_cellType = intval($val);
            return 1;
        case 'imsi':
            $this->_imsi = $val;
            return 1;
        case 'message':
            $this->_message = $val;
            return 1;
        case 'pin':
            $this->_pin = $val;
            return 1;
        case 'lockedOperator':
            $this->_lockedOperator = $val;
            return 1;
        case 'airplaneMode':
            $this->_airplaneMode = intval($val);
            return 1;
        case 'enableData':
            $this->_enableData = intval($val);
            return 1;
        case 'apn':
            $this->_apn = $val;
            return 1;
        case 'apnSecret':
            $this->_apnSecret = $val;
            return 1;
        case 'pingInterval':
            $this->_pingInterval = intval($val);
            return 1;
        case 'dataSent':
            $this->_dataSent = intval($val);
            return 1;
        case 'dataReceived':
            $this->_dataReceived = intval($val);
            return 1;
        case 'command':
            $this->_command = $val;
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns the link quality, expressed in percent.
     *
     * @return integer : an integer corresponding to the link quality, expressed in percent
     *
     * On failure, throws an exception or returns Y_LINKQUALITY_INVALID.
     */
    public function get_linkQuality()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_LINKQUALITY_INVALID;
            }
        }
        $res = $this->_linkQuality;
        return $res;
    }

    /**
     * Returns the name of the cell operator currently in use.
     *
     * @return string : a string corresponding to the name of the cell operator currently in use
     *
     * On failure, throws an exception or returns Y_CELLOPERATOR_INVALID.
     */
    public function get_cellOperator()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CELLOPERATOR_INVALID;
            }
        }
        $res = $this->_cellOperator;
        return $res;
    }

    /**
     * Returns the unique identifier of the cellular antenna in use: MCC, MNC, LAC and Cell ID.
     *
     * @return string : a string corresponding to the unique identifier of the cellular antenna in use:
     * MCC, MNC, LAC and Cell ID
     *
     * On failure, throws an exception or returns Y_CELLIDENTIFIER_INVALID.
     */
    public function get_cellIdentifier()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CELLIDENTIFIER_INVALID;
            }
        }
        $res = $this->_cellIdentifier;
        return $res;
    }

    /**
     * Active cellular connection type.
     *
     * @return integer : a value among Y_CELLTYPE_GPRS, Y_CELLTYPE_EGPRS, Y_CELLTYPE_WCDMA,
     * Y_CELLTYPE_HSDPA, Y_CELLTYPE_NONE and Y_CELLTYPE_CDMA
     *
     * On failure, throws an exception or returns Y_CELLTYPE_INVALID.
     */
    public function get_cellType()
    {
        // $res                    is a enumCELLTYPE;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CELLTYPE_INVALID;
            }
        }
        $res = $this->_cellType;
        return $res;
    }

    /**
     * Returns an opaque string if a PIN code has been configured in the device to access
     * the SIM card, or an empty string if none has been configured or if the code provided
     * was rejected by the SIM card.
     *
     * @return string : a string corresponding to an opaque string if a PIN code has been configured in
     * the device to access
     *         the SIM card, or an empty string if none has been configured or if the code provided
     *         was rejected by the SIM card
     *
     * On failure, throws an exception or returns Y_IMSI_INVALID.
     */
    public function get_imsi()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_IMSI_INVALID;
            }
        }
        $res = $this->_imsi;
        return $res;
    }

    /**
     * Returns the latest status message from the wireless interface.
     *
     * @return string : a string corresponding to the latest status message from the wireless interface
     *
     * On failure, throws an exception or returns Y_MESSAGE_INVALID.
     */
    public function get_message()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_MESSAGE_INVALID;
            }
        }
        $res = $this->_message;
        return $res;
    }

    /**
     * Returns an opaque string if a PIN code has been configured in the device to access
     * the SIM card, or an empty string if none has been configured or if the code provided
     * was rejected by the SIM card.
     *
     * @return string : a string corresponding to an opaque string if a PIN code has been configured in
     * the device to access
     *         the SIM card, or an empty string if none has been configured or if the code provided
     *         was rejected by the SIM card
     *
     * On failure, throws an exception or returns Y_PIN_INVALID.
     */
    public function get_pin()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_PIN_INVALID;
            }
        }
        $res = $this->_pin;
        return $res;
    }

    /**
     * Changes the PIN code used by the module to access the SIM card.
     * This function does not change the code on the SIM card itself, but only changes
     * the parameter used by the device to try to get access to it. If the SIM code
     * does not work immediately on first try, it will be automatically forgotten
     * and the message will be set to "Enter SIM PIN". The method should then be
     * invoked again with right correct PIN code. After three failed attempts in a row,
     * the message is changed to "Enter SIM PUK" and the SIM card PUK code must be
     * provided using method sendPUK.
     *
     * Remember to call the saveToFlash() method of the module to save the
     * new value in the device flash.
     *
     * @param string $newval : a string corresponding to the PIN code used by the module to access the SIM card
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_pin($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("pin",$rest_val);
    }

    /**
     * Returns the name of the only cell operator to use if automatic choice is disabled,
     * or an empty string if the SIM card will automatically choose among available
     * cell operators.
     *
     * @return string : a string corresponding to the name of the only cell operator to use if automatic
     * choice is disabled,
     *         or an empty string if the SIM card will automatically choose among available
     *         cell operators
     *
     * On failure, throws an exception or returns Y_LOCKEDOPERATOR_INVALID.
     */
    public function get_lockedOperator()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_LOCKEDOPERATOR_INVALID;
            }
        }
        $res = $this->_lockedOperator;
        return $res;
    }

    /**
     * Changes the name of the cell operator to be used. If the name is an empty
     * string, the choice will be made automatically based on the SIM card. Otherwise,
     * the selected operator is the only one that will be used.
     *
     * @param string $newval : a string corresponding to the name of the cell operator to be used
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_lockedOperator($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("lockedOperator",$rest_val);
    }

    /**
     * Returns true if the airplane mode is active (radio turned off).
     *
     * @return integer : either Y_AIRPLANEMODE_OFF or Y_AIRPLANEMODE_ON, according to true if the airplane
     * mode is active (radio turned off)
     *
     * On failure, throws an exception or returns Y_AIRPLANEMODE_INVALID.
     */
    public function get_airplaneMode()
    {
        // $res                    is a enumONOFF;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_AIRPLANEMODE_INVALID;
            }
        }
        $res = $this->_airplaneMode;
        return $res;
    }

    /**
     * Changes the activation state of airplane mode (radio turned off).
     *
     * @param integer $newval : either Y_AIRPLANEMODE_OFF or Y_AIRPLANEMODE_ON, according to the
     * activation state of airplane mode (radio turned off)
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_airplaneMode($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("airplaneMode",$rest_val);
    }

    /**
     * Returns the condition for enabling IP data services (GPRS).
     * When data services are disabled, SMS are the only mean of communication.
     *
     * @return integer : a value among Y_ENABLEDATA_HOMENETWORK, Y_ENABLEDATA_ROAMING, Y_ENABLEDATA_NEVER
     * and Y_ENABLEDATA_NEUTRALITY corresponding to the condition for enabling IP data services (GPRS)
     *
     * On failure, throws an exception or returns Y_ENABLEDATA_INVALID.
     */
    public function get_enableData()
    {
        // $res                    is a enumSERVICESCOPE;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_ENABLEDATA_INVALID;
            }
        }
        $res = $this->_enableData;
        return $res;
    }

    /**
     * Changes the condition for enabling IP data services (GPRS).
     * The service can be either fully deactivated, or limited to the SIM home network,
     * or enabled for all partner networks (roaming). Caution: enabling data services
     * on roaming networks may cause prohibitive communication costs !
     *
     * When data services are disabled, SMS are the only mean of communication.
     *
     * @param integer $newval : a value among Y_ENABLEDATA_HOMENETWORK, Y_ENABLEDATA_ROAMING,
     * Y_ENABLEDATA_NEVER and Y_ENABLEDATA_NEUTRALITY corresponding to the condition for enabling IP data
     * services (GPRS)
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_enableData($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("enableData",$rest_val);
    }

    /**
     * Returns the Access Point Name (APN) to be used, if needed.
     * When left blank, the APN suggested by the cell operator will be used.
     *
     * @return string : a string corresponding to the Access Point Name (APN) to be used, if needed
     *
     * On failure, throws an exception or returns Y_APN_INVALID.
     */
    public function get_apn()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_APN_INVALID;
            }
        }
        $res = $this->_apn;
        return $res;
    }

    /**
     * Returns the Access Point Name (APN) to be used, if needed.
     * When left blank, the APN suggested by the cell operator will be used.
     *
     * @param string $newval : a string
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_apn($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("apn",$rest_val);
    }

    /**
     * Returns an opaque string if APN authentication parameters have been configured
     * in the device, or an empty string otherwise.
     * To configure these parameters, use set_apnAuth().
     *
     * @return string : a string corresponding to an opaque string if APN authentication parameters have
     * been configured
     *         in the device, or an empty string otherwise
     *
     * On failure, throws an exception or returns Y_APNSECRET_INVALID.
     */
    public function get_apnSecret()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_APNSECRET_INVALID;
            }
        }
        $res = $this->_apnSecret;
        return $res;
    }

    public function set_apnSecret($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("apnSecret",$rest_val);
    }

    /**
     * Returns the automated connectivity check interval, in seconds.
     *
     * @return integer : an integer corresponding to the automated connectivity check interval, in seconds
     *
     * On failure, throws an exception or returns Y_PINGINTERVAL_INVALID.
     */
    public function get_pingInterval()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_PINGINTERVAL_INVALID;
            }
        }
        $res = $this->_pingInterval;
        return $res;
    }

    /**
     * Changes the automated connectivity check interval, in seconds.
     *
     * @param integer $newval : an integer corresponding to the automated connectivity check interval, in seconds
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_pingInterval($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("pingInterval",$rest_val);
    }

    /**
     * Returns the number of bytes sent so far.
     *
     * @return integer : an integer corresponding to the number of bytes sent so far
     *
     * On failure, throws an exception or returns Y_DATASENT_INVALID.
     */
    public function get_dataSent()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_DATASENT_INVALID;
            }
        }
        $res = $this->_dataSent;
        return $res;
    }

    /**
     * Changes the value of the outgoing data counter.
     *
     * @param integer $newval : an integer corresponding to the value of the outgoing data counter
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_dataSent($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("dataSent",$rest_val);
    }

    /**
     * Returns the number of bytes received so far.
     *
     * @return integer : an integer corresponding to the number of bytes received so far
     *
     * On failure, throws an exception or returns Y_DATARECEIVED_INVALID.
     */
    public function get_dataReceived()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_DATARECEIVED_INVALID;
            }
        }
        $res = $this->_dataReceived;
        return $res;
    }

    /**
     * Changes the value of the incoming data counter.
     *
     * @param integer $newval : an integer corresponding to the value of the incoming data counter
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_dataReceived($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("dataReceived",$rest_val);
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
     * Retrieves a cellular interface for a given identifier.
     * The identifier can be specified using several formats:
     * <ul>
     * <li>FunctionLogicalName</li>
     * <li>ModuleSerialNumber.FunctionIdentifier</li>
     * <li>ModuleSerialNumber.FunctionLogicalName</li>
     * <li>ModuleLogicalName.FunctionIdentifier</li>
     * <li>ModuleLogicalName.FunctionLogicalName</li>
     * </ul>
     *
     * This function does not require that the cellular interface is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method YCellular.isOnline() to test if the cellular interface is
     * indeed online at a given time. In case of ambiguity when looking for
     * a cellular interface by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the matching device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string that uniquely characterizes the cellular interface
     *
     * @return YCellular : a YCellular object allowing you to drive the cellular interface.
     */
    public static function FindCellular($func)
    {
        // $obj                    is a YCellular;
        $obj = YFunction::_FindFromCache('Cellular', $func);
        if ($obj == null) {
            $obj = new YCellular($func);
            YFunction::_AddToCache('Cellular', $func, $obj);
        }
        return $obj;
    }

    /**
     * Sends a PUK code to unlock the SIM card after three failed PIN code attempts, and
     * setup a new PIN into the SIM card. Only ten consecutives tentatives are permitted:
     * after that, the SIM card will be blocked permanently without any mean of recovery
     * to use it again. Note that after calling this method, you have usually to invoke
     * method set_pin() to tell the YoctoHub which PIN to use in the future.
     *
     * @param string $puk : the SIM PUK code
     * @param string $newPin : new PIN code to configure into the SIM card
     *
     * @return integer : YAPI_SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function sendPUK($puk,$newPin)
    {
        // $gsmMsg                 is a str;
        $gsmMsg = $this->get_message();
        if (!(substr($gsmMsg, 0, 13) == 'Enter SIM PUK')) return $this->_throw(YAPI_INVALID_ARGUMENT, 'PUK not expected at $this time',YAPI_INVALID_ARGUMENT);
        if ($newPin == '') {
            return $this->set_command(sprintf('AT+CPIN=%s,0000;+CLCK=SC,0,0000',$puk));
        }
        return $this->set_command(sprintf('AT+CPIN=%s,%s',$puk,$newPin));
    }

    /**
     * Configure authentication parameters to connect to the APN. Both
     * PAP and CHAP authentication are supported.
     *
     * @param string $username : APN username
     * @param string $password : APN password
     *
     * @return integer : YAPI_SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_apnAuth($username,$password)
    {
        return $this->set_apnSecret(sprintf('%s,%s',$username,$password));
    }

    /**
     * Clear the transmitted data counters.
     *
     * @return integer : YAPI_SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function clearDataCounters()
    {
        // $retcode                is a int;

        $retcode = $this->set_dataReceived(0);
        if ($retcode != YAPI_SUCCESS) {
            return $retcode;
        }
        $retcode = $this->set_dataSent(0);
        return $retcode;
    }

    /**
     * Sends an AT command to the GSM module and returns the command output.
     * The command will only execute when the GSM module is in standard
     * command state, and should leave it in the exact same state.
     * Use this function with great care !
     *
     * @param string $cmd : the AT command to execute, like for instance: "+CCLK?".
     *
     * @return string : a string with the result of the commands. Empty lines are
     *         automatically removed from the output.
     */
    public function _AT($cmd)
    {
        // $chrPos                 is a int;
        // $cmdLen                 is a int;
        // $waitMore               is a int;
        // $res                    is a str;
        // $buff                   is a bin;
        // $bufflen                is a int;
        // $buffstr                is a str;
        // $buffstrlen             is a int;
        // $idx                    is a int;
        // $suffixlen              is a int;
        // quote dangerous characters used in AT commands
        $cmdLen = strlen($cmd);
        $chrPos = Ystrpos($cmd,'#');
        while ($chrPos >= 0) {
            $cmd = sprintf('%s%c23%s', substr($cmd,  0, $chrPos), 37,
            substr($cmd,  $chrPos+1, $cmdLen-$chrPos-1));
            $cmdLen = $cmdLen + 2;
            $chrPos = Ystrpos($cmd,'#');
        }
        $chrPos = Ystrpos($cmd,'+');
        while ($chrPos >= 0) {
            $cmd = sprintf('%s%c2B%s', substr($cmd,  0, $chrPos), 37,
            substr($cmd,  $chrPos+1, $cmdLen-$chrPos-1));
            $cmdLen = $cmdLen + 2;
            $chrPos = Ystrpos($cmd,'+');
        }
        $chrPos = Ystrpos($cmd,'=');
        while ($chrPos >= 0) {
            $cmd = sprintf('%s%c3D%s', substr($cmd,  0, $chrPos), 37,
            substr($cmd,  $chrPos+1, $cmdLen-$chrPos-1));
            $cmdLen = $cmdLen + 2;
            $chrPos = Ystrpos($cmd,'=');
        }
        $cmd = sprintf('at.txt?cmd=%s',$cmd);
        $res = sprintf('');
        // max 2 minutes (each iteration may take up to 5 seconds if waiting)
        $waitMore = 24;
        while ($waitMore > 0) {
            $buff = $this->_download($cmd);
            $bufflen = strlen($buff);
            $buffstr = $buff;
            $buffstrlen = strlen($buffstr);
            $idx = $bufflen - 1;
            while (($idx > 0) && (ord($buff[$idx]) != 64) && (ord($buff[$idx]) != 10) && (ord($buff[$idx]) != 13)) {
                $idx = $idx - 1;
            }
            if (ord($buff[$idx]) == 64) {
                // continuation detected
                $suffixlen = $bufflen - $idx;
                $cmd = sprintf('at.txt?cmd=%s', substr($buffstr,  $buffstrlen - $suffixlen, $suffixlen));
                $buffstr = substr($buffstr,  0, $buffstrlen - $suffixlen);
                $waitMore = $waitMore - 1;
            } else {
                // request complete
                $waitMore = 0;
            }
            $res = sprintf('%s%s', $res, $buffstr);
        }
        return $res;
    }

    /**
     * Returns the list detected cell operators in the neighborhood.
     * This function will typically take between 30 seconds to 1 minute to
     * return. Note that any SIM card can usually only connect to specific
     * operators. All networks returned by this function might therefore
     * not be available for connection.
     *
     * @return string[] : a list of string (cell operator names).
     */
    public function get_availableOperators()
    {
        // $cops                   is a str;
        // $idx                    is a int;
        // $slen                   is a int;
        $res = Array();         // strArr;

        $cops = $this->_AT('+COPS=?');
        $slen = strlen($cops);
        while(sizeof($res) > 0) { array_pop($res); };
        $idx = Ystrpos($cops,'(');
        while ($idx >= 0) {
            $slen = $slen - ($idx+1);
            $cops = substr($cops,  $idx+1, $slen);
            $idx = Ystrpos($cops,'"');
            if ($idx > 0) {
                $slen = $slen - ($idx+1);
                $cops = substr($cops,  $idx+1, $slen);
                $idx = Ystrpos($cops,'"');
                if ($idx > 0) {
                    $res[] = substr($cops,  0, $idx);
                }
            }
            $idx = Ystrpos($cops,'(');
        }
        return $res;
    }

    /**
     * Returns a list of nearby cellular antennas, as required for quick
     * geolocation of the device. The first cell listed is the serving
     * cell, and the next ones are the neighboor cells reported by the
     * serving cell.
     *
     * @return YCellRecord[] : a list of YCellRecords.
     */
    public function quickCellSurvey()
    {
        // $moni                   is a str;
        $recs = Array();        // strArr;
        // $llen                   is a int;
        // $mccs                   is a str;
        // $mcc                    is a int;
        // $mncs                   is a str;
        // $mnc                    is a int;
        // $lac                    is a int;
        // $cellId                 is a int;
        // $dbms                   is a str;
        // $dbm                    is a int;
        // $tads                   is a str;
        // $tad                    is a int;
        // $oper                   is a str;
        $res = Array();         // YCellRecordArr;

        $moni = $this->_AT('+CCED=0;#MONI=7;#MONI');
        $mccs = substr($moni, 7, 3);
        if (substr($mccs, 0, 1) == '0') {
            $mccs = substr($mccs, 1, 2);
        }
        if (substr($mccs, 0, 1) == '0') {
            $mccs = substr($mccs, 1, 1);
        }
        $mcc = intVal($mccs);
        $mncs = substr($moni, 11, 3);
        if (substr($mncs, 2, 1) == ',') {
            $mncs = substr($mncs, 0, 2);
        }
        if (substr($mncs, 0, 1) == '0') {
            $mncs = substr($mncs, 1, strlen($mncs)-1);
        }
        $mnc = intVal($mncs);
        $recs = explode('#', $moni);
        // process each line in turn
        while(sizeof($res) > 0) { array_pop($res); };
        foreach($recs as $each) {
            $llen = strlen($each) - 2;
            if ($llen >= 44) {
                if (substr($each, 41, 3) == 'dbm') {
                    $lac = hexdec(substr($each, 16, 4));
                    $cellId = hexdec(substr($each, 23, 4));
                    $dbms = substr($each, 37, 4);
                    if (substr($dbms, 0, 1) == ' ') {
                        $dbms = substr($dbms, 1, 3);
                    }
                    $dbm = intVal($dbms);
                    if ($llen > 66) {
                        $tads = substr($each, 54, 2);
                        if (substr($tads, 0, 1) == ' ') {
                            $tads = substr($tads, 1, 3);
                        }
                        $tad = intVal($tads);
                        $oper = substr($each, 66, $llen-66);
                    } else {
                        $tad = -1;
                        $oper = '';
                    }
                    if ($lac < 65535) {
                        $res[] = new YCellRecord($mcc, $mnc, $lac, $cellId, $dbm, $tad, $oper);
                    }
                }
            }
        }
        return $res;
    }

    public function linkQuality()
    { return $this->get_linkQuality(); }

    public function cellOperator()
    { return $this->get_cellOperator(); }

    public function cellIdentifier()
    { return $this->get_cellIdentifier(); }

    public function cellType()
    { return $this->get_cellType(); }

    public function imsi()
    { return $this->get_imsi(); }

    public function message()
    { return $this->get_message(); }

    public function pin()
    { return $this->get_pin(); }

    public function setPin($newval)
    { return $this->set_pin($newval); }

    public function lockedOperator()
    { return $this->get_lockedOperator(); }

    public function setLockedOperator($newval)
    { return $this->set_lockedOperator($newval); }

    public function airplaneMode()
    { return $this->get_airplaneMode(); }

    public function setAirplaneMode($newval)
    { return $this->set_airplaneMode($newval); }

    public function enableData()
    { return $this->get_enableData(); }

    public function setEnableData($newval)
    { return $this->set_enableData($newval); }

    public function apn()
    { return $this->get_apn(); }

    public function setApn($newval)
    { return $this->set_apn($newval); }

    public function apnSecret()
    { return $this->get_apnSecret(); }

    public function setApnSecret($newval)
    { return $this->set_apnSecret($newval); }

    public function pingInterval()
    { return $this->get_pingInterval(); }

    public function setPingInterval($newval)
    { return $this->set_pingInterval($newval); }

    public function dataSent()
    { return $this->get_dataSent(); }

    public function setDataSent($newval)
    { return $this->set_dataSent($newval); }

    public function dataReceived()
    { return $this->get_dataReceived(); }

    public function setDataReceived($newval)
    { return $this->set_dataReceived($newval); }

    public function command()
    { return $this->get_command(); }

    public function setCommand($newval)
    { return $this->set_command($newval); }

    /**
     * Continues the enumeration of cellular interfaces started using yFirstCellular().
     *
     * @return YCellular : a pointer to a YCellular object, corresponding to
     *         a cellular interface currently online, or a null pointer
     *         if there are no more cellular interfaces to enumerate.
     */
    public function nextCellular()
    {   $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if($resolve->errorType != YAPI_SUCCESS) return null;
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if($next_hwid == null) return null;
        return self::FindCellular($next_hwid);
    }

    /**
     * Starts the enumeration of cellular interfaces currently accessible.
     * Use the method YCellular.nextCellular() to iterate on
     * next cellular interfaces.
     *
     * @return YCellular : a pointer to a YCellular object, corresponding to
     *         the first cellular interface currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstCellular()
    {   $next_hwid = YAPI::getFirstHardwareId('Cellular');
        if($next_hwid == null) return null;
        return self::FindCellular($next_hwid);
    }

    //--- (end of generated code: YCellular implementation)

};

//--- (generated code: YCellular functions)

/**
 * Retrieves a cellular interface for a given identifier.
 * The identifier can be specified using several formats:
 * <ul>
 * <li>FunctionLogicalName</li>
 * <li>ModuleSerialNumber.FunctionIdentifier</li>
 * <li>ModuleSerialNumber.FunctionLogicalName</li>
 * <li>ModuleLogicalName.FunctionIdentifier</li>
 * <li>ModuleLogicalName.FunctionLogicalName</li>
 * </ul>
 *
 * This function does not require that the cellular interface is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method YCellular.isOnline() to test if the cellular interface is
 * indeed online at a given time. In case of ambiguity when looking for
 * a cellular interface by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the matching device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string that uniquely characterizes the cellular interface
 *
 * @return YCellular : a YCellular object allowing you to drive the cellular interface.
 */
function yFindCellular($func)
{
    return YCellular::FindCellular($func);
}

/**
 * Starts the enumeration of cellular interfaces currently accessible.
 * Use the method YCellular.nextCellular() to iterate on
 * next cellular interfaces.
 *
 * @return YCellular : a pointer to a YCellular object, corresponding to
 *         the first cellular interface currently online, or a null pointer
 *         if there are none.
 */
function yFirstCellular()
{
    return YCellular::FirstCellular();
}

//--- (end of generated code: YCellular functions)
?>