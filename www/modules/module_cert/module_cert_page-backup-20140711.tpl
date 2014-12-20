<script language="javascript">
$.noConflict();

var isControlOnTab = false;
// var vLab_moodleURL = "http://ita-portal.cis.fiu.edu/mod/deva/";
var vLab_moodleURL = "http://localhost/moolde19/mod/deva/";
var cert_baseURI = "modules/module_cert/";
var iscerttest = false;
</script>

<!--Libraries-->
<link type="text/css" href="modules/module_cert/jquery-ui/css/redmond-light/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
<script type="text/javascript" src="modules/module_cert/jquery-ui/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="modules/module_cert/jquery-ui/js/jquery-ui-1.8.4.custom.min.js"></script>

<script type='text/javascript' src='http://ita-portal.cis.fiu.edu/mod/scheduler/fullcalendar/fullcalendar.js'></script>
<!-- 
<script type='text/javascript' src='jquery-ui/dataTables/media/js/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='jquery-ui/dataTables/examples/examples_support/jquery.jeditable.js'></script>
    
<link type="text/css" href="jquery-ui/css/jquery-ui-timepicker.css" rel="stylesheet" />
<script type="text/javascript" src="jquery-ui/js/jquery.ui.timepicker.js"></script>

<link rel='stylesheet' type='text/css' href='jquery-ui/css/jquery.ptTimeSelect.css' />
<script type='text/javascript' src='jquery-ui/js/jquery.ptTimeSelect.js'></script>
 -->
<script type='text/javascript' src='modules/module_cert/jquery-ui/js/dateFormat.js'></script>

<script type="text/javascript" src="modules/module_cert/js/dialogboxes-embedded-ver2.js"></script>

<!-- <script type='text/javascript' src="http://code.jquery.com/jquery-1.4.4.js"></script>  -->

<!--Our scripts-->
<script type='text/javascript' src='modules/module_cert/js/vmcontrols-embedded-ver2.js'></script>
<script type='text/javascript' src='modules/module_cert/js/vmcObjs-embedded-ver2.js'></script>
<script type='text/javascript' src='modules/module_cert/js/message-embedded-ver2.js'></script>
<script type='text/javascript' src='modules/module_cert/js/deva-tabs-embedded-ver3.js'></script>
<script type='text/javascript' src='modules/module_cert/js/jquery.countDown.js'></script>
<script type='text/javascript' src='modules/module_cert/js/jquery.loading.1.6.4.js'></script>

<!--CSS-->
<link rel="stylesheet" type="text/css" href="modules/module_cert/css/styles.css" />

<link rel="stylesheet" type="text/css" href="modules/module_cert/css/jquery.loading.1.6.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/devacss/style.css" /> -->

<link rel="stylesheet" type="text/css" href="modules/module_cert/css/vLab.css" />

<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link rel="stylesheet" href="css/lt-ie9.css" type="text/css" />
<![endif]-->


<!-- $CFG, $SESSION, $USER, $COURSE, $SITE, $PAGE, $DB and $THEME -->
<input id ="bottomFrameHeightPercentage" type="hidden" value="97" />
<input id ="userid" type="hidden" value="2115" />
<input id ="username" type="hidden" value="johndoc" />
<input id ="role" type="hidden" value="student" />
<input id ="email" type="hidden" value="johndoc.fiu@gamil.com" />
<input id ="url" type="hidden" value="http://localhost/efront/www/student.php" />
<input id ="courseURL" type="hidden" value="http://localhost/efront/www/student.php" />
<input id ="course" type="hidden" value="Kaseya 6.5 Fundamentals Workshop - Instructor Led" />
<input id="resourcetype" type="hidden" value="VIRTUAL LAB" />


<div class="navbutton timer-navbutton navbar"><div class="clock" style=""><span class="timetools-counter" style="color: rgb(0, 0, 0);">05:23:52</span></div><div class="settings"><button id="timeOptions" class="optionsButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button" aria-disabled="false" style="display: none;"><span class="ui-button-icon-primary ui-icon ui-icon-clock"></span><span class="ui-button-text"></span></button><button id="bpOptions" class="optionsButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button" aria-disabled="false" style="display: none;"><span class="ui-button-icon-primary ui-icon ui-icon-image"></span><span class="ui-button-text"></span></button><button id="vmOptions" class="optionsButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button" aria-disabled="false" style="display: none;"><span class="ui-button-icon-primary ui-icon ui-icon-gear"></span><span class="ui-button-text"></span></button><div id="vmControlPanel" style="display: block;"><span id="toolbar" class=""><button class="powerOff ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" aria-disabled="false" title="Power Off"><span class="ui-button-icon-primary ui-icon ui-icon-power"></span><span class="ui-button-text">Power Off</span></button><button class="powerOn ui-button ui-widget ui-state-default ui-corner-all ui-button-disabled ui-state-disabled ui-button-icon-only" role="button" aria-disabled="true" disabled="" title="Power On"><span class="ui-button-icon-primary ui-icon ui-icon-play"></span><span class="ui-button-text">Power On</span></button><button class="shutdown ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" aria-disabled="false" title="Shutdown"><span class="ui-button-icon-primary ui-icon ui-icon-stop"></span><span class="ui-button-text">Shutdown</span></button><button class="restart ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" aria-disabled="false" title="Restart"><span class="ui-button-icon-primary ui-icon ui-icon-refresh"></span><span class="ui-button-text">Restart</span></button><button class="pause ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" aria-disabled="false" title="Pause"><span class="ui-button-icon-primary ui-icon ui-icon-pause"></span><span class="ui-button-text">Pause</span></button><button class="refresh ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button" aria-disabled="false"><span class="ui-button-icon-primary ui-icon ui-icon-trash"></span><span class="ui-button-text">Refresh</span></button></span></div><div id="screenOptions" style="display: block;"><span class="minutesform">&nbsp;resolution:&nbsp;</span><select id="resolution"><option value="default" selected="selected">default</option><option value="640x480">640x480</option><option value="800x600">800x600</option><option value="1024x768">1024x768</option></select><span class="minutesform">&nbsp;&nbsp;color depth:&nbsp;</span><select id="bpp"><option value="8">8</option><option value="15">15</option><option value="16" selected="selected">16</option></select><input id="savedBpp" type="hidden" value="16"><input id="savedRes" type="hidden" value="default"></div><span id="timetools" class="" style="display: block;"><span class="minutesform">minutes:</span> <input type="text" name="editapptime" id="editapptime" value="5" maxlength="2" class="minutesform ui-corner-all"><button class="addtime ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" aria-disabled="false" title="Add time to your virtual-lab appointment."><span class="ui-button-icon-primary ui-icon ui-icon-plus"></span><span class="ui-button-text">Add time to your virtual-lab appointment.</span></button><button class="minustime ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" aria-disabled="false" title="Remove time from your virtual-lab appointment."><span class="ui-button-icon-primary ui-icon ui-icon-minus"></span><span class="ui-button-text">Remove time from your virtual-lab appointment.</span></button><button class="cancel ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" aria-disabled="false" title="Cancel the remaining virtual-lab appointment."><span class="ui-button-icon-primary ui-icon ui-icon-eject"></span><span class="ui-button-text">Cancel the remaining virtual-lab appointment.</span></button></span></div><div class="vmControlContainer"></div></div>

<div id="vmcDebug2"></div>
<div id="vmcDebug"></div>

<div id="wrapper">
    <div id="message" title="System message"></div>
    <div id="createitem-form" class="form" title="Item Details"></div>
    <div id="createpackage-form" class="form" title="Package Information"></div>
    <div id="additemtopkg-form" class="form"  title="Package Item details"></div>
    <div id="tabs-wrapper" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header">
    <center><div id="devaTabs"></center></div></div>
    <div id="devaTabContent"></div>
    <div id="dialog"></div>
    
    <div id="progressbarContainer" tabindex="-1">
        	<center><div id="progressbar"></div></center>
    </div>
    <div id="progess-overlay" style="z-index: 5000; position: absolute;"></div>
    
</div>	

<center>
<div id="infoMessage" class="ui-state-highlight ui-corner-bottom infoMessageBox"> 
    <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
    	<span id="infoText"></span>
    </p>
    <span class="buttonPanel"></span>
</div>
<div id="errorMessage" class="ui-state-error ui-corner-bottom errorMessageBox"> 
    <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
    	<span id="errorText"></span>
    </p>
</div>
</center>


