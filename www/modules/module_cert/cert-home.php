<?php

// Added by Masoud Sadjadi on Jan. 18, 2015
// to support the definition of VLAB_LMS_ROOT
$path = "../../../libraries/";
include_once $path."configuration.php";

	$username 	= $_GET["username"]; // username for embedded verions
	// echo $username;
	$roleTypeName 	= $_GET["roleTypeName"]; // roleTypeName for embedded verions
	// echo $roleTypeName;
	// $baseURL = "http://localhost/moodle19/";
	// $baseURL = "http://ita-portal.cis.fiu.edu/";
	$baseURL = VLAB_LMS_ROOT;
	// $kcaTheoryURL = "mod/quiz/view-embedded.php?id=10576&username=$username";
	$kcaTheoryURL = "mod/quiz/view-embedded.php?id=10864&username=$username";
	// echo $baseURL . $kcaTheoryURL;
	$kcaHandsonURL = "mod/quiz/view-embedded.php?id=10578&username=$username";
	// echo $baseURL . $kctHandsonURL;
	// $kctTheoryURL = "mod/quiz/view-embedded.php?id=10834&username=$username";
	$kctTheoryURL = "mod/quiz/view-embedded.php?id=10863&username=$username";
	// echo $baseURL . $kctTheoryURL;
	$kctHandsonURL = "mod/quiz/view-embedded.php?id=10835&username=$username";
	// echo $baseURL . $kcaHandsonURL;
	
	$kcaGranted = array(
		'FIU'				=> true, 
		'Employee'			=> true, 
		'KaseyaScholar'		=> true, 
		'KCA'				=> true,
		'KCT'				=> false,
		'Professor'			=> true,
		'KaseyaTester'		=> true,
		'LabSuspend'		=> false,
		'KaseyaPublic'		=> false,
		'Instructors'		=> false,
		'DemoFree'			=> false,
		'KaseyaQuickStart'	=> false,
		'Sales'				=> false,
		'Trial'				=> false,
		'Administrator'		=> false,
		'Student'			=> false
	);
	$kctGranted = array(
		'FIU'				=> true, 
		'Employee'			=> true, 
		'KaseyaScholar'		=> true, 
		'KCA'				=> false,
		'KCT'				=> true,
		'Professor'			=> true,
		'KaseyaTester'		=> true,
		'LabSuspend'		=> false,
		'KaseyaPublic'		=> false,
		'Instructors'		=> false,
		'DemoFree'			=> false,
		'KaseyaQuickStart'	=> false,
		'Sales'				=> false,
		'Trial'				=> false,
		'Administrator'		=> false,
		'Student'			=> false
	);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Accordion - Default functionality</title>
<!--  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
-->
<link type="text/css" href="jquery-ui/css/redmond-light/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
<script type="text/javascript" src="jquery-ui/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery-ui/js/jquery-ui-1.8.4.custom.min.js"></script>
<script type='text/javascript' src='jquery-ui/dataTables/media/js/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='jquery-ui/dataTables/examples/examples_support/jquery.jeditable.js'></script>
  <script>
  $(function() {
<?php if ($kcaGranted[$roleTypeName] && !$kctGranted[$roleTypeName]) { ?>
    $( "#accordion" ).accordion({ active: 0 });
<?php } else if (!$kcaGranted[$roleTypeName] && $kctGranted[$roleTypeName]) { ?>
    $( "#accordion" ).accordion({ active: 0});
<?php } else { ?>
    $( "#accordion" ).accordion({ active: false });
<?php } ?>
	$( ".certButton" ).button().click(function( event ) {
        // event.preventDefault();
      });
  });
  </script>
</head>
<body>
 
<div id="accordion">
<?php if ($kcaGranted[$roleTypeName]) { ?>
  <h3>Kaseya Certified Administrator (KCA)</h3>
  <div>
    <p>
This certificate exam has 100 points. You must receive a score of <strong>90 or higher</strong> to pass the exam. The exam is comprised of two parts, <em>theory (30 points) </em>and <em>hands-on (70 points)</em>. 
<ul>
  <li>For the <a href="<?php echo $baseURL . $kcaTheoryURL; ?>">theory part</a>, you will receive 30 randomly selected multiple-choice or true-false questions that evaluate your familiarity with Kaseya VSA. You have 30 minutes to answer all of the questions. For this part, you have unlimited number of attempts. This means that you can retake the theory test over and over again until you get the perfect score, if desired. Your score will be provided to you immediately after taking the test. The score for this part comprises <strong>30%</strong> of your total score.</li>
  <li>For the <a href="<?php echo $baseURL . $kcaHandsonURL; ?>">hands-on part</a>, you will receive 19 randomly selected tasks from all major topics in your training that you would need to perform within two hours using a blank virtual environment. You have one attempt at the hands-on exam. Once the exam is completed, submit the answer file for grading. Your answer file will be graded typically no longer than 10 business days (two weeks) from the time you took the test. The score for this part comprises<strong> 70% </strong>of your total score.</li>
  <p align="center">
    <a class="certButton" href="<?php echo $baseURL . $kcaTheoryURL; ?>">KCA Theory</a>
    <a class="certButton" href="<?php echo $baseURL . $kcaHandsonURL; ?>">KCA Hands-On</a>
  </p>
</ul>
  </p>
  </div>
<?php } ?>
<?php if ($kctGranted[$roleTypeName]) { ?>
  <h3>Kaseya Certified Technician (KCT)</h3>
  <div>
    <p>This certificate exam has 100 points. You must receive a score of <strong>90 or higher</strong> to pass the exam. The exam is comprised of two parts, <em>theory (30 points) </em>and <em>hands-on (70 points)</em>. </p>
    <ul>
      <li>For the <a href="<?php echo $baseURL . $kctTheoryURL; ?>">theory part</a>, you will receive 30 randomly selected multiple-choice or true-false questions that evaluate your familiarity with Kaseya VSA. You have 30 minutes to answer all of the questions. For this part, you have unlimited number of attempts. This means that you can retake the theory test over and over again until you get the perfect score, if desired. Your score will be provided to you immediately after taking the test. The score for this part comprises <strong>30%</strong> of your total score.</li>
      <li>For the <a href="<?php echo $baseURL . $kctHandsonURL; ?>">hands-on part</a>, you will receive 19 randomly selected tasks from all major topics in your training that you would need to perform within two hours using a blank virtual environment. You have one attempt at the hands-on exam. Once the exam is completed, submit the answer file for grading. Your answer file will be graded typically no longer than 10 business days (two weeks) from the time you took the test. The score for this part comprises<strong> 70% </strong>of your total score.</li>
  <p align="center">
    <a class="certButton" href="<?php echo $baseURL . $kctTheoryURL; ?>">KCT Theory</a>
    <a class="certButton" href="<?php echo $baseURL . $kctHandsonURL; ?>">KCT Hands-On</a>
  </p>
    </ul>
  </div>
<?php } ?>
</div>
 
 
</body>
</html>
