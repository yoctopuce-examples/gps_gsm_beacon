<?php
/*********************************************************************
 *
 * $Id: pic24config.php 30633 2018-04-16 12:50:21Z seb $
 *
 * Implements YNetwork, the high-level API for Network functions
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

//--- (YNetwork return codes)
//--- (end of YNetwork return codes)
//--- (YNetwork definitions)
if(!defined('Y_READINESS_DOWN'))             define('Y_READINESS_DOWN',            0);
if(!defined('Y_READINESS_EXISTS'))           define('Y_READINESS_EXISTS',          1);
if(!defined('Y_READINESS_LINKED'))           define('Y_READINESS_LINKED',          2);
if(!defined('Y_READINESS_LAN_OK'))           define('Y_READINESS_LAN_OK',          3);
if(!defined('Y_READINESS_WWW_OK'))           define('Y_READINESS_WWW_OK',          4);
if(!defined('Y_READINESS_INVALID'))          define('Y_READINESS_INVALID',         -1);
if(!defined('Y_DISCOVERABLE_FALSE'))         define('Y_DISCOVERABLE_FALSE',        0);
if(!defined('Y_DISCOVERABLE_TRUE'))          define('Y_DISCOVERABLE_TRUE',         1);
if(!defined('Y_DISCOVERABLE_INVALID'))       define('Y_DISCOVERABLE_INVALID',      -1);
if(!defined('Y_CALLBACKMETHOD_POST'))        define('Y_CALLBACKMETHOD_POST',       0);
if(!defined('Y_CALLBACKMETHOD_GET'))         define('Y_CALLBACKMETHOD_GET',        1);
if(!defined('Y_CALLBACKMETHOD_PUT'))         define('Y_CALLBACKMETHOD_PUT',        2);
if(!defined('Y_CALLBACKMETHOD_INVALID'))     define('Y_CALLBACKMETHOD_INVALID',    -1);
if(!defined('Y_CALLBACKENCODING_FORM'))      define('Y_CALLBACKENCODING_FORM',     0);
if(!defined('Y_CALLBACKENCODING_JSON'))      define('Y_CALLBACKENCODING_JSON',     1);
if(!defined('Y_CALLBACKENCODING_JSON_ARRAY')) define('Y_CALLBACKENCODING_JSON_ARRAY', 2);
if(!defined('Y_CALLBACKENCODING_CSV'))       define('Y_CALLBACKENCODING_CSV',      3);
if(!defined('Y_CALLBACKENCODING_YOCTO_API')) define('Y_CALLBACKENCODING_YOCTO_API', 4);
if(!defined('Y_CALLBACKENCODING_JSON_NUM'))  define('Y_CALLBACKENCODING_JSON_NUM', 5);
if(!defined('Y_CALLBACKENCODING_EMONCMS'))   define('Y_CALLBACKENCODING_EMONCMS',  6);
if(!defined('Y_CALLBACKENCODING_AZURE'))     define('Y_CALLBACKENCODING_AZURE',    7);
if(!defined('Y_CALLBACKENCODING_INFLUXDB'))  define('Y_CALLBACKENCODING_INFLUXDB', 8);
if(!defined('Y_CALLBACKENCODING_MQTT'))      define('Y_CALLBACKENCODING_MQTT',     9);
if(!defined('Y_CALLBACKENCODING_YOCTO_API_JZON')) define('Y_CALLBACKENCODING_YOCTO_API_JZON', 10);
if(!defined('Y_CALLBACKENCODING_PRTG'))      define('Y_CALLBACKENCODING_PRTG',     11);
if(!defined('Y_CALLBACKENCODING_INVALID'))   define('Y_CALLBACKENCODING_INVALID',  -1);
if(!defined('Y_MACADDRESS_INVALID'))         define('Y_MACADDRESS_INVALID',        YAPI_INVALID_STRING);
if(!defined('Y_IPADDRESS_INVALID'))          define('Y_IPADDRESS_INVALID',         YAPI_INVALID_STRING);
if(!defined('Y_SUBNETMASK_INVALID'))         define('Y_SUBNETMASK_INVALID',        YAPI_INVALID_STRING);
if(!defined('Y_ROUTER_INVALID'))             define('Y_ROUTER_INVALID',            YAPI_INVALID_STRING);
if(!defined('Y_IPCONFIG_INVALID'))           define('Y_IPCONFIG_INVALID',          YAPI_INVALID_STRING);
if(!defined('Y_PRIMARYDNS_INVALID'))         define('Y_PRIMARYDNS_INVALID',        YAPI_INVALID_STRING);
if(!defined('Y_SECONDARYDNS_INVALID'))       define('Y_SECONDARYDNS_INVALID',      YAPI_INVALID_STRING);
if(!defined('Y_NTPSERVER_INVALID'))          define('Y_NTPSERVER_INVALID',         YAPI_INVALID_STRING);
if(!defined('Y_USERPASSWORD_INVALID'))       define('Y_USERPASSWORD_INVALID',      YAPI_INVALID_STRING);
if(!defined('Y_ADMINPASSWORD_INVALID'))      define('Y_ADMINPASSWORD_INVALID',     YAPI_INVALID_STRING);
if(!defined('Y_HTTPPORT_INVALID'))           define('Y_HTTPPORT_INVALID',          YAPI_INVALID_UINT);
if(!defined('Y_DEFAULTPAGE_INVALID'))        define('Y_DEFAULTPAGE_INVALID',       YAPI_INVALID_STRING);
if(!defined('Y_WWWWATCHDOGDELAY_INVALID'))   define('Y_WWWWATCHDOGDELAY_INVALID',  YAPI_INVALID_UINT);
if(!defined('Y_CALLBACKURL_INVALID'))        define('Y_CALLBACKURL_INVALID',       YAPI_INVALID_STRING);
if(!defined('Y_CALLBACKCREDENTIALS_INVALID')) define('Y_CALLBACKCREDENTIALS_INVALID', YAPI_INVALID_STRING);
if(!defined('Y_CALLBACKINITIALDELAY_INVALID')) define('Y_CALLBACKINITIALDELAY_INVALID', YAPI_INVALID_UINT);
if(!defined('Y_CALLBACKSCHEDULE_INVALID'))   define('Y_CALLBACKSCHEDULE_INVALID',  YAPI_INVALID_STRING);
if(!defined('Y_CALLBACKMINDELAY_INVALID'))   define('Y_CALLBACKMINDELAY_INVALID',  YAPI_INVALID_UINT);
if(!defined('Y_CALLBACKMAXDELAY_INVALID'))   define('Y_CALLBACKMAXDELAY_INVALID',  YAPI_INVALID_UINT);
if(!defined('Y_POECURRENT_INVALID'))         define('Y_POECURRENT_INVALID',        YAPI_INVALID_UINT);
//--- (end of YNetwork definitions)

//--- (YNetwork declaration)
/**
 * YNetwork Class: Network function interface
 *
 * YNetwork objects provide access to TCP/IP parameters of Yoctopuce
 * modules that include a built-in network interface.
 */
class YNetwork extends YFunction
{
    const READINESS_DOWN                 = 0;
    const READINESS_EXISTS               = 1;
    const READINESS_LINKED               = 2;
    const READINESS_LAN_OK               = 3;
    const READINESS_WWW_OK               = 4;
    const READINESS_INVALID              = -1;
    const MACADDRESS_INVALID             = YAPI_INVALID_STRING;
    const IPADDRESS_INVALID              = YAPI_INVALID_STRING;
    const SUBNETMASK_INVALID             = YAPI_INVALID_STRING;
    const ROUTER_INVALID                 = YAPI_INVALID_STRING;
    const IPCONFIG_INVALID               = YAPI_INVALID_STRING;
    const PRIMARYDNS_INVALID             = YAPI_INVALID_STRING;
    const SECONDARYDNS_INVALID           = YAPI_INVALID_STRING;
    const NTPSERVER_INVALID              = YAPI_INVALID_STRING;
    const USERPASSWORD_INVALID           = YAPI_INVALID_STRING;
    const ADMINPASSWORD_INVALID          = YAPI_INVALID_STRING;
    const HTTPPORT_INVALID               = YAPI_INVALID_UINT;
    const DEFAULTPAGE_INVALID            = YAPI_INVALID_STRING;
    const DISCOVERABLE_FALSE             = 0;
    const DISCOVERABLE_TRUE              = 1;
    const DISCOVERABLE_INVALID           = -1;
    const WWWWATCHDOGDELAY_INVALID       = YAPI_INVALID_UINT;
    const CALLBACKURL_INVALID            = YAPI_INVALID_STRING;
    const CALLBACKMETHOD_POST            = 0;
    const CALLBACKMETHOD_GET             = 1;
    const CALLBACKMETHOD_PUT             = 2;
    const CALLBACKMETHOD_INVALID         = -1;
    const CALLBACKENCODING_FORM          = 0;
    const CALLBACKENCODING_JSON          = 1;
    const CALLBACKENCODING_JSON_ARRAY    = 2;
    const CALLBACKENCODING_CSV           = 3;
    const CALLBACKENCODING_YOCTO_API     = 4;
    const CALLBACKENCODING_JSON_NUM      = 5;
    const CALLBACKENCODING_EMONCMS       = 6;
    const CALLBACKENCODING_AZURE         = 7;
    const CALLBACKENCODING_INFLUXDB      = 8;
    const CALLBACKENCODING_MQTT          = 9;
    const CALLBACKENCODING_YOCTO_API_JZON = 10;
    const CALLBACKENCODING_PRTG          = 11;
    const CALLBACKENCODING_INVALID       = -1;
    const CALLBACKCREDENTIALS_INVALID    = YAPI_INVALID_STRING;
    const CALLBACKINITIALDELAY_INVALID   = YAPI_INVALID_UINT;
    const CALLBACKSCHEDULE_INVALID       = YAPI_INVALID_STRING;
    const CALLBACKMINDELAY_INVALID       = YAPI_INVALID_UINT;
    const CALLBACKMAXDELAY_INVALID       = YAPI_INVALID_UINT;
    const POECURRENT_INVALID             = YAPI_INVALID_UINT;
    //--- (end of YNetwork declaration)

    //--- (YNetwork attributes)
    protected $_readiness                = Y_READINESS_INVALID;          // Readiness
    protected $_macAddress               = Y_MACADDRESS_INVALID;         // MACAddress
    protected $_ipAddress                = Y_IPADDRESS_INVALID;          // IPAddress
    protected $_subnetMask               = Y_SUBNETMASK_INVALID;         // IPAddress
    protected $_router                   = Y_ROUTER_INVALID;             // IPAddress
    protected $_ipConfig                 = Y_IPCONFIG_INVALID;           // IPConfig
    protected $_primaryDNS               = Y_PRIMARYDNS_INVALID;         // IPAddress
    protected $_secondaryDNS             = Y_SECONDARYDNS_INVALID;       // IPAddress
    protected $_ntpServer                = Y_NTPSERVER_INVALID;          // IPAddress
    protected $_userPassword             = Y_USERPASSWORD_INVALID;       // UserPassword
    protected $_adminPassword            = Y_ADMINPASSWORD_INVALID;      // AdminPassword
    protected $_httpPort                 = Y_HTTPPORT_INVALID;           // UInt31
    protected $_defaultPage              = Y_DEFAULTPAGE_INVALID;        // Text
    protected $_discoverable             = Y_DISCOVERABLE_INVALID;       // Bool
    protected $_wwwWatchdogDelay         = Y_WWWWATCHDOGDELAY_INVALID;   // UInt31
    protected $_callbackUrl              = Y_CALLBACKURL_INVALID;        // Text
    protected $_callbackMethod           = Y_CALLBACKMETHOD_INVALID;     // HTTPMethod
    protected $_callbackEncoding         = Y_CALLBACKENCODING_INVALID;   // CallbackEncoding
    protected $_callbackCredentials      = Y_CALLBACKCREDENTIALS_INVALID; // Credentials
    protected $_callbackInitialDelay     = Y_CALLBACKINITIALDELAY_INVALID; // UInt31
    protected $_callbackSchedule         = Y_CALLBACKSCHEDULE_INVALID;   // CallbackSchedule
    protected $_callbackMinDelay         = Y_CALLBACKMINDELAY_INVALID;   // UInt31
    protected $_callbackMaxDelay         = Y_CALLBACKMAXDELAY_INVALID;   // UInt31
    protected $_poeCurrent               = Y_POECURRENT_INVALID;         // UsedCurrent
    //--- (end of YNetwork attributes)

    function __construct($str_func)
    {
        //--- (YNetwork constructor)
        parent::__construct($str_func);
        $this->_className = 'Network';

        //--- (end of YNetwork constructor)
    }

    //--- (YNetwork implementation)

    function _parseAttr($name, $val)
    {
        switch($name) {
        case 'readiness':
            $this->_readiness = intval($val);
            return 1;
        case 'macAddress':
            $this->_macAddress = $val;
            return 1;
        case 'ipAddress':
            $this->_ipAddress = $val;
            return 1;
        case 'subnetMask':
            $this->_subnetMask = $val;
            return 1;
        case 'router':
            $this->_router = $val;
            return 1;
        case 'ipConfig':
            $this->_ipConfig = $val;
            return 1;
        case 'primaryDNS':
            $this->_primaryDNS = $val;
            return 1;
        case 'secondaryDNS':
            $this->_secondaryDNS = $val;
            return 1;
        case 'ntpServer':
            $this->_ntpServer = $val;
            return 1;
        case 'userPassword':
            $this->_userPassword = $val;
            return 1;
        case 'adminPassword':
            $this->_adminPassword = $val;
            return 1;
        case 'httpPort':
            $this->_httpPort = intval($val);
            return 1;
        case 'defaultPage':
            $this->_defaultPage = $val;
            return 1;
        case 'discoverable':
            $this->_discoverable = intval($val);
            return 1;
        case 'wwwWatchdogDelay':
            $this->_wwwWatchdogDelay = intval($val);
            return 1;
        case 'callbackUrl':
            $this->_callbackUrl = $val;
            return 1;
        case 'callbackMethod':
            $this->_callbackMethod = intval($val);
            return 1;
        case 'callbackEncoding':
            $this->_callbackEncoding = intval($val);
            return 1;
        case 'callbackCredentials':
            $this->_callbackCredentials = $val;
            return 1;
        case 'callbackInitialDelay':
            $this->_callbackInitialDelay = intval($val);
            return 1;
        case 'callbackSchedule':
            $this->_callbackSchedule = $val;
            return 1;
        case 'callbackMinDelay':
            $this->_callbackMinDelay = intval($val);
            return 1;
        case 'callbackMaxDelay':
            $this->_callbackMaxDelay = intval($val);
            return 1;
        case 'poeCurrent':
            $this->_poeCurrent = intval($val);
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns the current established working mode of the network interface.
     * Level zero (DOWN_0) means that no hardware link has been detected. Either there is no signal
     * on the network cable, or the selected wireless access point cannot be detected.
     * Level 1 (LIVE_1) is reached when the network is detected, but is not yet connected.
     * For a wireless network, this shows that the requested SSID is present.
     * Level 2 (LINK_2) is reached when the hardware connection is established.
     * For a wired network connection, level 2 means that the cable is attached at both ends.
     * For a connection to a wireless access point, it shows that the security parameters
     * are properly configured. For an ad-hoc wireless connection, it means that there is
     * at least one other device connected on the ad-hoc network.
     * Level 3 (DHCP_3) is reached when an IP address has been obtained using DHCP.
     * Level 4 (DNS_4) is reached when the DNS server is reachable on the network.
     * Level 5 (WWW_5) is reached when global connectivity is demonstrated by properly loading the
     * current time from an NTP server.
     *
     * @return integer : a value among Y_READINESS_DOWN, Y_READINESS_EXISTS, Y_READINESS_LINKED,
     * Y_READINESS_LAN_OK and Y_READINESS_WWW_OK corresponding to the current established working mode of
     * the network interface
     *
     * On failure, throws an exception or returns Y_READINESS_INVALID.
     */
    public function get_readiness()
    {
        // $res                    is a enumREADINESS;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_READINESS_INVALID;
            }
        }
        $res = $this->_readiness;
        return $res;
    }

    /**
     * Returns the MAC address of the network interface. The MAC address is also available on a sticker
     * on the module, in both numeric and barcode forms.
     *
     * @return string : a string corresponding to the MAC address of the network interface
     *
     * On failure, throws an exception or returns Y_MACADDRESS_INVALID.
     */
    public function get_macAddress()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_MACADDRESS_INVALID;
            }
        }
        $res = $this->_macAddress;
        return $res;
    }

    /**
     * Returns the IP address currently in use by the device. The address may have been configured
     * statically, or provided by a DHCP server.
     *
     * @return string : a string corresponding to the IP address currently in use by the device
     *
     * On failure, throws an exception or returns Y_IPADDRESS_INVALID.
     */
    public function get_ipAddress()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_IPADDRESS_INVALID;
            }
        }
        $res = $this->_ipAddress;
        return $res;
    }

    /**
     * Returns the subnet mask currently used by the device.
     *
     * @return string : a string corresponding to the subnet mask currently used by the device
     *
     * On failure, throws an exception or returns Y_SUBNETMASK_INVALID.
     */
    public function get_subnetMask()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_SUBNETMASK_INVALID;
            }
        }
        $res = $this->_subnetMask;
        return $res;
    }

    /**
     * Returns the IP address of the router on the device subnet (default gateway).
     *
     * @return string : a string corresponding to the IP address of the router on the device subnet (default gateway)
     *
     * On failure, throws an exception or returns Y_ROUTER_INVALID.
     */
    public function get_router()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_ROUTER_INVALID;
            }
        }
        $res = $this->_router;
        return $res;
    }

    /**
     * Returns the IP configuration of the network interface.
     *
     * If the network interface is setup to use a static IP address, the string starts with "STATIC:" and
     * is followed by three
     * parameters, separated by "/". The first is the device IP address, followed by the subnet mask
     * length, and finally the
     * router IP address (default gateway). For instance: "STATIC:192.168.1.14/16/192.168.1.1"
     *
     * If the network interface is configured to receive its IP from a DHCP server, the string start with
     * "DHCP:" and is followed by
     * three parameters separated by "/". The first is the fallback IP address, then the fallback subnet
     * mask length and finally the
     * fallback router IP address. These three parameters are used when no DHCP reply is received.
     *
     * @return string : a string corresponding to the IP configuration of the network interface
     *
     * On failure, throws an exception or returns Y_IPCONFIG_INVALID.
     */
    public function get_ipConfig()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_IPCONFIG_INVALID;
            }
        }
        $res = $this->_ipConfig;
        return $res;
    }

    public function set_ipConfig($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("ipConfig",$rest_val);
    }

    /**
     * Returns the IP address of the primary name server to be used by the module.
     *
     * @return string : a string corresponding to the IP address of the primary name server to be used by the module
     *
     * On failure, throws an exception or returns Y_PRIMARYDNS_INVALID.
     */
    public function get_primaryDNS()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_PRIMARYDNS_INVALID;
            }
        }
        $res = $this->_primaryDNS;
        return $res;
    }

    /**
     * Changes the IP address of the primary name server to be used by the module.
     * When using DHCP, if a value is specified, it overrides the value received from the DHCP server.
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @param string $newval : a string corresponding to the IP address of the primary name server to be
     * used by the module
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_primaryDNS($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("primaryDNS",$rest_val);
    }

    /**
     * Returns the IP address of the secondary name server to be used by the module.
     *
     * @return string : a string corresponding to the IP address of the secondary name server to be used by the module
     *
     * On failure, throws an exception or returns Y_SECONDARYDNS_INVALID.
     */
    public function get_secondaryDNS()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_SECONDARYDNS_INVALID;
            }
        }
        $res = $this->_secondaryDNS;
        return $res;
    }

    /**
     * Changes the IP address of the secondary name server to be used by the module.
     * When using DHCP, if a value is specified, it overrides the value received from the DHCP server.
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @param string $newval : a string corresponding to the IP address of the secondary name server to be
     * used by the module
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_secondaryDNS($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("secondaryDNS",$rest_val);
    }

    /**
     * Returns the IP address of the NTP server to be used by the device.
     *
     * @return string : a string corresponding to the IP address of the NTP server to be used by the device
     *
     * On failure, throws an exception or returns Y_NTPSERVER_INVALID.
     */
    public function get_ntpServer()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_NTPSERVER_INVALID;
            }
        }
        $res = $this->_ntpServer;
        return $res;
    }

    /**
     * Changes the IP address of the NTP server to be used by the module.
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @param string $newval : a string corresponding to the IP address of the NTP server to be used by the module
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_ntpServer($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("ntpServer",$rest_val);
    }

    /**
     * Returns a hash string if a password has been set for "user" user,
     * or an empty string otherwise.
     *
     * @return string : a string corresponding to a hash string if a password has been set for "user" user,
     *         or an empty string otherwise
     *
     * On failure, throws an exception or returns Y_USERPASSWORD_INVALID.
     */
    public function get_userPassword()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_USERPASSWORD_INVALID;
            }
        }
        $res = $this->_userPassword;
        return $res;
    }

    /**
     * Changes the password for the "user" user. This password becomes instantly required
     * to perform any use of the module. If the specified value is an
     * empty string, a password is not required anymore.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param string $newval : a string corresponding to the password for the "user" user
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_userPassword($newval)
    {
        if (strlen($newval) > YAPI_HASH_BUF_SIZE)
            return $this->_throw(YAPI_INVALID_ARGUMENT,'Password too long :'.$newval);
        $rest_val = $newval;
        return $this->_setAttr("userPassword",$rest_val);
    }

    /**
     * Returns a hash string if a password has been set for user "admin",
     * or an empty string otherwise.
     *
     * @return string : a string corresponding to a hash string if a password has been set for user "admin",
     *         or an empty string otherwise
     *
     * On failure, throws an exception or returns Y_ADMINPASSWORD_INVALID.
     */
    public function get_adminPassword()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_ADMINPASSWORD_INVALID;
            }
        }
        $res = $this->_adminPassword;
        return $res;
    }

    /**
     * Changes the password for the "admin" user. This password becomes instantly required
     * to perform any change of the module state. If the specified value is an
     * empty string, a password is not required anymore.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param string $newval : a string corresponding to the password for the "admin" user
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_adminPassword($newval)
    {
        if (strlen($newval) > YAPI_HASH_BUF_SIZE)
            return $this->_throw(YAPI_INVALID_ARGUMENT,'Password too long :'.$newval);
        $rest_val = $newval;
        return $this->_setAttr("adminPassword",$rest_val);
    }

    /**
     * Returns the HTML page to serve for the URL "/"" of the hub.
     *
     * @return integer : an integer corresponding to the HTML page to serve for the URL "/"" of the hub
     *
     * On failure, throws an exception or returns Y_HTTPPORT_INVALID.
     */
    public function get_httpPort()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_HTTPPORT_INVALID;
            }
        }
        $res = $this->_httpPort;
        return $res;
    }

    /**
     * Changes the default HTML page returned by the hub. If not value are set the hub return
     * "index.html" which is the web interface of the hub. It is possible de change this page
     * for file that has been uploaded on the hub.
     *
     * @param integer $newval : an integer corresponding to the default HTML page returned by the hub
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_httpPort($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("httpPort",$rest_val);
    }

    /**
     * Returns the HTML page to serve for the URL "/"" of the hub.
     *
     * @return string : a string corresponding to the HTML page to serve for the URL "/"" of the hub
     *
     * On failure, throws an exception or returns Y_DEFAULTPAGE_INVALID.
     */
    public function get_defaultPage()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_DEFAULTPAGE_INVALID;
            }
        }
        $res = $this->_defaultPage;
        return $res;
    }

    /**
     * Changes the default HTML page returned by the hub. If not value are set the hub return
     * "index.html" which is the web interface of the hub. It is possible de change this page
     * for file that has been uploaded on the hub.
     *
     * @param string $newval : a string corresponding to the default HTML page returned by the hub
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_defaultPage($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("defaultPage",$rest_val);
    }

    /**
     * Returns the activation state of the multicast announce protocols to allow easy
     * discovery of the module in the network neighborhood (uPnP/Bonjour protocol).
     *
     * @return integer : either Y_DISCOVERABLE_FALSE or Y_DISCOVERABLE_TRUE, according to the activation
     * state of the multicast announce protocols to allow easy
     *         discovery of the module in the network neighborhood (uPnP/Bonjour protocol)
     *
     * On failure, throws an exception or returns Y_DISCOVERABLE_INVALID.
     */
    public function get_discoverable()
    {
        // $res                    is a enumBOOL;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_DISCOVERABLE_INVALID;
            }
        }
        $res = $this->_discoverable;
        return $res;
    }

    /**
     * Changes the activation state of the multicast announce protocols to allow easy
     * discovery of the module in the network neighborhood (uPnP/Bonjour protocol).
     *
     * @param integer $newval : either Y_DISCOVERABLE_FALSE or Y_DISCOVERABLE_TRUE, according to the
     * activation state of the multicast announce protocols to allow easy
     *         discovery of the module in the network neighborhood (uPnP/Bonjour protocol)
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_discoverable($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("discoverable",$rest_val);
    }

    /**
     * Returns the allowed downtime of the WWW link (in seconds) before triggering an automated
     * reboot to try to recover Internet connectivity. A zero value disables automated reboot
     * in case of Internet connectivity loss.
     *
     * @return integer : an integer corresponding to the allowed downtime of the WWW link (in seconds)
     * before triggering an automated
     *         reboot to try to recover Internet connectivity
     *
     * On failure, throws an exception or returns Y_WWWWATCHDOGDELAY_INVALID.
     */
    public function get_wwwWatchdogDelay()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_WWWWATCHDOGDELAY_INVALID;
            }
        }
        $res = $this->_wwwWatchdogDelay;
        return $res;
    }

    /**
     * Changes the allowed downtime of the WWW link (in seconds) before triggering an automated
     * reboot to try to recover Internet connectivity. A zero value disables automated reboot
     * in case of Internet connectivity loss. The smallest valid non-zero timeout is
     * 90 seconds.
     *
     * @param integer $newval : an integer corresponding to the allowed downtime of the WWW link (in
     * seconds) before triggering an automated
     *         reboot to try to recover Internet connectivity
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_wwwWatchdogDelay($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("wwwWatchdogDelay",$rest_val);
    }

    /**
     * Returns the callback URL to notify of significant state changes.
     *
     * @return string : a string corresponding to the callback URL to notify of significant state changes
     *
     * On failure, throws an exception or returns Y_CALLBACKURL_INVALID.
     */
    public function get_callbackUrl()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALLBACKURL_INVALID;
            }
        }
        $res = $this->_callbackUrl;
        return $res;
    }

    /**
     * Changes the callback URL to notify significant state changes. Remember to call the
     * saveToFlash() method of the module if the modification must be kept.
     *
     * @param string $newval : a string corresponding to the callback URL to notify significant state changes
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_callbackUrl($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("callbackUrl",$rest_val);
    }

    /**
     * Returns the HTTP method used to notify callbacks for significant state changes.
     *
     * @return integer : a value among Y_CALLBACKMETHOD_POST, Y_CALLBACKMETHOD_GET and
     * Y_CALLBACKMETHOD_PUT corresponding to the HTTP method used to notify callbacks for significant state changes
     *
     * On failure, throws an exception or returns Y_CALLBACKMETHOD_INVALID.
     */
    public function get_callbackMethod()
    {
        // $res                    is a enumHTTPMETHOD;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALLBACKMETHOD_INVALID;
            }
        }
        $res = $this->_callbackMethod;
        return $res;
    }

    /**
     * Changes the HTTP method used to notify callbacks for significant state changes.
     *
     * @param integer $newval : a value among Y_CALLBACKMETHOD_POST, Y_CALLBACKMETHOD_GET and
     * Y_CALLBACKMETHOD_PUT corresponding to the HTTP method used to notify callbacks for significant state changes
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_callbackMethod($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackMethod",$rest_val);
    }

    /**
     * Returns the encoding standard to use for representing notification values.
     *
     * @return integer : a value among Y_CALLBACKENCODING_FORM, Y_CALLBACKENCODING_JSON,
     * Y_CALLBACKENCODING_JSON_ARRAY, Y_CALLBACKENCODING_CSV, Y_CALLBACKENCODING_YOCTO_API,
     * Y_CALLBACKENCODING_JSON_NUM, Y_CALLBACKENCODING_EMONCMS, Y_CALLBACKENCODING_AZURE,
     * Y_CALLBACKENCODING_INFLUXDB, Y_CALLBACKENCODING_MQTT, Y_CALLBACKENCODING_YOCTO_API_JZON and
     * Y_CALLBACKENCODING_PRTG corresponding to the encoding standard to use for representing notification values
     *
     * On failure, throws an exception or returns Y_CALLBACKENCODING_INVALID.
     */
    public function get_callbackEncoding()
    {
        // $res                    is a enumCALLBACKENCODING;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALLBACKENCODING_INVALID;
            }
        }
        $res = $this->_callbackEncoding;
        return $res;
    }

    /**
     * Changes the encoding standard to use for representing notification values.
     *
     * @param integer $newval : a value among Y_CALLBACKENCODING_FORM, Y_CALLBACKENCODING_JSON,
     * Y_CALLBACKENCODING_JSON_ARRAY, Y_CALLBACKENCODING_CSV, Y_CALLBACKENCODING_YOCTO_API,
     * Y_CALLBACKENCODING_JSON_NUM, Y_CALLBACKENCODING_EMONCMS, Y_CALLBACKENCODING_AZURE,
     * Y_CALLBACKENCODING_INFLUXDB, Y_CALLBACKENCODING_MQTT, Y_CALLBACKENCODING_YOCTO_API_JZON and
     * Y_CALLBACKENCODING_PRTG corresponding to the encoding standard to use for representing notification values
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_callbackEncoding($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackEncoding",$rest_val);
    }

    /**
     * Returns a hashed version of the notification callback credentials if set,
     * or an empty string otherwise.
     *
     * @return string : a string corresponding to a hashed version of the notification callback credentials if set,
     *         or an empty string otherwise
     *
     * On failure, throws an exception or returns Y_CALLBACKCREDENTIALS_INVALID.
     */
    public function get_callbackCredentials()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALLBACKCREDENTIALS_INVALID;
            }
        }
        $res = $this->_callbackCredentials;
        return $res;
    }

    /**
     * Changes the credentials required to connect to the callback address. The credentials
     * must be provided as returned by function get_callbackCredentials,
     * in the form username:hash. The method used to compute the hash varies according
     * to the the authentication scheme implemented by the callback, For Basic authentication,
     * the hash is the MD5 of the string username:password. For Digest authentication,
     * the hash is the MD5 of the string username:realm:password. For a simpler
     * way to configure callback credentials, use function callbackLogin instead.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param string $newval : a string corresponding to the credentials required to connect to the callback address
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_callbackCredentials($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("callbackCredentials",$rest_val);
    }

    /**
     * Connects to the notification callback and saves the credentials required to
     * log into it. The password is not stored into the module, only a hashed
     * copy of the credentials are saved. Remember to call the
     * saveToFlash() method of the module if the modification must be kept.
     *
     * @param string $username : username required to log to the callback
     * @param string $password : password required to log to the callback
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function callbackLogin($username,$password)
    {
        $rest_val = sprintf("%s:%s", $username, $password);
        return $this->_setAttr("callbackCredentials",$rest_val);
    }

    /**
     * Returns the initial waiting time before first callback notifications, in seconds.
     *
     * @return integer : an integer corresponding to the initial waiting time before first callback
     * notifications, in seconds
     *
     * On failure, throws an exception or returns Y_CALLBACKINITIALDELAY_INVALID.
     */
    public function get_callbackInitialDelay()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALLBACKINITIALDELAY_INVALID;
            }
        }
        $res = $this->_callbackInitialDelay;
        return $res;
    }

    /**
     * Changes the initial waiting time before first callback notifications, in seconds.
     *
     * @param integer $newval : an integer corresponding to the initial waiting time before first callback
     * notifications, in seconds
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_callbackInitialDelay($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackInitialDelay",$rest_val);
    }

    /**
     * Returns the HTTP callback schedule strategy, as a text string.
     *
     * @return string : a string corresponding to the HTTP callback schedule strategy, as a text string
     *
     * On failure, throws an exception or returns Y_CALLBACKSCHEDULE_INVALID.
     */
    public function get_callbackSchedule()
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALLBACKSCHEDULE_INVALID;
            }
        }
        $res = $this->_callbackSchedule;
        return $res;
    }

    /**
     * Changes the HTTP callback schedule strategy, as a text string.
     *
     * @param string $newval : a string corresponding to the HTTP callback schedule strategy, as a text string
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_callbackSchedule($newval)
    {
        $rest_val = $newval;
        return $this->_setAttr("callbackSchedule",$rest_val);
    }

    /**
     * Returns the minimum waiting time between two HTTP callbacks, in seconds.
     *
     * @return integer : an integer corresponding to the minimum waiting time between two HTTP callbacks, in seconds
     *
     * On failure, throws an exception or returns Y_CALLBACKMINDELAY_INVALID.
     */
    public function get_callbackMinDelay()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALLBACKMINDELAY_INVALID;
            }
        }
        $res = $this->_callbackMinDelay;
        return $res;
    }

    /**
     * Changes the minimum waiting time between two HTTP callbacks, in seconds.
     *
     * @param integer $newval : an integer corresponding to the minimum waiting time between two HTTP
     * callbacks, in seconds
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_callbackMinDelay($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackMinDelay",$rest_val);
    }

    /**
     * Returns the waiting time between two HTTP callbacks when there is nothing new.
     *
     * @return integer : an integer corresponding to the waiting time between two HTTP callbacks when
     * there is nothing new
     *
     * On failure, throws an exception or returns Y_CALLBACKMAXDELAY_INVALID.
     */
    public function get_callbackMaxDelay()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_CALLBACKMAXDELAY_INVALID;
            }
        }
        $res = $this->_callbackMaxDelay;
        return $res;
    }

    /**
     * Changes the waiting time between two HTTP callbacks when there is nothing new.
     *
     * @param integer $newval : an integer corresponding to the waiting time between two HTTP callbacks
     * when there is nothing new
     *
     * @return integer : YAPI_SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_callbackMaxDelay($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackMaxDelay",$rest_val);
    }

    /**
     * Returns the current consumed by the module from Power-over-Ethernet (PoE), in milli-amps.
     * The current consumption is measured after converting PoE source to 5 Volt, and should
     * never exceed 1800 mA.
     *
     * @return integer : an integer corresponding to the current consumed by the module from
     * Power-over-Ethernet (PoE), in milli-amps
     *
     * On failure, throws an exception or returns Y_POECURRENT_INVALID.
     */
    public function get_poeCurrent()
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_POECURRENT_INVALID;
            }
        }
        $res = $this->_poeCurrent;
        return $res;
    }

    /**
     * Retrieves a network interface for a given identifier.
     * The identifier can be specified using several formats:
     * <ul>
     * <li>FunctionLogicalName</li>
     * <li>ModuleSerialNumber.FunctionIdentifier</li>
     * <li>ModuleSerialNumber.FunctionLogicalName</li>
     * <li>ModuleLogicalName.FunctionIdentifier</li>
     * <li>ModuleLogicalName.FunctionLogicalName</li>
     * </ul>
     *
     * This function does not require that the network interface is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method YNetwork.isOnline() to test if the network interface is
     * indeed online at a given time. In case of ambiguity when looking for
     * a network interface by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the matching device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string that uniquely characterizes the network interface
     *
     * @return YNetwork : a YNetwork object allowing you to drive the network interface.
     */
    public static function FindNetwork($func)
    {
        // $obj                    is a YNetwork;
        $obj = YFunction::_FindFromCache('Network', $func);
        if ($obj == null) {
            $obj = new YNetwork($func);
            YFunction::_AddToCache('Network', $func, $obj);
        }
        return $obj;
    }

    /**
     * Changes the configuration of the network interface to enable the use of an
     * IP address received from a DHCP server. Until an address is received from a DHCP
     * server, the module uses the IP parameters specified to this function.
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @param string $fallbackIpAddr : fallback IP address, to be used when no DHCP reply is received
     * @param integer $fallbackSubnetMaskLen : fallback subnet mask length when no DHCP reply is received, as an
     *         integer (eg. 24 means 255.255.255.0)
     * @param string $fallbackRouter : fallback router IP address, to be used when no DHCP reply is received
     *
     * @return integer : YAPI_SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function useDHCP($fallbackIpAddr,$fallbackSubnetMaskLen,$fallbackRouter)
    {
        return $this->set_ipConfig(sprintf('DHCP:%s/%d/%s', $fallbackIpAddr, $fallbackSubnetMaskLen, $fallbackRouter));
    }

    /**
     * Changes the configuration of the network interface to enable the use of an
     * IP address received from a DHCP server. Until an address is received from a DHCP
     * server, the module uses an IP of the network 169.254.0.0/16 (APIPA).
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @return integer : YAPI_SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function useDHCPauto()
    {
        return $this->set_ipConfig('DHCP:');
    }

    /**
     * Changes the configuration of the network interface to use a static IP address.
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @param string $ipAddress : device IP address
     * @param integer $subnetMaskLen : subnet mask length, as an integer (eg. 24 means 255.255.255.0)
     * @param string $router : router IP address (default gateway)
     *
     * @return integer : YAPI_SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function useStaticIP($ipAddress,$subnetMaskLen,$router)
    {
        return $this->set_ipConfig(sprintf('STATIC:%s/%d/%s', $ipAddress, $subnetMaskLen, $router));
    }

    /**
     * Pings host to test the network connectivity. Sends four ICMP ECHO_REQUEST requests from the
     * module to the target host. This method returns a string with the result of the
     * 4 ICMP ECHO_REQUEST requests.
     *
     * @param string $host : the hostname or the IP address of the target
     *
     * @return string : a string with the result of the ping.
     */
    public function ping($host)
    {
        // $content                is a bin;

        $content = $this->_download(sprintf('ping.txt?host=%s',$host));
        return $content;
    }

    /**
     * Trigger an HTTP callback quickly. This function can even be called within
     * an HTTP callback, in which case the next callback will be triggered 5 seconds
     * after the end of the current callback, regardless if the minimum time between
     * callbacks configured in the device.
     *
     * @return integer : YAPI_SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function triggerCallback()
    {
        return $this->set_callbackMethod($this->get_callbackMethod());
    }

    /**
     * Setup periodic HTTP callbacks (simplifed function).
     *
     * @param string $interval : a string representing the callback periodicity, expressed in
     *         seconds, minutes or hours, eg. "60s", "5m", "1h", "48h".
     * @param integer $offset : an integer representing the time offset relative to the period
     *         when the callback should occur. For instance, if the periodicity is
     *         24h, an offset of 7 will make the callback occur each day at 7AM.
     *
     * @return integer : YAPI_SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_periodicCallbackSchedule($interval,$offset)
    {
        return $this->set_callbackSchedule(sprintf('every %s+%d',$interval,$offset));
    }

    public function readiness()
    { return $this->get_readiness(); }

    public function macAddress()
    { return $this->get_macAddress(); }

    public function ipAddress()
    { return $this->get_ipAddress(); }

    public function subnetMask()
    { return $this->get_subnetMask(); }

    public function router()
    { return $this->get_router(); }

    public function ipConfig()
    { return $this->get_ipConfig(); }

    public function setIpConfig($newval)
    { return $this->set_ipConfig($newval); }

    public function primaryDNS()
    { return $this->get_primaryDNS(); }

    public function setPrimaryDNS($newval)
    { return $this->set_primaryDNS($newval); }

    public function secondaryDNS()
    { return $this->get_secondaryDNS(); }

    public function setSecondaryDNS($newval)
    { return $this->set_secondaryDNS($newval); }

    public function ntpServer()
    { return $this->get_ntpServer(); }

    public function setNtpServer($newval)
    { return $this->set_ntpServer($newval); }

    public function userPassword()
    { return $this->get_userPassword(); }

    public function setUserPassword($newval)
    { return $this->set_userPassword($newval); }

    public function adminPassword()
    { return $this->get_adminPassword(); }

    public function setAdminPassword($newval)
    { return $this->set_adminPassword($newval); }

    public function httpPort()
    { return $this->get_httpPort(); }

    public function setHttpPort($newval)
    { return $this->set_httpPort($newval); }

    public function defaultPage()
    { return $this->get_defaultPage(); }

    public function setDefaultPage($newval)
    { return $this->set_defaultPage($newval); }

    public function discoverable()
    { return $this->get_discoverable(); }

    public function setDiscoverable($newval)
    { return $this->set_discoverable($newval); }

    public function wwwWatchdogDelay()
    { return $this->get_wwwWatchdogDelay(); }

    public function setWwwWatchdogDelay($newval)
    { return $this->set_wwwWatchdogDelay($newval); }

    public function callbackUrl()
    { return $this->get_callbackUrl(); }

    public function setCallbackUrl($newval)
    { return $this->set_callbackUrl($newval); }

    public function callbackMethod()
    { return $this->get_callbackMethod(); }

    public function setCallbackMethod($newval)
    { return $this->set_callbackMethod($newval); }

    public function callbackEncoding()
    { return $this->get_callbackEncoding(); }

    public function setCallbackEncoding($newval)
    { return $this->set_callbackEncoding($newval); }

    public function callbackCredentials()
    { return $this->get_callbackCredentials(); }

    public function setCallbackCredentials($newval)
    { return $this->set_callbackCredentials($newval); }

    public function callbackInitialDelay()
    { return $this->get_callbackInitialDelay(); }

    public function setCallbackInitialDelay($newval)
    { return $this->set_callbackInitialDelay($newval); }

    public function callbackSchedule()
    { return $this->get_callbackSchedule(); }

    public function setCallbackSchedule($newval)
    { return $this->set_callbackSchedule($newval); }

    public function callbackMinDelay()
    { return $this->get_callbackMinDelay(); }

    public function setCallbackMinDelay($newval)
    { return $this->set_callbackMinDelay($newval); }

    public function callbackMaxDelay()
    { return $this->get_callbackMaxDelay(); }

    public function setCallbackMaxDelay($newval)
    { return $this->set_callbackMaxDelay($newval); }

    public function poeCurrent()
    { return $this->get_poeCurrent(); }

    /**
     * Continues the enumeration of network interfaces started using yFirstNetwork().
     *
     * @return YNetwork : a pointer to a YNetwork object, corresponding to
     *         a network interface currently online, or a null pointer
     *         if there are no more network interfaces to enumerate.
     */
    public function nextNetwork()
    {   $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if($resolve->errorType != YAPI_SUCCESS) return null;
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if($next_hwid == null) return null;
        return self::FindNetwork($next_hwid);
    }

    /**
     * Starts the enumeration of network interfaces currently accessible.
     * Use the method YNetwork.nextNetwork() to iterate on
     * next network interfaces.
     *
     * @return YNetwork : a pointer to a YNetwork object, corresponding to
     *         the first network interface currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstNetwork()
    {   $next_hwid = YAPI::getFirstHardwareId('Network');
        if($next_hwid == null) return null;
        return self::FindNetwork($next_hwid);
    }

    //--- (end of YNetwork implementation)

};

//--- (YNetwork functions)

/**
 * Retrieves a network interface for a given identifier.
 * The identifier can be specified using several formats:
 * <ul>
 * <li>FunctionLogicalName</li>
 * <li>ModuleSerialNumber.FunctionIdentifier</li>
 * <li>ModuleSerialNumber.FunctionLogicalName</li>
 * <li>ModuleLogicalName.FunctionIdentifier</li>
 * <li>ModuleLogicalName.FunctionLogicalName</li>
 * </ul>
 *
 * This function does not require that the network interface is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method YNetwork.isOnline() to test if the network interface is
 * indeed online at a given time. In case of ambiguity when looking for
 * a network interface by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the matching device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string that uniquely characterizes the network interface
 *
 * @return YNetwork : a YNetwork object allowing you to drive the network interface.
 */
function yFindNetwork($func)
{
    return YNetwork::FindNetwork($func);
}

/**
 * Starts the enumeration of network interfaces currently accessible.
 * Use the method YNetwork.nextNetwork() to iterate on
 * next network interfaces.
 *
 * @return YNetwork : a pointer to a YNetwork object, corresponding to
 *         the first network interface currently online, or a null pointer
 *         if there are none.
 */
function yFirstNetwork()
{
    return YNetwork::FirstNetwork();
}

//--- (end of YNetwork functions)
?>