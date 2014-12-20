<?php

/**
 *
 * @author
 * @version 
 * @package mod/deva
 */
/// (Replace deva with the name of your module and remove this line)

    require_once("../../../config.php");
	require_once($CFG->dirroot.'/group/lib.php');

	require_once($CFG->dirroot.'/mod/scheduler/fullcalendar/calendar.php');
	require_once($CFG->dirroot.'/mod/scheduler/fullcalendar/quotasystem.php');


	$username = $_GET["username"]; // username for embedded verions
	$courseid = $_GET["courseid"]; // courseid for embedded version

	// echo " username: $username and courseid: $courseid";

	if (!$username || !$courseid) {
    	error('You must specify a username and courseid.');
		exit();
	}
	

	if (!$course = get_record('course', 'id', $courseid)) {
       	exit();
    	error('Course is misconfigured');
    }
	
	// echo "<br> \$course->fullname is $course->fullname";
	// 	print_r($course);

    if (!$context = get_context_instance(CONTEXT_COURSE, $course->id) ) {
		echo 'Count not get the context instance';
		exit();
        print_error("That's an invalid course id");
    }

    if(!$USER = get_record('user','username',$username)) {
		echo 'The username ' . $username . ' is invalid';
		exit();
        print_error("That's an invalid username");
    }
    
	// echo "<br> \$USER->username is $USER->username";
	// print_r($USER);

            if (!enrol_into_course($course, $USER, 'manual')) {
                print_error('couldnotassignrole');
            }
            // force a refresh of mycourses
            unset($USER->mycourses);

            if (!empty($SESSION->wantsurl)) {
                $destination = $SESSION->wantsurl;
                unset($SESSION->wantsurl);
            } else {
                $destination = "$CFG->wwwroot/course/view.php?id=$course->id";
            }

			if(!enrollQSUser($USER, $course)){		//Added: 12.30.2010
				admin_webservicefailed_email($USER,'enrollUser',$course);
				if (! role_unassign(0, $USER->id, 0, $context->id)) {
					// Should email the Admin if this happens
					error("An error occurred while trying to unenrol that person.");
				}
				//admin_moodlefailed_email($USER,'unenrollUser');
			}else{
				if(!enrollUserInCourse($USER->username, $USER->username, $course->fullname, true)){	
					if (! role_unassign(0, $USER->id, 0, $context->id)) {
						error("An error occurred while trying to unenrol that person.");
					}
					// Should email the Admin if this happens
					unenrollQSUser($USER, $course);
					admin_webservicefailed_email($USER,'enrollUser',$course);
				}
			}
			
		$payload = file_get_contents($destination);
?>
