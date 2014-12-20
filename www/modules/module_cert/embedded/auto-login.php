<?php 
/* 
	Author: Masoud Sadjadi
	First created on June 25, 2014
	This page allows a user to be automatically logged into vLab.
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
	echo '<br>2';

	if ($user = get_record('user', 'username', $username)) {
		echo '<br>A user with the username ' . $username. ' does exist in vLab.<br>';
		print_r($user);
	} else {
		echo '<br>A user with the username ' . $username. ' does NOT exist in vLab.<br>';
		exit;
	}

	if ((isloggedin()) && ($USER->username == $username)) {
		echo "<br>The user $username has already logged in.<br>";
		exit;
	} else {
		echo "<br>The user $username was NOT logged in.<br>";
	}	

	if ((isloggedin()) && ($USER->username != $username)) {
		echo "<br>The user $USER->username was logged in instead.<br>";
	}

    if (!$user = get_record('user', 'username', $username)) {
		echo '<br>No user for this request was already registered in vLab.<br>';
		exit;
	} else {
		echo '<br>The user with the username ' . $username. ' already exists in vLab.<br>';
		print_r($user);
		echo '<br>';
	}

	if ($password) {
		echo "<br>Password $password was provided. Trying to loing using $username/$password as username/password...<br>";
		$USER = authenticate_user_login($username,$password);
		complete_user_login($USER);
	} else {
		echo "<br>No password was provided. Trying to loing using $username as username ...<br>";
		$user = get_record('user', 'username', $username);
		echo "<br> Trying to login as \$user->id $user->id<br>"; 
		// Create the new USER object with all details and reload needed capabilitites
    	$USER = get_complete_user_data('id', $user->id);
	}

   	check_enrolment_plugins($USER);
	load_all_capabilities();   // reload capabilities
	
	if ((isloggedin()) && ($USER->username == $username)) {
		echo "<br>The user $username was successfully logged in.<br>";
	} else {
		echo "<br>The user $username could NOT logged in.<br>";
	}

?>
