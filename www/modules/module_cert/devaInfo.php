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
	var div ="";
	div += '  <table bordercellpadding="0" cellspacing="0" border="0" class="display" id="devaTable">';
	div += '  <thead>';
    div += '    <tr>';
	div += '      <th class="ui-state-default"><span class="css_right ui-icon ui-icon-carat-2-n-s"></span>';
	div += '        #';
	div += '      </th> ';
	div += '      <th class="ui-state-default"><span class="css_right ui-icon ui-icon-carat-2-n-s"></span>';
	div += '        Machine Name';
	div += '      </th> ';
	div += '      <th class="ui-state-default"><span class="css_right ui-icon ui-icon-carat-2-n-s"></span>';
	div += '        Connection Protocol';
	div += '      </th> ';
	div += '      <th class="ui-state-default"><span class="css_right ui-icon ui-icon-carat-2-n-s"></span>';
	div += '        Host Name';
	div += '      </th> ';
	div += '      <th class="ui-state-default"><span class="css_right ui-icon ui-icon-carat-2-n-s"></span>';
	div += '        Host Port';
	div += '      </th> ';
	div += '      <th class="ui-state-default"><span class="css_right ui-icon ui-icon-carat-2-n-s"></span>';
	div += '        Username';
	div += '      </th> ';
	div += '      <th class="ui-state-default"><span class="css_right ui-icon ui-icon-carat-2-n-s"></span>';
	div += '        Password';
	div += '      </th> ';
	div += '      <th class="ui-state-default"><span class="css_right ui-icon ui-icon-carat-2-n-s"></span>';
	div += '        Domain';
	div += '      </th> ';
	div += '    </tr>';
	div += '  </thead>';
	div += '  <tbody>';
	div += '    <tr id="row_1" class="odd">';
	div += '      <td class="center">1</td> ';
	div += '      <td class="center">Kaseya Server</td> ';
	div += '      <td class="center">http</td>';
	div += '      <td class="center"><a href=<?php echo $_GET["kaseyaServer"]; ?> target="_blank"><?php echo $_GET["kaseyaServer"]; ?></a></td>';
	div += '      <td class="center">80</td>';
	div += '      <td class="center"><?php echo $_GET["kserverUsername"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["kserverPassword"]; ?></td>';
	//div += '      <td class="center">'+'********'+'</td>';
	div += '      <td class="center"></td>';
	div += '    </tr>';

	var row = 1;
	var rowClass = "odd";

	rowClass = "even";
	row++;
	div += '    <tr id="row_'+row+'" class="'+rowClass+'">';
	div += '      <td class="center">'+row+'</td> ';
	div += '      <td class="center"><?php echo $_GET["vmName0"]; ?></td>';
	div += '      <td class="center">RDP</td>';
	div += '      <td class="center"><?php echo $_GET["hostName0"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["hostPort0"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["username0"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["password0"]; ?></td>';
	//div += '      <td class="center">'+'********'+'</td>';
	div += '      <td class="center"><?php echo $_GET["domain0"]; ?></td>';
	div += '    </tr>';	

	rowClass = "odd";
	row++;
	div += '    <tr id="row_'+row+'" class="'+rowClass+'">';
	div += '      <td class="center">'+row+'</td> ';
	div += '      <td class="center"><?php echo $_GET["vmName1"]; ?></td>';
	div += '      <td class="center">RDP</td>';
	div += '      <td class="center"><?php echo $_GET["hostName1"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["hostPort1"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["username1"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["password1"]; ?></td>';
	//div += '      <td class="center">'+'********'+'</td>';
	div += '      <td class="center"><?php echo $_GET["domain1"]; ?></td>';
	div += '    </tr>';	

	rowClass = "even";
	row++;
	div += '    <tr id="row_'+row+'" class="'+rowClass+'">';
	div += '      <td class="center">'+row+'</td> ';
	div += '      <td class="center"><?php echo $_GET["vmName2"]; ?></td>';
	div += '      <td class="center">RDP</td>';
	div += '      <td class="center"><?php echo $_GET["hostName2"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["hostPort2"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["username2"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["password2"]; ?></td>';
	//div += '      <td class="center">'+'********'+'</td>';
	div += '      <td class="center"><?php echo $_GET["domain2"]; ?></td>';
	div += '    </tr>';	

	rowClass = "odd";
	row++;
	div += '    <tr id="row_'+row+'" class="'+rowClass+'">';
	div += '      <td class="center">'+row+'</td> ';
	div += '      <td class="center"><?php echo $_GET["vmName3"]; ?></td>';
	div += '      <td class="center">RDP</td>';
	div += '      <td class="center"><?php echo $_GET["hostName3"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["hostPort3"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["username3"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["password3"]; ?></td>';
	//div += '      <td class="center">'+'********'+'</td>';
	div += '      <td class="center"><?php echo $_GET["domain3"]; ?></td>';
	div += '    </tr>';	

	rowClass = "even";
	row++;
	div += '    <tr id="row_'+row+'" class="'+rowClass+'">';
	div += '      <td class="center">'+row+'</td> ';
	div += '      <td class="center"><?php echo $_GET["vmName4"]; ?></td>';
	div += '      <td class="center">RDP</td>';
	div += '      <td class="center"><?php echo $_GET["hostName4"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["hostPort4"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["username4"]; ?></td>';
	div += '      <td class="center"><?php echo $_GET["password4"]; ?></td>';
	//div += '      <td class="center">'+'********'+'</td>';
	div += '      <td class="center"><?php echo $_GET["domain4"]; ?></td>';
	div += '    </tr>';	

	div += '  </tbody>';
	div += '  </table>';
    div += '</div>';
    // $("#tabs").append(div);

	if($.browser.msie){
		document.getElementById("devaInfo").innerHTML = div;
	}else{
    	$("#devaInfo").append(div);
	}
    // $("#devaInfo").append(div);
    // alert(div);

	$('#row_1').click(function() { // bind click event to link
		window.open("<?php echo $_GET["kaseyaServer"]; ?>", "_blank");
        return false;
    });
	$("#row_2, #row_3, #row_4, #row_5, #row_6").click(function(event){ 
		parent.setClicks4Links(this.id,true);
		return false;
	});
	
	/*
	$('#row_2').click(function() { // bind click event to link
		window.open("webRDP.php?tab=tab0&hostName=<?php echo $_GET["hostName0"]; ?>&hostPort=<?php echo $_GET["hostPort0"]; ?>&username=<?php echo $_GET["username0"]; ?>&password=<?php echo $_GET["password0"]; ?>&domain=<?php echo $_GET["domain0"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>", "_self");
		return false;
    });
	$('#row_3').click(function() { // bind click event to link
    	window.open("webRDP.php?tab=tab1&hostName=<?php echo $_GET["hostName1"]; ?>&hostPort=<?php echo $_GET["hostPort1"]; ?>&username=<?php echo $_GET["username1"]; ?>&password=<?php echo $_GET["password1"]; ?>&domain=<?php echo $_GET["domain1"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>", "_self");
		return false;
    });
	$('#row_4').click(function() { // bind click event to link
    	window.open("webRDP.php?tab=tab2&hostName=<?php echo $_GET["hostName2"]; ?>&hostPort=<?php echo $_GET["hostPort2"]; ?>&username=<?php echo $_GET["username2"]; ?>&password=<?php echo $_GET["password2"]; ?>&domain=<?php echo $_GET["domain2"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" , "_self");
		return false;
    });
	$('#row_5').click(function() { // bind click event to link
    	window.open("webRDP.php?tab=tab3&hostName=<?php echo $_GET["hostName3"]; ?>&hostPort=<?php echo $_GET["hostPort3"]; ?>&username=<?php echo $_GET["username3"]; ?>&password=<?php echo $_GET["password3"]; ?>&domain=<?php echo $_GET["domain3"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" , "_self");
		return false;
    });
	$('#row_6').click(function() { // bind click event to link
    	window.open("webRDP.php?tab=tab4&hostName=<?php echo $_GET["hostName4"]; ?>&hostPort=<?php echo $_GET["hostPort4"]; ?>&username=<?php echo $_GET["username4"]; ?>&password=<?php echo $_GET["password4"]; ?>&domain=<?php echo $_GET["domain4"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>", "_self");
		return false;
    });
	*/

    		        // alert("document.documentElement.scrollHeight: " + document.documentElement.scrollHeight);
    parent.selectTab("devaInfo", document.documentElement.scrollHeight);

});

</script>
</head>

<body bgcolor="#DFEFFC"> <!-- onload='selectTab("devaGraph")'  -->
<br/>
<div id="devaInfo"></div>
</body>

</html> 