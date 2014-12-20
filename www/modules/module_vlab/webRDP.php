<html>
<head>
<title>webRDP</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<meta http-equiv='pragma' content='no-cache'>
<script type='text/javascript'>
// This method is called after the user logs out of their RDP session. The method name is a configurable applet parameter.
function rdpOnLogout() {
    //alert ( ' User has Logged out ' );
}
function isActive(){
    return document.applets[0].isActive();
}

function appletRunning(){
    return document.getElementById('rdp').appletRunning();
}
</script>
</head>
<body bgcolor="#DFEFFC">
<center>
<!-- <body bgcolor="#DFEFFC" onload='parent.selectTab("<?php echo $_GET["tab"]; ?>")' > -->
<!-- Loads the applet and utilizes 100% of browser window width and height.  Width and height could be hard coded to specific values -->
<applet name="rdp" id="rdp" code="com.webinflection.webrdp.MainApplet" archive="webRDP.jar" width="<?php echo $_GET["frameWidth"]; ?>" height="<?php echo $_GET["frameHeight"]; ?>">
<!-- Hostname or IP Address of Terminal Server -->
<!-- This is a required parameter -->
<param name="host" value="<?php echo $_GET["hostName"]; ?>">

<!-- Port that the Terminal Server -->
<!-- This is a required parameter -->
<param name="port" value="<?php echo $_GET["hostPort"]; ?>">

<!-- Username to authenticate to terminal server with -->
<!-- Optional SSO Parameter -->
<param name="username" value="<?php echo $_GET["username"]; ?>">

<!-- Password to authenticate to terminal server with -->
<!-- Optional SSO Parameter -->
<param name="password" value="<?php echo $_GET["password"]; ?>">

<!-- AD Domain name to authenticate to terminal server with -->
<!-- Optional SSO Parameter -->
<param name="domain" value="<?php echo $_GET["domain"]; ?>">

<!-- Application to start. This value should be url encoded.  In this example we are launching c:\windows\system32\notepad.exe-->
<!-- param name="program" value="<?php echo $_GET["appName"]; ?>" -->

<!-- Working directory for Application.  This value should be url encoded.  In this example the working directory will be set to c:\windows\system32\ -->
<!-- param name="directory" value="<?php echo $_GET["appDir"]; ?>" -->

<!-- In this example I used a site ( http://meyerweb.com/eric/tools/dencoder/ ) to encode the above values -->

<!-- This specifies a javascript method to be called after the user logs out of the RDP session -->
<!--  <param name="onlogout" value="javascript:rdpOnLogout();"> -->

<param name="pf" value="127">
<param name="bpp" value="<?php echo $_GET['frameBpp']; ?>">
<param name="onlogout" value="javascript:rdpOnLogout();">

</applet>
</center>
</body>
</html>
