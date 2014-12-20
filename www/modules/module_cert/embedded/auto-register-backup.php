<?php 
/* 
	Author: Masoud Sadjadi
	First created on June 25, 2014
	This page allows a user to be automatically registered into vLab.
	First, it checks to see if anyone with the same username and/or password has been registered.
		If this is the case, then check to see if the current user the same as the requested one.
			If this is the case, then do not do anything and return successfully
*/
    require_once('../../../config.php');
    require_once($CFG->libdir.'/gdlib.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->dirroot.'/user/editadvanced_form.php');
    require_once($CFG->dirroot.'/user/editlib.php');
    require_once($CFG->dirroot.'/user/profile/lib.php');
	
	require_once($CFG->dirroot.'/mod/scheduler/fullcalendar/calendar.php');
	require_once($CFG->dirroot.'/mod/scheduler/fullcalendar/quotasystem.php');
	
	require_once('efront/timezone-tool.php');
	
	echo '<br>1';
	$efront = $_GET["efront"]; // call from eFront?
	echo '<br>efront: ' . $efront;
	$username = $_GET["username"]; // username for embedded verions
	echo '<br>username: ' . $username;
	$password = $_GET["password"]; // password for embedded version
	echo '<br>password: ' . $password;
	$email = $_GET["email"]; // email for embedded version
	echo '<br>email: ' . $email;
	$firstname = $_GET["firstname"]; // firstname for embedded version
	echo '<br>firstname: ' . $firstname;
	$lastname = $_GET["lastname"]; // lastname for embedded version
	echo '<br>lastname: ' . $lastname;
	$timezone = $_GET["timezone"]; // timezone for embedded version
	echo '<br>eFront timezone: ' . $timezone;
	if (efront) {
		$timezone = eFront2vLabTimezone($timezone);
		echo '<br>vLab timezone: ' . $timezone;
	}
	$companyname = $_GET["companyname"]; // companyname for embedded version
	echo '<br>eFront companyname: ' . $companyname;
	echo '<br>2';

	/*
	$userexists = false;
    if ($user = get_record('user', 'username', $username)) {
		echo '<br>A user with the username ' . $username. ' already exists in vLab.';
		echo '<br>';
		print_r($user);
		exit;
	}

    if ($user = get_record('user', 'email', $email)) {
		echo '<br>A user with the email ' . $email. ' already exists in vLab.';
		echo '<br>';
		print_r($user);
		exit;

	}
	
	echo 'No user for this request was already registered in vLab.';
	*/
	
	$usernew = new object();
	$usernew->id = -1;
	$usernew->auth = 'manual';
	$usernew->deleted = 0;
	unset($usernew->id);
	$usernew->mnethostid = $CFG->mnet_localhost_id; // always local user
	$usernew->confirmed  = 1;
	$usernew->password = hash_internal_user_password($password);
	$usernew->username = $username;
	$usernew->email = $email;
	$usernew->firstname = $firstname;
	$usernew->lastname = $lastname;
	if(createUserProfile($username, $usernew)){
		if (!$usernew->id = insert_record('user', $usernew)) {
			admin_moodlefailed_email($usernew,'addUser',$course);
			error('Error creating user record');
		}
		// Insert the user_custom_profile_field for timezone
		$rec = new object();
		$rec->userid = $usernew->id;
		$rec->fieldid = 4;
		$rec->data    = $timezone;
		insert_record('user_info_data', $rec);

		// Insert the user_custom_profile_field for companyname
		$rec = new object();
		$rec->userid = $usernew->id;
		$rec->fieldid = 2;
		$rec->data    = $companyname;
		insert_record('user_info_data', $rec);

		// reload from db
		$usernew = get_record('user', 'id', $usernew->id);
		// setUserTimeZone($usernew->id, $zone);
		setWSUserDefaultTimeZone('admin', $usernew);
		editUserProfilePassword("admin", $usernew->username, $password);
		if(!addQSUser($usernew)){
			admin_signuperror_email($usernew);			
			//error('An error has occured, please try again shortly.');
		}
	} else {
		$usercreated = false;
		//deleteQSUser($usernew);
		admin_webservicefailed_email($usernew, 'addUser', $course);	
	}
?>
