// JavaScript Document
jQuery(document).ready(function() {

	isControlOnTab = false;
	//vmc_init();
	
	jQuery("#infoMessage").hide();
	jQuery("#errorMessage").hide();

	//progressDialogBox(true);
	// sms: 6/28/2014 Changed to support embedded version
    // reloadDevaFront();
	reloadDevaFrontEmbedded();
	/*
	if(iscerttest){
		selectTab("examQuestions");
	}*/
	
	//jQuery(".navbutton .timer-navbutton").show();
	setTimeControl();
	// Every 1 minute(s) the loadAppointments function is called
	// 1 min = 60000, 5 min = 300000 
	// Deleted by SMS: 7/29/2011 This was causing the count down to be twice as fast!
	// setInterval("setTimeControl();",60000);
	
	startStatusInterval();
	
	//setClick4Tabs();
	
	/*
	// Submits the quiz
	jQuery("#vmcDebug2").html("<span id='endQuiz'>End Quiz</span>");
	jQuery("#endQuiz").click(function(event){ 
		window.frames[0].document.getElementById('timeup').value = 1;
		var ourForm = window.frames[0].document.getElementById('responseform');
        ourForm.submit();
	});
	*/
	
	//progressDialogBox(true);
});

function setClick4Tabs() {

	jQuery("#devaTabs a.devaTabs").click(function(event){
		////console.log("#devaTabs a.devaTabs");
		event.stopPropagation();
		//event.preventDefault();
		
		setRdpTabInfo('ready', currentTabSelected, false);
		setRdpTabInfo('showing', currentTabSelected, false);
		currentTabSelected = this.id;
		//markCurrentInstanceState('disabled');
		
		jQuery(".devaTabs").css({"color":"#2E6E9E", "background-color":"#86B3D5", "font-weight": "normal", "padding": "2px 5px 2px 5px"});
		jQuery("#"+this.id).css({"color":"#E17009", "background-color":"#DFEFFC", "font-weight": "bold", "padding": "2px 5px 12px 5px"});
	
		var vmname = jQuery("#"+this.id+" span").html();
		//clearRDPScreen();
		if(this.id != "devaGraph" && this.id != "dataSheet" && this.id != "devaInfo"){
		    clearRDPScreen();
		}
		
		popDownInfoNoticeBox("<b>Loading:</b><br/>"+vmname,3000);
		
		setTimeout("selectTab('"+this.id+"')",1000);
		
		jQuery("#devaTabs a.devaTabs").removeClass("selected");	// JAM: 03/17/2012 - added to reload screen options
		jQuery(this).addClass("selected");
		//selectTab(this.id);
	});
}

function setClicks4Links(linkedTab,isRow){
	// tab0 -> dc, tab1 -> ws1, tab2-> guest1, tab3-> pc1, tab4 -> laptop1
	//alert('setClicks4Links: '+linkedTab);
	
	var setId = (isRow) ? parseRowId(linkedTab) : parseAreaId(linkedTab);
	currentTabSelected = setId;
	
	jQuery(".devaTabs").css({"color":"#2E6E9E", "background-color":"#86B3D5", "font-weight": "normal", "padding": "2px 5px 2px 5px"});
	jQuery("#"+setId).css({"color":"#E17009", "background-color":"#DFEFFC", "font-weight": "bold", "padding": "2px 5px 12px 5px"});

	var vmname = jQuery("#"+setId+" span").html();
	clearRDPScreen();
	popDownInfoNoticeBox("<b>Loading:</b><br/>"+vmname,3000);
	
	if(stateInterval)
		clearInterval(stateInterval);
	checkRDPMachineStatus(true);	
	
	setTimeout("selectTab('"+setId+"');",1000);
}

function parseAreaId(name){
	switch(name){
		case "area_2":
			return "tab0";	//dc
			break;
		case "area_3":
			return "tab1";	//ws1
			break;
		case "area_4":
			return "tab2";	//guest1
			break;
		case "area_5":
			return "tab3";	//pc1
			break;
		case "area_6":
			return "tab4";	//laptop1
			break;
	}
}

function parseRowId(name){
	switch(name){
		case "row_2":
			return "tab0";	//dc
			break;
		case "row_3":
			return "tab1";	//ws1
			break;
		case "row_4":
			return "tab2";	//guest1
			break;
		case "row_5":
			return "tab3";	//pc1
			break;
		case "row_6":
			return "tab4";	//laptop1
			break;
	}
}

function closeQuizLeftOpen(){

	var url = jQuery("#examURL").val();

	jQuery.ajax({
		url: url+'&finishattempt=1',
		success: function( data ) {
			var message = "Your exam is over. If you have not submitted your answer file already, " +
							"please remeber to upload the file within the next ten minutes.";
			alert(message);
			window.location = jQuery("#courseURL").val();
		}
	});

}

//sms: updated on 6/2/2011
var devaWasDisplayed = false;
var interval = -1;
var certinterval = null;
var firstTime = true;
var isLeftOpen = 0;

function reloadDevaFront() {
	
    // var role = jQuery("#role").val();
    // if(role=="admin"){
    	
	// First: Get the information for the current schedule for this ve, if any, 
    // and populate the information for the user to work with the ve.

	// sms: updated on 6/2/2011
	// var 
    if(!iscerttest){
        devaWasDisplayed = getCurDevaInsInfo();
        if (!devaWasDisplayed) {
            
            // sms: updated 6/4/2011 commented out the below line
            // interval = setInterval('getCurDevaInsInfo()', 10000);
            
            if (jQuery('#resourcetype').val() == "VIRTUAL LAB") {
                createInstantAppointmentDialogBox(
                        jQuery('#username').val(), 
                        jQuery('#course').val(), 
                        jQuery('#resourcetype').val());
            } else if (jQuery('#resourcetype').val() == "CERTIFICATE"){
                createInstantAppointment4CTDialogBox(
                        jQuery('#username').val(), 
                        jQuery('#course').val(), 
                        jQuery('#resourcetype').val());
            }
        }
    }else{
		isLeftOpen = parseInt(jQuery("#isLeftOpen").val());
		progressDialogBox(true);
		if(!getUserCurApp()){
			//alert('debug: 1');
			var message = "You appointment has expired.";

			if(isLeftOpen == 0){
				devaWasDisplayed = getCurDevaInsInfo();
				if (!devaWasDisplayed) {
					var newevent = getCreateNewEventObjFromInstantApp4CTForm(jQuery('#username').val(), jQuery('#course').val(), jQuery('#resourcetype').val());
								
					if (scheduleAppointment(newevent, jQuery('#username').val())) {
						//alert("3test: "+jQuery('#resourcetype').val());
						certinterval = setInterval('getCurDevaInsInfo()', 10000);
						//getCurDevaInsInfo();
					}
				}
			}else{
				closeQuizLeftOpen();	
			}
		
		}else{
			//alert('debug: 2');
			devaWasDisplayed = getCurDevaInsInfo();
			if (!devaWasDisplayed) {
				var newevent = getCreateNewEventObjFromInstantApp4CTForm(jQuery('#username').val(), jQuery('#course').val(), jQuery('#resourcetype').val());
			
				if (scheduleAppointment(newevent, jQuery('#username').val())) {
					//alert("3test: "+jQuery('#resourcetype').val());
					certinterval = setInterval('getCurDevaInsInfo()', 10000);
					//getCurDevaInsInfo();
				}
				
			}
		
		}
    }
	// Second: If there is no current schedule for this ve, get the 
	// information for the schedule of this ve for the next 30 minutes, if any
	// and ask the user whether he/she wants to start early.
	/*
	jQuery.ajax({
		type: 'POST',
		url: 'php/getAppointment.php',
		dataType: 'json',
		async: false,
		data: {
			requestingUser: jQuery('#username').val(),
			username: jQuery('#username').val(),
			course: jQuery('#course').val(),
			resourceType: jQuery('#resourcetype').val()
		},
		success: function(vms) {

			if(vms != null) {

				if (vms.success) {
					
				}
			}
		}
	});
	*/
	// alert("before editDialogBox!");
	// editDialogBox(event,view);
	// editDialogBox();
	// alert("after editDialogBox!");

	// Third: If the user confirmed to start early, modify the appointment and 
	// go to the First step. 
	
	// Fourth: If there is no appointment for the next 30 minutes for this ve
	// then ask user if he/she wants to schedule one by asking the length of the
	// appointment in hours and minutes, starting from now.
	
	// Fifth: If the user confirmed, then schedule an appointment accordingly 
	// and then go to the First step.
}

// sms: 6/28/2014 Added to support embedded version
function reloadDevaFrontEmbedded() {
	
    // var role = jQuery("#role").val();
    // if(role=="admin"){
    	
	// First: Get the information for the current schedule for this ve, if any, 
    // and populate the information for the user to work with the ve.

	// sms: updated on 6/2/2011
	// var 
    if(!iscerttest){
        devaWasDisplayed = getCurDevaInsInfo();
        if (!devaWasDisplayed) {
            
            // sms: updated 6/4/2011 commented out the below line
            // interval = setInterval('getCurDevaInsInfo()', 10000);
            
            if (jQuery('#resourcetype').val() == "VIRTUAL LAB") {
				createInstantAppointmentEmbedded(
                        jQuery('#username').val(), 
                        jQuery('#course').val(), 
                        jQuery('#resourcetype').val(),
						jQuery('#hours').val(),
						jQuery('#minutes').val());
            } else if (jQuery('#resourcetype').val() == "CERTIFICATE"){
                createInstantAppointment4CTDialogBox(
                        jQuery('#username').val(), 
                        jQuery('#course').val(), 
                        jQuery('#resourcetype').val());
            }
        }
    }else{
		isLeftOpen = parseInt(jQuery("#isLeftOpen").val());
		progressDialogBox(true);
		if(!getUserCurApp()){
			//alert('debug: 1');
			var message = "You appointment has expired.";

			if(isLeftOpen == 0){
				devaWasDisplayed = getCurDevaInsInfo();
				if (!devaWasDisplayed) {
					var newevent = getCreateNewEventObjFromInstantApp4CTForm(jQuery('#username').val(), jQuery('#course').val(), jQuery('#resourcetype').val());
								
					if (scheduleAppointment(newevent, jQuery('#username').val())) {
						//alert("3test: "+jQuery('#resourcetype').val());
						certinterval = setInterval('getCurDevaInsInfo()', 10000);
						//getCurDevaInsInfo();
					}
				}
			}else{
				closeQuizLeftOpen();	
			}
		
		}else{
			//alert('debug: 2');
			devaWasDisplayed = getCurDevaInsInfo();
			if (!devaWasDisplayed) {
				var newevent = getCreateNewEventObjFromInstantApp4CTForm(jQuery('#username').val(), jQuery('#course').val(), jQuery('#resourcetype').val());
			
				if (scheduleAppointment(newevent, jQuery('#username').val())) {
					//alert("3test: "+jQuery('#resourcetype').val());
					certinterval = setInterval('getCurDevaInsInfo()', 10000);
					//getCurDevaInsInfo();
				}
				
			}
		
		}
    }
	// Second: If there is no current schedule for this ve, get the 
	// information for the schedule of this ve for the next 30 minutes, if any
	// and ask the user whether he/she wants to start early.
	/*
	jQuery.ajax({
		type: 'POST',
		url: 'php/getAppointment.php',
		dataType: 'json',
		async: false,
		data: {
			requestingUser: jQuery('#username').val(),
			username: jQuery('#username').val(),
			course: jQuery('#course').val(),
			resourceType: jQuery('#resourcetype').val()
		},
		success: function(vms) {

			if(vms != null) {

				if (vms.success) {
					
				}
			}
		}
	});
	*/
	// alert("before editDialogBox!");
	// editDialogBox(event,view);
	// editDialogBox();
	// alert("after editDialogBox!");

	// Third: If the user confirmed to start early, modify the appointment and 
	// go to the First step. 
	
	// Fourth: If there is no appointment for the next 30 minutes for this ve
	// then ask user if he/she wants to schedule one by asking the length of the
	// appointment in hours and minutes, starting from now.
	
	// Fifth: If the user confirmed, then schedule an appointment accordingly 
	// and then go to the First step.
}

function getCurDevaInsInfo() {
    
	var bottomFrameHeightPercentage = getBottomFrameHeightPercentage();
	jQuery("#bottomFrameHeightPercentage").val(bottomFrameHeightPercentage);	// Added: JAM 03.21.2012
	// sms: updated on 6/2/2011
	// var 
	devaWasDisplayed = false;
	
	// Clean devaTabs div to build it
	jQuery("#devaTabs").html("");
	
	retry = false;
	tryCount = 0;
	// do {
		tryCount++;
		retry = false;
		
		ws_vLab_moodleURL = vLab_moodleURL + 'php/virtuallabs-wscalls.php';
		// alert("ws_vLab_moodleURL: " + ws_vLab_moodleURL);
		jQuery.ajax({
			type: 'POST',
			url: ws_vLab_moodleURL,
			dataType: 'json',
			async: false,
			data: {
				action: 'getDevaInsInfo',
				requestingUser: jQuery('#username').val(),
				username: jQuery('#username').val(),
				course: jQuery('#course').val(),
				resourceType: jQuery('#resourcetype').val()
			},
			success: function(vms) {
				
				var devaGraphURL = "";
				var quizURL = "";
								
				if(vms != null) {

					if (vms.success) {
						vmc_init();
						devaWasDisplayed = true;
						if (interval != -1) {
							clearInterval(interval);
							interval = -1;
						}

						// sms: updated on 6/2/2011 
						// sms: updated on 6/4/2011 commented out the below line
						// if (interval == -1) {
							var div = "";
							//var kaseyaServer = "http://kaseya2.cis.fiu.edu/";
							var kaseyaServer = "http://" + vms.kserver.name + ":" + vms.kserver.httpPort;
							/*
						if (jQuery('#resourcetype').val() == "CERTIFICATE") {

							var questionsURL = '../quiz/view.php?id=1282';
							jQuery("#devaTabs").append('<a id="questions" class="devaTabs ui-corner-all" ' + 
									' href="'+questionsURL+'"'+ 
									' target="mainscreen">'+
							'<span>Questions</span></a>');

						}
							 */
                            
                            if(iscerttest){
								clearInterval(certinterval);
                                quizURL = jQuery("#examURL").val();//var devaGraphURL = 
								
								// Added by SMS: 8/8/2011
								// New Window link for the questions
                                jQuery("#devaTabs").append('<a id="quizURL" href="'+quizURL+'" target="quizWindow" class="quizURL">New Window</a>');
								//
                                // Quesitons Tab
								jQuery("#devaTabs").append('<a id="examQuestions" class="devaTabs ui-corner-all" ' + 
                                        ' href="#">'+
                                '<span>Exam Questions</span></a>');
								
								jQuery("#devaTabContent").hide();
								
                            }else{
                                // Network Diagram Tab
								devaGraphURL = 
                                    // sms: 6/28/2014 Added to support embedded version
									// 'devaGraph.php?'+
                                    cert_baseURI + 'devaGraph-embedded.php?'+
                                    'kaseyaServer='+kaseyaServer+
                                    '&vmName0='+vms.vmInfo[0].name+
                                    '&vmName1='+vms.vmInfo[1].name+
                                    '&vmName2='+vms.vmInfo[2].name+
                                    '&vmName3='+vms.vmInfo[3].name+
                                    '&vmName4='+vms.vmInfo[4].name+
                                    '&hostName0='+vms.vmInfo[0].accessAddress+
									'&hostName1='+vms.vmInfo[1].accessAddress+
									'&hostName2='+vms.vmInfo[2].accessAddress+
									'&hostName3='+vms.vmInfo[3].accessAddress+
									'&hostName4='+vms.vmInfo[4].accessAddress+
                                    '&hostPort0='+vms.vmInfo[0].accessPort+
                                    '&hostPort1='+vms.vmInfo[1].accessPort+
                                    '&hostPort2='+vms.vmInfo[2].accessPort+
                                    '&hostPort3='+vms.vmInfo[3].accessPort+
                                    '&hostPort4='+vms.vmInfo[4].accessPort+
                                    '&kserverUsername='+vms.kserver.username+
									'&username0='+vms.vmInfo[0].username+
									'&username1='+vms.vmInfo[1].username+
									'&username2='+vms.vmInfo[2].username+
									'&username3='+vms.vmInfo[3].username+
									'&username4='+vms.vmInfo[4].username+
									'&kserverPassword='+hideVMPassword(vms.kserver.password)+
									'&password0='+hideVMPassword(vms.vmInfo[0].password)+
									'&password1='+hideVMPassword(vms.vmInfo[1].password)+
									'&password2='+hideVMPassword(vms.vmInfo[2].password)+
									'&password3='+hideVMPassword(vms.vmInfo[3].password)+
									'&password4='+hideVMPassword(vms.vmInfo[4].password)+
									'&domain0='+vms.vmInfo[0].domain+
									'&domain1='+vms.vmInfo[1].domain+
									'&domain2='+vms.vmInfo[2].domain+
									'&domain3='+vms.vmInfo[3].domain+
									'&domain4='+vms.vmInfo[4].domain+
                                    '&bottomFrameHeightPercentage='+bottomFrameHeightPercentage;  
                                // alert("devaGraphURL: " + devaGraphURL);
                                // Network Diagram Tab
                                jQuery("#devaTabs").append('<a id="devaGraph" class="devaTabs ui-corner-all" ' + 
                                        ' href="'+devaGraphURL+'"'+ 
                                        ' target="mainscreen">'+
                                '<span>Network Diagram</span></a>');
    
                                // Data Sheet Tab
                                jQuery("#devaTabs").append('<a id="dataSheet" class="devaTabs ui-corner-all" ' +
                                        'href="' + cert_baseURI + 'dataSheet.php?'+
                                        'kaseyaServer='+kaseyaServer+
                                        '&vmName0='+vms.vmInfo[0].name+
                                        '&vmName1='+vms.vmInfo[1].name+
                                        '&vmName2='+vms.vmInfo[2].name+
                                        '&vmName3='+vms.vmInfo[3].name+
                                        '&vmName4='+vms.vmInfo[4].name+
										'&hostName='+vms.vmInfo[0].accessAddress+
                                        '&hostPort0='+vms.vmInfo[0].accessPort+
                                        '&hostPort1='+vms.vmInfo[1].accessPort+
                                        '&hostPort2='+vms.vmInfo[2].accessPort+
                                        '&hostPort3='+vms.vmInfo[3].accessPort+
                                        '&hostPort4='+vms.vmInfo[4].accessPort+
										'&username='+vms.vmInfo[0].username+
										'&password='+hideVMPassword(vms.vmInfo[0].password)+
										'&domain='+vms.vmInfo[0].domain+
                                        '&bottomFrameHeightPercentage='+bottomFrameHeightPercentage+'" target="mainscreen"><span>Data Sheet</span></a>');
                            }
							// Connection Information Tab
							jQuery("#devaTabs").append('<a id="devaInfo" class="devaTabs ui-corner-all" ' +
									'href="' + cert_baseURI + 'devaInfo.php?'+
									'kaseyaServer='+kaseyaServer+
									'&vmName0='+vms.vmInfo[0].name+
									'&vmName1='+vms.vmInfo[1].name+
									'&vmName2='+vms.vmInfo[2].name+
									'&vmName3='+vms.vmInfo[3].name+
									'&vmName4='+vms.vmInfo[4].name+
									'&hostName0='+vms.vmInfo[0].accessAddress+
									'&hostName1='+vms.vmInfo[1].accessAddress+
									'&hostName2='+vms.vmInfo[2].accessAddress+
									'&hostName3='+vms.vmInfo[3].accessAddress+
									'&hostName4='+vms.vmInfo[4].accessAddress+
									'&hostPort0='+vms.vmInfo[0].accessPort+
									'&hostPort1='+vms.vmInfo[1].accessPort+
									'&hostPort2='+vms.vmInfo[2].accessPort+
									'&hostPort3='+vms.vmInfo[3].accessPort+
									'&hostPort4='+vms.vmInfo[4].accessPort+
									'&kserverUsername='+vms.kserver.username+
									'&username0='+vms.vmInfo[0].username+
									'&username1='+vms.vmInfo[1].username+
									'&username2='+vms.vmInfo[2].username+
									'&username3='+vms.vmInfo[3].username+
									'&username4='+vms.vmInfo[4].username+
									'&kserverPassword='+hideVMPassword(vms.kserver.password)+
									'&password0='+hideVMPassword(vms.vmInfo[0].password)+
									'&password1='+hideVMPassword(vms.vmInfo[1].password)+
									'&password2='+hideVMPassword(vms.vmInfo[2].password)+
									'&password3='+hideVMPassword(vms.vmInfo[3].password)+
									'&password4='+hideVMPassword(vms.vmInfo[4].password)+
									'&domain0='+vms.vmInfo[0].domain+
									'&domain1='+vms.vmInfo[1].domain+
									'&domain2='+vms.vmInfo[2].domain+
									'&domain3='+vms.vmInfo[3].domain+
									'&domain4='+vms.vmInfo[4].domain+
									'&bottomFrameHeightPercentage='+bottomFrameHeightPercentage+'" target="mainscreen"><span>Connection Info</span></a>');

							for (var i=0; i<vms.vmInfo.length; i++) {
								// Deva Tabs

								/*							jQuery("#devaTabs").append('<a id="tab'+i+'" class="devaTabs ui-corner-all" href="webRDP.php?tab=tab'+i+'&hostName='+vms.vmInfo[i].accessAddress+'&hostPort='+vms.vmInfo[i].accessPort+'&username='+vms.vmInfo[i].username+'&password='+escape(vms.vmInfo[i].password)+'&domain='+vms.vmInfo[i].domain+'&bottomFrameHeightPercentage='+bottomFrameHeightPercentage+'" target="mainscreen"><span>'+vms.vmInfo[i].name+'</span></a>');
								 */
								jQuery("#devaTabs").append('<a id="tab'+i+'" class="devaTabs ui-corner-all" href="#" ><span>'+vms.vmInfo[i].name+'</span></a>');
							}

							// This is just a comment!
							jQuery("#tabs-wrapper").css({"border": "4px solid #DFEFFC"})
							
							div  = "";
							div += '<IFRAME name="examscreen" id="examscreenid"'; 
							div += '	SRC="'+quizURL+'"';
							div += '	WIDTH=100% HEIGHT="'+tabContentHeight()+'"';
							div += '	frameborder="0"';
							div += '	scrolling="yes">';
							div += '	Your browser doesn\'t understand IFRAME. Please click'; 
							div += '	<A target=_blank HREF="'+quizURL+'">';
							div += '	here</A> to load the page in a separate window.';
							div += '</IFRAME>';
							
							jQuery("#examContent").html(div);

							div  = "";
							// div += '<div id="tab0ContentIFrame" class="tabContentIFrame" align="center" style="display: none;">';
							div += '<IFRAME name="mainscreen" id="mainscreenid"'; 
							// div += '    SRC="devaGraph.php?kaseyaServer='+kaseyaServer+'&vmName0='+vms.vmInfo[0].name+'&vmName1='+vms.vmInfo[1].name+'&vmName2='+vms.vmInfo[2].name+'&vmName3='+vms.vmInfo[3].name+'&vmName4='+vms.vmInfo[4].name+'&hostName='+vms.vmInfo[0].accessAddress+'&hostPort0='+vms.vmInfo[0].accessPort+'&hostPort1='+vms.vmInfo[1].accessPort+'&hostPort2='+vms.vmInfo[2].accessPort+'&hostPort3='+vms.vmInfo[3].accessPort+'&hostPort4='+vms.vmInfo[4].accessPort+'&username='+vms.vmInfo[0].username+'&password='+vms.vmInfo[0].password+'&domain='+vms.vmInfo[0].domain+'&bottomFrameHeightPercentage='+bottomFrameHeightPercentage+'"'; 
							div += '	SRC="'+devaGraphURL+'"';
							div += '	WIDTH=100% HEIGHT="'+tabContentHeight()+'"';
							div += '	frameborder="0"';
							div += '	scrolling="yes">';
							div += '	Your browser doesn\'t understand IFRAME. Please click'; 
							div += '	<A target=_blank HREF="'+devaGraphURL+'">';
							div += '	here</A> to load the page in a separate window.';
							div += '</IFRAME>';
							// div += '</div>'
							//jQuery("#devaTabContent").append("<div id='vmControlPanel'></div>");
							jQuery("#devaTabContent").append(div);
							jQuery("#devaTabContent").append("<div id='veInsId' style='display:none;'>"+ vms.vmInfo[0].veInsId +"</div>");
							jQuery("#devaTabContent").append("<div id='veInsAddr' style='display:none;'>"+ vms.vmInfo[0].accessAddress +"</div>");
							for (var i=0; i<vms.vmInfo.length; i++) {
								var userId = jQuery('#userid').val();
								var linkURL = cert_baseURI + 'webRDP.php?tab=tab'+i+'&hostName='+vms.vmInfo[i].accessAddress+'&hostPort='+vms.vmInfo[i].accessPort+'&userid='+userId+'&username='+vms.vmInfo[i].username+'&password='+escape(vms.vmInfo[i].password)+'&domain='+vms.vmInfo[i].domain+'&bottomFrameHeightPercentage='+bottomFrameHeightPercentage;

								jQuery("#devaTabContent").append("<div id='veInsPort-tab"+i+"' style='display:none;'>"+ vms.vmInfo[i].accessPort +"</div>");
								jQuery("#devaTabContent").append("<div id='veInsURL-tab"+i+"' style='display:none;'>"+ linkURL +"</div>");
								rdpTabInfo.push({ 
													tabId:		'tab'+i, 
													ready:		false, 
													showing:	false, 
													state:		null,
													veInsId:	vms.vmInfo[i].veInsId,
													veInsAddr:	vms.vmInfo[i].accessAddress,
													veInsPort:	vms.vmInfo[i].accessPort,
													veInsURL:	linkURL
													
													});
							}
						// sms: updated 6/4/2011 commented out the below line
						// }
						if(!iscerttest){
							//progressDialogBox(false);
						}
						setClick4Tabs();
						
						if(iscerttest){
							jQuery(".devaTabs").css({"color":"#2E6E9E", "background-color":"#86B3D5", "font-weight": "normal", "padding": "2px 5px 2px 5px"});
							jQuery("#examQuestions").css({"color":"#E17009", "background-color":"#DFEFFC", "font-weight": "bold", "padding": "2px 5px 12px 5px"});
							selectTab("examQuestions");
							
							var questionsInterval = setInterval(function(){
							    //console.log('isLoaded: '+jQuery("#examscreenid").contents().find("#pageLoaded").html());
							    if(jQuery("#examscreenid").contents().find("#pageLoaded").html()){
								clearInterval(questionsInterval);
								progressDialogBox(false);
							    }
							}, 5000);
						}else{
							progressDialogBox(false);
						}
						
					} else {
						retry = false;
						// alert(vms.reason + " retry is: " + retry + " tryCount is:" + tryCount);
					}
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				if (tryCount < 5) {
					// alert("Trying... " + tryCount);
					retry = true;
				} else {
					retry = false;
					//noticeDialog("Virtual Machine Server", message, "alert");
					alert("The server may be down or too busy at this moment! " +
						"Wait for a couple of minutes and try again! " +
						"If the problem persist, you should contact sadjadi@cs.fiu.edu");
					
				}
			}
		});
	// } while (retry);
	
	if(!isTimeSet){
		setTimeControl();	
	}
	
	// sms: updated on 6/2/2011
	/*
	if (devaWasDisplayed) {
		
		if (firstTime) {
			firstTime = false;
		} else {
			if (interval != -1) {
				clearInterval(interval);
				interval = -1;
				// window.location.reload();
				// sms: updated 6/4/2011 added the below line
				progressDialogBox(false);
				setClick4Tabs();
			} else {
				progressDialogBox(false);
			}	
		}	
	}
	*/
	
	return devaWasDisplayed;
}

function hideVMPassword(password){
	var secret = "";
	
	for (i=0;i<password.length;i++){
		if(i<2 && password.length>2){
		   secret += password.charAt(i);
		}else if(i>=password.length-2 && password.length>4){
		   secret += password.charAt(i);
		}else{
		   secret += "*";
		}
	}
	return secret;
}

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
    return curtop;
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

function resizeIframe(newHeight)
{
  document.getElementById('mainscreenid').style.height = parseInt(newHeight) + 'px';
  //jQuery("#content").css("margin-top", "-10px");
  //jQuery("#mainscreenid").css('height', parseInt(newHeight) + 'px');
}
function resizeExamIframe(newHeight)
{
	if(document.getElementById('examscreenid')){
		document.getElementById('examscreenid').style.height = parseInt(newHeight) + 'px';
	}
	
}

function findPosX(obj)
{
  var curleft = 0;
  if(obj.offsetParent)
      while(1) 
      {
        curleft += obj.offsetLeft;
        if(!obj.offsetParent)
          break;
        obj = obj.offsetParent;
      }
  else if(obj.x)
      curleft += obj.x;
  return curleft;
}

function findPosY(obj)
{
  var curtop = 0;
  if(obj.offsetParent)
      while(1)
      {
        curtop += obj.offsetTop;
        if(!obj.offsetParent)
          break;
        obj = obj.offsetParent;
      }
  else if(obj.y)
      curtop += obj.y;
  return curtop;
}

function tabContentHeight()
{
	var tabConHeight = 0;
	var tabContent = document.getElementById('devaTabContent');
	tabConHeight = getHeight() - findPosY(tabContent) - 15;
	// alert(tabConHeight);
	return tabConHeight;
}
function examContentHeight()
{
	var tabConHeight = 0;
	var tabContent = document.getElementById('examContent');
	tabConHeight = getHeight() - findPosY(tabContent) - 15;
	// alert(tabConHeight);
	return tabConHeight;
}

var BROWSER = {IE:0, CHROME:1, SAFARI:2, MOZILLA:3, OPERA:4}; 

function getBottomFrameHeightPercentage() {

	var bottomFrameHeightPercentage = 100;
	
	var browserType = getBrowserType();
	
	switch (browserType) {
		case BROWSER.SAFARI:
			bottomFrameHeightPercentage = 97;
			break;
		
		case BROWSER.IE:
		case BROWSER.CHROME:
		case BROWSER.MOZILLA:
		case BROWSER.OPERA:
			bottomFrameHeightPercentage = 100;
			break;

		default: 
			bottomFrameHeightPercentage = 100;
	}
		
	return bottomFrameHeightPercentage;
}

function getBrowserType() {

	// Is this a version of IE?
	if(jQuery.browser.msie){
		return BROWSER.IE;
	}

	// Is this a version of Chrome?
	if(jQuery.browser.chrome){
		return BROWSER.CHROME;
	}

	// Is this a version of Safari?
	if(jQuery.browser.safari){
		return BROWSER.SAFARI;
	}

	// Is this a version of Mozilla?
	if(jQuery.browser.mozilla){
		return BROWSER.MOZILLA
	}

	// Is this a version of Opera?
	if(jQuery.browser.opera){
		return BROWSER.OPERA;
	}
	
}

function getHeight() {
	var browserType = getBrowserType();
	// alert(browserType);
	
	var myWidth = 0, myHeight = 0;
	if( typeof( window.innerWidth ) == 'number' ) {
		//Non-IE
		myWidth = window.innerWidth;
		myHeight = window.innerHeight;
	} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
		//IE 6+ in 'standards compliant mode'
		myWidth = document.documentElement.clientWidth;
		myHeight = document.documentElement.clientHeight;
	} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
		//IE 4 compatible
		myWidth = document.body.clientWidth;
		myHeight = document.body.clientHeight;
	}
// 	window.alert( 'Width = ' + myWidth );
//	window.alert( 'Height = ' + myHeight );

	// alert("myHeight: " + myHeight);
	return myHeight;
}

function selectTab(tabId, height) {
	
	clearInterval(stateInterval);	
	
	if(tabId != "examQuestions"){
		
		jQuery("#examContent").hide();
		jQuery("#devaTabContent").show();
								
		
		// alert("selectTab - Parent: " + "#"+tabId);
		// alert("selectTab - Parent - height: " + height);
		var actualHeight = tabContentHeight(); 
		if (height > 0) 
			actualHeight = height;		
		// alert("selectTab - Parent - actualHeight: " + actualHeight);
		resizeIframe(actualHeight);
		if(height){
			jQuery(".devaTabs").css({"color":"#2E6E9E", "background-color":"#86B3D5", "font-weight": "normal", "padding": "2px 5px 2px 5px"});
			jQuery("#"+tabId).css({"color":"#E17009", "background-color":"#DFEFFC", "font-weight": "bold", "padding": "2px 5px 12px 5px"});
		}
	
		//Added: to track when the VMcontrol is to shown
		var istab = tabId.indexOf("tab");
		var vmname = jQuery("#"+tabId+" span").html();
		var instanceId = jQuery('#veInsId').html();
		var hostName = jQuery("#veInsAddr").html();
		var hostPort = jQuery("#veInsPort-"+tabId).html();
		
		var sstate = getRdpTabInfo('state', currentTabSelected);
		
		//currentTabSelected = tabId;
		rdpIsReady = false;
		//alert("istab: "+istab);
	
		if(istab >= 0){		// if the tab is a virtual machine
			checkRDPMachineStatus(true);
			//var url = jQuery("#"+tabId).attr('href');
			
			//if(url.indexOf('manual=false') < 0){
			//if(!tabAlreadyLoaded){	
			
				//jQuery("#mainscreenid").attr('src','webRDPMessage.php?tab='+tabId);
				//--jQuery("#mainscreenid").attr('src','');
				
				isControlOnTab = true;
				jQuery("#vmControlPanel").empty();
				jQuery("#vmControlPanel").append(getVMControlHTML());
				
				vmOptionsInSettings = true;
				bpOptionsInSettings = true;
				
				//jQuery('#screenOptions').show();	// JAM: 05/13/2012
				//jQuery('#vmControlPanel').show();
				//jQuery('.timer-navbar').css("min-width","1180px");
				
				jQuery('.settings button#vmOptions').removeClass('open').show();	// JAM: 06/04/2012
				jQuery('.settings button#bpOptions').removeClass('open').show();	// JAM: 06/04/2012
				// Adjust width for .timer-navbutton bar
				//jQuery('.timer-navbutton').width("162px");
				
				setupVMControlButtons(instanceId, vmname);
				
				
					
				
				//--checkRDPStatus(instanceId, vmname, hostName, hostPort, true, false);
				
				//vmInstanceCmd('getState', instanceId, vmname);
				
				
			//}else{
			//	tabAlreadyLoaded = false;
			//	vmInstanceCmd('getState', instanceId, vmname);
			//}
			
			//jQuery("#vmcDebug").html("tabAlreadyLoaded: "+ tabAlreadyLoaded + " tabId: "+tabId);
			
		}else{
			
			//jQuery("#vmcDebug").html("tabId: "+tabId);
			
			isControlOnTab = false;
			jQuery("#vmControlPanel").empty();
			//jQuery('#screenOptions').hide();
			//jQuery('#vmControlPanel').hide();
			//jQuery('.timer-navbar').css("min-width","");
			
			jQuery('.settings button#vmOptions').hide();	// JAM: 06/04/2012
	    		jQuery('.settings button#bpOptions').hide();	// JAM: 06/04/2012
			//jQuery('.timer-navbutton').width("102px");
		    
			if(useCertCSS){
				jQuery("div.navbar div.navbutton").removeClass("timer-navbutton");
				jQuery("div.navbar div.navbutton").addClass("timer-navbutton-cert");	
			}
			
		}
	
	}else{
		
		jQuery("#devaTabContent").hide();
		jQuery("#examContent").show();
/////here
		// alert("selectTab - Parent: " + "#"+tabId);
		// alert("selectTab - Parent - height: " + height);
		var actualHeight = tabContentHeight(); 
		if (height > 0) 
			actualHeight = height;		
		// alert("selectTab - Parent - actualHeight: " + actualHeight);
		resizeIframe(actualHeight);
		if(height){
			jQuery(".devaTabs").css({"color":"#2E6E9E", "background-color":"#86B3D5", "font-weight": "normal", "padding": "2px 5px 2px 5px"});
			jQuery("#"+tabId).css({"color":"#E17009", "background-color":"#DFEFFC", "font-weight": "bold", "padding": "2px 5px 12px 5px"});
		}
	
		//Added: to track when the VMcontrol is to shown
		var istab = tabId.indexOf("tab");
		var vmname = jQuery("#"+tabId+" span").html();
		var instanceId = jQuery('#veInsId').html();
		var hostName = jQuery("#veInsAddr").html();
		var hostPort = jQuery("#veInsPort-"+tabId).html();
		
		var sstate = getRdpTabInfo('state', currentTabSelected);
		
		//currentTabSelected = tabId;
		rdpIsReady = false;
		//alert("istab: "+istab);
//////// HERE
		
		var actualHeight = examContentHeight(); 
		if (height > 0) 
			actualHeight = height;		
			
		resizeExamIframe(actualHeight);	
		
		isControlOnTab = false;
		jQuery("#vmControlPanel").empty();
		//jQuery('#screenOptions').hide();
		//jQuery('#vmControlPanel').hide();
		//jQuery('.timer-navbar').css("min-width","");
		
		jQuery('.settings button#vmOptions').hide();	// JAM: 06/04/2012
	    	jQuery('.settings button#bpOptions').hide();	// JAM: 06/04/2012
		//jQuery('.timer-navbutton').width("102px");
		vmOptionsInSettings = false;
		bpOptionsInSettings = false;
		
		if(useCertCSS){
			jQuery("div.navbar div.navbutton").removeClass("timer-navbutton");
			jQuery("div.navbar div.navbutton").addClass("timer-navbutton-cert");	
		}
		
		jQuery(".devaTabs").css({"color":"#2E6E9E", "background-color":"#86B3D5", "font-weight": "normal", "padding": "2px 5px 2px 5px"});
		jQuery("#"+tabId).css({"color":"#E17009", "background-color":"#DFEFFC", "font-weight": "bold", "padding": "2px 5px 12px 5px"});
	
		
		
		jQuery("#examContent #header").css('display', 'none');
		jQuery("#examContent #footer").css('display', 'none');	
		jQuery("#examContent .navbar").css('display', 'none');
		
	
	}
	
	jQuery('#screenOptions').hide();
	jQuery('#vmControlPanel').hide();
	//jQuery('button#bpOptions').hide();
	//jQuery('button#vmOptions').hide();
	
	trace('hide: screenOptions, vmControlPanel');
	
	optionsResizing();
}