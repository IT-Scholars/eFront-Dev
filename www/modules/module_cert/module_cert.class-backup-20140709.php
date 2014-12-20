<?php

//This file cannot be called directly, only included.
if (str_replace(DIRECTORY_SEPARATOR, "/", __FILE__) == $_SERVER['SCRIPT_FILENAME']) {
    exit;
}

/*
 * Class defining the new module
 * The name must match the one provided in the module.xml file
 */
class module_cert extends EfrontModule {

	/**
	 * Class constructor.
	 *
	 * Normally you don't have to call this function yourself, nor do you need to
	 * implement it in your modules
	 *
	 * @see libraries/EfrontModule#__construct()
	 */
	public function __construct($defined_moduleBaseUrl ,  $defined_moduleFolder) {
		parent::__construct($defined_moduleBaseUrl ,  $defined_moduleFolder);
	}

	/**
	 * Get the module name, for example "Certificate Test"
	 *
	 * @see libraries/EfrontModule#getName()
	 */
    public function getName() {
    	//This is a language tag, defined in the file lang-<your language>.php
        return _MODULE_CERT_MODULECERT;
    }

	/**
	 * Return the array of roles that will have access to this module
	 * You can return any combination of 'administrator', 'student' or 'professor'
	 *
	 * @see libraries/EfrontModule#getPermittedRoles()
	 */
    public function getPermittedRoles() {
        return array("administrator", "professor", "student");		//This module will be available to all roles
    }

	/**
	 * Whether this module will be related to a lesson
	 *
	 * @see libraries/EfrontModule#isLessonModule()
	 */
    public function isLessonModule() {
		return true;
	}

	/**
	 * Put any installation commands here, usually creating database tables
	 *
	 * @see libraries/EfrontModule#onInstall()
	 */
    public function onInstall() {
        eF_executeQuery("drop table if exists module_cert_data");
        eF_executeQuery("CREATE TABLE module_cert_data(id int(11) not null auto_increment primary key,timestamp int(11) default 0,data text not null)");
    	return true;
    }

	/**
	 * Put any uninstallation operations here, usually deleting database tables
	 *
	 * @see libraries/EfrontModule#onUninstall()
	 */
    public function onUninstall() {
        eF_executeQuery("drop table if exists module_cert_data");
    	return true;
    }

	/**
	 * Put any upgrade commands here, usually database table related
	 *
	 * @see libraries/EfrontModule#onUpgrade()
	 */
    public function onUpgrade() {
    	try {
	        eF_executeQuery("ALTER TABLE module_cert_data change timestamp timestamp int(11) default 0");
    	} catch (Exception $e) {/*the table was already upgraded*/}

    	return true;
    }

	/**
	 * Get the current user accessing the module, which by default is the same
	 * as the user currently logged in.
	 *
	 * @see libraries/EfrontModule#getCurrentUser()
	 */
    public function getCurrentUser() {
    	return parent::getCurrentUser();
    }

	/**
	 * Get the current course, if one is set
	 *
	 * @see libraries/EfrontModule#getCurrentCourse()
	 */
    public function getCurrentCourse() {
    	return parent::getCurrentCourse();
    }

	/**
	 * Get the current lesson, if one is set
	 *
	 * @see libraries/EfrontModule#getCurrentLesson()
	 */
    public function getCurrentLesson() {
    	return parent::getCurrentLesson();
    }

	/**
	 * Get the current unit, if one is set
	 *
	 * @see libraries/EfrontModule#getCurrentUnit()
	 */
    public function getCurrentUnit() {
    	return parent::getCurrentUnit();
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#setMessageVar()
     */
    public function setMessageVar($message, $message_type) {
    	parent::setMessageVar($message, $message_type);
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#addEvent()
     */
    public function addEvent($type, $data) {
    	return parent::addEvent($type, $data);
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getEventMessage()
     */
    public function getEventMessage($type, $data) {
    	return parent::getEventMessage($type, $data);
    }

    /**
     * Pick a few of the efront scripts to be included
     *
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#addScripts()
     */
    public function addScripts() {
    	return array('scriptaculous/slider');
    }

    /**
     * The main functionality
     *
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getModule()
     */
    public function getModule() {
		$currentUser 	= $this->getCurrentUser();
		$currentCourse 	= $this->getCurrentCourse();
		$currentLesson	= $this->getCurrentLesson();
		$currentUnit	= $this->getCurrentUnit();
	
		$vLab_requestingUser	= $currentUser->user['login'];
		$vLab_username 			= $currentUser->user['login'];
		$vLab_courseid 			= 123;
		$vLab_course 			= "Kaseya 7.0 Fundamentals Workshop";
		$vLab_resourceType 		= "CERTIFICATE";

		$vLab_username_urlEncoded		= rawurlencode($vLab_username);
		$vLab_courseid_urlEncoded 		= rawurlencode($vLab_courseid);
		$vLab_course_urlEncoded 		= rawurlencode($vLab_course);
		$vLab_resourceType_urlEncoded 	= rawurlencode($vLab_resourceType);

		// $vLab_moodleURL = "http://localhost/moodle19/";
		$vLab_moodleURL = "http://ita-portal.cis.fiu.edu/";

		$postdata = http_build_query(
    		array(
        		'action' 			=> getDevaInsInfo,
        		'requestingUser' 	=> vLab_requestingUser,
        		'username' 			=> $vLab_username,
        		'course' 			=> $vLab_course,
        		'resourceType' 		=> $vLab_resourceType
    		)
		);

		$opts = array('http' =>
    		array(
        		'method'  => 'POST',
        		'header'  => 'Content-type: application/x-www-form-urlencoded',
        		'content' => $postdata
    		)
		);

		$context  = stream_context_create($opts);

		$result = file_get_contents($vLab_moodleURL . 'mod/deva/php/virtuallabs-wscalls.php', false, $context);
		// print_r($result);
		$devaInsInfo = json_decode($result);
		
		// echo "<br> $devaInsInfo->success";
		// echo "<br> $devaInsInfo->reason";
	
		if (!$devaInsInfo->success) {
			// echo "<br> \$devaInsInfo->success is false!";

			// auto start vLab
			$str = $vLab_moodleURL . 
				"/mod/deva/embedded/auto-start.php" . 
				"?username=$vLab_username_urlEncoded" . 
				"&course=$vLab_course_urlEncoded" . 
				"&resourceType=$vLab_resourceType_urlEncoded";
			// echo "<br>" . $str;
			$payload = file_get_contents($str);
			// echo "<br>" . $payload;
		
			while (!$devaInsInfo->success) {
				$waitPeriod = 10;
				// echo "<br> Sleeping for $waitPeriod seconds ...";
				sleep(waitPeriod);
			
				$result = file_get_contents($vLab_moodleURL . 'mod/deva/php/virtuallabs-wscalls.php', false, $context);
				// print_r($result);
				$devaInsInfo = json_decode($result);
			} 
		}
		
		// echo "<br> \$devaInsInfo->success is true!";
		// echo "<br><br>";
		// print_r($devaInsInfo);
		
		$kserver = $devaInsInfo->kserver; 
		// echo "<br><br>";
		// print_r($kserver);
		// echo "<br><br> \$kserver->id is $kserver->id !";
		
		$vmInfo = $devaInsInfo->vmInfo; 
		// echo "<br>\$vmInfo:<br>";
		// print_r($vmInfo);
		
		$dc = $vmInfo[0]; 
		// echo "<br>\$dc:<br>";
		// print_r($dc);
		
		$ws1 = $vmInfo[1]; 
		// echo "<br>\$ws1:<br>";
		// print_r($ws1);
		
		$ws2 = $vmInfo[2]; 
		// echo "<br>\$ws2:<br>";
		// print_r($ws2);
		
		$reception = $vmInfo[3]; 
		// echo "<br>\$reception:<br>";
		// print_r($reception);
		
		$laptop_ceo = $vmInfo[4]; 
		// echo "<br>\$laptop_ceo:<br>";
		// print_r($laptop_ceo);
		
		// echo "<br>\$dc->accessAddress: $dc->accessAddress<br>";
		
//		return false;

/*
		$username = "123test-ct";
		$password = "kaseya";
		$domain = "ITTC";
		$hostName = "vc11.cis.fiu.edu";
		$hostPort = array(
						"dc" 			=> 42011, 
						"ws1" 			=> 42012, 
						"ws2" 			=> 42013, 
						"reception" 	=> 42014, 
						"laptop_ceo" 	=> 42015);
*/
		$frame = array(
					"width" 		=> 1400,
					"height" 		=> 800,
					"align"			=> "middle",
					"marginwidth"	=> 0,
					"marginheight"	=> 0, 
					"bpp" 			=> 16);
		
    	$smarty = $this -> getSmartyVar();
        $smarty -> assign("T_MODULE_BASEDIR"	, $this -> moduleBaseDir);
        $smarty -> assign("T_MODULE_BASELINK"	, $this -> moduleBaseLink);
        $smarty -> assign("T_MODULE_BASEURL" 	, $this -> moduleBaseUrl);

		$smarty -> assign("NetworkDiagramImage", "fiu-network-diagram.png");
		
		$smarty -> assign("frame", $frame);
		
		$smarty -> assign("T_EXAM_QUESTIONS", 
					$this -> moduleBaseLink . 
					"ExamQuestions.html");
		$smarty -> assign("T_CONNECTION_INFO", 
					$this -> moduleBaseLink . 
					"ConnectionInfo.php");
		$smarty -> assign("T_DC", 
					$this -> moduleBaseLink . 
					"webRDP.php?" 	. 
					"hostName=" 	. $dc->accessAddress 	. "&" . 
					"hostPort=" 	. $dc->accessPort 		. "&" . 
					"username=" 	. $dc->username 		. "&" . 
					"password=" 	. $dc->password 		. "&" . 
					"domain=" 		. $dc->domain 			. "&" . 
					"frameWidth=" 	. $frame["width"] 		. "&" . 
					"frameHeight=" 	. $frame["height"] 		. "&" . 
					"frameBpp=" 	. $frame["bpp"]);
		$smarty -> assign("T_WS1", 
					$this -> moduleBaseLink . 
					"webRDP.php?" 	. 
					"hostName=" 	. $ws1->accessAddress 	. "&" . 
					"hostPort=" 	. $ws1->accessPort 		. "&" . 
					"username=" 	. $ws1->username 		. "&" . 
					"password=" 	. $ws1->password 		. "&" . 
					"domain=" 		. $ws1->domain 			. "&" . 
					"frameWidth=" 	. $frame["width"] 		. "&" . 
					"frameHeight=" 	. $frame["height"] 		. "&" . 
					"frameBpp=" 	. $frame["bpp"]);
		$smarty -> assign("T_WS2", 
					$this -> moduleBaseLink . 
					"webRDP.php?" 	. 
					"hostName=" 	. $ws2->accessAddress 	. "&" . 
					"hostPort=" 	. $ws2->accessPort 		. "&" . 
					"username=" 	. $ws2->username 		. "&" . 
					"password=" 	. $ws2->password 		. "&" . 
					"domain=" 		. $ws2->domain 			. "&" . 
					"frameWidth=" 	. $frame["width"] 		. "&" . 
					"frameHeight=" 	. $frame["height"] 		. "&" . 
					"frameBpp=" 	. $frame["bpp"]);
		$smarty -> assign("T_RECEPTION", 
					$this -> moduleBaseLink . 
					"webRDP.php?" 	. 
					"hostName=" 	. $reception->accessAddress 	. "&" . 
					"hostPort=" 	. $reception->accessPort 		. "&" . 
					"username=" 	. $reception->username 		. "&" . 
					"password=" 	. $reception->password 		. "&" . 
					"domain=" 		. $reception->domain 			. "&" . 
					"frameWidth=" 	. $frame["width"] 		. "&" . 
					"frameHeight=" 	. $frame["height"] 		. "&" . 
					"frameBpp=" 	. $frame["bpp"]);
		$smarty -> assign("T_LAPTOP_CEO", 
					$this -> moduleBaseLink . 
					"webRDP.php?" 	. 
					"hostName=" 	. $laptop_ceo->accessAddress 	. "&" . 
					"hostPort=" 	. $laptop_ceo->accessPort 		. "&" . 
					"username=" 	. $laptop_ceo->username 		. "&" . 
					"password=" 	. $laptop_ceo->password 		. "&" . 
					"domain=" 		. $laptop_ceo->domain 			. "&" . 
					"frameWidth=" 	. $frame["width"] 		. "&" . 
					"frameHeight=" 	. $frame["height"] 		. "&" . 
					"frameBpp=" 	. $frame["bpp"]);
				
        return true;
    }

    /**
     * Specify which file to include for template
     *
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getSmartyTpl()
     */
    public function getSmartyTpl() {
    	return $this -> moduleBaseDir."module_cert_page.tpl";
    }

    /**
     * Code to execute on the lesson page
     *
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getLessonModule()
     */
    public function getLessonModule() {

    	$smarty = $this -> getSmartyVar();
        $smarty -> assign("T_MODULE_BASEURL" , $_SERVER['PHP_SELF'].'?ctg=control_panel');

        try {
        	if (isset($_GET['ajax']) && $_GET['ajax'] == 'certTable') {
        		$this -> getAjaxResults();
        		$smarty -> display($this -> moduleBaseDir . "module_cert_lessonpage.tpl");
        		exit;
        	}
        } catch (Exception $e) {
        	handleAjaxExceptions($e);
        }

        return true;
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getLessonSmartyTpl()
     */
    public function getLessonSmartyTpl() {
        return $this -> moduleBaseDir."module_cert_lessonpage.tpl";
    }

    /**
     * Code executed when inside a content unit
     *
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getContentSideInfo()
     */
    public function getContentSideInfo() {
        return true;

    }

    /**
     * (non-PHPdoc)
     * @see libraries/EfrontModule#getContentToolsLink()
     */
    public function getContentToolsLink() {
        return '<a href = "'.$_SERVER['PHP_SELF'].'?ctg=module&op=module_cert" title = "'._MODULE_CERT_CALLEDINCONTENTTOOLS.'">'._MODULE_CERT_CALLEDINCONTENTTOOLS.'</a>';
    }	
    
    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getContentSmartyTpl()
     */
    public function getContentSmartyTpl() {
        return $this -> moduleBaseDir."module_cert_content_side.tpl";
    }

    /**
     * If false, then the module title will appear
     *
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getContentSideTitle()
     */
    public function getContentSideTitle() {
    	return _MODULE_CERT_CONTENTTOOLS;
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getControlPanelModule()
     */
    public function getControlPanelModule() {
   		$smarty = $this -> getSmartyVar();
        $smarty -> assign("T_MODULE_BASEURL" , $_SERVER['PHP_SELF'].'?ctg=control_panel');

        try {
        	if (isset($_GET['ajax']) && $_GET['ajax'] == 'certTable') {
        		$this -> getAjaxResults();
        		$smarty -> display($this -> moduleBaseDir . "module_cert_lessonpage.tpl");
        		exit;
        	}
        } catch (Exception $e) {
        	handleAjaxExceptions($e);
        }

        return true;
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getControlPanelSmartyTpl()
     */
    public function getControlPanelSmartyTpl() {
    	return $this -> moduleBaseDir."module_cert_cpanelpage.tpl";
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getDashboardModule()
     */
    public function getDashboardModule() {
   		$smarty = $this -> getSmartyVar();
        $smarty -> assign("T_MODULE_BASEURL" , $_SERVER['PHP_SELF'].'?ctg=personal');

        try {
        	if (isset($_GET['ajax']) && $_GET['ajax'] == 'certTable') {
        		$this -> getAjaxResults();
        		$smarty -> display($this -> moduleBaseDir . "module_cert_dashboard.tpl");
        		exit;
        	}
        } catch (Exception $e) {
        	handleAjaxExceptions($e);
        }

        return true;

    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getDashboardSmartyTpl()
     */
    public function getDashboardSmartyTpl() {
    	return $this -> moduleBaseDir."module_cert_dashboard.tpl";
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getCatalogModule()
     */
    public function getCatalogModule() {
        return true;
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getCatalogSmartyTpl()
     */
    public function getCatalogSmartyTpl() {
    	return $this -> moduleBaseDir."module_cert_catalog.tpl";
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getLandingPageModule()
     */
    public function getLandingPageModule() {
        return true;
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getLandingPageSmartyTpl()
     */
    public function getLandingPageSmartyTpl() {
    	return $this -> moduleBaseDir."module_cert_landing_page.tpl";
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getTabSmartyTpl()
     */
    public function getTabSmartyTpl($tabberIdentifier) {
    	switch ($tabberIdentifier) {
    		case 'branches':
    			$tabData = array('tab'   => 'branch_cert_tab',
    							 'title' => _MODULE_CERT_BRANCHCERTTAB,
    							 'file'  => $this -> moduleBaseDir.'module_cert_branch_tab.tpl');
    			break;
    		case 'rules':
    			$tabData = array('tab'   => 'rules_cert_tab',
    							 'title' => _MODULE_CERT_RULESCERTTAB,
    							 'file'  => $this -> moduleBaseDir.'module_cert_rules_tab.tpl');
    			break;
    		default:break;
    	}
        return $tabData;
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getModuleJS()
     */
    public function getModuleJS() {
        return $this->moduleBaseDir."module_cert.js";
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getModuleCSS()
     */
    public function getModuleCSS() {
        return $this->moduleBaseDir."module_cert_css.css";
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getNavigationLinks()
     */
    public function getNavigationLinks() {
        return array (array ('title' => _HOME, 'link'  => $_SERVER['PHP_SELF']),
                      array ('title' => $this -> getName(), 'link'  => $this -> moduleBaseUrl));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getLinkToHighlight()
     */
    public function getLinkToHighlight() {
        return false;
     }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getCenterLinkInfo()
     */
    public function getCenterLinkInfo() {
    	return array('title' => $this -> getName(), // .' (getCenterLinkInfo())',
                     'image' => $this -> moduleBaseLink . 'img/logo.png',
                     'link'  => $this -> moduleBaseUrl);
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getLessonCenterLinkInfo()
     */
    public function getLessonCenterLinkInfo() {
    	return array('title' => $this -> getName(), // .' (getLessonCenterLinkInfo())',
                     'image' => $this -> moduleBaseLink . 'img/logo.png',
                     'link'  => $this -> moduleBaseUrl);
    }

    /**
     * (non-PHPdoc)
     * @see libraries/EfrontModule#getToolsLinkInfo()
     */
    public function getToolsLinkInfo() {
    	return array('title' => $this -> getName(), // .' (getToolsLinkInfo())',
                     'image' => $this -> moduleBaseLink . 'img/logo.png',
                     'link'  => $this -> moduleBaseUrl);
    	
    }    

    /**
     * (non-PHPdoc)
     * @see libraries/EfrontModule#getReportsLinkInfo()
     */
    public function getReportsLinkInfo() {
    	return array('title' => $this -> getName(), // .' (getReportsLinkInfo())',
                     'image' => $this -> moduleBaseLink . 'img/logo.png',
                     'link'  => $this -> moduleBaseUrl);
    	
    }    
    
    /**
     * (non-PHPdoc)
     * @see libraries/EfrontModule#getModuleIcon()
     */
    public function getModuleIcon() {
        return $this -> moduleBaseLink . 'img/logo.png';
    }    
    
    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#getSidebarLinkInfo()
     */
	/*
    public function getSidebarLinkInfo() {
    	return array('title' => $this -> getName().' (getSidebarLinkInfo())',
                     'image' => $this -> moduleBaseLink . 'img/logo.png',
                     'link'  => $this -> moduleBaseUrl);
    }
	*/

    //Sample implementation of getSidebarLinkInfo () method
    public function getSidebarLinkInfo () {
        $currentUser = $this -> getCurrentUser();

        // If a professor he should see a link in the lessons menu 
        if ($currentUser -> getType() == "professor") {
            $link_of_menu_lessons = array (
                 'id' => 'other_link_id1',
                 'title' => "Lesson link title",
                 'image' => $this -> moduleBaseLink . 'img/logo.png',
                 'link'  =>$this -> moduleBaseUrl."&module_operation=lesson_related");

            return array ('lessons' => array ($link_of_menu_lessons) );
			
        // ... and if an admin he should see a link in the users menu and in a newly defined menu
        } else if ($currentUser -> getType()  == "administrator") {
        //link using relative path to the eFront images folder
            $link_of_menu_users = array (
                 'id'    => 'users_link_id1',
                 'title' => "Users link title",
                 'image' => $this -> moduleBaseLink . 'img/logo.png',
                 'link'  => $this->moduleBaseUrl."&module_op=user_related");
 
             $link_of_menu_other = array (
                 'id'    => 'other_link_id1',
                 'title' => "Other link title",
                 'image' => $this -> moduleBaseLink . 'img/logo.png',
                 'link'  => $this -> moduleBaseUrl."&module_op=user_related");
 
             return array ('users' => array ($link_of_menu_users),
                           'other' => array ('title' => "Module menu",
                           'links'=> array ($link_of_menu_other)));
 
        }
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onNewUser()
     */
    public function onNewUser($login) {
//        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%login%', formatLogin($login), _MODULE_CERT_CREATEDUSER)));
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => $login));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onDeleteUser()
     */
    public function onDeleteUser($login) {
		eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%login%', formatLogin($login), _MODULE_CERT_DELETEDUSER)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onNewLesson()
     */
    public function onNewLesson($lessonId) {
    	$lessonName = eF_getTableData("lessons", "name", "id=$lessonId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%lesson%', $lessonName, _MODULE_CERT_CREATEDLESSON)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onDeleteLesson()
     */
    public function onDeleteLesson($lessonId) {
    	$lessonName = eF_getTableData("lessons", "name", "id=$lessonId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%lesson%', $lessonName, _MODULE_CERT_DELETEDLESSON)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onDeleteCourse()
     */
    public function onDeleteCourse($courseId) {
    	$courseName = eF_getTableData("courses", "name", "id=$courseId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%course%', $courseName, _MODULE_CERT_DELETEDCOURSE)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onRevokeCourseCertificate()
     */
    public function onRevokeCourseCertificate($login, $courseId) {
    	$courseName = eF_getTableData("courses", "name", "id=$courseId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace(array('%course%', '%login%'), array($courseName, formatTimestamp($login)), _MODULE_CERT_REVOKEDCERTIFICATE)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onIssueCourseCertificate()
     */
    public function onIssueCourseCertificate($login, $courseId, $certificateArray) {
    	$courseName = eF_getTableData("courses", "name", "id=$courseId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace(array('%course%', '%login%'), array($courseName, formatTimestamp($login)), _MODULE_CERT_ISSUEDCERTIFICATE)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onPrepareCourseCertificate()
     */
    public function onPrepareCourseCertificate($login, $courseId, $certificateData) {
    	$courseName = eF_getTableData("courses", "name", "id=$courseId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace(array('%course%', '%login%'), array($courseName, formatTimestamp($login)), _MODULE_CERT_PREPAREDCERTIFICATE)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onExportCourse()
     */
    public function onExportCourse($courseId) {
    	$courseName = eF_getTableData("courses", "name", "id=$courseId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%course%', $courseName, _MODULE_CERT_EXPORTEDCOURSE)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onImportCourse()
     */
    public function onImportCourse($courseId, $data) {
    	$courseName = eF_getTableData("courses", "name", "id=$courseId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%course%', $courseName, _MODULE_CERT_IMPORTEDCOURSE)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onNewCourse()
     */
    public function onNewCourse($courseId) {
    	$courseName = eF_getTableData("courses", "name", "id=$courseId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%course%', $courseName, _MODULE_CERT_CREATEDCOURSE)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onCompleteCourse()
     */
    public function onCompleteCourse($courseId, $login) {
    	$courseName = eF_getTableData("courses", "name", "id=$courseId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace(array('%course%', '%login%'), array($courseName, formatTimestamp($login)), _MODULE_CERT_COMPLETEDCOURSE)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onResetProgressInCourse($courseId, $login)
     */
    public function onResetProgressInCourse($courseId, $login) {
    	$courseName = eF_getTableData("courses", "name", "id=$courseId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace(array('%course%', '%login%'), array($courseName, formatTimestamp($login)), _MODULE_CERT_RESETCOURSE)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onResetProgressInCourse($login)
     */
    public function onResetProgressInAllCourses($login) {
    	$courseName = eF_getTableData("courses", "name", "id=$courseId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%login%', formatLogin($login), _MODULE_CERT_RESETALLCOURSE)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onExportLesson()
     */
    public function onExportLesson($lessonId) {
    	$lessonName = eF_getTableData("lessons", "name", "id=$lessonId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%lesson%', $lessonName, _MODULE_CERT_EXPORTEDLESSON)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onImportLesson()
     */
    public function onImportLesson($lessonId, $data) {
    	$lessonName = eF_getTableData("lessons", "name", "id=$lessonId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%lesson%', $lessonName, _MODULE_CERT_IMPORTEDLESSON)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onCompleteLesson()
     */
    public function onCompleteLesson($lessonId, $login) {
    	$lessonName = eF_getTableData("lessons", "name", "id=$lessonId");
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace(array('%lesson%', '%login%'), array($lessonName, formatTimestamp($login)), _MODULE_CERT_COMPLETEDLESSON)));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onNewPageLoad()
     */
    public function onNewPageLoad() {
    	$this -> fooBar();		//Executed at the beginning of each page load
    	return true;
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onSetTheme()
     */
    public function onSetTheme($theme) {
        eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => "Activated theme {$theme->themes['name']}"));
    }

    /**
	 * (non-PHPdoc)
	 * @see libraries/EfrontModule#onDeleteTheme()
     */
    public function onDeleteTheme($theme) {
    	eF_insertTableData("module_cert_data", array("timestamp" => time(), "data" => str_replace('%theme%', $theme, _MODULE_CERT_DELETETHEME)));
    }

    /**
     * (non-PHPdoc)
     * @see libraries/EfrontModule#getTabPageSmartyTpl($tabPageIdentifier)
     */
    public function getTabPageSmartyTpl($tabPageIdentifier) {
    	switch ($tabPageIdentifier) {
    		case 'course_settings':
    			$tabPageData = array('tab_page' => 'course_settings_cert_tab',			//Use an existing name, to overwrite an existing functionality
	    							 'title' 	=> _MODULE_CERT_COURSESETTINGSTABPAGE,
    								 'image'	=> $this -> moduleBaseLink.'img/generic.png',
	    							 'file'  	=> $this -> moduleBaseDir.'module_cert_course_settings_tab_page.tpl');
    			break;
    		default:break;
    	}
        return $tabPageData;
    }


    /**
     * (non-PHPdoc)
     * @see libraries/EfrontModule#getFieldsetSmartyTpl($fieldsetIdentifier)
     */
    public function getFieldsetSmartyTpl($fieldsetIdentifier) {
    	switch ($fieldsetIdentifier) {
    		case 'lesson_progress':
    			$fieldsetData = array('fieldset' => 'lesson_progress_cert_fieldset',			//Use an existing name, to overwrite an existing functionality
	    							  'title' 	 => _MODULE_CERT_LESSONPROGRESSFIELDSET,
	    							  'file'  	 => $this -> moduleBaseDir.'module_cert_lesson_progress_fieldset.tpl');
    			break;
    		default:break;
    	}
        return $fieldsetData;
    }

    /**
     * (non-PHPdoc)
     * @see libraries/EfrontModule#onPageFinishLoadingSmartyTpl()
     */
    public function onPageFinishLoadingSmartyTpl() {
    	$this -> fooBar();
    	return $this -> moduleBaseDir.'module_cert_page_finish.tpl';
    	//Return false if you don't want any code to display
    	//return false;
    }

    /**
     * (non-PHPdoc)
     * @see libraries/EfrontModule#onIndexPageLoad()
     */
    public static function onIndexPageLoad() {
    	//Return false if you don't want any code to display
    	return false;
    }
    
    /**
     * (non-PHPdoc)
     * @see libraries/EfrontModule#onBeforeShowContent()
     */
    public function onBeforeShowContent(&$unit) {
    	$unit['data'] = 'This unit data has changed from the cen<br>'.$unit['data'];
    	return true;
    }
    
    /**
     * (non-PHPdoc)
     * @see libraries/EfrontModule#onAddUsersToCourse($courseId, $users)
     */
    public function onAddUsersToCourse($courseId, $users, $lessonAssignments) {
    	return true;
    }

    private function fooBar() {
    	//Do nothing!
    	return true;
    }

    private function getAjaxResults() {
    	$smarty = $this -> getSmartyVar();

    	$certData = eF_getTableData("module_cert_data", "*");
    	isset($_GET['limit']) && eF_checkParameter($_GET['limit'], 'uint') ? $limit = $_GET['limit'] : $limit = G_DEFAULT_TABLE_SIZE;

    	if (isset($_GET['sort']) && eF_checkParameter($_GET['sort'], 'text')) {
    		$sort = $_GET['sort'];
    		isset($_GET['order']) && $_GET['order'] == 'desc' ? $order = 'desc' : $order = 'asc';
    	} else {
    		$sort = 'login';
    	}
    	$certData = eF_multiSort($certData, $sort, $order);
    	$smarty -> assign("T_TABLE_SIZE", sizeof($certData));
    	if (isset($_GET['filter'])) {
    		$certData = eF_filterData($certData, $_GET['filter']);
    	}
    	if (isset($_GET['limit']) && eF_checkParameter($_GET['limit'], 'int')) {
    		isset($_GET['offset']) && eF_checkParameter($_GET['offset'], 'int') ? $offset = $_GET['offset'] : $offset = 0;
    		$certData = array_slice($certData, $offset, $limit);
    	}

    	$smarty -> assign("T_DATA_SOURCE", $certData);
    }

}
