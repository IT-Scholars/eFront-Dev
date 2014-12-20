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
	echo "<br> \$username is $username and \$courseid is $courseid";
	

	if (!$course = get_record('course', 'id', $courseid)) {
    	error('Course is misconfigured');
       	exit();
    }
	echo "<br> Course is $course->fullname";
	
	// echo "<br> \$course->fullname is $course->fullname";
	// 	print_r($course);

    if (!$context = get_context_instance(CONTEXT_COURSE, $course->id) ) {
		echo 'Count not get the context instance';
        error("That's an invalid course id");
		exit();
    }
	echo "<br> Context id is $context->id";

    if(!$user = get_record('user','username',$username)) {
		echo 'The username ' . $username . ' is invalid';
        error("That's an invalid username");
		exit();
    }
	echo "<br> User is $user->firstname $user->lastname";

    // If user wasn't enrolled, enrol now. Ignore otherwise. 
	if ($role = get_record('role','name','Student')) {
    // if (($role = get_default_course_role($course))) {
	 	echo "<br> The role description is $role->description";
		echo "<br> Calling user_has_role_assignment(\$user->id, \$role->id, \$context->id) with user_has_role_assignment($user->id, $role->id, $context->id)";
		if (! user_has_role_assignment($user->id, $role->id, $context->id)) {
            echo "<br> User is not enroled in this course";
			if (!enrol_into_course($course, $user, 'manual')) {
                print_error('couldnotassignrole');
				echo "<br> User could NOT be enrolled into the course";
        		error("User could NOT be enrolled into the course");
				exit();
            }
			echo "<br> User was just enrolled into the course";

            // force a refresh of mycourses
            unset($user->mycourses);

            if (!empty($SESSION->wantsurl)) {
                $destination = $SESSION->wantsurl;
                unset($SESSION->wantsurl);
            } else {
                $destination = "$CFG->wwwroot/course/view.php?id=$course->id";
            }
			echo "<br> \$destination is set to $destination";
			
			if (!enrollQSUser($user, $course)){		//Added: 12.30.2010
				echo "<br> enrollQSUser was NOT successful";
				admin_webservicefailed_email($user,'enrollUser',$course);
				if (! role_unassign(0, $user->id, 0, $context->id)) {
					// Should email the Admin if this happens
					error("An error occurred while trying to unenrol that person.");
					exit();
				}
				//admin_moodlefailed_email($user,'unenrollUser');
			} else {
				echo "<br> enrollQSUser was successful";
				if (!enrollUserInCourse($user->username, $user->username, $course->fullname, true)) {	
					echo "<br> enrollUserInCourse was NOT successful";
					if (! role_unassign(0, $user->id, 0, $context->id)) {
						error("An error occurred while trying to unenrol that person.");
						exit();
					}
					echo "<br> role_unassign was successful";
					// Should email the Admin if this happens
					unenrollQSUser($user, $course);
					admin_webservicefailed_email($user,'enrollUser',$course);
				}
				echo "<br> enrollUserInCourse was successful";
			}
			
			$payload = file_get_contents($destination);
			send_enrollment_notification($course, $user);
        } else {
			echo "<br> User $user->username was already enrolled in course $course->fullname";
    	}
    } else {
		echo "<br> get_record('role','name','Student') was NOT successful";
        error("get_record('role','name','Student') was NOT successful");
		exit();
    }


?>
