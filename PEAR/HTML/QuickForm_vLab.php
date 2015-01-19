<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Create, validate and process HTML forms
 * 
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    HTML
 * @package     HTML_QuickForm
 * @author      Adam Daniel <adaniel1@eesus.jnj.com>
 * @author      Bertrand Mansion <bmansion@mamasam.com>
 * @author      Alexey Borzov <avb@php.net>
 * @copyright   2001-2009 The PHP Group
 * @license     http://www.php.net/license/3_01.txt PHP License 3.01
 * @version     CVS: $Id: QuickForm.php,v 1.166 2009/04/04 21:34:02 avb Exp $
 * @link        http://pear.php.net/package/HTML_QuickForm
 */

// Added by Masoud Sadjadi on Jan. 18, 2015
// to support the definition of VLAB_LMS_ROOT
$path = "../../libraries/";
include_once $path."configuration.php";

/**
 * PEAR and PEAR_Error classes, for error handling
 */
require_once 'QuickForm.php';
/**
 * Create, validate and process HTML forms
 *
 * @category    HTML
 * @package     HTML_QuickForm
 * @author      Adam Daniel <adaniel1@eesus.jnj.com>
 * @author      Bertrand Mansion <bmansion@mamasam.com>
 * @author      Alexey Borzov <avb@php.net>
 * @version     Release: 3.2.11
 */
class HTML_QuickForm_vLab extends HTML_QuickForm
{
    // {{{ constructor

    /**
     * Value for _isAddUser hidden element 
	 * @since     1.0
     * @var  boolean
     * @access   public
     */
    var $_isAddUser = true; // if false, then the form is being used for editing a user

    /**
     * Value for _isSignupForm hidden element 
	 * @since     1.0
     * @var  boolean
     * @access   public
     */
    var $_isSignupForm = true; // if false, then the form is not for user self signup

    /**
     * Value for _isProfileForm hidden element 
	 * @since     1.0
     * @var  boolean
     * @access   public
     */
    var $_isProfileForm = true; // if false, then the form is not for user profile

    /**
     * Value for _valueOfInvalidUserType hidden element 
	 * @since     1.0
     * @var  int
     * @access   public
     */
    var $_valueOfInvalidUserType = 0; 

    /**
     * Class constructor
     * @param    string      $formName          Form's name.
     * @param    string      $method            (optional)Form's method defaults to 'POST'
     * @param    string      $action            (optional)Form's action
     * @param    string      $target            (optional)Form's target defaults to '_self'
     * @param    mixed       $attributes        (optional)Extra attributes for <form> tag
     * @param    bool        $trackSubmit       (optional)Whether to track if the form was submitted by adding a special hidden field
     * @access   public
     */
    function HTML_QuickForm_vLab($formName='', $method='post', $action='', $target='', $attributes=null, $trackSubmit = false)
    {
        HTML_QuickForm::HTML_QuickForm($formName, $method, $action, $target, $attributes, $trackSubmit);
    } // end constructor

    // }}}
    // {{{ getValidationScript()

    /**
     * Returns the client side validation script
     *
     * @since     2.0
     * @access    public
     * @return    string    Javascript to perform validation, empty string if no 'client' rules were added
     */
    function getValidationScript()
    {
        if (empty($this->_rules) || empty($this->_attributes['onsubmit'])) {
            return '';
        }

        include_once('HTML/QuickForm/RuleRegistry.php');
        $registry = HTML_QuickForm_RuleRegistry::singleton();
        $test = array();
        $js_escape = array(
            "\r"    => '\r',
            "\n"    => '\n',
            "\t"    => '\t',
            "'"     => "\\'",
            '"'     => '\"',
            '\\'    => '\\\\'
        );

        foreach ($this->_rules as $elementName => $rules) {
            foreach ($rules as $rule) {
                if ('client' == $rule['validation']) {
                    unset($element);

                    $dependent  = isset($rule['dependent']) && is_array($rule['dependent']);
                    $rule['message'] = strtr($rule['message'], $js_escape);

                    if (isset($rule['group'])) {
                        $group    = $this->getElement($rule['group']);
                        // No JavaScript validation for frozen elements
                        if ($group->isFrozen()) {
                            continue 2;
                        }
                        $elements = $group->getElements();
                        foreach (array_keys($elements) as $key) {
                            if ($elementName == $group->getElementName($key)) {
                                $element = $elements[$key];
                                break;
                            }
                        }
                    } elseif ($dependent) {
                        $element   =  array();
                        $element[] = $this->getElement($elementName);
                        foreach ($rule['dependent'] as $elName) {
                            $element[] = $this->getElement($elName);
                        }
                    } else {
                        $element = $this->getElement($elementName);
                    }
                    // No JavaScript validation for frozen elements
                    if (is_object($element) && $element->isFrozen()) {
                        continue 2;
                    } elseif (is_array($element)) {
                        foreach (array_keys($element) as $key) {
                            if ($element[$key]->isFrozen()) {
                                continue 3;
                            }
                        }
                    }

                    $test[] = $registry->getValidationScript($element, $elementName, $rule);
                }
            }
        }
        if (count($test) > 0) {
            return
                "<script type='text/javascript'>\n" .
                "/*\n" .
                " * Returning an array with the pairs of eFront and vLab eFront2vLabTimezones\n" .
                " */\n" .
                "function geteFront2vLabTimezones() {\n" .
                "	\n" .
                "	vLab2eFrontTimezones = {\n" .
                "		'GMT-11:00'						: 'Pacific/Samoa',\n" .
                "		'Etc/GMT+11'					: 'Pacific/Samoa',\n" .
                "		'MIT'							: 'Pacific/Samoa',\n" .
                "		'Pacific/Apia'					: 'Pacific/Samoa',\n" .
                "		'Pacific/Midway'				: 'Pacific/Samoa',\n" .
                "		'Pacific/Niue'					: 'Pacific/Samoa',\n" .
                "		'Pacific/Pago_Pago'				: 'Pacific/Samoa',\n" .
                "		'Pacific/Samoa'					: 'Pacific/Samoa',\n" .
                "		'US/Samoa'						: 'Pacific/Samoa',\n" .
                "		\n" .
                "		'GMT-10:00'						: 'Pacific/Honolulu',\n" .
                "		'America/Adak'					: 'Pacific/Honolulu',\n" .
                "		'America/Atka'					: 'Pacific/Honolulu',\n" .
                "		'Etc/GMT+10'					: 'Pacific/Honolulu',\n" .
                "		'HST'							: 'Pacific/Honolulu',\n" .
                "		'Pacific/Fakaofo'				: 'Pacific/Honolulu',\n" .
                "		'Pacific/Honolulu'				: 'Pacific/Honolulu',\n" .
                "		'Pacific/Johnston'				: 'Pacific/Honolulu',\n" .
                "		'Pacific/Rarotonga'				: 'Pacific/Honolulu',\n" .
                "		'Pacific/Tahiti'				: 'Pacific/Honolulu',\n" .
                "		'SystemV/HST10'					: 'Pacific/Honolulu',\n" .
                "		'US/Aleutian'					: 'Pacific/Honolulu',\n" .
                "		'US/Hawaii'						: 'Pacific/Honolulu',		\n" .
                "		\n" .
                "		'GMT-09:30'						:  'Pacific/Honolulu', // This timzezone does not exist in eFront\n" .
                "		'Pacific/Marquesas'				:  'Pacific/Honolulu', // This timzezone does not exist in eFront\n" .
                "		\n" .
                "		'GMT-09:00'						: 'US/Alaska',\n" .
                "		'AST'							: 'US/Alaska',\n" .
                "		'America/Anchorage'				: 'US/Alaska',\n" .
                "		'America/Juneau'				: 'US/Alaska',\n" .
                "		'America/Nome'					: 'US/Alaska',\n" .
                "		'America/Yakutat'				: 'US/Alaska',\n" .
                "		'Etc/GMT+9'						: 'US/Alaska',\n" .
                "		'Pacific/Gambier'				: 'US/Alaska',\n" .
                "		'SystemV/YST9'					: 'US/Alaska',\n" .
                "		'SystemV/YST9YDT'				: 'US/Alaska',\n" .
                "		'US/Alaska'						: 'US/Alaska',		\n" .
                "		\n" .
                "		'GMT-08:00'						: 'America/Los_Angeles',\n" .
                "		'America/Dawson'				: 'America/Los_Angeles',\n" .
                "		'America/Ensenada'				: 'America/Los_Angeles',\n" .
                "		'America/Los_Angeles'			: 'America/Los_Angeles',\n" .
                "		'America/Tijuana'				: 'America/Los_Angeles',\n" .
                "		'America/Vancouver'				: 'America/Los_Angeles',\n" .
                "		'America/Whitehorse'			: 'America/Los_Angeles',\n" .
                "		'Canada/Pacific'				: 'America/Los_Angeles',\n" .
                "		'Canada/Yukon'					: 'America/Los_Angeles',\n" .
                "		'Etc/GMT+8'						: 'America/Los_Angeles',\n" .
                "		'Mexico/BajaNorte'				: 'America/Los_Angeles',\n" .
                "		'PST'							: 'America/Los_Angeles',\n" .
                "		'PST8PDT'						: 'America/Los_Angeles',\n" .
                "		'Pacific/Pitcairn'				: 'America/Los_Angeles',\n" .
                "		'SystemV/PST8'					: 'America/Los_Angeles',\n" .
                "		'SystemV/PST8PDT'				: 'America/Los_Angeles',\n" .
                "		'US/Pacific'					: 'America/Los_Angeles',\n" .
                "		'US/Pacific-New'				: 'America/Los_Angeles',\n" .
                "\n" .
                "		'GMT-07:00'						: 'America/Phoenix',\n" .
                "		'America/Boise'					: 'America/Phoenix',\n" .
                "		'America/Cambridge_Bay'			: 'America/Phoenix',\n" .
                "		'America/Chihuahua'				: 'America/Phoenix',\n" .
                "		'America/Dawson_Creek'			: 'America/Phoenix',\n" .
                "		'America/Denver'				: 'America/Phoenix',\n" .
                "		'America/Edmonton'				: 'America/Phoenix',\n" .
                "		'America/Hermosillo'			: 'America/Phoenix',\n" .
                "		'America/Inuvik'				: 'America/Phoenix',\n" .
                "		'America/Mazatlan'				: 'America/Mazatlan',\n" .
                "		'America/Phoenix'				: 'America/Phoenix',\n" .
                "		'America/Shiprock'				: 'America/Phoenix',\n" .
                "		'America/Yellowknife'			: 'America/Phoenix',\n" .
                "		'Canada/Mountain'				: 'America/Phoenix',\n" .
                "		'Etc/GMT+7'						: 'America/Phoenix',\n" .
                "		'MST'							: 'America/Phoenix',\n" .
                "		'MST7MDT'						: 'America/Phoenix',\n" .
                "		'Mexico/BajaSur'				: 'America/Phoenix',\n" .
                "		'Navajo'						: 'America/Phoenix',\n" .
                "		'PNT'							: 'America/Phoenix',\n" .
                "		'SystemV/MST7'					: 'America/Phoenix',\n" .
                "		'SystemV/MST7MDT'				: 'America/Phoenix',\n" .
                "		'US/Arizona'					: 'America/Phoenix',\n" .
                "		'US/Mountain'					: 'America/Phoenix',\n" .
                "	\n" .
                "		'GMT-06:00'						: 'America/Chicago',\n" .
                "		'America/Belize'				: 'America/Chicago',\n" .
                "		'America/Cancun'				: 'America/Chicago',\n" .
                "		'America/Chicago'				: 'America/Chicago',\n" .
                "		'America/Costa_Rica'			: 'America/Costa_Rica',\n" .
                "		'America/El_Salvador'			: 'America/Chicago',\n" .
                "		'America/Guatemala'				: 'America/Chicago',\n" .
                "		'America/Indiana/Knox'			: 'America/Chicago',\n" .
                "		'America/Indiana/Tell_City'		: 'America/Chicago',\n" .
                "		'America/Knox_IN'				: 'America/Chicago',\n" .
                "		'America/Managua'				: 'America/Chicago',\n" .
                "		'America/Menominee'				: 'America/Chicago',\n" .
                "		'America/Merida'				: 'America/Chicago',\n" .
                "		'America/Mexico_City'			: 'America/Mexico_City',\n" .
                "		'America/Monterrey'				: 'America/Chicago',\n" .
                "		'America/North_Dakota/Center'	: 'America/Chicago',\n" .
                "		'America/North_Dakota/New_Salem': 'America/Chicago',\n" .
                "		'America/Rainy_River'			: 'America/Chicago',\n" .
                "		'America/Rankin_Inlet'			: 'America/Chicago',\n" .
                "		'America/Regina'				: 'America/Chicago',\n" .
                "		'America/Swift_Current'			: 'America/Chicago',\n" .
                "		'America/Tegucigalpa'			: 'America/Chicago',\n" .
                "		'America/Winnipeg'				: 'America/Chicago',\n" .
                "		'CST'							: 'America/Chicago',\n" .
                "		'CST6CDT'						: 'America/Chicago',\n" .
                "		'Canada/Central'				: 'America/Chicago',\n" .
                "		'Canada/East-Saskatchewan'		: 'America/Chicago',\n" .
                "		'Canada/Saskatchewan'			: 'Canada/Saskatchewan',\n" .
                "		'Chile/EasterIsland'			: 'America/Chicago',\n" .
                "		'Etc/GMT+6'						: 'America/Chicago',\n" .
                "		'Mexico/General'				: 'America/Chicago',\n" .
                "		'Pacific/Easter'				: 'America/Chicago',\n" .
                "		'Pacific/Galapagos'				: 'America/Chicago',\n" .
                "		'SystemV/CST6'					: 'America/Chicago',\n" .
                "		'SystemV/CST6CDT'				: 'America/Chicago',\n" .
                "		'US/Central'					: 'America/Chicago',\n" .
                "		'US/Indiana-Starke'				: 'America/Chicago',\n" .
                "		\n" .
                "		'GMT-05:00'						: 'America/New_York',\n" .
                "		'America/Atikokan'				: 'America/New_York',\n" .
                "		'America/Bogota'				: 'America/Bogota',\n" .
                "		'America/Cayman'				: 'America/New_York',\n" .
                "		'America/Coral_Harbour'			: 'America/New_York',\n" .
                "		'America/Detroit'				: 'America/New_York',\n" .
                "		'America/Fort_Wayne'			: 'America/New_York',\n" .
                "		'America/Grand_Turk'			: 'America/New_York',\n" .
                "		'America/Guayaquil'				: 'America/New_York',\n" .
                "		'America/Havana'				: 'America/New_York',\n" .
                "		'America/Indiana/Indianapolis'	: 'America/Indiana/Indianapolis',\n" .
                "		'America/Indiana/Marengo'		: 'America/New_York',\n" .
                "		'America/Indiana/Petersburg'	: 'America/New_York',\n" .
                "		'America/Indiana/Vevay'			: 'America/New_York',\n" .
                "		'America/Indiana/Vincennes'		: 'America/New_York',\n" .
                "		'America/Indiana/Winamac'		: 'America/New_York',\n" .
                "		'America/Indianapolis'			: 'America/New_York',\n" .
                "		'America/Iqaluit'				: 'America/New_York',\n" .
                "		'America/Jamaica'				: 'America/New_York',\n" .
                "		'America/Kentucky/Louisville'	: 'America/New_York',\n" .
                "		'America/Kentucky/Monticello'	: 'America/New_York',\n" .
                "		'America/Lima'					: 'America/New_York',\n" .
                "		'America/Louisville'			: 'America/New_York',\n" .
                "		'America/Montreal'				: 'America/New_York',\n" .
                "		'America/Nassau'				: 'America/New_York',\n" .
                "		'America/New_York'				: 'America/New_York',\n" .
                "		'America/Nipigon'				: 'America/New_York',\n" .
                "		'America/Panama'				: 'America/New_York',\n" .
                "		'America/Pangnirtung'			: 'America/New_York',\n" .
                "		'America/Port-au-Prince'		: 'America/New_York',\n" .
                "		'America/Resolute'				: 'America/New_York',\n" .
                "		'America/Thunder_Bay'			: 'America/New_York',\n" .
                "		'America/Toronto'				: 'America/New_York',\n" .
                "		'Canada/Eastern'				: 'America/New_York',\n" .
                "		'Cuba'							: 'America/New_York',\n" .
                "		'EST'							: 'America/New_York',\n" .
                "		'EST5EDT'						: 'America/New_York',\n" .
                "		'Etc/GMT+5'						: 'America/New_York',\n" .
                "		'IET'							: 'America/New_York',\n" .
                "		'Jamaica'						: 'America/New_York',\n" .
                "		'SystemV/EST5'					: 'America/New_York',\n" .
                "		'SystemV/EST5EDT'				: 'America/New_York',\n" .
                "		'US/East-Indiana'				: 'America/New_York',\n" .
                "		'US/Eastern'					: 'America/New_York',\n" .
                "		'US/Michigan'					: 'America/New_York',\n" .
                "\n" .
                "		'GMT-04:30'						: 'America/Caracas',\n" .
                "		'America/Caracas'				: 'America/Caracas',\n" .
                "		\n" .
                "		'GMT-04:00'						: 'America/Santiago',\n" .
                "		'America/Anguilla'				: 'America/Santiago',\n" .
                "		'America/Antigua'				: 'America/Santiago',\n" .
                "		'America/Argentina/San_Luis'	: 'America/Santiago',\n" .
                "		'America/Aruba'					: 'America/Santiago',\n" .
                "		'America/Asuncion'				: 'America/Santiago',\n" .
                "		'America/Barbados'				: 'America/Santiago',\n" .
                "		'America/Blanc-Sablon'			: 'America/Santiago',\n" .
                "		'America/Boa_Vista'				: 'America/Santiago',\n" .
                "		'America/Campo_Grande'			: 'America/Santiago',\n" .
                "		'America/Cuiaba'				: 'America/Santiago',\n" .
                "		'America/Curacao'				: 'America/Santiago',\n" .
                "		'America/Dominica'				: 'America/Santiago',\n" .
                "		'America/Eirunepe'				: 'America/Santiago',\n" .
                "		'America/Glace_Bay'				: 'America/Santiago',\n" .
                "		'America/Goose_Bay'				: 'America/Santiago',\n" .
                "		'America/Grenada'				: 'America/Santiago',\n" .
                "		'America/Guadeloupe'			: 'America/Santiago',\n" .
                "		'America/Guyana'				: 'America/Santiago',\n" .
                "		'America/Halifax'				: 'America/Santiago',\n" .
                "		'America/La_Paz'				: 'America/La_Paz',\n" .
                "		'America/Manaus'				: 'America/Santiago',\n" .
                "		'America/Marigot'				: 'America/Santiago',\n" .
                "		'America/Martinique'			: 'America/Santiago',\n" .
                "		'America/Moncton'				: 'America/Santiago',\n" .
                "		'America/Montserrat'			: 'America/Santiago',\n" .
                "		'America/Port_of_Spain'			: 'America/Santiago',\n" .
                "		'America/Porto_Acre'			: 'America/Santiago',\n" .
                "		'America/Porto_Velho'			: 'America/Santiago',\n" .
                "		'America/Puerto_Rico'			: 'America/Santiago',\n" .
                "		'America/Rio_Branco'			: 'America/Santiago',\n" .
                "		'America/Santiago'				: 'America/Santiago',\n" .
                "		'America/Santo_Domingo'			: 'America/Santiago',\n" .
                "		'America/St_Barthelemy'			: 'America/Santiago',\n" .
                "		'America/St_Kitts'				: 'America/Santiago',\n" .
                "		'America/St_Lucia'				: 'America/Santiago',\n" .
                "		'America/St_Thomas'				: 'America/Santiago',\n" .
                "		'America/St_Vincent'			: 'America/Santiago',\n" .
                "		'America/Thule'					: 'America/Santiago',\n" .
                "		'America/Tortola'				: 'America/Santiago',\n" .
                "		'America/Virgin'				: 'America/Santiago',\n" .
                "		'Antarctica/Palmer'				: 'America/Santiago',\n" .
                "		'Atlantic/Bermuda'				: 'America/Santiago',\n" .
                "		'Atlantic/Stanley'				: 'America/Santiago',\n" .
                "		'Brazil/Acre'					: 'America/Santiago',\n" .
                "		'Brazil/West'					: 'America/Santiago',\n" .
                "		'Canada/Atlantic'				: 'America/Santiago',\n" .
                "		'Chile/Continental'				: 'America/Santiago',\n" .
                "		'Etc/GMT+4'						: 'America/Santiago',\n" .
                "		'PRT'							: 'America/Santiago',\n" .
                "		'SystemV/AST4'					: 'America/Santiago',\n" .
                "		'SystemV/AST4ADT'				: 'America/Santiago',	\n" .
                "		\n" .
                "		'GMT-03:30'						: 'Canada/Newfoundland', \n" .
                "		'America/St_Johns'				: 'Canada/Newfoundland',\n" .
                "		'CNT'							: 'Canada/Newfoundland',\n" .
                "		'Canada/Newfoundland'			: 'Canada/Newfoundland',\n" .
                "		\n" .
                "		'GMT-03:00'						: 'America/Buenos_Aires',\n" .
                "		'AGT'							: 'America/Buenos_Aires',\n" .
                "		'America/Araguaina'				: 'America/Buenos_Aires',\n" .
                "		'America/Argentina/Buenos_Aires': 'America/Buenos_Aires',\n" .
                "		'America/Argentina/Catamarca'	: 'America/Buenos_Aires',\n" .
                "		'America/Argentina/ComodRivadavia'	: 'America/Buenos_Aires',\n" .
                "		'America/Argentina/Cordoba'		: 'America/Buenos_Aires',\n" .
                "		'America/Argentina/Jujuy'		: 'America/Buenos_Aires',\n" .
                "		'America/Argentina/La_Rioja'	: 'America/Buenos_Aires',\n" .
                "		'America/Argentina/Mendoza'		: 'America/Buenos_Aires',\n" .
                "		'America/Argentina/Rio_Gallegos': 'America/Buenos_Aires',\n" .
                "		'America/Argentina/Salta'		: 'America/Buenos_Aires',\n" .
                "		'America/Argentina/San_Juan'	: 'America/Buenos_Aires',\n" .
                "		'America/Argentina/Tucuman'		: 'America/Buenos_Aires',\n" .
                "		'America/Argentina/Ushuaia'		: 'America/Buenos_Aires',\n" .
                "		'America/Bahia'					: 'America/Buenos_Aires',\n" .
                "		'America/Belem'					: 'America/Buenos_Aires',\n" .
                "		'America/Buenos_Aires'			: 'America/Buenos_Aires',\n" .
                "		'America/Catamarca'				: 'America/Buenos_Aires',\n" .
                "		'America/Cayenne'				: 'America/Buenos_Aires',\n" .
                "		'America/Cordoba'				: 'America/Buenos_Aires',\n" .
                "		'America/Fortaleza'				: 'America/Buenos_Aires',\n" .
                "		'America/Godthab'				: 'America/Buenos_Aires',\n" .
                "		'America/Jujuy'					: 'America/Buenos_Aires',\n" .
                "		'America/Maceio'				: 'America/Buenos_Aires',\n" .
                "		'America/Mendoza'				: 'America/Buenos_Aires',\n" .
                "		'America/Miquelon'				: 'America/Buenos_Aires',\n" .
                "		'America/Montevideo'			: 'America/Buenos_Aires',\n" .
                "		'America/Paramaribo'			: 'America/Buenos_Aires',\n" .
                "		'America/Recife'				: 'America/Buenos_Aires',\n" .
                "		'America/Rosario'				: 'America/Buenos_Aires',\n" .
                "		'America/Santarem'				: 'America/Buenos_Aires',\n" .
                "		'America/Sao_Paulo'				: 'America/Buenos_Aires',\n" .
                "		'Antarctica/Rothera'			: 'America/Buenos_Aires',\n" .
                "		'BET'							: 'America/Buenos_Aires',\n" .
                "		'Brazil/East'					: 'America/Buenos_Aires',\n" .
                "		'Etc/GMT+3'						: 'America/Buenos_Aires',\n" .
                "		\n" .
                "		'GMT-02:00'						: 'Etc/GMT+2',\n" .
                "		'America/Noronha'				: 'Etc/GMT+2',\n" .
                "		'Atlantic/South_Georgia'		: 'Etc/GMT+2',\n" .
                "		'Brazil/DeNoronha'				: 'Etc/GMT+2',\n" .
                "		'Etc/GMT+2'						: 'Etc/GMT+2',		\n" .
                "		\n" .
                "		'GMT-01:00'						: 'Atlantic/Azores',\n" .
                "		'America/Scoresbysund'			: 'Atlantic/Azores',\n" .
                "		'Atlantic/Azores'				: 'Atlantic/Azores',\n" .
                "		'Atlantic/Cape_Verde'			: 'Atlantic/Cape_Verde',\n" .
                "		'Etc/GMT+1'						: 'Atlantic/Azores',\n" .
                "		\n" .
                "		'GMT+00:00'						: 'Europe/London',\n" .
                "		'Africa/Abidjan'				: 'Africa/Casablanca',\n" .
                "		'Africa/Accra'					: 'Africa/Casablanca',\n" .
                "		'Africa/Bamako'					: 'Africa/Casablanca',\n" .
                "		'Africa/Banjul'					: 'Africa/Casablanca',\n" .
                "		'Africa/Bissau'					: 'Africa/Casablanca',\n" .
                "		'Africa/Casablanca'				: 'Africa/Casablanca',\n" .
                "		'Africa/Conakry'				: 'Africa/Casablanca',\n" .
                "		'Africa/Dakar'					: 'Africa/Casablanca',\n" .
                "		'Africa/El_Aaiun'				: 'Africa/Casablanca',\n" .
                "		'Africa/Freetown'				: 'Africa/Casablanca',\n" .
                "		'Africa/Lome'					: 'Africa/Casablanca',\n" .
                "		'Africa/Monrovia'				: 'Africa/Casablanca',\n" .
                "		'Africa/Nouakchott'				: 'Africa/Casablanca',\n" .
                "		'Africa/Ouagadougou'			: 'Africa/Casablanca',\n" .
                "		'Africa/Sao_Tome'				: 'Africa/Casablanca',\n" .
                "		'Africa/Timbuktu'				: 'Europe/London',\n" .
                "		'America/Danmarkshavn'			: 'Europe/London',\n" .
                "		'Atlantic/Canary'				: 'Europe/London',\n" .
                "		'Atlantic/Faeroe'				: 'Europe/London',\n" .
                "		'Atlantic/Faroe'				: 'Europe/London',\n" .
                "		'Atlantic/Madeira'				: 'Europe/London',\n" .
                "		'Atlantic/Reykjavik'			: 'Europe/London',\n" .
                "		'Atlantic/St_Helena'			: 'Europe/London',\n" .
                "		'Eire'							: 'Europe/London',\n" .
                "		'Etc/GMT'						: 'Europe/London',\n" .
                "		'Etc/GMT+0'						: 'Europe/London',\n" .
                "		'Etc/GMT-0'						: 'Europe/London',\n" .
                "		'Etc/GMT0'						: 'Europe/London',\n" .
                "		'Etc/Greenwich'					: 'Europe/London',\n" .
                "		'Etc/UCT'						: 'Europe/London',\n" .
                "		'Etc/UTC'						: 'Europe/London',\n" .
                "		'Etc/Universal'					: 'Europe/London',\n" .
                "		'Etc/Zulu'						: 'Europe/London',\n" .
                "		'Europe/Belfast'				: 'Europe/London',\n" .
                "		'Europe/Dublin'					: 'Europe/London',\n" .
                "		'Europe/Guernsey'				: 'Europe/London',\n" .
                "		'Europe/Isle_of_Man'			: 'Europe/London',\n" .
                "		'Europe/Jersey'					: 'Europe/London',\n" .
                "		'Europe/Lisbon'					: 'Europe/London',\n" .
                "		'Europe/London'					: 'Europe/London',\n" .
                "		'GB'							: 'Europe/London',\n" .
                "		'GB-Eire'						: 'Europe/London',\n" .
                "		'GMT'							: 'Europe/London',\n" .
                "		'GMT0'							: 'Europe/London',\n" .
                "		'Greenwich'						: 'Europe/London',\n" .
                "		'Iceland'						: 'Europe/London',\n" .
                "		'Portugal'						: 'Europe/London',\n" .
                "		'UCT'							: 'Europe/London',\n" .
                "		'UTC'							: 'Europe/London',\n" .
                "		'Universal'						: 'Europe/London',\n" .
                "		'WET'							: 'Europe/London',\n" .
                "		'Zulu'							: 'Europe/London',		\n" .
                "\n" .
                "		'GMT+01:00'						: 'Europe/Paris',\n" .
                "		'Africa/Algiers'				: 'Europe/Paris',\n" .
                "		'Africa/Bangui'					: 'Europe/Paris',\n" .
                "		'Africa/Brazzaville'			: 'Europe/Paris',\n" .
                "		'Africa/Ceuta'					: 'Europe/Paris',\n" .
                "		'Africa/Douala'					: 'Europe/Paris',\n" .
                "		'Africa/Kinshasa'				: 'Europe/Paris',\n" .
                "		'Africa/Lagos'					: 'Europe/Paris',\n" .
                "		'Africa/Libreville'				: 'Europe/Paris',\n" .
                "		'Africa/Luanda'					: 'Europe/Paris',\n" .
                "		'Africa/Malabo'					: 'Europe/Paris',\n" .
                "		'Africa/Ndjamena'				: 'Europe/Paris',\n" .
                "		'Africa/Niamey'					: 'Europe/Paris',\n" .
                "		'Africa/Porto-Novo'				: 'Europe/Paris',\n" .
                "		'Africa/Tunis'					: 'Europe/Paris',\n" .
                "		'Africa/Windhoek'				: 'Europe/Paris',\n" .
                "		'Arctic/Longyearbyen'			: 'Europe/Paris',\n" .
                "		'Atlantic/Jan_Mayen'			: 'Europe/Paris',\n" .
                "		'CET'							: 'Europe/Paris',\n" .
                "		'ECT'							: 'Europe/Paris',\n" .
                "		'Etc/GMT-1'						: 'Europe/Paris',\n" .
                "		'Europe/Amsterdam'				: 'Europe/Paris',\n" .
                "		'Europe/Andorra'				: 'Europe/Paris',\n" .
                "		'Europe/Belgrade'				: 'Europe/Paris',\n" .
                "		'Europe/Berlin'					: 'Europe/Paris',\n" .
                "		'Europe/Bratislava'				: 'Europe/Bratislava',\n" .
                "		'Europe/Brussels'				: 'Europe/Paris',\n" .
                "		'Europe/Budapest'				: 'Europe/Paris',\n" .
                "		'Europe/Copenhagen'				: 'Europe/Paris',\n" .
                "		'Europe/Gibraltar'				: 'Europe/Paris',\n" .
                "		'Europe/Ljubljana'				: 'Europe/Paris',\n" .
                "		'Europe/Luxembourg'				: 'Europe/Paris',\n" .
                "		'Europe/Madrid'					: 'Europe/Paris',\n" .
                "		'Europe/Malta'					: 'Europe/Paris',\n" .
                "		'Europe/Monaco'					: 'Europe/Paris',\n" .
                "		'Europe/Oslo'					: 'Europe/Paris',\n" .
                "		'Europe/Paris'					: 'Europe/Paris',\n" .
                "		'Europe/Podgorica'				: 'Europe/Paris',\n" .
                "		'Europe/Prague'					: 'Europe/Paris',\n" .
                "		'Europe/Rome'					: 'Europe/Paris',\n" .
                "		'Europe/San_Marino'				: 'Europe/Paris',\n" .
                "		'Europe/Sarajevo'				: 'Europe/Paris',\n" .
                "		'Europe/Skopje'					: 'Europe/Paris',\n" .
                "		'Europe/Stockholm'				: 'Europe/Paris',\n" .
                "		'Europe/Tirane'					: 'Europe/Paris',\n" .
                "		'Europe/Vaduz'					: 'Europe/Paris',\n" .
                "		'Europe/Vatican'				: 'Europe/Paris',\n" .
                "		'Europe/Vienna'					: 'Europe/Vienna',\n" .
                "		'Europe/Warsaw'					: 'Europe/Paris',\n" .
                "		'Europe/Zagreb'					: 'Europe/Zagreb',\n" .
                "		'Europe/Zurich'					: 'Europe/Paris',\n" .
                "		'MET'							: 'Europe/Paris',\n" .
                "		'Poland'						: 'Europe/Paris',\n" .
                "					\n" .
                "		'GMT+02:00' 					: 'Africa/Cairo',\n" .
                "		'ART' 							: 'Africa/Cairo',\n" .
                "		'Africa/Blantyre' 				: 'Africa/Cairo',\n" .
                "		'Africa/Bujumbura' 				: 'Africa/Cairo',\n" .
                "		'Africa/Cairo' 					: 'Africa/Cairo',\n" .
                "		'Africa/Gaborone' 				: 'Africa/Cairo',\n" .
                "		'Africa/Harare' 				: 'Africa/Harare',\n" .
                "		'Africa/Johannesburg' 			: 'Africa/Cairo',\n" .
                "		'Africa/Kigali' 				: 'Africa/Cairo',\n" .
                "		'Africa/Lubumbashi' 			: 'Africa/Cairo',\n" .
                "		'Africa/Lusaka' 				: 'Africa/Cairo',\n" .
                "		'Africa/Maputo' 				: 'Africa/Cairo',\n" .
                "		'Africa/Maseru' 				: 'Africa/Cairo',\n" .
                "		'Africa/Mbabane' 				: 'Africa/Cairo',\n" .
                "		'Africa/Tripoli' 				: 'Africa/Cairo',\n" .
                "		'Asia/Amman' 					: 'Asia/Jerusalem',\n" .
                "		'Asia/Beirut' 					: 'Asia/Jerusalem',\n" .
                "		'Asia/Damascus' 				: 'Asia/Jerusalem',\n" .
                "		'Asia/Gaza' 					: 'Asia/Jerusalem',\n" .
                "		'Asia/Istanbul' 				: 'Asia/Jerusalem',\n" .
                "		'Asia/Jerusalem' 				: 'Asia/Jerusalem',\n" .
                "		'Asia/Nicosia' 					: 'Asia/Jerusalem',\n" .
                "		'Asia/Tel_Aviv' 				: 'Asia/Jerusalem',\n" .
                "		'CAT' 							: 'Asia/Jerusalem',\n" .
                "		'EET' 							: 'Asia/Jerusalem',\n" .
                "		'Egypt' 						: 'Africa/Cairo',\n" .
                "		'Etc/GMT-2' 					: 'Europe/Athens',\n" .
                "		'Europe/Athens' 				: 'Europe/Athens',\n" .
                "		'Europe/Bucharest' 				: 'Europe/Bucharest',\n" .
                "		'Europe/Chisinau' 				: 'Europe/Athens',\n" .
                "		'Europe/Helsinki' 				: 'Europe/Helsinki',\n" .
                "		'Europe/Istanbul' 				: 'Europe/Athens',\n" .
                "		'Europe/Kaliningrad' 			: 'Europe/Athens',\n" .
                "		'Europe/Kiev' 					: 'Europe/Athens',\n" .
                "		'Europe/Mariehamn' 				: 'Europe/Athens',\n" .
                "		'Europe/Minsk' 					: 'Europe/Athens',\n" .
                "		'Europe/Nicosia' 				: 'Europe/Athens',\n" .
                "		'Europe/Riga' 					: 'Europe/Athens',\n" .
                "		'Europe/Simferopol' 			: 'Europe/Athens',\n" .
                "		'Europe/Sofia' 					: 'Europe/Athens',\n" .
                "		'Europe/Tallinn' 				: 'Europe/Athens',\n" .
                "		'Europe/Tiraspol' 				: 'Europe/Athens',\n" .
                "		'Europe/Uzhgorod' 				: 'Europe/Athens',\n" .
                "		'Europe/Vilnius' 				: 'Europe/Athens',\n" .
                "		'Europe/Zaporozhye' 			: 'Europe/Athens',\n" .
                "		'Israel' 						: 'Asia/Jerusalem',\n" .
                "		'Libya' 						: 'Europe/Athens',\n" .
                "		'Turkey' 						: 'Europe/Athens',\n" .
                "		\n" .
                "		'GMT+03:00' 					: 'Asia/Kuwait',\n" .
                "		'Africa/Addis_Ababa' 			: 'Africa/Nairobi',\n" .
                "		'Africa/Asmara' 				: 'Africa/Nairobi',\n" .
                "		'Africa/Asmera' 				: 'Africa/Nairobi',\n" .
                "		'Africa/Dar_es_Salaam' 			: 'Africa/Nairobi',\n" .
                "		'Africa/Djibouti' 				: 'Africa/Nairobi',\n" .
                "		'Africa/Kampala' 				: 'Africa/Nairobi',\n" .
                "		'Africa/Khartoum' 				: 'Africa/Nairobi',\n" .
                "		'Africa/Mogadishu' 				: 'Africa/Nairobi',\n" .
                "		'Africa/Nairobi' 				: 'Africa/Nairobi',\n" .
                "		'Antarctica/Syowa' 				: 'Asia/Kuwait',\n" .
                "		'Asia/Aden' 					: 'Asia/Kuwait',\n" .
                "		'Asia/Baghdad' 					: 'Asia/Baghdad',\n" .
                "		'Asia/Bahrain' 					: 'Asia/Kuwait',\n" .
                "		'Asia/Kuwait' 					: 'Asia/Kuwait',\n" .
                "		'Asia/Qatar' 					: 'Asia/Kuwait',\n" .
                "		'Asia/Riyadh' 					: 'Asia/Kuwait',\n" .
                "		'EAT' 							: 'Asia/Kuwait',\n" .
                "		'Etc/GMT-3' 					: 'Asia/Kuwait',\n" .
                "		'Europe/Moscow' 				: 'Europe/Moscow',\n" .
                "		'Europe/Volgograd' 				: 'Europe/Moscow',\n" .
                "		'Indian/Antananarivo' 			: 'Asia/Kuwait',\n" .
                "		'Indian/Comoro' 				: 'Asia/Kuwait',\n" .
                "		'Indian/Mayotte' 				: 'Asia/Kuwait',\n" .
                "		'W-SU' 							: 'Asia/Kuwait',\n" .
                "		\n" .
                "		'GMT+03:07' 					: 'Asia/Kuwait', // This timzezone does not exist in eFront\n" .
                "		'Asia/Riyadh87' 				: 'Asia/Kuwait', // This timzezone does not exist in eFront\n" .
                "		'Asia/Riyadh88' 				: 'Asia/Kuwait', // This timzezone does not exist in eFront\n" .
                "		'Asia/Riyadh89' 				: 'Asia/Kuwait', // This timzezone does not exist in eFront\n" .
                "		'Mideast/Riyadh87' 				: 'Asia/Kuwait', // This timzezone does not exist in eFront\n" .
                "		'Mideast/Riyadh88' 				: 'Asia/Kuwait', // This timzezone does not exist in eFront\n" .
                "		'Mideast/Riyadh89' 				: 'Asia/Kuwait', // This timzezone does not exist in eFront\n" .
                "		\n" .
                "		'GMT+03:30' 					: 'Asia/Tehran',\n" .
                "		'Asia/Tehran' 					: 'Asia/Tehran',\n" .
                "		'Iran' 							: 'Asia/Tehran',	\n" .
                "			\n" .
                "		'GMT+04:00' 					: 'Asia/Baku',\n" .
                "		'Asia/Baku' 					: 'Asia/Baku',\n" .
                "		'Asia/Dubai' 					: 'Asia/Baku',\n" .
                "		'Asia/Muscat' 					: 'Asia/Muscat',\n" .
                "		'Asia/Tbilisi' 					: 'Asia/Baku',\n" .
                "		'Asia/Yerevan' 					: 'Asia/Baku',\n" .
                "		'Etc/GMT-4' 					: 'Asia/Baku',\n" .
                "		'Europe/Samara' 				: 'Asia/Baku',\n" .
                "		'Indian/Mahe' 					: 'Asia/Baku',\n" .
                "		'Indian/Mauritius' 				: 'Asia/Baku',\n" .
                "		'Indian/Reunion' 				: 'Asia/Baku',\n" .
                "		'NET' 							: 'Asia/Baku',	\n" .
                "				\n" .
                "		'GMT+04:30' 					: 'Asia/Kabul',\n" .
                "		'Asia/Kabul' 					: 'Asia/Kabul',\n" .
                "	\n" .
                "		'GMT+05:00' 					: 'Asia/Karachi',\n" .
                "		'Asia/Aqtau' 					: 'Asia/Karachi',\n" .
                "		'Asia/Aqtobe' 					: 'Asia/Karachi',\n" .
                "		'Asia/Ashgabat' 				: 'Asia/Karachi',\n" .
                "		'Asia/Ashkhabad' 				: 'Asia/Karachi',\n" .
                "		'Asia/Dushanbe' 				: 'Asia/Karachi',\n" .
                "		'Asia/Karachi' 					: 'Asia/Karachi',\n" .
                "		'Asia/Oral' 					: 'Asia/Karachi',\n" .
                "		'Asia/Samarkand' 				: 'Asia/Karachi',\n" .
                "		'Asia/Tashkent' 				: 'Asia/Karachi',\n" .
                "		'Asia/Yekaterinburg' 			: 'Asia/Yekaterinburg',\n" .
                "		'Etc/GMT-5' 					: 'Asia/Karachi',\n" .
                "		'Indian/Kerguelen' 				: 'Asia/Karachi',\n" .
                "		'Indian/Maldives' 				: 'Asia/Karachi',\n" .
                "		'PLT' 							: 'Asia/Karachi',\n" .
                "		\n" .
                "		'GMT+05:30' 					: 'Asia/Calcutta',\n" .
                "		'Asia/Calcutta' 				: 'Asia/Calcutta',\n" .
                "		'Asia/Colombo' 					: 'Asia/Colombo',\n" .
                "		'Asia/Kolkata' 					: 'Asia/Calcutta',\n" .
                "		'IST' 							: 'Asia/Calcutta',		\n" .
                "	\n" .
                "		'GMT+05:45' 					: 'Asia/Kathmandu',\n" .
                "		'Asia/Kathmandu' 				: 'Asia/Kathmandu',\n" .
                "		'Asia/Katmandu' 				: 'Asia/Kathmandu',		\n" .
                "	\n" .
                "		'GMT+06:00' 					: 'Asia/Almaty',\n" .
                "		'Antarctica/Mawson' 			: 'Asia/Almaty',\n" .
                "		'Antarctica/Vostok' 			: 'Asia/Almaty',\n" .
                "		'Asia/Almaty' 					: 'Asia/Almaty',\n" .
                "		'Asia/Bishkek' 					: 'Asia/Almaty',\n" .
                "		'Asia/Dacca' 					: 'Asia/Almaty',\n" .
                "		'Asia/Dhaka' 					: 'Asia/Almaty',\n" .
                "		'Asia/Novosibirsk' 				: 'Asia/Novosibirsk',\n" .
                "		'Asia/Omsk' 					: 'Asia/Almaty',\n" .
                "		'Asia/Qyzylorda' 				: 'Asia/Almaty',\n" .
                "		'Asia/Thimbu' 					: 'Asia/Almaty',\n" .
                "		'Asia/Thimphu' 					: 'Asia/Almaty',\n" .
                "		'BST' 							: 'Asia/Almaty',\n" .
                "		'Etc/GMT-6' 					: 'Asia/Almaty',\n" .
                "		'Indian/Chagos' 				: 'Asia/Almaty',\n" .
                "\n" .
                "		'GMT+06:30' 					: 'Asia/Rangoon',\n" .
                "		'Asia/Rangoon' 					: 'Asia/Rangoon',\n" .
                "		'Indian/Cocos' 					: 'Asia/Rangoon',\n" .
                "	\n" .
                "		'GMT+07:00' 					: 'Asia/Bangkok',\n" .
                "		'Antarctica/Davis' 				: 'Asia/Bangkok',\n" .
                "		'Asia/Bangkok' 					: 'Asia/Bangkok',\n" .
                "		'Asia/Ho_Chi_Minh' 				: 'Asia/Bangkok',\n" .
                "		'Asia/Hovd' 					: 'Asia/Bangkok',\n" .
                "		'Asia/Jakarta' 					: 'Asia/Bangkok',\n" .
                "		'Asia/Krasnoyarsk' 				: 'Asia/Krasnoyarsk',\n" .
                "		'Asia/Phnom_Penh' 				: 'Asia/Bangkok',\n" .
                "		'Asia/Pontianak' 				: 'Asia/Bangkok',\n" .
                "		'Asia/Saigon' 					: 'Asia/Bangkok',\n" .
                "		'Asia/Vientiane' 				: 'Asia/Bangkok',\n" .
                "		'Etc/GMT-7' 					: 'Asia/Bangkok',\n" .
                "		'Indian/Christmas' 				: 'Asia/Bangkok',\n" .
                "		'VST' 							: 'Asia/Bangkok',	\n" .
                "		\n" .
                "		'GMT+08:00' 					: 'Asia/Singapore',\n" .
                "		'Antarctica/Casey' 				: 'Asia/Singapore',\n" .
                "		'Asia/Brunei' 					: 'Asia/Singapore',\n" .
                "		'Asia/Choibalsan' 				: 'Asia/Singapore',\n" .
                "		'Asia/Chongqing' 				: 'Asia/Singapore',\n" .
                "		'Asia/Chungking' 				: 'Asia/Singapore',\n" .
                "		'Asia/Harbin' 					: 'Asia/Singapore',\n" .
                "		'Asia/Hong_Kong' 				: 'Asia/Hong_Kong',\n" .
                "		'Asia/Irkutsk' 					: 'Asia/Irkutsk',\n" .
                "		'Asia/Kashgar' 					: 'Asia/Singapore',\n" .
                "		'Asia/Kuala_Lumpur' 			: 'Asia/Singapore',\n" .
                "		'Asia/Kuching' 					: 'Asia/Singapore',\n" .
                "		'Asia/Macao' 					: 'Asia/Singapore',\n" .
                "		'Asia/Macau' 					: 'Asia/Singapore',\n" .
                "		'Asia/Makassar' 				: 'Asia/Singapore',\n" .
                "		'Asia/Manila' 					: 'Asia/Singapore',\n" .
                "		'Asia/Shanghai' 				: 'Asia/Singapore',\n" .
                "		'Asia/Singapore' 				: 'Asia/Singapore',\n" .
                "		'Asia/Taipei' 					: 'Asia/Taipei',\n" .
                "		'Asia/Ujung_Pandang' 			: 'Asia/Singapore',\n" .
                "		'Asia/Ulaanbaatar' 				: 'Asia/Singapore',\n" .
                "		'Asia/Ulan_Bator' 				: 'Asia/Singapore',\n" .
                "		'Asia/Urumqi' 					: 'Asia/Singapore',\n" .
                "		'Australia/Perth' 				: 'Asia/Perth',\n" .
                "		'Australia/West' 				: 'Asia/Singapore',\n" .
                "		'CTT' 							: 'Asia/Singapore',\n" .
                "		'Etc/GMT-8' 					: 'Asia/Singapore',\n" .
                "		'Hongkong' 						: 'Asia/Singapore',\n" .
                "		'PRC' 							: 'Asia/Singapore',\n" .
                "		'Singapore' 					: 'Asia/Singapore',	\n" .
                "	\n" .
                "		'GMT+08:45' 					: 'Asia/Singapore', // This timzezone does not exist in eFront\n" .
                "		'Australia/Eucla' 				: 'Asia/Singapore', // This timzezone does not exist in eFront\n" .
                "\n" .
                "		'GMT+09:00' 					: 'Asia/Tokyo',\n" .
                "		'Asia/Dili' 					: 'Asia/Tokyo',\n" .
                "		'Asia/Jayapura' 				: 'Asia/Tokyo',\n" .
                "		'Asia/Pyongyang' 				: 'Asia/Tokyo',\n" .
                "		'Asia/Seoul' 					: 'Asia/Seoul',\n" .
                "		'Asia/Tokyo' 					: 'Asia/Tokyo',\n" .
                "		'Asia/Yakutsk' 					: 'Asia/Yakutsk',\n" .
                "		'Etc/GMT-9' 					: 'Asia/Tokyo',\n" .
                "		'JST' 							: 'Asia/Tokyo',\n" .
                "		'Japan' 						: 'Asia/Tokyo',\n" .
                "		'Pacific/Palau' 				: 'Asia/Tokyo',\n" .
                "		'ROK' 							: 'Asia/Tokyo',	\n" .
                "		\n" .
                "		'GMT+09:30' 					: 'Australia/Darwin',\n" .
                "		'ACT' 							: 'Australia/Darwin',\n" .
                "		'Australia/Adelaide' 			: 'Australia/Adelaide',\n" .
                "		'Australia/Broken_Hill' 		: 'Australia/Darwin',\n" .
                "		'Australia/Darwin' 				: 'Australia/Darwin',\n" .
                "		'Australia/North' 				: 'Australia/Darwin',\n" .
                "		'Australia/South' 				: 'Australia/Darwin',\n" .
                "		'Australia/Yancowinna' 			: 'Australia/Darwin',\n" .
                "	\n" .
                "		'GMT+10:00' 					: 'Australia/Canberra',\n" .
                "		'AET' 							: 'Australia/Canberra',\n" .
                "		'Antarctica/DumontDUrville' 	: 'Australia/Canberra',\n" .
                "		'Asia/Sakhalin' 				: 'Asia/Vladivostok',\n" .
                "		'Asia/Vladivostok' 				: '',\n" .
                "		'Australia/ACT' 				: 'Australia/Canberra',\n" .
                "		'Australia/Brisbane' 			: 'Australia/Brisbane',\n" .
                "		'Australia/Canberra' 			: 'Australia/Canberra',\n" .
                "		'Australia/Currie' 				: 'Australia/Canberra',\n" .
                "		'Australia/Hobart' 				: 'Australia/Hobart',\n" .
                "		'Australia/Lindeman' 			: 'Australia/Canberra',\n" .
                "		'Australia/Melbourne' 			: 'Australia/Canberra',\n" .
                "		'Australia/NSW' 				: 'Australia/Canberra',\n" .
                "		'Australia/Queensland' 			: 'Australia/Canberra',\n" .
                "		'Australia/Sydney' 				: 'Australia/Canberra',\n" .
                "		'Australia/Tasmania' 			: 'Australia/Canberra',\n" .
                "		'Australia/Victoria' 			: 'Australia/Canberra',\n" .
                "		'Etc/GMT-10' 					: 'Australia/Canberra',\n" .
                "		'Pacific/Guam' 					: 'Pacific/Guam',\n" .
                "		'Pacific/Port_Moresby' 			: 'Australia/Canberra',\n" .
                "		'Pacific/Saipan' 				: 'Australia/Canberra',\n" .
                "		'Pacific/Truk' 					: 'Australia/Canberra',\n" .
                "		'Pacific/Yap' 					: 'Australia/Canberra',\n" .
                "		\n" .
                "		'GMT+10:30' 					: 'Australia/Canberra', // This timzezone does not exist in eFront\n" .
                "		'Australia/LHI' 				: 'Australia/Canberra', // This timzezone does not exist in eFront\n" .
                "		'Australia/Lord_Howe' 			: 'Australia/Canberra', // This timzezone does not exist in eFront\n" .
                "			\n" .
                "		'GMT+11:00' 					: 'Asia/Magadan',\n" .
                "		'Asia/Magadan' 					: 'Asia/Magadan',\n" .
                "		'Etc/GMT-11' 					: 'Asia/Magadan',\n" .
                "		'Pacific/Efate' 				: 'Asia/Magadan',\n" .
                "		'Pacific/Guadalcanal' 			: 'Asia/Magadan',\n" .
                "		'Pacific/Kosrae' 				: 'Asia/Magadan',\n" .
                "		'Pacific/Noumea' 				: 'Asia/Magadan',\n" .
                "		'Pacific/Ponape' 				: 'Asia/Magadan',\n" .
                "		'SST' 							: 'Asia/Magadan',\n" .
                "		\n" .
                "		'GMT+11:30' 					: 'Asia/Magadan', // This timzezone does not exist in eFront\n" .
                "		'Pacific/Norfolk' 				: 'Asia/Magadan', // This timzezone does not exist in eFront\n" .
                "	\n" .
                "		'GMT+12:00' 					: 'Pacific/Auckland',\n" .
                "		'Antarctica/McMurdo' 			: 'Pacific/Auckland',\n" .
                "		'Antarctica/South_Pole' 		: 'Pacific/Auckland',\n" .
                "		'Asia/Anadyr' 					: 'Pacific/Auckland',\n" .
                "		'Asia/Kamchatka' 				: 'Pacific/Auckland',\n" .
                "		'Etc/GMT-12' 					: 'Pacific/Auckland',\n" .
                "		'Kwajalein' 					: 'Pacific/Auckland',\n" .
                "		'NST' 							: 'Pacific/Auckland',\n" .
                "		'NZ' 							: 'Pacific/Auckland',\n" .
                "		'Pacific/Auckland' 				: 'Pacific/Auckland',\n" .
                "		'Pacific/Fiji' 					: 'Pacific/Fiji',\n" .
                "		'Pacific/Funafuti' 				: 'Pacific/Auckland',\n" .
                "		'Pacific/Kwajalein' 			: 'Pacific/Kwajalein',\n" .
                "		'Pacific/Majuro' 				: 'Pacific/Auckland',\n" .
                "		'Pacific/Nauru' 				: 'Pacific/Auckland',\n" .
                "		'Pacific/Tarawa' 				: 'Pacific/Auckland',\n" .
                "		'Pacific/Wake' 					: 'Pacific/Auckland',\n" .
                "		'Pacific/Wallis' 				: 'Pacific/Auckland',	\n" .
                "		\n" .
                "		'GMT+12:45' 					: 'Pacific/Tongatapu', // This timzezone does not exist in eFront\n" .
                "		'NZ-CHAT' 						: 'Pacific/Tongatapu', // This timzezone does not exist in eFront\n" .
                "		'Pacific/Chatham' 				: 'Pacific/Tongatapu', // This timzezone does not exist in eFront\n" .
                "		\n" .
                "		'GMT+13:00' 					: 'Pacific/Tongatapu',\n" .
                "		'Etc/GMT-13' 					: 'Pacific/Tongatapu',\n" .
                "		'Pacific/Enderbury' 			: 'Pacific/Tongatapu',\n" .
                "		'Pacific/Tongatapu' 			: 'Pacific/Tongatapu',\n" .
                "		\n" .
                "		'GMT+14:00' 					: 'Pacific/Tongatapu', // This timzezone does not exist in eFront\n" .
                "		'Etc/GMT-14' 					: 'Pacific/Tongatapu', // This timzezone does not exist in eFront\n" .
                "		'Pacific/Kiritimati' 			: 'Pacific/Tongatapu' // This timzezone does not exist in eFront\n" .
                "	}\n" .
                "\n" .
                "	return vLab2eFrontTimezones;\n" .
                "}\n" .
                "\n" .
                "/*\n" .
                " * *********************************\n" .
                " * Returns true, if values are valid\n" .
                " * *********************************\n" .
                " */\n" .
                "function validateProfileForm(frm) {\n" .
                "	retVal = false;\n" .
                "	done = false;\n" .
                "\n" .
				"	isAddUser = frm.elements['IS_ADD_USER'].value;\n;" .
//				"	if (isAddUser) {\n" .
//				"		alert('IS_ADD_USER is true');\n" .
//				"	} \n" .
//                "	alert(\"form elements: \\n\" +\n" .
//                "		'login		: ' + frm.elements['login'].value 		+ \" \\n\" +\n" .
//                "		'password	: ' + frm.elements['password'].value 	+ \" \\n\" +\n" .
//                "		'passrepeat	: ' + frm.elements['passrepeat'].value 	+ \" \\n\" +\n" .
//                "		'name		: ' + frm.elements['name'].value 		+ \" \\n\" +\n" .
//                "		'surname	: ' + frm.elements['surname'].value 	+ \" \\n\" +\n" .
//                "		'email		: ' + frm.elements['email'].value 		+ \" \\n\" +\n" .
//                "		'timezone	: ' + frm.elements['timezone'].value 	+ \" \\n\" +\n" .
//                "		'comments	: ' + frm.elements['comments'].value	+ \" \\n\" \n" .
//                "	);\n" .
                "	\n" .
                "	username 	= frm.elements['login'].value		;\n" .
                "	password 	= frm.elements['password'].value	;\n" .
                "   email 		= frm.elements['email'].value	;\n" .
//                "    alert(\"Values: \\n\" + \n" .
//                "		'username: ' + username	+ \" \\n\" +\n" .
//                "		'password: ' + password	+ \" \\n\" +\n" .
//                "		'email   : ' + email	+ \" \\n\" \n" .
//                "	);\n" .
                "	\n" .
//                "	vLabURL = 'http://localhost/moodle19/';\n" .
//                "	vLabURL = 'http://ita-portal.cis.fiu.edu/';\n" .
                "	vLabURL = '" . VLAB_LMS_ROOT . "';\n" .
                "	wscallsURL = vLabURL + 'mod/deva/php/virtuallabs-wscalls.php';\n" .
//                "	alert('wscallsURL: ' + wscallsURL);\n" .
                "	\n" .
                "	if (!done && isAddUser && (username != '')) {\n" .
//                "		alert('Looking for a vLab record with username ' + username + ' ...');\n" .
                "    	jQuery.ajax({\n" .
                "    		type: 'POST',\n" .
                "    		url: wscallsURL,\n" .
                "    		dataType: 'json',\n" .
                "    		async: false,\n" .
                "    		timeout: 4000,\n" .
                "    		data: {\n" .
                "    			action: 'getUserProfileByUsername',\n" .
                "    			username: username\n" .
                "    		},\n" .
                "    		success: function(userProfile){\n" .
//                "				alert('function was called successfully');\n" .
                "    			var message = '';\n" .
                "   	 \n" .
                "   	 		if (userProfile != null) {\n" .
//                "					alert('userProfile is not null!');\n" .
                "					if (userProfile.success) {\n" .
//                "						alert(\"userProfile: \\n\" +\n" .
//                "							'userProfile.userName		: ' + userProfile.userName 		+ \" \\n\" +\n" .
//                "							'userProfile.password		: ' + userProfile.password 		+ \" \\n\" +\n" .
//                "							'userProfile.firstNmae		: ' + userProfile.firstName 	+ \" \\n\" +\n" .
//                "							'userProfile.lastName		: ' + userProfile.lastName 		+ \" \\n\" +\n" .
//                "							'userProfile.emailAddress	: ' + userProfile.emailAddress 	+ \" \\n\" +\n" .
//                "							'userProfile.userRole		: ' + userProfile.timeZone 		+ \" \\n\" +\n" .
//                "							'userProfile.timeZone		: ' + userProfile.userRole 		+ \" \\n\" +\n" .
//                "							'userProfile.contactInfo	: ' + userProfile.contactInfo 	+ \" \\n\" \n" .
//                "						);\n" .
                "						\n" .
                "						if ((userProfile.userName 		== frm.elements['login'].value			) &&\n" .
                "							(userProfile.password 		== frm.elements['password'].value		) &&\n" .
                "							(userProfile.emailAddress 	== frm.elements['email'].value)\n" .
                "						) {\n" .
//                "							alert('This user was previously registered in vLab and the login, password, and email match with the vLab record.');\n" .
                "							retVal = true;\n" .
                "							done = true;\n" .
                "						} else {\n" .
//                "							alert('This user was previously registered in vLab and the login, password, and email does not match with the vLab record.');\n" .
                "							alert(\"This user has an account in IT Scholars as follows: \\n\" +\n" .
//               "							alert(\"The user\\'s vLab profile content is as follows: \\n\" +\n" .
                "								'userName		: ' + userProfile.userName 		+ \" \\n\" +\n" .
//                "								'password		: ' + userProfile.password 		+ \" \\n\" +\n" .
                "								'firstNmae		: ' + userProfile.firstName 	+ \" \\n\" +\n" .
                "								'lastName		: ' + userProfile.lastName 		+ \" \\n\" +\n" .
                "								'emailAddress	: ' + userProfile.emailAddress 	+ \" \\n\" +\n" .
                "								'timeZone		: ' + userProfile.timeZone 		+ \" \\n\" \n" .
//                "								'userRole		: ' + userProfile.userRole 		+ \" \\n\" +\n" .
//                "								'contactInfo	: ' + userProfile.contactInfo 	+ \" \\n\" \n" .
                "							);	\n" .
                "	\n" .
                "							vLab2eFrontTimezones = geteFront2vLabTimezones();\n" .
                "   	 \n" .
                "							frm.elements['login'].value 		= userProfile.userName 		;\n" .
                "							frm.elements['password'].value 		= userProfile.password 		;\n" .
                "							frm.elements['passrepeat'].value 	= userProfile.password 		;\n" .
                "							frm.elements['name'].value 			= userProfile.firstName 	;\n" .
                "							frm.elements['surname'].value		= userProfile.lastName 		;\n" .
                "							frm.elements['email'].value 		= userProfile.emailAddress 	;\n" .
                "							frm.elements['timezone'].value 		= vLab2eFrontTimezones[userProfile.timeZone];\n" .
                "							\n" .
//                "							alert(\"form elements: \\n\" +\n" .
//                "								'login		: ' + frm.elements['login'].value 		+ \" \\n\" +\n" .
//                "								'password	: ' + frm.elements['password'].value 	+ \" \\n\" +\n" .
//                "								'passrepeat	: ' + frm.elements['passrepeat'].value 	+ \" \\n\" +\n" .
//                "								'name		: ' + frm.elements['name'].value 		+ \" \\n\" +\n" .
//                "								'surname	: ' + frm.elements['surname'].value 	+ \" \\n\" +\n" .
//                "								'email		: ' + frm.elements['email'].value 		+ \" \\n\" +\n" .
//                "								'timezone	: ' + frm.elements['timezone'].value 	+ \" \\n\" +\n" .
//                "								'comments	: ' + frm.elements['comments'].value	+ \" \\n\" \n" .
//                "							);\n" .
                "							\n" .
                "							retVal = true;\n" .
                "							done = true;\n" .
                "						}\n" .
                "						\n" .
                "					} else {\n" .
//                "						alert('This user did not have a pre-existing record in vLab with username/password/email as ' + username + '/' + password + '/' + email);\n" .
                "						retVal = true;\n" .
                "						done = false;\n" .
                "					}\n" .
                "    			} else {\n" .
//                "					alert('This user did not have a pre-existing record in vLab with username/password/email as ' + username + '/' + password + '/' + email);\n" .
                "					retVal = true;\n" .
                "					done = false;\n" .
                "				}\n" .
                "    			\n" .
                "    		},\n" .
                "    		error: function(XMLHttpRequest, textStatus, errorThrown){\n" .
                "    			alert('error:' + textStatus + 'errorThrown: ' + errorThrown);\n" .
                "    		}\n" .
                "    	});\n" .
                "	}\n" .
                "	\n" .
                "	if (!done && (email != '')) {\n" .
//                "		alert('Looking for a vLab record with email ' + email + ' ...');\n" .
                "    	jQuery.ajax({\n" .
                "    		type: 'POST',\n" .
                "    		url: wscallsURL,\n" .
                "    		dataType: 'json',\n" .
                "    		async: false,\n" .
                "    		timeout: 4000,\n" .
                "    		data: {\n" .
                "    			action: 'getUserProfileByEmail',\n" .
                "    			email: email\n" .
                "    		},\n" .
                "    		success: function(userProfile){\n" .
//                "				alert('function was called successfully');\n" .
                "    			var message = '';\n" .
                "   	 \n" .
                "   	 		if (userProfile != null) {\n" .
//                "					alert('userProfile is not null!');\n" .
                "					if (userProfile.success) {\n" .
//                "						alert(\"userProfile: \\n\" +\n" .
//                "							'userProfile.userName		: ' + userProfile.userName 		+ \" \\n\" +\n" .
//                "							'userProfile.password		: ' + userProfile.password 		+ \" \\n\" +\n" .
//                "							'userProfile.firstNmae		: ' + userProfile.firstName 	+ \" \\n\" +\n" .
//                "							'userProfile.lastName		: ' + userProfile.lastName 		+ \" \\n\" +\n" .
//                "							'userProfile.emailAddress	: ' + userProfile.emailAddress 	+ \" \\n\" +\n" .
//                "							'userProfile.userRole		: ' + userProfile.timeZone 		+ \" \\n\" +\n" .
//                "							'userProfile.timeZone		: ' + userProfile.userRole 		+ \" \\n\" +\n" .
//                "							'userProfile.contactInfo	: ' + userProfile.contactInfo 	+ \" \\n\" \n" .
//                "						);\n" .
                "						\n" .
                "						if (!isAddUser &&\n" .
				"							(userProfile.userName 		!= frm.elements['login'].value			) &&\n" .
                "							(userProfile.emailAddress 	== frm.elements['email'].value)) {\n" .
                "							alert('You must use another email!' + \" \\n\" +\n" .
				"								'This email (' + userProfile.emailAddress + ') is already in use in vLab by the following user:' + \" \\n\" +\n" .
                "								'userName		: ' + userProfile.userName 		+ \" \\n\" +\n" .
//                "								'password		: ' + userProfile.password 		+ \" \\n\" +\n" .
                "								'firstNmae		: ' + userProfile.firstName 	+ \" \\n\" +\n" .
                "								'lastName		: ' + userProfile.lastName 		+ \" \\n\" +\n" .
                "								'emailAddress	: ' + userProfile.emailAddress 	+ \" \\n\" +\n" .
                "								'timeZone		: ' + userProfile.timeZone 		+ \" \\n\" \n" .
//                "								'userRole		: ' + userProfile.userRole 		+ \" \\n\" +\n" .
//                "								'contactInfo	: ' + userProfile.contactInfo 	+ \" \\n\" \n" .
				"							);\n" .
                "							frm.elements['email'].value 		= 'Please enter another email!';\n" .
                "							retVal = false;\n" .
                "							done = true;\n" .
				"						} else if (!isAddUser &&\n" .
				"							(userProfile.userName 		== frm.elements['login'].value			) &&\n" .
                "							(userProfile.emailAddress 	== frm.elements['email'].value			)) {\n" .
//                "							alert('This user was previously registered in vLab and the login and email match with the vLab record.');\n" .
				"							if ((userProfile.password != frm.elements['password'].value) && (frm.elements['password'].value != '')) {\n" .
				"								alert('Note that synchronizing the new password may take about 5 minutes. Please be patient ...');\n" .
				"							}\n" .
                "							retVal = true;\n" .
                "							done = true;\n" .
				"						} else if (isAddUser &&\n" .
				"							(userProfile.userName 		== frm.elements['login'].value			) &&\n" .
                "							(userProfile.password 		== frm.elements['password'].value		) &&\n" .
                "							(userProfile.emailAddress 	== frm.elements['email'].value			)) {\n" .
//                "							alert('This user was previously registered in vLab and the login, password, and email match with the vLab record.');\n" .
                "							retVal = true;\n" .
                "							done = true;\n" .
                "						} else if (isAddUser) {\n" .
//                "							alert('This user was previously registered in vLab and the login, password, and email does not match with the vLab record.');\n" .
                "							alert(\"This user has an account in IT Scholars as follows: \\n\" +\n" .
//                "							alert(\"The user\\'s vLab profile content is as follows: \\n\" +\n" .
                "								'userName		: ' + userProfile.userName 		+ \" \\n\" +\n" .
//                "								'password		: ' + userProfile.password 		+ \" \\n\" +\n" .
                "								'firstNmae		: ' + userProfile.firstName 	+ \" \\n\" +\n" .
                "								'lastName		: ' + userProfile.lastName 		+ \" \\n\" +\n" .
                "								'emailAddress	: ' + userProfile.emailAddress 	+ \" \\n\" +\n" .
                "								'timeZone		: ' + userProfile.timeZone 		+ \" \\n\" \n" .
//                "								'userRole		: ' + userProfile.userRole 		+ \" \\n\" +\n" .
//                "								'contactInfo	: ' + userProfile.contactInfo 	+ \" \\n\" \n" .
                "							);	\n" .
                "	\n" .
                "							vLab2eFrontTimezones = geteFront2vLabTimezones();\n" .
                "   	 \n" .
                "							frm.elements['login'].value 		= userProfile.userName 		;\n" .
                "							frm.elements['password'].value 	= userProfile.password 		;\n" .
                "							frm.elements['passrepeat'].value 	= userProfile.password 		;\n" .
                "							frm.elements['name'].value 			= userProfile.firstName 	;\n" .
                "							frm.elements['surname'].value		= userProfile.lastName 		;\n" .
                "							frm.elements['email'].value 		= userProfile.emailAddress 	;\n" .
                "							frm.elements['timezone'].value 		= vLab2eFrontTimezones[userProfile.timeZone];\n" .
                "							\n" .
//                "							alert(\"form elements: \\n\" +\n" .
//                "								'login		: ' + frm.elements['login'].value 		+ \" \\n\" +\n" .
//                "								'password	: ' + frm.elements['password'].value 	+ \" \\n\" +\n" .
//                "								'passrepeat	: ' + frm.elements['passrepeat'].value 	+ \" \\n\" +\n" .
//                "								'name		: ' + frm.elements['name'].value 		+ \" \\n\" +\n" .
//                "								'surname	: ' + frm.elements['surname'].value 	+ \" \\n\" +\n" .
//                "								'email		: ' + frm.elements['email'].value 		+ \" \\n\" +\n" .
//                "								'timezone	: ' + frm.elements['timezone'].value 	+ \" \\n\" +\n" .
//                "								'comments	: ' + frm.elements['comments'].value	+ \" \\n\" \n" .
//                "							);\n" .
                "							\n" .
                "							retVal = true;\n" .
                "							done = true;\n" .
                "						}\n" .
                "						\n" .
                "					} else {\n" .
//                "						alert('This user did not have a pre-existing record in vLab with username/password/email as ' + username + '/' + password + '/' + email);\n" .
                "						retVal = true;\n" .
                "						done = false;\n" .
                "					}\n" .
                "    			} else {\n" .
//                "					alert('This user did not have a pre-existing record in vLab with username/password/email as ' + username + '/' + password + '/' + email);\n" .
                "					retVal = true;\n" .
                "					done = false;\n" .
                "				}\n" .
                "    			\n" .
                "    		},\n" .
                "    		error: function(XMLHttpRequest, textStatus, errorThrown){\n" .
                "    			alert('error:' + textStatus + 'errorThrown: ' + errorThrown);\n" .
                "    		}\n" .
                "    	});\n" .
                "	}\n" .
                "\n" .
//                "	alert('done is ' + done + ' and retVal is ' + retVal);\n" .
                "	\n" .
                "	// done = true;\n" .
                "	// return retVal;\n" .
                "	\n" .
                "	\n" .
                "  return retVal;\n" .
                "}\n" .
                "\n" .
                "/*\n" .
                " * *********************************\n" .
                " * Returns true, if values are valid\n" .
                " * *********************************\n" .
                " */\n" .
                "function validateSignupForm(frm) {\n" .
                "	retVal = false;\n" .
                "	done = false;\n" .
                "	\n" .
                "	username 	= frm.elements['login'].value		;\n" .
                "	password 	= frm.elements['password'].value	;\n" .
                "   email 		= frm.elements['email'].value	;\n" .
                "	\n" .
//                "	vLabURL = 'http://localhost/moodle19/';\n" .
//                "	vLabURL = 'http://ita-portal.cis.fiu.edu/';\n" .
                "	vLabURL = '" . VLAB_LMS_ROOT . "';\n" .
                "	wscallsURL = vLabURL + 'mod/deva/php/virtuallabs-wscalls.php';\n" .
//                "	alert('wscallsURL: ' + wscallsURL);\n" .
                "	\n" .
                "	if (!done && (username != '')) {\n" .
//                "		alert('Looking for a vLab record with username ' + username + ' ...');\n" .
                "    	jQuery.ajax({\n" .
                "    		type: 'POST',\n" .
                "    		url: wscallsURL,\n" .
                "    		dataType: 'json',\n" .
                "    		async: false,\n" .
                "    		timeout: 4000,\n" .
                "    		data: {\n" .
                "    			action: 'getUserProfileByUsername',\n" .
                "    			username: username\n" .
                "    		},\n" .
                "    		success: function(userProfile){\n" .
//                "				alert('function was called successfully');\n" .
                "    			var message = '';\n" .
                "   	 \n" .
                "   	 		if (userProfile != null) {\n" .
//                "					alert('userProfile is not null!');\n" .
                "					if (userProfile.success) {\n" .
                "						if ((userProfile.userName 		== frm.elements['login'].value) &&\n" .
                "							(userProfile.emailAddress 	== frm.elements['email'].value)\n" .
                "						) {\n" .
//                "							alert('This user was previously registered in vLab and the login and email match with the vLab record.');\n" .
                "							retVal = true;\n" .
                "							done = true;\n" .
                "						} else {\n" .
                "							alert('The login, ' + userProfile.userName + ', is NOT available!');\n" .
                "							frm.elements['login'].value 		= '';\n" .
                "							retVal = false;\n" .
                "							done = true;\n" .
                "						}\n" .
                "						\n" .
                "					} else {\n" .
//                "						alert('This user did not have a pre-existing record in vLab with username/password/email as ' + username + '/' + password + '/' + email);\n" .
                "						retVal = true;\n" .
                "						done = false;\n" .
                "					}\n" .
                "    			} else {\n" .
//                "					alert('This user did not have a pre-existing record in vLab with username/password/email as ' + username + '/' + password + '/' + email);\n" .
                "					retVal = true;\n" .
                "					done = false;\n" .
                "				}\n" .
                "    			\n" .
                "    		},\n" .
                "    		error: function(XMLHttpRequest, textStatus, errorThrown){\n" .
                "    			alert('error:' + textStatus + 'errorThrown: ' + errorThrown);\n" .
                "    		}\n" .
                "    	});\n" .
                "	}\n" .
                "	\n" .
                "	if (!done && (email != '')) {\n" .
//                "		alert('Looking for a vLab record with email ' + email + ' ...');\n" .
                "    	jQuery.ajax({\n" .
                "    		type: 'POST',\n" .
                "    		url: wscallsURL,\n" .
                "    		dataType: 'json',\n" .
                "    		async: false,\n" .
                "    		timeout: 4000,\n" .
                "    		data: {\n" .
                "    			action: 'getUserProfileByEmail',\n" .
                "    			email: email\n" .
                "    		},\n" .
                "    		success: function(userProfile){\n" .
//                "				alert('function was called successfully');\n" .
                "    			var message = '';\n" .
                "   	 \n" .
                "   	 		if (userProfile != null) {\n" .
//                "					alert('userProfile is not null!');\n" .
                "					if (userProfile.success) {\n" .
                "						if ((userProfile.userName 		!= frm.elements['login'].value			) &&\n" .
                "							(userProfile.emailAddress 	== frm.elements['email'].value)) {\n" .
                "							alert('The email, ' + userProfile.emailAddress + ', is not available! ' +\n" .
                "								'To proceed, you have the following options:' + \" \\n\" +\n" .
                "								'	1) Simply use another email.' + \" \\n\" +\n" .
                "								'	2) If you remember your username and password from IT Scholars, use them together with ' + userProfile.emailAddress + '.'\n" .
				"							);\n" .
                "							frm.elements['email'].value 		= 'Please enter another email or use your IT Scholars username/password that is associated with ' + userProfile.emailAddress + '.';\n" .
                "							retVal = false;\n" .
                "							done = true;\n" .
				"						} else {\n" .
                "							retVal = true;\n" .
                "							done = true;\n" .
                "						}\n" .
                "					} else {\n" .
//                "						alert('This user did not have a pre-existing record in vLab with username/password/email as ' + username + '/' + password + '/' + email);\n" .
                "						retVal = true;\n" .
                "						done = false;\n" .
                "					}\n" .
                "    			} else {\n" .
//                "					alert('This user did not have a pre-existing record in vLab with username/password/email as ' + username + '/' + password + '/' + email);\n" .
                "					retVal = true;\n" .
                "					done = false;\n" .
                "				}\n" .
                "    			\n" .
                "    		},\n" .
                "    		error: function(XMLHttpRequest, textStatus, errorThrown){\n" .
                "    			alert('error:' + textStatus + 'errorThrown: ' + errorThrown);\n" .
                "    		}\n" .
                "    	});\n" .
                "	}\n" .
                "\n" .
//                "	alert('done is ' + done + ' and retVal is ' + retVal);\n" .
                "	\n" .
                "  return retVal;\n" .
                "}\n" .
                "\n" .
				"function print_r(arr,level) {\n" .
                "	var dumped_text = '';\n" .
                "	if(!level) level = 0;\n" .
                "	\n" .
                "	//The padding given at the beginning of the line.\n" .
                "	var level_padding = '';\n" .
                "	for(var j=0;j<level+1;j++) level_padding += '    ';\n" .
                "	if(typeof(arr) == 'object') { //Array/Hashes/Objects \n" .
                "		for(var item in arr) {\n" .
                "			var value = arr[item];\n" .
                "			\n" .
                "			if(typeof(value) == 'object') { //If it is an array,\n" .
                "				dumped_text += level_padding + \"\'\" + item + \"' ...\\n\";\n" .
                "				dumped_text += print_r(value,level+1);\n" .
                "			} else {\n" .
                "				dumped_text += level_padding + \"\'\" + item + \"\' => \\\"\" + value + \"\\\"\\n\";\n" .
                "			}\n" .
                "		}\n" .
                "	} else { //Stings/Chars/Numbers etc.\n" .
                "		dumped_text = \"===>\"+arr+\"<===(\"+typeof(arr)+\")\";\n" .
                "	}\n" .
                "	return dumped_text;\n" .
                "}\n" .
                "//<![CDATA[\n" .
//                 "function validate_user_form(frm) {\n" .
                "function validate_" . $this->_attributes['id'] . "(frm) {\n" .
                "	\n" .
	            "	retVal = true;\n" .
				"	isProfileForm = frm.elements['IS_PROFILE_FORM'].value;\n" .
				"	if (isProfileForm) {\n" .
//				"		alert('IS_PROFILE_FORM is true');\n" .
				"		retVal = validateProfileForm(frm); \n" .
				"		if (retVal) {\n" .
				"			userType = frm.elements['user_type'].value;\n;" .
				"			valueOfInvalidUserType = frm.elements['VALUE_OF_INVALID_USER_TYPE'].value;\n;" .
//				"			alert('userType ' + userType + ' and valueOfInvalidUserType is ' + valueOfInvalidUserType);\n" .
				"			if (userType == valueOfInvalidUserType) {;\n" .
				"				alert('Invalid user type! Please choose a valid user type.');\n" .
                "				retVal = false;\n" .
                "				done = true;\n" .
				"			} \n" .
				"		} \n" . 
				"	} \n" .
				"	isSignupForm = frm.elements['IS_SIGNUP_FORM'].value;\n" .
				"	if (isSignupForm) {\n" .
//				"		alert('IS_SIGNUP_FORM is true');\n" .
				"		retVal = validateSignupForm(frm); \n" .
				"	} \n" .
				"	\n" .
				"	if (!retVal) \n" .
				"		return retVal; \n" .
				"	\n" .
                "  var value = '';\n" .
                "  var errFlag = new Array();\n" .
                "  var _qfGroups = {};\n" .
                "  _qfMsg = '';\n\n" .
                join("\n", $test) .
                "\n  if (_qfMsg != '') {\n" .
                "    _qfMsg = '" . strtr($this->_jsPrefix, $js_escape) . "' + _qfMsg;\n" .
                "    _qfMsg = _qfMsg + '\\n" . strtr($this->_jsPostfix, $js_escape) . "';\n" .
                "    alert(_qfMsg);\n" .
                "    return false;\n" .
                "  }\n" .
                "  return true;\n" .
                "}\n" .
                "//]]>\n" .
                "</script>";
        }
        return '';
    } // end func getValidationScript

    // }}}
    // {{{ setIsAddUser()

    /**
     * Sets the value of IS_ADD_USER hidden element
     *
     * @param     boolean
     * @access    public
     * @return    void
     */
    function setIsAddUser($isAddUser)
    {
        $this->_isAddUser = $isAddUser;
        if (!$this->elementExists('IS_ADD_USER')) {
            $this->addElement('hidden', 'IS_ADD_USER', $this->_isAddUser);
        } else {
            $el = $this->getElement('IS_ADD_USER');
            $el->updateAttributes(array('value' => $this->_isAddUser));
        }
		
    } // end func setIsAddUser

    // }}}
    // {{{ getIsAddUser()

    /**
     * Returns the value of IS_ADD_USER hidden element
     *
     * @access    public
     * @return    boolean is add user
     */
    function getIsAddUser()
    {
        return $this->_isAddUser;
    } // end func getIsAddUser

    // }}}

    // {{{ setIsSignupForm()

    /**
     * Sets the value of IS_SIGNUP_FORM hidden element
     *
     * @param     boolean
     * @access    public
     * @return    void
     */
    function setIsSignupForm($isSignupForm)
    {
        $this->_isSignupForm = $isSignupForm;
        if (!$this->elementExists('IS_SIGNUP_FORM')) {
            $this->addElement('hidden', 'IS_SIGNUP_FORM', $this->_isSignupForm);
        } else {
            $el = $this->getElement('IS_SIGNUP_FORM');
            $el->updateAttributes(array('value' => $this->_isSignupForm));
        }
		
    } // end func setIsSignupForm

    // }}}
    // {{{ getIsSignupForm()

    /**
     * Returns the value of IS_SIGNUP_FORM hidden element
     *
     * @access    public
     * @return    boolean is add user
     */
    function getIsSignupForm()
    {
        return $this->_isSignupForm;
    } // end func getIsSignupForm

    // }}}

    // {{{ setIsProfileForm()

    /**
     * Sets the value of IS_PROFILE_FORM hidden element
     *
     * @param     boolean
     * @access    public
     * @return    void
     */
    function setIsProfileForm($isProfileForm)
    {
        $this->_isProfileForm = $isProfileForm;
        if (!$this->elementExists('IS_PROFILE_FORM')) {
            $this->addElement('hidden', 'IS_PROFILE_FORM', $this->_isProfileForm);
        } else {
            $el = $this->getElement('IS_PROFILE_FORM');
            $el->updateAttributes(array('value' => $this->_isProfileForm));
        }
		
    } // end func setIsProfileForm

    // }}}
    // {{{ getIsProfileForm()

    /**
     * Returns the value of IS_PROFILE_FORM hidden element
     *
     * @access    public
     * @return    boolean is add user
     */
    function getIsProfileForm()
    {
        return $this->_isProfileForm;
    } // end func getIsProfileForm

    // }}}

    // {{{ setValueOfInvalidUserType()

    /**
     * Sets the value of VALUE_OF_INVALID_USER_TYPE hidden element
     *
     * @param     boolean
     * @access    public
     * @return    void
     */
    function setValueOfInvalidUserType($valueOfInvalidUserType)
    {
        $this->_valueOfInvalidUserType = $valueOfInvalidUserType;
        if (!$this->elementExists('VALUE_OF_INVALID_USER_TYPE')) {
            $this->addElement('hidden', 'VALUE_OF_INVALID_USER_TYPE', $this->_valueOfInvalidUserType);
        } else {
            $el = $this->getElement('VALUE_OF_INVALID_USER_TYPE');
            $el->updateAttributes(array('value' => $this->_valueOfInvalidUserType));
        }
		
    } // end func setValueOfInvalidUserType

    // }}}
    // {{{ getValueOfInvalidUserType()

    /**
     * Returns the value of VALUE_OF_INVALID_USER_TYPE hidden element
     *
     * @access    public
     * @return    boolean is add user
     */
    function getValueOfInvalidUserType()
    {
        return $this->_valueOfInvalidUserType;
    } // end func getValueOfInvalidUserType

    // }}}

} // end class HTML_QuickForm_Error
?>