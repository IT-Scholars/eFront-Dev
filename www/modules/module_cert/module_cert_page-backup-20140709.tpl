{capture name = "t_masoud"}
<div id="masoudid">
Masoud
</div>
{/capture}

{capture name = "t_exam_questions"}
<iframe 
	src={$T_EXAM_QUESTIONS} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_connection_info"}
<iframe 
	src={$T_CONNECTION_INFO} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_dc"}
<iframe 
	src={$T_DC} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_ws1"}
<iframe 
	src={$T_WS1} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_ws2"}
<iframe 
	src={$T_WS2} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_reception"}
<iframe 
	src={$T_RECEPTION} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_laptop_ceo"}
<iframe 
	src={$T_LAPTOP_CEO} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}
<div align="center">
	<iframe 
		src="http://localhost/moodle19/mod/deva/embedded/auto-start.php?username=123test&course=Kaseya%207.0%20Fundamentals%20Workshop&resourceType=CERTIFICATE"
		align="middle" 
    	height=100
    	width=100%
    	marginwidth=0
    	marginheight=0 
        style="visibility:hidden;display:none">
	</iframe>
</div>

<!-- 
<link type="text/css" href="modules/module_cert/jquery-ui/css/redmond-light/jquery-ui-1.8.5.custom.css" rel="stylesheet" />

<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
-->
<script type="text/javascript" src="modules/module_cert/jquery-ui/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="modules/module_cert/jquery-ui/js/jquery-ui-1.8.4.custom.min.js"></script>
<script type='text/javascript' src='modules/module_cert/jquery-ui/js/dateFormat.js'></script>

<script type="text/javascript" src="modules/module_cert/js/dialogboxes-embedded-ver2.js"></script>
<script type='text/javascript' src='modules/module_cert/js/vmcontrols-embedded-ver2.js'></script>
<script type='text/javascript' src='modules/module_cert/js/vmcObjs-embedded-ver2.js'></script>
<script type='text/javascript' src='modules/module_cert/js/message-embedded-ver2.js'></script>
<script type='text/javascript' src='modules/module_cert/js/deva-tabs-embedded-ver2.js'></script>

<div id="devaTabContent">
<div class = "tabber" align="center">
	{eF_template_printBlock 
    	tabber = "masoud" 
        title = $smarty.const._MODULE_CERT_MASOUD 
        data = $smarty.capture.t_masoud}
	{eF_template_printBlock 
    	tabber = "exam_questions" 
        title = $smarty.const._MODULE_CERT_EXAMQUESTIONS 
        data = $smarty.capture.t_exam_questions}
	{eF_template_printBlock 
    	tabber = "connection_info" 
        title = $smarty.const._MODULE_CERT_CONNECTIONINFO 
        data = $smarty.capture.t_connection_info}
	{eF_template_printBlock 
    	tabber = "dc" 
        title = $smarty.const._MODULE_CERT_DC 
        data = $smarty.capture.t_dc}
	{eF_template_printBlock 
    	tabber = "ws1" 
        title = $smarty.const._MODULE_CERT_WS1 
        data = $smarty.capture.t_ws1}
	{eF_template_printBlock 
    	tabber = "ws2" 
        title = $smarty.const._MODULE_CERT_WS2 
        data = $smarty.capture.t_ws2}
	{eF_template_printBlock 
    	tabber = "reception" 
        title = $smarty.const._MODULE_CERT_RECEPTION 
        data = $smarty.capture.t_reception}
	{eF_template_printBlock 
    	tabber = "laptop_ceo" 
        title = $smarty.const._MODULE_CERT_LAPTOP_CEO 
        data = $smarty.capture.t_laptop_ceo}
</div>
</div>

<script language="javascript">
var iscerttest = true;
</script>


