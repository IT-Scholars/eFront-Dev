<html>

<head>
<link type="text/css" href="jquery-ui/css/redmond-light/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
<script type="text/javascript" src="jquery-ui/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery-ui/js/jquery-ui-1.8.4.custom.min.js"></script>
<script type='text/javascript' src='jquery-ui/dataTables/media/js/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='jquery-ui/dataTables/examples/examples_support/jquery.jeditable.js'></script>
    
<script type='text/javascript' src="http://code.jquery.com/jquery-1.4.4.js"></script>

<link rel="stylesheet" type="text/css" href="css/styles.css" />

<style type="text/css" media="screen">
	
	@import "jquery-ui/dataTables/media/css/demo_table_jui.css";
	
	/*
	 * Override styles needed due to the mix of three different CSS sources! For proper examples
	 * please see the themes example in the 'Examples' section of this site
	 */
	.dataTables_info { padding-top: 0; }
	.dataTables_paginate { padding-top: 0; }
	.css_right { float: right; }
	#example_wrapper .fg-toolbar { font-size: 0.8em }
	#theme_links span { float: left; padding: 2px 10px; }
	
</style>
<STYLE TYPE="text/css"> 
TH, TD{font-family: Arial; font-size: 10pt;} 
</STYLE>
<script type="text/javascript">
$(document).ready(function(){
    //parent.selectTab("dataSheet", document.documentElement.scrollHeight);

	div ="<br/><br/>";
	div += '  <table bordercellpadding="0" cellspacing="0" border="0" class="display" id="devaTable">';
	div += '  <thead>';
    div += '    <tr>';
	div += '      <th class="ui-state-default"><span class="css_right ui-icon ui-icon-carat-2-n-s"></span>';
	div += '        Variables';
	div += '      </th> ';
	div += '      <th class="ui-state-default"><span class="css_right ui-icon ui-icon-carat-2-n-s"></span>';
	div += '        Values';
	div += '      </th> ';
	div += '    </tr>';
	div += '  </thead>';
	div += '  <tbody>';
	div += '    <tr id="row_101" class="odd">';
	div += '      <td class="center">&lt;USERNAME&gt;</td> ';
	div += '      <td class="center"><?php echo $_GET["username"]; ?></td>';
	div += '    </tr>';
	div += '    <tr id="row_101" class="even">';
	div += '      <td class="center">&lt;PASSWORD&gt;</td> ';
	div += '      <td class="center"><?php echo $_GET["password"]; ?> Note: This is the same password you used to login to Moodle.</td>';
	div += '    </tr>';
	div += '    <tr id="row_101" class="odd">';
	div += '      <td class="center">&lt;DOMAIN_ADMIN_CREDENTIALS&gt;</td> ';
	div += '      <td class="center">(<?php echo $_GET["username"]; ?>, <?php echo $_GET["password"]; ?>, <?php echo $_GET["domain"]; ?>)</td>';
	div += '    </tr>';
	div += '    <tr id="row_101" class="even">';
	div += '      <td class="center">&lt;LOGIN_CREDENTIALS&gt;</td> ';
	div += '      <td class="center">(<?php echo $_GET["username"]; ?>, <?php echo $_GET["password"]; ?>, <?php echo $_GET["domain"]; ?>) or just (<?php echo $_GET["username"]; ?>, <?php echo $_GET["password"]; ?>)</td>';
	div += '    </tr>';
	div += '    <tr id="row_101" class="odd">';
	div += '      <td class="center">&lt;LOGIN_CREDENTIALS&gt; for user Student</td> ';
	div += '      <td class="center">(Student, <?php echo $_GET["password"]; ?>, <?php echo $_GET["domain"]; ?>) or just (Student, <?php echo $_GET["password"]; ?>) Note: The Student password is same as yours.</td>';
	div += '    </tr>';
	div += '    <tr id="row_101" class="even">';
	div += '      <td class="center">&lt;NAT_ROUTER_IP&gt;</td> ';
	div += '      <td class="center"><?php echo $_GET["hostName"]; ?></td>';
	div += '    </tr>';
	div += '    <tr id="row_101" class="odd">';
	div += '      <td class="center">&lt;DC_RDP_PORT&gt;</td> ';
	div += '      <td class="center"><?php echo $_GET["hostPort0"]; ?></td>';
	div += '    </tr>';
	div += '    <tr id="row_101" class="even">';
	div += '      <td class="center">&lt;WS_RDP_PORT&gt;</td> ';
	div += '      <td class="center"><?php echo $_GET["hostPort1"]; ?></td>';
	div += '    </tr>';
	div += '    <tr id="row_101" class="odd">';
	div += '      <td class="center">&lt;GUEST_RDP_PORT&gt;</td> ';
	div += '      <td class="center"><?php echo $_GET["hostPort2"]; ?></td>';
	div += '    </tr>';
	div += '    <tr id="row_101" class="even">';
	div += '      <td class="center">&lt;PC_RDP_PORT&gt;</td> ';
	div += '      <td class="center"><?php echo $_GET["hostPort3"]; ?></td>';
	div += '    </tr>';
	div += '    <tr id="row_101" class="odd">';
	div += '      <td class="center">&lt;LAPTOP_RDP_PORT&gt;</td> ';
	div += '      <td class="center"><?php echo $_GET["hostPort4"]; ?></td>';
	div += '    </tr>';
	div += '  </tbody>';
	div += '  </table>';
    div += '</div>';

	
	if($.browser.msie){
		document.getElementById("dataSheet").innerHTML = div;
	}else{
    	$("#dataSheet").append(div);
	}
	parent.selectTab("dataSheet", document.documentElement.scrollHeight);

});

</script>
</head>

<body bgcolor="#DFEFFC"> <!-- onload='selectTab("devaGraph")'  -->
<br/>
<div id="dataSheet"></div>
</body>

</html> 