<?php
try {
	//$systemAvatars = array('' => '', 'none' => _USENONE);
	$systemAvatars = array('' => ''); // Added because of #4444 
	$avatarsFileSystemTree = new FileSystemTree(G_SYSTEMAVATARSPATH);
	foreach (new EfrontFileTypeFilterIterator(new EfrontFileOnlyFilterIterator(new EfrontNodeFilterIterator(new RecursiveIteratorIterator($avatarsFileSystemTree -> tree, RecursiveIteratorIterator :: SELF_FIRST))), array('png')) as $key => $value) {
		$systemAvatars[basename($key)] = basename($key);
	}
	$smarty -> assign("T_SYSTEM_AVATARS", $systemAvatars);
} catch (Exception $e) {
	handleNormalFlowExceptions($e);
}

if (!isset($_GET['add_user'])) {
	try {
		$avatar = new EfrontFile($editedUser -> user['avatar']);
	} catch (Exception $e) {
		$avatar = new EfrontFile(G_SYSTEMAVATARSPATH."unknown_small.png");
	}
} else {
	$avatar = new EfrontFile(G_SYSTEMAVATARSPATH."unknown_small.png");
}

$roles = EfrontUser :: getRoles(true);
if ($currentUser->user['user_type'] != 'administrator' || $currentUser->user['user_types_ID']) {
	$rolesPlain = EfrontUser :: getRoles();
	foreach ($roles as $key => $value) {
		if ($rolesPlain[$key] == 'administrator' && $key != $editedUser -> user['user_types_ID']) {
			unset($roles[$key]);
		}
	}
}

$constrainAccess = array();
if (!isset($_GET['add_user'])) {
	if ( $editedUser->user['login'] != $currentUser->user['login'] && (isset($currentUser -> coreAccess['users']) && $currentUser -> coreAccess['users'] != 'change')) {			
		$constrainAccess = 'all';
	} else {
		$constrainAccess = array();
		$constrainAccess[] = 'login';
		if ($editedUser -> user['user_type'] == 'administrator' && $editedUser -> user['user_types_ID'] == 0 && $currentUser -> user['user_type'] == 'administrator' && $currentUser -> user['user_types_ID'] != 0) {
			//An admin subtype can't change a pure admin
			$constrainAccess[] = 'passrepeat';
			$constrainAccess[] = 'password';
			$constrainAccess[] = 'user_type';			
			$roles = EfrontUser :: getRoles(true);	//so that the selected user type appears correctly
		}
		if ($editedUser -> isLdapUser) {
			$constrainAccess[] = 'passrepeat';
			$constrainAccess[] = 'password';
		}
		if ($editedUser->user['login'] == $currentUser->user['login']) {	//A user can't change his own type, nor deactivate himself
			$constrainAccess[] = 'user_type';
			$constrainAccess[] = 'active';
			$constrainAccess[] = 'ldap';
			$roles = EfrontUser :: getRoles(true);	//so that the selected user type appears correctly
			if ($currentUser->user['user_type'] != 'administrator') {
				if (!EfrontUser::isOptionVisible('change_info') && !EfrontUser::isOptionVisible('change_pass')) {
					$constrainAccess = 'all';
				} else if (!EfrontUser::isOptionVisible('change_info')) {
					$contrainAllButPassword = true;
					$constrainAccess[] = 'file_upload';					
				} else if (!EfrontUser::isOptionVisible('change_pass')) {
					$constrainAccess[] = 'password';
				}
			}
		}

	}
}

// Modified by Masoud Sadjadi on June 30, 2014 to allow a Company field with just one line input
// $form = new HTML_QuickForm("user_form", "post", basename($_SERVER['PHP_SELF'])."?ctg=personal&user=".$editedUser -> user['login']."&op=profile".(isset($_GET['add_user']) ? '&add_user=1' : ''), "", null, true);
// require_once('');
$form = new HTML_QuickForm_vLab("user_form", "post", basename($_SERVER['PHP_SELF'])."?ctg=personal&user=".$editedUser -> user['login']."&op=profile".(isset($_GET['add_user']) ? '&add_user=1' : ''), "", null, true);
// End modification by Masoud Sadjadi

$form -> addElement('static', '', '<img src = "view_file.php?file='.urlencode($avatar['path']).'" alt = "'.$editedUser -> user['login'].'" title = "'.$editedUser -> user['login'].'"/>');
if (!in_array('file_upload', $constrainAccess) && $constrainAccess != 'all') {
	$form -> addElement('file', 'file_upload', _IMAGEFILE, 'class = "inputText"');
	$form -> addElement("static", "file_upload_text", _EACHFILESIZEMUSTBESMALLERTHAN.' <b>'.FileSystemTree::getUploadMaxSize().'</b> '._KB);
	$form -> addElement("static", "sidenote", '(<a href = "'.basename($_SERVER['PHP_SELF']).'?ctg=personal&user='.$editedUser -> user['login'].'&op=profile&show_avatars_list=1&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, \''._VIEWLIST.'\', 2)">'._VIEWLIST.'</a>)');
	$form -> addElement('select', 'system_avatar' , _ORSELECTONEFROMLIST, $systemAvatars, "id = 'select_avatar'");
}
$form -> addElement('text', 'login', _LOGIN, 'class = "inputText"');
if (!in_array('password', $constrainAccess) && $constrainAccess != 'all') {
	$form -> addElement("static", "sidenote", _BLANKTOLEAVEUNCHANGED);
	$passwordElement = $form -> addElement('password', 'password', _PASSWORD, 'autocomplete="off" class = "inputText"');
	$form -> addElement("static", "", str_replace("%x", $GLOBALS['configuration']['password_length'], _PASSWORDMUSTBE6CHARACTERS));
	$passrepeatElement = $form -> addElement('password', 'passrepeat', _REPEATPASSWORD, 'class = "inputText "');
}
$form -> addElement('text', 'name', _FIRSTNAME, 'class = "inputText"');
$form -> addElement('text', 'surname', _LASTNAME, 'class = "inputText"');
$form -> addElement('text', 'email', _EMAILADDRESS, 'class = "inputText"');
if (!in_array('active', $constrainAccess) && $constrainAccess != 'all') {
	$form -> addElement('advcheckbox', 'active', _ACTIVEUSER, null, 'class = "inputCheckbox" id="activeCheckbox" ', array(0, 1));
}
if (G_VERSIONTYPE != 'community') { #cpp#ifndef COMMUNITY
	if (G_VERSIONTYPE != 'standard') { #cpp#ifndef STANDARD
		if (!in_array('ldap', $constrainAccess) && $constrainAccess != 'all' && $GLOBALS['configuration']['activate_ldap']) {
			$form -> addElement('advcheckbox', 'ldap_user', _ISLDAPUSER, null, 'class = "inputCheckbox"', array(0, 1));
		}
	} #cpp#endif
} #cpp#endif

$select = $form -> addElement('select', 'user_type', _USERTYPE, $roles);

$languages = EfrontSystem :: getLanguages(true, true);
if ($GLOBALS['configuration']['onelanguage']) {
	$languages = array($GLOBALS['configuration']['default_language'] => $languages[$GLOBALS['configuration']['default_language']]);
}
$form -> addElement('select', 'languages_NAME', _LANGUAGE, $languages);
$form -> addElement("select", "timezone", _TIMEZONE, eF_getTimezones(), 'class = "inputText" style="width:20em"');
if ($GLOBALS['configuration']['social_modules_activated'] > 0) {
	$load_editor = true;
	$form -> addElement('textarea', 'short_description', _SHORTDESCRIPTIONCV, 'class = "inputContentTextarea simpleEditor" style = "width:100%;height:14em;"');
}
// Modified by Masoud Sadjadi on June 30, 2014 to allow a Company field with just one line input
// $form -> addElement('textarea', 'comments', _COMMENTS, 'class = "inputContentTextarea" style = "width:100%;height:5em;"');
$form -> addElement('text', 'comments', _COMMENTS, 'class = "inputText"');
$form -> addRule('comments', _THEFIELD.' '._COMMENTS.' '._ISMANDATORY, 'required', null, 'client');
// End modification by Masoud Sadjadi

$form -> registerRule('checkParameter', 'callback', 'eF_checkParameter');		   //Register this rule for checking user input with our function, eF_checkParameter
$form -> registerRule('checkNotExist', 'callback', 'eF_checkNotExist');
$form -> registerRule('checkRule', 'callback', 'eF_checkRule');           //Register this rule for checking user input with our function, eF_checkParameter
$form -> addRule('password', str_replace("%x", $GLOBALS['configuration']['password_length'], _PASSWORDMUSTBE6CHARACTERS), 'minlength', $GLOBALS['configuration']['password_length'], 'client');
$form -> addRule(array('password', 'passrepeat'), _PASSWORDSDONOTMATCH, 'compare', null, 'client');
$form -> addRule('name', _THEFIELD.' '._FIRSTNAME.' '._ISMANDATORY, 'required', null, 'client');
$form -> addRule('surname', _THEFIELD.' '._LASTNAME.' '._ISMANDATORY, 'required', null, 'client');
$form -> addRule('email', _THEFIELD.' '._EMAILADDRESS.' '._ISMANDATORY, 'required', null, 'client');
$form -> addRule('email', _INVALIDFIELDDATA, 'checkParameter', 'email');
if (isset($_GET['add_user'])) {
	$form -> addRule('login', _INVALIDFIELDDATA, 'checkParameter', 'login');
	$form -> addRule('login',  _THELOGIN.' &quot;'.($form -> exportValue('login')).'&quot; '._ALREADYEXISTS, 'checkNotExist', 'login');
	$form -> addRule('login', _THEFIELD.' '._LOGIN.' '._ISMANDATORY, 'required', null, 'client');

	$form -> addRule('password', _THEFIELD.' '._PASSWORD.' '._ISMANDATORY, 'required', null, 'client');
	$form -> addRule('passrepeat', _THEFIELD.' '._REPEATPASSWORD.' '._ISMANDATORY, 'required', null, 'client');
	
	// Added by Masoud Sadjadi on June 30, 2014 to support vLab in eFront
	require_once('profile_vLab.php');
	$form -> registerRule('checkExistingUser', 'callback', 'vLab_checkExistingUser'); //Register this rule for checking exisint users in vLab
	$form -> addRule('login', 'This user has an existing account with this username in vLab!', 'checkExistingUser', 'login');
	$form -> addRule('email', 'This user has an existing account with this email in vLab!', 'checkExistingUser', 'email');
	// End addition by Masoud Sadjadi

}

// Added by Masoud Sadjadi on July 4, 2014 to support vLab in eFront
$vLabEnabledState 	= array(
	'FIU',
	'Employee',
	'KaseyaScholar',
	'KCA',
	'KCT',
	'Professor',
	'KaseyaTester'
);
$vLabSuspendState 	= array(
	'LabSuspend'
);
$vLabDisabledState	= array(
	'KaseyaPublic',
	'Instructors',
	'DemoFree',
	'KaseyaQuickStart',
	'Sales',
	'Trial',
	'Administrator',
	'Student'
); 

$rolesPlain = EfrontUser :: getRoles(true);
$valueOfLabSuspend = array_search("LabSuspend", $rolesPlain);
$curUserTypeThatCantTransitToLabSuspend = $vLabDisabledState;
$form -> setValueOfInvalidUserType(-1);
if (isset($_GET['add_user'])) {
	$form -> setIsAddUser(true);
	$form -> setValueOfInvalidUserType($valueOfLabSuspend);
} else {
	$form -> setIsAddUser(false);
	$curUserTypeID = $editedUser -> user['user_types_ID'];
	if (in_array($rolesPlain[$curUserTypeID], $curUserTypeThatCantTransitToLabSuspend)) {
		$form -> setValueOfInvalidUserType($valueOfLabSuspend);
	}
} 
$form -> setIsSignupForm(false);
$form -> setIsProfileForm(true);
// End Add by Masoud

$form -> setMaxFileSize(FileSystemTree :: getUploadMaxSize() * 1024);			//getUploadMaxSize returns size in KB

if (G_VERSIONTYPE != 'community') { #cpp#ifndef COMMUNITY
	//Add custom fields, defined in user_profile database table
	if ($currentUser->user['login'] == $editedUser->user['login']) {
		if (isset($_GET['add_user'])) {
			$userProfile = eF_getTableData("user_profile", "*", "active=1 AND type <> 'branchinfo' AND type <> 'groupinfo'", "field_order");	//Get admin-defined form fields for user registration
		} else {
			$userProfile = eF_getTableData("user_profile", "*", "active=1 and visible=1 AND type <> 'branchinfo' AND type <> 'groupinfo'", "field_order");	//Get admin-defined form fields for user registration
		}
	} else {		
		$userProfile = eF_getTableData("user_profile", "*", "active=1 AND type <> 'branchinfo' AND type <> 'groupinfo'", "field_order");	//Get admin-defined form fields for user registration
	}
	foreach ($userProfile as $key => $field) {
		switch ($field['type']) {
			case 'select':
				$form -> addElement("select", $field['name'], $field['description'], unserialize($field['options']));
				break;
			case 'checkbox':
				$form -> addElement("advcheckbox", $field['name'], $field['description'], null, 'class = "inputCheckbox"', array(0,1));
				break;
			case 'text':
				$form -> addElement("text", $field['name'], $field['description'], 'class = "inputText"');
				break;
			case 'textarea':
				$form -> addElement("textarea", $field['name'], $field['description'], 'class = "inputContentTextarea simpleEditor" style = "width:100%;height:8em;"');
				break;
			case 'date':
				$options = unserialize($field['options']);
				$form -> addElement(EfrontEntity::createDateElement($form, $field['name'], $field['description'], array('minYear' => $options['year_range_from'], 'maxYear' => $options['year_range_to'], 'include_time' => $options['include_time'])));
				break;
			default: break;
		}

		if ($field['mandatory'] == 1 || (!isset($_GET['add_user']) && $field['mandatory'] == 2 && $currentUser->user['login'] == $editedUser->user['login'])) {
			$form -> addRule($field['name'], _THEFIELD.' "'.$field['description'].'" '._ISMANDATORY, 'required', null, 'client');
		}
		if ($field['rule']) {
			$form -> addRule($field['name'], _INVALIDFIELDDATA, 'checkRule', $field['rule']);
		}
		
	}
} #cpp#endif

if (isset($_GET['add_user'])) {
	$constrainAccess = array();
	$form -> setDefaults(array('active' 		=> 1,
							   'timezone' 		=> $GLOBALS['configuration']['time_zone'],
							   'languages_NAME' => $GLOBALS['configuration']['default_language']));
	if ($GLOBALS['configuration']['default_type']) {
		$form -> setDefaults(array('user_type' => $GLOBALS['configuration']['default_type']));
	}
	foreach ($userProfile as $key => $field) {
		if ($field['type'] == 'date' && $field['default_value'] == 0) {
			$form -> setDefaults(array($field['name'] => time()));
		} else {
			$form -> setDefaults(array($field['name'] => $field['default_value']));
		}
	}
} else {
	$form -> setDefaults($editedUser -> user);
	if (!$editedUser->user['timezone']) {
		$form -> setDefaults(array('timezone' => $GLOBALS['configuration']['time_zone']));
	}
	if ($editedUser -> user['user_types_ID']) {
		$form -> setDefaults(array('user_type' => $editedUser -> user['user_types_ID']));
	}
	$form -> setDefaults(array("system_avatar" => $avatar['name'], 'ldap_user' => $editedUser -> isLdapUser));
	// Added by Masoud Sadjadi on July 4, 2014 to empty the initial value of the password filed.
	$form -> setDefaults(array('password' => ''));
}

if ($contrainAllButPassword) {
	$allFields = $form -> _elementIndex;
	unset($allFields['password']);
	unset($allFields['passrepeat']);	
	if (is_array($constrainAccess)) {
		$constrainAccess = array_merge($constrainAccess, array_keys($allFields));	
	} else {
		$constrainAccess = array_keys($allFields);	
	}
	//$constrainAccess = $constrainAccess + array_keys($allFields);	// this excluded name because it keeps indexes of $constrainAccess

}
/*
foreach ($userProfile as $key => $field) {
	if ($field['mandatory'] == 2 && $currentUser->user['login'] == $editedUser->user['login'] && $editedUser->user[$field['name']] == '') {
		unset($allFields[$field['name']]);
		//pr($field['name']);
	} 
}

$constrainAccess = $constrainAccess + array_keys($allFields);	
*/
//vd($constrainAccess);
if ($constrainAccess != 'all') {
	$form -> addElement('submit', 'submit_personal_details', _SUBMIT, 'class = "flatButton"');
	$form -> freeze($constrainAccess);
} else {
	$form -> freeze();
}

if ($form -> isSubmitted() && $form -> validate()) {
	try {
		$values = $form -> exportValues();
		$roles  = EfrontUser :: getRoles();
		$userProperties = array(
			'login'		     => $values['login'],
			'name'		     => $values['name'],
			'surname'		 => $values['surname'],
			'active'		 => $values['active'],
			'email'		  	 => $values['email'],
			'user_type'	  	 => $roles[$values['user_type']],
			'languages_NAME' => $values['languages_NAME'],
			'timezone'	   	 => $values['timezone'],
			'timestamp'		 => time(),
			'password'		 => $values['password'],
			'user_types_ID'  => is_numeric($values['user_type']) ? $values['user_type'] : 0,
			'short_description' => $values['short_description'],
			'comments' 		 	=> $values['comments']
		);
		foreach ($userProfile as $field) {										 //Get the custom fields values
			if ($field['type'] == "date") {
				$timestampValues 		= $values[$field['name']];
				$values[$field['name']] = mktime($timestampValues['H'], $timestampValues['i'], 0, $timestampValues['M'], $timestampValues['d'], $timestampValues['Y']);
			}
			$userProperties[$field['name']] = $values[$field['name']];
		}

		// Added by Masoud Sadjadi on July 4, 2014 to support vLab in eFront
		// Beging addition
		$vLab_username 		= $userProperties['login'];
		$vLab_password 		= $userProperties['password'];
		$vLab_email 		= $userProperties['email'];
		$vLab_firstname 	= $userProperties['name'];
		$vLab_lastname 		= $userProperties['surname'];
		$vLab_timezone 		= $userProperties['timezone'];
		$vLab_companyname 	= $userProperties['comments'];
		
		$vLab_username_urlEncoded 		= rawurlencode($vLab_username);
		$vLab_password_urlEncoded 		= rawurlencode($vLab_password);
		$vLab_email_urlEncoded 			= rawurlencode($vLab_email);
		$vLab_firstname_urlEncoded 		= rawurlencode($vLab_firstname);
		$vLab_lastname_urlEncoded 		= rawurlencode($vLab_lastname);
		$vLab_timezone_urlEncoded 		= rawurlencode($vLab_timezone);
		$vLab_companyname_urlEncoded 	= rawurlencode($vLab_companyname);
	
		$vLab_courseid 		= 123; // Kaseya 7.0 Fundamentals Workshop
		$vLab_course 		= "Kaseya 7.0 Fundamentals Workshop";
		$vLab_resourceType 	= "VIRTUAL LAB";
		
		$vLab_courseid_urlEncoded 		= rawurlencode($vLab_courseid);
		$vLab_course_urlEncoded 		= rawurlencode($vLab_course);
		$vLab_resourceType_urlEncoded 	= rawurlencode($vLab_resourceType);

		// $vLab_moodleURL = "http://localhost/moodle19";
		$vLab_moodleURL = "http://ita-portal.cis.fiu.edu";

		// auto register	
		$str = $vLab_moodleURL . "/mod/deva/embedded/auto-register.php?efront=1&username=$vLab_username_urlEncoded&password=$vLab_password_urlEncoded&email=$vLab_email_urlEncoded&firstname=$vLab_firstname_urlEncoded&lastname=$vLab_lastname_urlEncoded&timezone=$vLab_timezone_urlEncoded&companyname=$vLab_companyname_urlEncoded";	
		// echo $str . '<br>';
		$payload = file_get_contents($str);
		// echo $payload;
/*
		$vLabGranted = array(
			'FIU'				=> true,
			'Employee'			=> true,
			'KaseyaScholar'		=> true,
			'KCA'				=> true,
			'KCT'				=> true,
			'Professor'			=> true,
			'KaseyaTester'		=> true,
			'LabSuspend'		=> false, // should not happen 
			'KaseyaPublic'		=> false,
			'Instructors'		=> false,
			'DemoFree'			=> false,
			'KaseyaQuickStart'	=> false,
			'Sales'				=> false,
			'Trial'				=> false,
			'Administrator'		=> false,
			'Student'			=> false
		);
*/	
		// echo "<br> \$values['user_type'] is " . $values['user_type'];
		$rolesPlain = EfrontUser :: getRoles(true);
		$roleTypeName = $rolesPlain[$values['user_type']];
		// echo "<br> \$roleTypeName is " . $roleTypeName;
		// echo "<br> \$vLabGranted[\$roleTypeName] is " . $vLabGranted[$roleTypeName];
		// exit;
		
		if (in_array($roleTypeName, $vLabEnabledState)) {	
			// auto enroll
			$str = $vLab_moodleURL . "/mod/deva/embedded/auto-enroll.php?username=$vLab_username_urlEncoded&courseid=$vLab_courseid_urlEncoded";	
			// echo $str . '<br>';
			$payload = file_get_contents($str);
			// echo $payload;
		
			// auto login
			$str = $vLab_moodleURL . "/mod/deva/embedded/auto-login.php?username=$vLab_username_urlEncoded";	
			// echo $str . '<br>';
			$payload = file_get_contents($str);
			// echo $payload;
			// End addition by Masoud Sadjadi
			
			// auto start vLab
			$str = $vLab_moodleURL . "/mod/deva/embedded/auto-start.php?username=$vLab_username_urlEncoded&course=$vLab_course_urlEncoded&resourceType=$vLab_resourceType_urlEncoded";
			// echo $str;
			$payload = file_get_contents($str);
		}
		// End addition by Masoud Sadjadi
		
		if (isset($_GET['add_user'])) {

			$editedUser = EfrontUser :: createUser($userProperties);
			//EfrontEvent::triggerEvent(array("type" => (-1) * EfrontEvent::SYSTEM_VISITED, "users_LOGIN" => $userProperties['login'], "users_name" => $userProperties['name'], "users_surname" => $userProperties['surname']));
		} else {
			
			// Added by Masoud Sadjadi on July 26, 2014 to support vLab in eFront
			// Beging addition
			if (in_array($roleTypeName, $vLabSuspendState)) {
				// Suspend vLab
				$str = $vLab_moodleURL . "/mod/deva/embedded/suspend.php?username=$vLab_username_urlEncoded&courseid=$vLab_courseid_urlEncoded";
				// echo $str;
				$payload = file_get_contents($str);
			} else if (in_array($roleTypeName, $vLabDisabledState)) {
				// auto enroll
				$str = $vLab_moodleURL . "/mod/deva/embedded/auto-unenroll.php?username=$vLab_username_urlEncoded&courseid=$vLab_courseid_urlEncoded";	
				// echo $str . '<br>';
				$payload = file_get_contents($str);
				// echo $payload;		
			}
			// echo $payload;
			// End addition by Masoud Sadjadi
			
			unset($userProperties['timestamp']);
			
			//!$editedUser->user['pending'] OR $editedUser->user['pending'] = !$userProperties['active'];		//If the user was pending, then set his status as the opposite of 			
			if ($editedUser->user['pending']) {
				$editedUser->user['pending'] = !$userProperties['active'];
				EfrontEvent::triggerEvent(array("type" => EfrontEvent::SYSTEM_ON_ADMIN_ACTIVATION, "users_LOGIN" => $editedUser->user['login'], "users_name" => $editedUser->user['name'], "users_surname" => $editedUser->user['surname'], "timestamp" => time(), "entity_name" => time()));
				
			}
			
			foreach ($constrainAccess as $value) {
				unset($userProperties[$value]);
			}
			if ($values['ldap_user'] && !$editedUser -> isLdapUser) {
				$userProperties['password'] = 'ldap';
			} else if (!$values['password']) {//If a password is not set, don't set it
				if (!$values['ldap_user'] && $editedUser -> isLdapUser && $currentUser->user['login'] != $editedUser->user['login']) {
					$userProperties['password'] = '';
					$ldapMessage = ' '._PLEASEREMEMBERTOSETUPAPASSWORD;
				} else {
					unset($userProperties['password']);
				}
			} else {
				$userProperties['password'] = EfrontUser::createPassword($userProperties['password']);	//encode the password
			}
			$editedUser->user = array_merge($editedUser->user, $userProperties);
			$editedUser->persist();
			if ($currentUser -> user['login'] == $editedUser -> user['login'] && $_SESSION['s_password'] != $editedUser -> user['password']) {
				$_SESSION['s_password'] = $editedUser -> user['password'];
			}
			if ($currentUser -> user['login'] == $editedUser -> user['login'] && $_SESSION['s_language'] != $editedUser -> user['languages_NAME']) {
				$_SESSION['s_language'] = $editedUser -> user['languages_NAME'];
			}
		}

		if (!in_array('file_upload', $constrainAccess) && $constrainAccess != 'all') {

			$avatarDirectory = G_UPLOADPATH.$editedUser -> user['login'].'/avatars';
			is_dir($avatarDirectory) OR mkdir($avatarDirectory, 0755);
			try {
				$filesystem   = new FileSystemTree($avatarDirectory);
				$uploadedFile = $filesystem -> uploadFile('file_upload', $avatarDirectory);
				if (strpos($uploadedFile['mime_type'], 'image') === false) {
					throw new EfrontFileException(_NOTANIMAGEFILE, EfrontFileException::NOT_APPROPRIATE_TYPE);
				}
				eF_normalizeImage($avatarDirectory . "/" . $uploadedFile['name'], $uploadedFile['extension'], 150, 100);// Normalize avatar picture to 150xDimY or DimX x 100
				$editedUser -> user['avatar'] = $uploadedFile['id'];
//pr($editedUser -> user['avatar']);exit;				
			} catch (Exception $e) {
//pr($e);	exit;		
				if ($e -> getCode() == EfrontFileException::NOT_APPROPRIATE_TYPE) {
					$uploadedFile -> delete();
				}
				
				if ($e -> getCode() != UPLOAD_ERR_NO_FILE) {
					throw $e;
				}
	
				if ($form -> exportValue('system_avatar') == "none") {
					$selectedAvatar = 'unknown_small.png';
				} else if ($form -> exportValue('system_avatar') != "") {
					$selectedAvatar = $form -> exportValue('system_avatar');
				}
	
				if (isset($selectedAvatar)) {			
					$selectedAvatar = $avatarsFileSystemTree -> seekNode(G_SYSTEMAVATARSPATH.$selectedAvatar);
					$newList		= FileSystemTree :: importFiles($selectedAvatar['path']);								//Import the file to the database, so we can access it with view_file
					$editedUser -> user['avatar'] = key($newList);
				}
			}
			EfrontEvent::triggerEvent(array("type" => EfrontEvent::AVATAR_CHANGE, "users_LOGIN" => $editedUser -> user['login'], "users_name" => $editedUser->user['name'], "users_surname" => $editedUser->user['surname'], "lessons_ID" => 0, "lessons_name" => "", "entity_ID" => $editedUser -> user['avatar']));
		}
		$editedUser -> persist();

		if (G_VERSIONTYPE == 'enterprise') { #cpp#ifdef ENTERPRISE
			if (isset($_GET['add_user'])) {
				$editedEmployee = EfrontHcdUser :: createUser(array('users_login' => $editedUser->user['login']));
				if ($currentEmployee -> isSupervisor() && !EfrontUser::isOptionVisible('show_unassigned_users_to_supervisors')) {//if supervisors can't see unassigned users, then attach this new user to the supervisor's firts branch and job
					$branch = new EfrontBranch(current($currentEmployee -> getSupervisedBranchesRecursive()));
					$nospecific = false;
					foreach ($branch -> getJobDescriptions() as $value) {
						if ($value['description'] == _NOSPECIFICJOB) {
							$nospecific = $value['job_description_ID'];
						}						
					}
					if (!$nospecific) {
						$nospecific = EfrontJob::createJob(array('description' => _NOSPECIFICJOB, 'branch_ID' => $branch->branch['branch_ID']));
					}
					$editedEmployee -> addJob($editedUser, $nospecific, $branch->branch['branch_ID'], 0);
				}
			}
		} #cpp#endif

		if (isset($_SESSION['missing_fields'])) {
			unset($_SESSION['missing_fields']);
			loginRedirect($editedUser->user['user_type'], urlencode(_OPERATIONCOMPLETEDSUCCESSFULLY.$ldapMessage), 'success');
		} else if ($editedUser->user['user_type'] == 'administrator' || !isset($_GET['add_user'])) {
			eF_redirect($_SERVER['PHP_SELF']."?ctg=personal&user=".$editedUser->user['login']."&op=profile&message=".urlencode(_OPERATIONCOMPLETEDSUCCESSFULLY.$ldapMessage)."&message_type=success");
		} else {
			eF_redirect($_SERVER['PHP_SELF']."?ctg=personal&user=".$editedUser->user['login']."&op=user_courses&message=".urlencode(_OPERATIONCOMPLETEDSUCCESSFULLY.$ldapMessage)."&message_type=success");
		}

	} catch (Exception $e) {
		handleNormalFlowExceptions($e);
	}

}

$smarty -> assign("T_PROFILE_FORM", $form -> toArray());


