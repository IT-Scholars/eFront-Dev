<html>

<head>
<script type="text/javascript" src="jquery-ui/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery-ui/js/jquery-ui-1.8.4.custom.min.js"></script>
<script type='text/javascript' src='jquery-ui/dataTables/media/js/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='jquery-ui/dataTables/examples/examples_support/jquery.jeditable.js'></script>
    
<script type='text/javascript' src="http://code.jquery.com/jquery-1.4.4.js"></script>

<style type="text/css">
.xstooltip 
{
    visibility: hidden; 
    position: absolute; 
    top: 0;  
    left: 0; 
    z-index: 2; 

    font: normal 8pt sans-serif; 
    padding: 3px; 
    border: solid 1px;
    
    background-color: #DFEFFC;  
}
</style>

<script type="text/javascript">
jQuery(document).ready(function(){
	var div ="";
	div += '<center>';
	div += '<img id="fiuNetworkDiagram" src="embedded/img/K2-3_Network-Diagram.png" usemap="#Image-Map-1" border="0" width="770" height="675" alt="ITTC & ForKidz Network Diagrams" class="style1" />';
	div += '<map name="Image-Map-1">';
	div += '  <area id="area_1" shape="rect" coords="525,20,725,170" href="<?php echo $_GET["kaseyaServer"]; ?>" alt="Kaseya Server" target="_blank" onmouseover="xstooltip_show(\'tooltip_1\', \'fiuNetworkDiagram\', 525, 100);" onmouseout="xstooltip_hide(\'tooltip_1\');" />';
	div += '  <area id="area_2" shape="rect" coords="250,360,440,630" nohref="webRDP.php?tab=tab0&hostName=<?php echo $_GET["hostName0"]; ?>&hostPort=<?php echo $_GET["hostPort0"]; ?>&username=<?php echo $_GET["username0"]; ?>&password=<?php echo $_GET["password0"]; ?>&domain=<?php echo $_GET["domain0"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" alt="<?php echo $_GET["vmName0"]; ?>" onmouseover="xstooltip_show(\'tooltip_2\', \'fiuNetworkDiagram\', 250, 200);" onmouseout="xstooltip_hide(\'tooltip_2\');" />';
	div += '  <area id="area_3" shape="rect" coords="20,330,210,490"   nohref="webRDP.php?tab=tab1&hostName=<?php echo $_GET["hostName1"]; ?>&hostPort=<?php echo $_GET["hostPort1"]; ?>&username=<?php echo $_GET["username1"]; ?>&password=<?php echo $_GET["password1"]; ?>&domain=<?php echo $_GET["domain1"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" alt="<?php echo $_GET["vmName1"]; ?>" onmouseover="xstooltip_show(\'tooltip_3\', \'fiuNetworkDiagram\', 20 , 130);" onmouseout="xstooltip_hide(\'tooltip_3\');" />';
	div += '  <area id="area_4" shape="rect" coords="20,490,210,650" nohref="webRDP.php?tab=tab2&hostName=<?php echo $_GET["hostName2"]; ?>&hostPort=<?php echo $_GET["hostPort2"]; ?>&username=<?php echo $_GET["username2"]; ?>&password=<?php echo $_GET["password2"]; ?>&domain=<?php echo $_GET["domain2"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" alt="<?php echo $_GET["vmName2"]; ?>" onmouseover="xstooltip_show(\'tooltip_4\', \'fiuNetworkDiagram\', 20 , 150);" onmouseout="xstooltip_hide(\'tooltip_4\');" />';
	div += '  <area id="area_5" shape="rect" coords="515,375,750,530" nohref="webRDP.php?tab=tab3&hostName=<?php echo $_GET["hostName3"]; ?>&hostPort=<?php echo $_GET["hostPort3"]; ?>&username=<?php echo $_GET["username3"]; ?>&password=<?php echo $_GET["password3"]; ?>&domain=<?php echo $_GET["domain3"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" alt="<?php echo $_GET["vmName3"]; ?>" onmouseover="xstooltip_show(\'tooltip_5\', \'fiuNetworkDiagram\', 560, 170);" onmouseout="xstooltip_hide(\'tooltip_5\');" />';
	div += '  <area id="area_6" shape="rect" coords="515,530,750,650" nohref="webRDP.php?tab=tab4&hostName=<?php echo $_GET["hostName4"]; ?>&hostPort=<?php echo $_GET["hostPort4"]; ?>&username=<?php echo $_GET["username4"]; ?>&password=<?php echo $_GET["password4"]; ?>&domain=<?php echo $_GET["domain4"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" alt="<?php echo $_GET["vmName4"]; ?>" onmouseover="xstooltip_show(\'tooltip_6\', \'fiuNetworkDiagram\', 560, 190);" onmouseout="xstooltip_hide(\'tooltip_6\');" />';
	div += '</map>';
	div += '<!-- Image map text links - Start - If you do not wish to have text links under your image map, you can move or delete this DIV -->';
	div += '<div style="text-align:center; font-size:12px; font-family:verdana; margin-left:auto; margin-right:auto; width:720px;">';
	div += '    <a id="link_1" style="text-decoration:none; color:black; font-size:12px; font-family:verdana;" href="<?php echo $_GET["kaseyaServer"]; ?>" target=_blank title="Kaseya Server" onmouseover="xstooltip_show(\'tooltip_1\', \'fiuNetworkDiagram\', 522, 68);" onmouseout="xstooltip_hide(\'tooltip_1\');">Kaseya Server</a>';
	div += '  | <a id="link_2" style="text-decoration:none; color:black; font-size:12px; font-family:verdana;" href="webRDP.php?tab=tab0&hostName=<?php echo $_GET["hostName0"]; ?>&hostPort=<?php echo $_GET["hostPort0"]; ?>&username=<?php echo $_GET["username0"]; ?>&password=<?php echo $_GET["password0"]; ?>&domain=<?php echo $_GET["domain0"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" title="<?php echo $_GET["vmName0"]; ?>" onmouseover="xstooltip_show(\'tooltip_2\', \'fiuNetworkDiagram\', 228, 338);" onmouseout="xstooltip_hide(\'tooltip_2\');"><?php echo $_GET["vmName0"]; ?></a>';
	div += '  | <a id="link_3" style="text-decoration:none; color:black; font-size:12px; font-family:verdana;" href="webRDP.php?tab=tab1&hostName=<?php echo $_GET["hostName1"]; ?>&hostPort=<?php echo $_GET["hostPort1"]; ?>&username=<?php echo $_GET["username1"]; ?>&password=<?php echo $_GET["password1"]; ?>&domain=<?php echo $_GET["domain1"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" title="<?php echo $_GET["vmName1"]; ?>" onmouseover="xstooltip_show(\'tooltip_3\', \'fiuNetworkDiagram\', 15 , 321);" onmouseout="xstooltip_hide(\'tooltip_3\');"><?php echo $_GET["vmName1"]; ?></a>';
	div += '  | <a id="link_4" style="text-decoration:none; color:black; font-size:12px; font-family:verdana;" href="webRDP.php?tab=tab2&hostName=<?php echo $_GET["hostName2"]; ?>&hostPort=<?php echo $_GET["hostPort2"]; ?>&username=<?php echo $_GET["username2"]; ?>&password=<?php echo $_GET["password2"]; ?>&domain=<?php echo $_GET["domain2"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" title="<?php echo $_GET["vmName2"]; ?>" onmouseover="xstooltip_show(\'tooltip_4\', \'fiuNetworkDiagram\', 464, 322);" onmouseout="xstooltip_hide(\'tooltip_4\');"><?php echo $_GET["vmName2"]; ?></a>';
	div += '  | <a id="link_5" style="text-decoration:none; color:black; font-size:12px; font-family:verdana;" href="webRDP.php?tab=tab3&hostName=<?php echo $_GET["hostName3"]; ?>&hostPort=<?php echo $_GET["hostPort3"]; ?>&username=<?php echo $_GET["username3"]; ?>&password=<?php echo $_GET["password3"]; ?>&domain=<?php echo $_GET["domain3"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" title="<?php echo $_GET["vmName3"]; ?>" onmouseover="xstooltip_show(\'tooltip_5\', \'fiuNetworkDiagram\', 646, 322);" onmouseout="xstooltip_hide(\'tooltip_5\');"><?php echo $_GET["vmName3"]; ?></a>';
	div += '  | <a id="link_6" style="text-decoration:none; color:black; font-size:12px; font-family:verdana;" href="webRDP.php?tab=tab4&hostName=<?php echo $_GET["hostName4"]; ?>&hostPort=<?php echo $_GET["hostPort4"]; ?>&username=<?php echo $_GET["username4"]; ?>&password=<?php echo $_GET["password4"]; ?>&domain=<?php echo $_GET["domain4"]; ?>&bottomFrameHeightPercentage=<?php echo $_GET["bottomFrameHeightPercentage"]; ?>" title="<?php echo $_GET["vmName4"]; ?>" onmouseover="xstooltip_show(\'tooltip_6\', \'fiuNetworkDiagram\', 645, 409);" onmouseout="xstooltip_hide(\'tooltip_6\');"><?php echo $_GET["vmName4"]; ?></a>';
	div += '</div>';
	//div += '<!-- Image map text links - End - -->';
	div += '</center>';

    div += '<div id="tooltip_1" class="xstooltip">'; 
    div += '  Machine Name:<i> Kaseya Server</i><br/>';
    div += '  Connection Protocol:<i> HTTP</i><br/>';
    div += '  Host Name:<i> <?php echo $_GET["kaseyaServer"]; ?></i><br/>';
    div += '  Host Port:<i> 80</i><br/>';
    div += '  Username:<i> <?php echo $_GET["kserverUsername"]; ?></i><br/>';
    div += '  Password:<i> <?php echo $_GET["kserverPassword"]; ?></i><br/>';
    //div += '  Domain:<i> </i>';
    div += '</div>';
    div += '<div id="tooltip_2" class="xstooltip">'; 
    div += '  Machine Name:<i> <?php echo $_GET["vmName0"]; ?></i><br/>';
    div += '  Connection Protocol:<i> RDP</i><br/>';
    div += '  Host Name:<i> <?php echo $_GET["hostName0"]; ?></i><br/>';
    div += '  Host Port:<i> <?php echo $_GET["hostPort0"]; ?></i><br/>';
    div += '  Username:<i> <?php echo $_GET["username0"]; ?></i><br/>';
    div += '  Password:<i> <?php echo $_GET["password0"]; ?></i><br/>';
    div += '  Domain:<i> <?php echo $_GET["domain0"]; ?></i><br/>';
    div += '</div>';
    div += '<div id="tooltip_3" class="xstooltip">'; 
    div += '  Machine Name:<i> <?php echo $_GET["vmName1"]; ?></i><br/>';
    div += '  Connection Protocol:<i> RDP</i><br/>';
    div += '  Host Name:<i> <?php echo $_GET["hostName1"]; ?></i><br/>';
    div += '  Host Port:<i> <?php echo $_GET["hostPort1"]; ?></i><br/>';
    div += '  Username:<i> <?php echo $_GET["username1"]; ?></i><br/>';
    div += '  Password:<i> <?php echo $_GET["password1"]; ?></i><br/>';
    div += '  Domain:<i> <?php echo $_GET["domain1"]; ?></i><br/>';
    div += '</div>';
    div += '<div id="tooltip_4" class="xstooltip">'; 
    div += '  Machine Name:<i> <?php echo $_GET["vmName2"]; ?></i><br/>';
    div += '  Connection Protocol:<i> RDP</i><br/>';
    div += '  Host Name:<i> <?php echo $_GET["hostName2"]; ?></i><br/>';
    div += '  Host Port:<i> <?php echo $_GET["hostPort2"]; ?></i><br/>';
    div += '  Username:<i> <?php echo $_GET["username2"]; ?></i><br/>';
    div += '  Password:<i> <?php echo $_GET["password2"]; ?></i><br/>';
    div += '  Domain:<i> <?php echo $_GET["domain2"]; ?></i><br/>';
    div += '</div>';
    div += '<div id="tooltip_5" class="xstooltip">'; 
    div += '  Machine Name:<i> <?php echo $_GET["vmName3"]; ?></i><br/>';
    div += '  Connection Protocol:<i> RDP</i><br/>';
    div += '  Host Name:<i> <?php echo $_GET["hostName3"]; ?></i><br/>';
    div += '  Host Port:<i> <?php echo $_GET["hostPort3"]; ?></i><br/>';
    div += '  Username:<i> <?php echo $_GET["username3"]; ?></i><br/>';
    div += '  Password:<i> <?php echo $_GET["password3"]; ?></i><br/>';
    div += '  Domain:<i> <?php echo $_GET["domain3"]; ?></i><br/>';
    div += '</div>';
    div += '<div id="tooltip_6" class="xstooltip">'; 
    div += '  Machine Name:<i> <?php echo $_GET["vmName4"]; ?></i><br/>';
    div += '  Connection Protocol:<i> RDP</i><br/>';
    div += '  Host Name:<i> <?php echo $_GET["hostName4"]; ?></i><br/>';
    div += '  Host Port:<i> <?php echo $_GET["hostPort4"]; ?></i><br/>';
    div += '  Username:<i> <?php echo $_GET["username4"]; ?></i><br/>';
    div += '  Password:<i> <?php echo $_GET["password4"]; ?></i><br/>';
    div += ' Domain:<i> <?php echo $_GET["domain4"]; ?></i><br/>';
    div += '</div>';
    
    jQuery("#devaImage").append(div);
    //alert(div);
	jQuery("#area_2, #area_3, #area_4, #area_5, #area_6").click(function(event){ 
		parent.setClicks4Links(this.id, false);
	});
	
    // alert("document.documentElement.scrollHeight: " + document.documentElement.scrollHeight);
    parent.selectTab("devaGraph", document.documentElement.scrollHeight);

});

function updateTips(t) {
    tips
    .text(t)
    .addClass('ui-state-highlight');
    setTimeout(function() {
        tips.removeClass('ui-state-highlight', 1500);
    }, 500);
}

function checkLength(o,n,min,max) {

    if ( o.val().length > max || o.val().length < min ) {
        o.addClass('ui-state-error');
        updateTips("Length of " + n + " must be between "+min+" and "+max+".");
        return false;
    } else {
        return true;
    }

}

function checkRegexp(o,regexp,n) {

    if ( !( regexp.test( o.val() ) ) ) {
        o.addClass('ui-state-error');
        updateTips(n);
        return false;
    } else {
        return true;
    }

}

function xstooltip_findPosX(obj) 
{
  var curleft = 0;
  if (obj.offsetParent) 
  {
    while (obj.offsetParent) 
        {
            curleft += obj.offsetLeft
            obj = obj.offsetParent;
        }
    }
    else if (obj.x)
        curleft += obj.x;
    return curleft;
}

function xstooltip_findPosY(obj) 
{
    var curtop = 0;
    if (obj.offsetParent) 
    {
        while (obj.offsetParent) 
        {
            curtop += obj.offsetTop
            obj = obj.offsetParent;
        }
    }
    else if (obj.y)
        curtop += obj.y;
    return curtop+60;
}

function xstooltip_show(tooltipId, parentId, posX, posY)
{
    it = document.getElementById(tooltipId);
    
    if ((it.style.top == '' || it.style.top == 0) 
        && (it.style.left == '' || it.style.left == 0))
    {
        // need to fixate default size (MSIE problem)
        it.style.width = it.offsetWidth + 'px';
        it.style.height = it.offsetHeight + 'px';
        
        img = document.getElementById(parentId); 
    
        // if tooltip is too wide, shift left to be within parent 
        if (posX + it.offsetWidth > img.offsetWidth) posX = img.offsetWidth - it.offsetWidth;
        if (posX < 0 ) posX = 0; 
        
        x = xstooltip_findPosX(img) + posX;
        y = xstooltip_findPosY(img) + posY;
        
        it.style.top = y + 'px';
        it.style.left = x + 'px';
    }
    
    it.style.visibility = 'visible'; 
}

function xstooltip_hide(id)
{
    it = document.getElementById(id); 
    it.style.visibility = 'hidden'; 
}

</script>
</head>

<body bgcolor="#DFEFFC"> <!-- onload='selectTab("devaGraph")'  -->
<br/>
<div id="devaImage"></div>
</body>

</html> 