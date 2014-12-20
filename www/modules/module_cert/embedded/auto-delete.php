<?php 

/**
 * Calling this program with a valid username in vLab and no courseid would result 
 * in unenrolling the user from all the courses enrolled in vLab and then deleting
 * the user.
 *
 * Calling with a valid username and a valid courseid would result in unenrolling 
 * the user from that course. If the user is still enrolled in some other courses
 * the user would not be deleted; otherwise, the user would be deleted too.
 *	
 * @author Masoud Sadjadi
 * @version 1.0 
 * @package mod/deva/embedded
 */

require_once('../../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->dirroot.'/user/filters/lib.php');

require_once($CFG->dirroot.'/mod/scheduler/fullcalendar/calendar.php');
require_once($CFG->dirroot.'/mod/scheduler/fullcalendar/quotasystem.php');

// $username = $_GET["username"]; // username for embedded verions
// $courseid = $_GET["courseid"]; // courseid for embedded version
$username  = optional_param('username', '', PARAM_TEXT);
$courseid  = optional_param('courseid', 0, PARAM_INT);
echo "<br> \$username is $username and \$courseid is $courseid.";
	
function _unenrollUserFromCourse($user, $course) {
	$retVal = true;
	echo "<br> $username is now going to be unenrolled from $course->fullname.";
	if (unenrollQSUser($user, $course)) {
		echo "<br> unenrollQSUser for $user->username and $course->fullname was successful.";
		if (enrollUserInCourse($user->username, $user->username, $course->fullname, false)) {
			echo "<br> enrollUserInCourse for $user->username and $course->fullname and false was successful.";
			if (!$context = get_context_instance(CONTEXT_COURSE, $course->id)) {
			   	echo "<br> Course context for $course->fullname is invalid";
				admin_moodlefailed_email($user,'unenrollUser',$course);
				$retVal = false;
			}
			echo "<br> Course context id is $context->id";
			if (!role_unassign(0, $user->id, 0, $context->id)) {
				echo "An error occurred in role_unassign while trying to unenroll $username from vLab via auto-delete.";
				admin_moodlefailed_email($user,'unenrollUser',$course);
				$retVal = false;
			}
			echo "<br> role_unassign for user id of $user->id and context id of $context->id was successful.";
			send_unenrollment_notification($course,$user);
			add_to_log($course->id, 'course', 'unenrol', "auto-delete", $course->id);
		} else {
			enrollQSUser($user, $course);
			echo "An error occurred in enrollUserInCourse while trying to unenrll $username from vLab via auto-delete.";
			admin_moodlefailed_email($user,'unenrollUser',$course);
			$retVal = false;
		}
	} else {
		echo "An error occurred in unenrollQSUser while trying to unenroll $username from vLab via auto-delete.";
		admin_moodlefailed_email($user,'unenrollUser',$course);
		$retVal = false;
	}
	return $retVal;
}

function _unenrollUserFromAllCourses($user) {
	$retVal = true;
	echo "<br> $username is now going to be unenrolled from alll courses.";
	$userCourses = getAvailCourses($username);
	if (!empty($userCourses)) {
		foreach ($userCourses as $userCourse) {
			echo "<br> $username has been enrolled in $userCourse";
			if (_unenrollUserFromCourse($user, $userCourse)) {
				echo "<br> _unenrollUserFromCourse was successful.";
			} else {
				echo "<br> _unenrollUserFromCourse was NOT successful.";
				$retVal = false;
			}
		}
	} 
	return $retVal;
}

function _deleteUser($user) {
	$retVal = true;
	echo "<br> $username is now going to be deleted from vLab!";
	if(deleteQSUser($user)){
		echo "<br> deleteQSUser for $user->username was successful.";
		if(deleteUserProfile('admin', $user)){
			echo "<br> deleteUserProfile for $user->username was successful.";
			if (delete_user($user)) {
				echo "<br> delete_user for $user->username was successful.";
				echo "<br> $user->username was successfully deleted from vLab.";		
				send_user_deleted_notification($user);	
			} else {
				echo "<br> Error occurred in delete_user while trying delete $username from vLab.";
				admin_moodlefailed_email($user,'deleteUser');
				$retVal = false;
			}
		} else {
			addQSUser($user);	// re-Adds the user to the QS if second WS call fails
			echo "<br> Error occurred in deleteUserProfile while trying delete $username from vLab.";
			admin_webservicefailed_email($user,'deleteUser');
			$retVal = false;
		}
	} else {
		echo "<br> Error occurred in deleteQSUser while trying delete $username from vLab.";
		admin_moodlefailed_email($user,'deleteUser');
		$retVal = false;
	}		
	return $retVal;
}

if ($username != '') {
	echo "<br> \$username is $username.";
	if($user = get_record('user','username',$username)) {
		echo "<br> User is $user->firstname $user->lastname";
		if ($courseid == 0) {
			echo "<br> No courseid was provided; therefore, $username will frist be unenrolled from all courses and then will be deleted.";
			if (_unenrollUserFromAllCourses($user)) {
				echo "<br> unenrollUserFromAllCourses was successful.";
			} else {
				echo "<br> unenrollUserFromAllCourses was NOT successful.";
				error("unenrollUserFromAllCourses was NOT successful.");
				exit();
			}
		} else {
			echo "<br> \$courseid is $courseid.";
			if ($course = get_record('course', 'id', $courseid)) {
				echo "<br> Course is $course->fullname";
				if (_unenrollUserFromCourse($user, $course)) {
					echo "<br> _unenrollUserFromCourse was successful.";
				} else {
					echo "<br> _unenrollUserFromCourse was NOT successful.";
					error("_unenrollUserFromCourse was NOT successful.");
					exit();
				}
			} else {
   				echo "<br> Course with id $courseid does NOT exist in vLab";
				error("Course with id $courseid does NOT exist in vLab");
				exit();
			}
		}
		$userCourses = getAvailCourses($username);
		if (empty($userCourses)) {
			echo "<br> $username is not enrolled in any other courses.";
			if (_deleteUser($user)) {
				echo "<br> deleteUser was successful.";
			} else {
				echo "<br> deleteUser was NOT successful.";
				error("deleteUser was NOT successful.");
				exit();
			}
		} else {
			echo "<br> $username is still enrolled in some courses; therefore, $username was not deleted.";
		}
	} else {
		echo "<br> $username does NOT exist in vLab";
		error("$username does NOT exist in vLab");
		exit();
	}
} else {
   	echo "<br> You must specify a username.";
	error("You must specify a username.");
	exit();
}
	
/*
$shouldDeleteUser = true;
$shouldUnenrollUser = false;
$userCourses = getAvailCourses($username);
if (!empty($userCourses)) {
	foreach ($userCourses as $userCourse) {
		echo "<br> $username has been enrolled in $userCourse";
		if ($userCourse != $course->fullname) {
			echo "<br> $userCourse is not the same as $course->fullname; therefore, this user cannot be deleted from vLab";
			$shouldDeleteUser = false;
		} else {
			echo "<br> $userCourse is the same as $course->fullname";
			$shouldUnenrollUser = true;
		}
	} 
} else {
	echo "<br> $username is not enrolled in any courses in vLab and therefore is NOT going to be deleted.";
	$shouldDeleteUser = false;
	$shouldUnenrollUser = false;
}
			
if ($shouldDeleteUser) {
	echo "<br> $username has been enrolled only in $course->fullname and is now going to be deleted from vLab!";
	if(deleteQSUser($user)){
			echo "<br> deleteQSUser for $user->username was successful.";
			if(deleteUserProfile('admin', $user)){
				echo "<br> deleteUserProfile for $user->username was successful.";
				if (delete_user($user)) {
					echo "<br> delete_user for $user->username was successful.";
					echo "<br> $user->username was successfully deleted from vLab.";		
					send_user_deleted_notification($user);
					exit();	
				} else {
					admin_moodlefailed_email($user,'deleteUser');
					echo "<br> Error occurred in delete_user while trying delete $username from vLab.";
       				error("Error occurred in delete_user while trying delete $username from vLab.");
					exit();
				}
			} else {
				addQSUser($user);	// re-Adds the user to the QS if second WS call fails
				admin_webservicefailed_email($user,'deleteUser');
				echo "<br> Error occurred in deleteUserProfile while trying delete $username from vLab.";
       			error("Error occurred in deleteUserProfile while trying delete $username from vLab.");
				exit();
			}
		} else {
			echo "<br> Error occurred in deleteQSUser while trying delete $username from vLab.";
       		error("Error occurred in deleteQSUser while trying delete $username from vLab.");
			exit();
		}		
	} else {
		echo "<br> $username will NOT be deleted from vLab! Checking to see if he should be unenrolled from $course->fullname ...";
		if ($shouldUnenrollUser) {
			echo "<br> $username is now going to be unenrolled from $course->fullname, but will NOT be deleted from vLab!";
			if (unenrollQSUser($user, $course)) {
				echo "<br> unenrollQSUser for $user->username and $course->fullname was successful.";
				if (enrollUserInCourse($user->username, $user->username, $course->fullname, false)) {
					echo "<br> enrollUserInCourse for $user->username and $course->fullname and false was successful.";
					if (!role_unassign(0, $user->id, 0, $context->id)) {
						admin_moodlefailed_email($user,'unenrollUser',$course);
						error("An error occurred in role_unassign while trying to unenroll $username from vLab via auto-delete.");
						exit();
					}
					echo "<br> role_unassign for user id of $user->id and context id of $context->id was successful.";
					send_unenrollment_notification($course,$user);
					add_to_log($course->id, 'course', 'unenrol', "auto-delete", $course->id);
				} else {
					enrollQSUser($user, $course);
					admin_moodlefailed_email($user,'unenrollUser',$course);
					error("An error occurred in enrollUserInCourse while trying to unenrll $username from vLab via auto-delete.");
					exit();
				}
			} else {
				admin_moodlefailed_email($user,'unenrollUser',$course);
				error("An error occurred in unenrollQSUser while trying to unenroll $username from vLab via auto-delete.");
				exit();
			}
			
		} else {
			echo "<br> $username was NOT enrolled in $course->fullname and will NOT be deleted from vLab!";
		}
	}
*/

?>
