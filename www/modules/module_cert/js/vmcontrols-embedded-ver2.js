var getTimeAttempts = 0;
var isTimeSet = false;
var debugtime = 5;

var currentAppointmentId;
var currentAppointmentEndDate;
var useCertCSS = false;

var stateInterval = null;
var rdpInterval = null;
var rdpIsReady = null;
var rdpTabInfo = [];
var buttonFunc = null;

var currentTabSelected; 
var tabAlreadyLoaded = false;

var isSpinning = false;

var wasRDPMachineReady = false;

var timeOverIsSet = false;

var timeOptionsInSettings = false;
var vmOptionsInSettings = false;
var bpOptionsInSettings = false;
var screenOptionsInSettings = false;

var screenoptionswidth = 305;
var timetoolswidth = 170;
var toolbarswidth = 230;

var padding = 20;
var navbarwidth = 0;
var breadcrumbwidth = 0;
var navbuttonwidth = 0;
var clockwidth = 0;
var settingswidth = 0;

var resizeTimeOut = false;

function verifyIframe(){
	
}

function vmc_init(){
	
	//Set number of attempts
	getTimeAttempts = 5;
	
	//Remove unused update button
	jQuery("#page .navbar .navbutton").empty();
	
	//jQuery("#page .navbar .navbutton").append("<div id='screenOptions'></div>");
	//jQuery("#page .navbar .navbutton").append("<div id='vmControlPanel'></div>");
	//jQuery("#page .navbar .navbutton").append("<div class='vmControlContainer'><div id='vmControlPanel'></div></div>");
	//jQuery("#page .navbar .navbutton .vmControlContainer").append(getTimeControlHTML());
	//jQuery("#page .navbar .navbutton").append(getTimeControlHTML);
	
	jQuery("#page .navbar .navbutton").append("<div class='clock'>" + getTimeClockHTML() + "</div>");
	
	//jQuery("#page .navbar .navbutton").append("<div class='settings'><button id='vmOptions' class='optionsButton'></button><button id='bpOptions' class='optionsButton'></button><button id='timeOptions' class='optionsButton'></button></div>");
	jQuery("#page .navbar .navbutton").append("<div class='settings'><button id='timeOptions' class='optionsButton'></button><button id='bpOptions' class='optionsButton'></button><button id='vmOptions' class='optionsButton'></button></div>");
	
	jQuery("#page .navbar .navbutton").append("<div class='vmControlContainer'>"+ getTimeControlHTML() +"<div id='screenOptions'></div><div id='vmControlPanel'></div></div>");
	
	// Show options Button
	jQuery(".settings button#vmOptions").button({ icons: {primary:'ui-icon-gear'} });	//ui-icon-wrench
	jQuery(".settings button#timeOptions").button({ icons: {primary:'ui-icon-clock'} });
	jQuery(".settings button#bpOptions").button({ icons: {primary:'ui-icon-image'} });
	jQuery(".settings button#vmOptions, .settings button#bpOptions").hide();
	
	//#timetools, #screenOptions, #vmControlPanel
	//jQuery('#timetools').show();
	jQuery("#screenOptions, #vmControlPanel").hide();
	jQuery(".settings button#vmOptions").click(function(){
		//jQuery('#vmControlPanel').toggle();
		
		hideShowOptions(jQuery("#vmControlPanel"),this);
		//checkOptionsScreenVisible();
	});
	//if(!iscerttest){
		jQuery(".settings button#timeOptions").click(function(){
			//jQuery('#timetools').toggle();
			hideShowOptions(jQuery("#timetools"),this);
			//checkOptionsScreenVisible();
		});
	//}else{
	//	jQuery(".settings button#timeOptions").button("disable");
	//}
	jQuery(".settings button#bpOptions").click(function(){
		//jQuery('#screenOptions').toggle();
		hideShowOptions(jQuery("#screenOptions"),this);
		//checkOptionsScreenVisible();
	});
	
	jQuery(window).resize(function(){
		jQuery(".navbar .navbutton").hide();
		if(resizeTimeOut !== false)
			clearTimeout(resizeTimeOut);
			
		resizeTimeOut = setTimeout(function(){		
			optionsResizing();
			jQuery("#devaTabs a.devaTabs.selected").each(function(){
				jQuery(this).click();
			});
			trace('resize Complete');
		}, 500);  // miliseconds
	});
	
	setupTimeControlButtons();
	//jQuery('#screenOptions').hide();
	
	padding = 20;
	navbarwidth = jQuery("div.navbar.timer-navbar").width();
	breadcrumbwidth = jQuery(".breadcrumb ul").width();
	navbuttonwidth = jQuery(".timer-navbutton").width();
	clockwidth = jQuery(".clock").width();
	settingswidth = 0;
	
	setupScreenOptions();	// JAM: 03/17/2012
	
	//jQuery("#vmControlPanel").append(getVMControlHTML());
	//setupVMControlButtons();
	/*
	setTimeControl();
	// Every 1 minute(s) the loadAppointments function is called
	// 1 min = 60000, 5 min = 300000 
	setInterval("setTimeControl();",60000);
	*/
	
	//setTimeout(optionsResizing, 500);
}

function optionsResizing() {
	trace('optionsResizing'+isControlOnTab);
	jQuery(".navbar .navbutton").show();
	navbarwidth = jQuery("div.navbar.timer-navbar").width();
	breadcrumbwidth = jQuery(".breadcrumb ul").width();
	navbuttonwidth = jQuery(".timer-navbutton").width();
	clockwidth = jQuery(".clock").width();
	
	clearNavButtons();
	settingswidth = 0;
	if(isControlOnTab){
		adjustVMControlPanel();
		adjustScreenOptions();
	}
	//if(!iscerttest){
		adjustTimetools();
	//}
	//recalculateOptionsDisplay();
	//isControlOnTab


}
function clearNavButtons(){
	//console.log('vmOptionsInSettings:'+vmOptionsInSettings);
	//console.log('bpOptionsInSettings:'+bpOptionsInSettings);
	//console.log('timeOptionsInSettings:'+timeOptionsInSettings);
	
	if(vmOptionsInSettings){
		jQuery("#vmControlPanel").hide();
		jQuery('.vmControlContainer').append(jQuery('#vmControlPanel'));
		jQuery(".settings button#vmOptions").removeClass('open').show();
		
		var newwidthvalue = (settingswidth + clockwidth + padding) + "px";
		//jQuery(".timer-navbutton").css('width', newwidthvalue);
		
		vmOptionsInSettings = false;
	}
	if(bpOptionsInSettings){
		jQuery("#screenOptions").hide();
		jQuery('.vmControlContainer').append(jQuery('#screenOptions'));
		jQuery(".settings button#bpOptions").removeClass('open').show();
		
		var newwidthvalue = (settingswidth + clockwidth + padding) + "px";
		//jQuery(".timer-navbutton").css('width', newwidthvalue);
		
		bpOptionsInSettings = false;
	}
	if(timeOptionsInSettings){
		jQuery("#timetools").hide();
		jQuery('.vmControlContainer').append(jQuery('#timetools'));
		jQuery(".settings button#timeOptions").removeClass('open').show();
		
		var newwidthvalue = (settingswidth + clockwidth + padding) + "px";
		//jQuery(".timer-navbutton").css('width', newwidthvalue);
		
		timeOptionsInSettings = false;
	}		
}

function adjustVMControlPanel(){
	trace('Calculating VMControls -----');
	var resetOptions = false;
	/*
	var padding = 20;
	var navbarwidth = jQuery("div.navbar.timer-navbar").width();
	var breadcrumbwidth = jQuery(".breadcrumb ul").width();
	var navbuttonwidth = jQuery(".timer-navbutton").width();
	var clockwidth = jQuery(".clock").width();
	//var settingswidth = getSettingsWidth();	//jQuery(".settings").width();
	//var toolbarswidth = 230;	//jQuery('#vmControlPanel').width();
	*/
	var availablewidth = navbarwidth - (breadcrumbwidth +  clockwidth + padding);
	//var navarea = availablewidth - toolbarswidth;
	
	//recalculateOptionsDisplay();
	trace('availablewidth: '+availablewidth);
	//trace('settingswidth: '+settingswidth);
	
	if(availablewidth > 0){
		//trace("------------- > 0 --------------");
		//trace('MOVE TO navbar - availablewidth: '+ availablewidth);
		
		//alert(newwidthvalue);
		if(availablewidth >= toolbarswidth){
			if(!vmOptionsInSettings){
				jQuery("#vmControlPanel").show();
				jQuery('.settings').append(jQuery('#vmControlPanel'));
				jQuery(".settings button#vmOptions").hide();
				//jQuery('#vmControlPanel').show();
				//alert('here');
				//var newwidthvalue = (clockwidth + toolbarswidth + padding) + "px";
				settingswidth += toolbarswidth;
				var newwidthvalue = (settingswidth + clockwidth + padding) + "px";
				//jQuery(".timer-navbutton").css('width', newwidthvalue);
				
				vmOptionsInSettings = true;
			}
		}else{
			//trace("------------- ELSE 1 --------------");
			resetOptions = true;
		}
	}else{
		//trace("------------- ELSE 2 --------------");
		resetOptions = true;
	}
	
	if(resetOptions){
		//trace("------------- reset options --------------");
		//trace('MOVE TO vmControlContainer - availablewidth: '+ availablewidth);
		
		
		if(vmOptionsInSettings){
			jQuery("#vmControlPanel").hide();
			jQuery('.vmControlContainer').append(jQuery('#vmControlPanel'));
			jQuery(".settings button#vmOptions").show();
			
			settingswidth -= toolbarswidth;
			var newwidthvalue = (settingswidth + clockwidth + padding) + "px";
			//jQuery(".timer-navbutton").css('width', newwidthvalue);
			
			vmOptionsInSettings = false;
		}
	}
	
	//recalculateOptionsDisplay();
	
	//trace("navbarwidth: "+navbarwidth);
	//trace("breadcrumbwidth: "+breadcrumbwidth);
	//trace("navbuttonwidth: "+navbuttonwidth);
	//trace("settingswidth: "+settingswidth);
	//trace("clockwidth: "+clockwidth);
	trace("toolbarswidth: "+toolbarswidth);
	
	trace("vmOptionsInSettings: "+vmOptionsInSettings);	
}
function adjustScreenOptions(){
	trace('Calculating ScreenOptions -----');
	var resetOptions = false;

	//var settingswidth = getSettingsWidth();	//jQuery(".settings").width();
	//var screenoptionswidth = 305;	//jQuery('#vmControlPanel').width();
	
	var availablewidth = navbarwidth - (breadcrumbwidth + settingswidth + clockwidth + padding);
	
	//recalculateOptionsDisplay();
	trace('availablewidth: '+availablewidth);
	//trace('settingswidth: '+settingswidth);
	
	if(availablewidth > 0){
		//trace("------------- bp: 0 --------------");
		//trace('MOVE TO navbar - availablewidth: '+ availablewidth);
		
		//alert(newwidthvalue);
		if(availablewidth >= screenoptionswidth){
			if(!bpOptionsInSettings && vmOptionsInSettings){
				jQuery("#screenOptions").show();
				jQuery('.settings').append(jQuery('#screenOptions'));
				jQuery(".settings button#bpOptions").hide();
				
				settingswidth += screenoptionswidth;
				var newwidthvalue = (settingswidth + clockwidth + padding) + "px";
				//jQuery(".timer-navbutton").css('width', newwidthvalue);
				
				bpOptionsInSettings = true;
			}
		}else{
			//trace("------------- bp: ELSE 1 --------------");
			resetOptions = true;
		}
	}else{
		//trace("------------- bp: ELSE 2 --------------");
		resetOptions = true;
	}
	
	if(resetOptions){
		//trace("------------- bp: reset options --------------");
		//trace('MOVE TO vmControlContainer - availablewidth: '+ availablewidth);
		
		
		if(bpOptionsInSettings){
			jQuery("#screenOptions").hide();
			jQuery('.vmControlContainer').append(jQuery('#screenOptions'));
			jQuery(".settings button#bpOptions").show();
			
			settingswidth -= screenoptionswidth;
			var newwidthvalue = (settingswidth + clockwidth + padding) + "px";
			//jQuery(".timer-navbutton").css('width', newwidthvalue);
			
			bpOptionsInSettings = false;
		}
	}
	
	//recalculateOptionsDisplay();
	
	trace("navbarwidth: "+navbarwidth);
	trace("breadcrumbwidth: "+breadcrumbwidth);
	trace("navbuttonwidth: "+navbuttonwidth);
	trace("settingswidth: "+settingswidth);
	trace("clockwidth: "+clockwidth);
	trace("screenoptionswidth: "+screenoptionswidth);
	
	trace("bpOptionsInSettings: "+bpOptionsInSettings);
		
}
function adjustTimetools(){
	trace('Calculating Timetools -----');
	var resetOptions = false;
	
	//var settingswidth = getSettingsWidth();	//jQuery(".settings").width();
	//var timetoolswidth = 170;	//jQuery('#timetools').width();
	
	var availablewidth = navbarwidth - (breadcrumbwidth + settingswidth + clockwidth + padding);
	//var navarea = availablewidth - timetoolswidth;
	
	//recalculateOptionsDisplay();
	trace('availablewidth: '+availablewidth);
	//trace('settingswidth: '+settingswidth);
	
	if(availablewidth > 0){
		trace('MOVE TO navbar - availablewidth: '+ availablewidth);
		
		//alert(newwidthvalue);
		if(availablewidth >= timetoolswidth){
			if((!isControlOnTab && !timeOptionsInSettings) || (!timeOptionsInSettings && bpOptionsInSettings)){
				jQuery("#timetools").show();
				jQuery('.settings').append(jQuery('#timetools'));
				jQuery(".settings button#timeOptions").hide();
				//jQuery('#timetools').show();
				
				//var newwidthvalue = (clockwidth + timetoolswidth + padding) + "px";
				settingswidth += timetoolswidth;
				var newwidthvalue = (settingswidth + clockwidth + padding) + "px";
				//jQuery(".timer-navbutton").css('width', newwidthvalue);
				
				timeOptionsInSettings = true;
			}
		}else{
			resetOptions = true;
		}
	}else{
		resetOptions = true;
	}
	
	if(resetOptions){
		//trace('MOVE TO vmControlContainer - availablewidth: '+ availablewidth);
		
		
		if(timeOptionsInSettings){
			jQuery("#timetools").hide();
			jQuery('.vmControlContainer').append(jQuery('#timetools'));
			jQuery(".settings button#timeOptions").show();
			
			settingswidth -= timetoolswidth;
			var newwidthvalue = (settingswidth + clockwidth + padding) + "px";
			//jQuery(".timer-navbutton").css('width', newwidthvalue);
			
			timeOptionsInSettings = false;
		}
	}
	
	//recalculateOptionsDisplay();
	
	//trace("navbarwidth: "+navbarwidth);
	//trace("breadcrumbwidth: "+breadcrumbwidth);
	//trace("navbuttonwidth: "+navbuttonwidth);
	//trace("settingswidth: "+settingswidth);
	//trace("clockwidth: "+clockwidth);
	trace("timetoolswidth: "+timetoolswidth);
	
	trace("timeOptionsInSettings: "+timeOptionsInSettings);	
}

function recalculateOptionsDisplay(){
	var padding = 20;
	var navbarwidth = jQuery("div.navbar.timer-navbar").width();
	var breadcrumbwidth = jQuery(".breadcrumb ul").width();
	var navbuttonwidth = jQuery(".timer-navbutton").width();
	var clockwidth = jQuery(".clock").width();
	//var settingswidth = jQuery(".settings").width();
	var timetoolswidth = 170;	//jQuery('#timetools').width();
	/*
	jQuery('.vmControlContainer').append(jQuery('#timetools'));
	jQuery('.vmControlContainer').append(jQuery('#screenOptions'));
	jQuery('.vmControlContainer').append(jQuery('#vmControlPanel'));
	
	if(jQuery("#timetools").css('display') != 'none')
		jQuery(".settings button#timeOptions").show();
	if(jQuery("#screenOptions").css('display') != 'none')
		jQuery(".settings button#bpOptions").show();
	if(jQuery("#vmControlPanel").css('display') != 'none')
		jQuery(".settings button#vmOptions").show();
	*/
	settingswidth = getSettingsWidth();	//jQuery(".settings").width();
	var newwidthvalue = (settingswidth + settingswidth + clockwidth + padding) + "px";
	//jQuery(".timer-navbutton").css('width', newwidthvalue);
	trace("recalculateOptionsDisplay: "+newwidthvalue);
	
}



function getSettingsWidth(){
	var settingwidth = 0;
	
	jQuery(".settings #timetools, .settings #screenOptions, .settings #vmControlPanel").each(function(){
		if(jQuery(this).css('display') != 'none'){
			settingwidth += jQuery(this).width();
		}
	});
	return settingwidth;
}
function checkOptionsScreenVisible(){
	var hasElementsDisplayed = false;
	
	jQuery("#timetools, #screenOptions, #vmControlPanel").each(function(){
		if(jQuery(this).css('display') != 'none'){
			hasElementsDisplayed = true;
		}
	});
	trace('hasElementsDisplayed: '+hasElementsDisplayed);
	
	if(hasElementsDisplayed){
		jQuery('#page .navbar .navbutton .vmControlContainer').show();
	}else{
		jQuery('#page .navbar .navbutton .vmControlContainer').hide();
	}
}
function hideShowOptions(element,buttonEle){
	//#timetools, #screenOptions, #vmControlPanel
	var hasElementsDisplayed = false;
	var showIt = false;
	
	jQuery(".settings button#vmOptions,.settings button#bpOptions,.settings button#timeOptions").each(function(){

		if(jQuery(this).attr('id') == jQuery(buttonEle).attr('id')){
			trace(jQuery(this).attr('id'));
			if(jQuery(buttonEle).hasClass('open')){
				trace(jQuery(this).attr('id')+ " - hasclass");
				jQuery(buttonEle).removeClass('open');
			}else{
				trace(jQuery(this).attr('id')+ " - does have class");
				jQuery(buttonEle).addClass('open');
			}
		}else{
			jQuery(this).removeClass('open');
			
		}
		
	});
	
	if(jQuery(element).css('display') == 'none')
		showIt = true;
		
	jQuery(".vmControlContainer #timetools").hide();
	jQuery(".vmControlContainer #screenOptions").hide();
	jQuery(".vmControlContainer #vmControlPanel").hide();
	
	if(showIt)
		jQuery(element).show();
	else
		jQuery(element).hide();
	
	jQuery(".vmControlContainer #timetools, .vmControlContainer #screenOptions, .vmControlContainer #vmControlPanel").each(function(){
		if(jQuery(this).css('display') != 'none'){
			hasElementsDisplayed = true;
		}
	});
	
	if(hasElementsDisplayed)
		jQuery('#page .navbar .navbutton .vmControlContainer').show();
	else
		jQuery('#page .navbar .navbutton .vmControlContainer').hide();
}
function setTimeControl(){
	var instanceid = jQuery('#veInsId').html();
	
	if(!timeOverIsSet){
		
		if(instanceid){
			jQuery.ajax({
				type: 'POST',
				url: vLab_moodleURL+'php/vmcontrols.php',
				dataType: 'json',
				async: true,
				data: {
					action: 'getAppointmentTimer',
					instanceId: instanceid
				},
				success: function(data){
				
					if(data){
						if(data.success){
							jQuery("#settings").show();
							if(data.resourceType == "CERTIFICATE"){
								useCertCSS = true;
								
								jQuery("#timetools button.addtime").addClass('certificate-nav');
								jQuery("#timetools button.minustime").addClass('certificate-nav');
								jQuery("#timetools button.cancel").addClass('certificate-nav');
								jQuery("#timetools span.minutesform").addClass('certificate-nav');
								jQuery("#timetools input.minutesform").addClass('certificate-nav');
								
								jQuery("div.navbar div.navbutton").removeClass("timer-navbutton");
								jQuery("div.navbar div.navbutton").addClass("timer-navbutton-cert");
								
								jQuery("#timetools button.addtime").button("option", "disabled", false);
								jQuery("#timetools button.minustime").button("option", "disabled", true);
								jQuery("#timetools button.cancel").button("option", "disabled", true);
								
							}else{
								
								jQuery("#timetools button.addtime").button("option", "disabled", false);
								jQuery("#timetools button.minustime").button("option", "disabled", false);
								jQuery("#timetools button.cancel").button("option", "disabled", false);
							}
							
							var curDate = jQuery.fullCalendar.parseISO8601(data.curDate);
							currentAppointmentEndDate = jQuery.fullCalendar.parseISO8601(data.endDate);
							currentAppointmentId = data.veInsSchId;
							
							//jQuery("#vmcDebug").html("appointment ends: "+currentAppointmentEndDate);
							
							// Set up Countdown
							jQuery('span.timetools-counter').stop();
							
							var timerControl = jQuery('span.timetools-counter').countDown({
								//startNumber: appointmentDate.getTime(),
								startNumber: curDate,
								endNumber: currentAppointmentEndDate,
								returnDate: true,
								callBack: function(me) {
									jQuery("#settings").hide();
									//jQuery(me).text('Your Session is Over.').css('color','#b00');
									jQuery(me).text('00:00:00').css('color','#b00');
									checkAppointmentOver(me);
								}
							});
							
							//jQuery('span.timetools-counter').getNewID();
							timeOverIsSet = true;
							isTimeSet = true;
							
							//Append select to page
							//jQuery("#page .navbar .navbutton").append(tzSelect);
						}else{
							
							isTimeSet = false;
							
							jQuery("#timetools button.addtime").button("option", "disabled", true);
							jQuery("#timetools button.minustime").button("option", "disabled", true);
							jQuery("#timetools button.cancel").button("option", "disabled", true);
						}
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
					var header = "Timer Sync Error";
					var message = "The time may not be in sync with the server.";
					
					popDownErrorNoticeBox("<b>"+header+":</b> "+message);
				}
			});
		}
	}else{
		
		// Set up Countdown
		jQuery('span.timetools-counter').stop();
		var timerControl = jQuery('span.timetools-counter').countDown({
			//startNumber: appointmentDate.getTime(),
			startNumber: new Date(),
			endNumber: currentAppointmentEndDate,
			returnDate: true,
			callBack: function(me) {
				jQuery("#settings").hide();
				//jQuery(me).text('Your Session is Over.').css('color','#b00');
				jQuery(me).text('00:00:00').css('color','#b00');
				checkAppointmentOver(me);
			}
		});
		
	}

}

function checkAppointmentOver(me) {
	var instanceid = jQuery('#veInsId').html();
	
	jQuery.ajax({
		type: 'POST',
		url: vLab_moodleURL+'php/vmcontrols.php',
		dataType: 'json',
		async: true,
		data: {
			action: 'getAppointmentTimer',
			instanceId: instanceid
		},
		success: function(data){
		
			if(data){
				if(data.success){
					jQuery(me).text('calculating...').css('color','#fff');
					timeOverIsSet = false;
					setTimeControl();
					
					//var endDate = data.endDate;
				}else{
					jQuery(me).text('Your Session is Over.').css('color','#b00');
					if(iscerttest){
						window.frames[0].document.getElementById('timeup').value = 1;
						var ourForm = window.frames[0].document.getElementById('responseform');
						ourForm.submit();
					}else{
						setTimeout(function(){ window.location.reload(); },3000);	
					}
					//closeQuizLeftOpen();
					//window.location.reload();
				}
			}
		}
	});
	
}
// JAM: 03/17/2012
function setupScreenOptions(){
	
	jQuery("#screenOptions").html('<span class="minutesform">&nbsp;resolution:&nbsp;</span><select id="resolution"></select>');
	jQuery("#screenOptions").append('<span class="minutesform">&nbsp;&nbsp;color depth:&nbsp;</span><select id="bpp"></select>');
	jQuery("#screenOptions").append('<input id="savedBpp" type="hidden" value="16">');
	jQuery("#screenOptions").append('<input id="savedRes" type="hidden" value="default">');
	
	// Color Depth Options
	jQuery("#bpp").append('<option value="8">8</option>');
	jQuery("#bpp").append('<option value="15">15</option>');
	jQuery("#bpp").append('<option value="16" selected="selected">16</option>');
	
	// Resolution Options
	jQuery("#resolution").append('<option value="default" selected="selected">default</option>');
	jQuery("#resolution").append('<option value="640x480">640x480</option>');
	jQuery("#resolution").append('<option value="800x600">800x600</option>');
	jQuery("#resolution").append('<option value="1024x768">1024x768</option>');
	
	jQuery.ajax({
		type: 'POST',
		url: vLab_moodleURL+'php/vmcontrols.php',
		dataType: 'json',
		async: true,
		data: {
			action: 'getBpp',
			userid: jQuery('#userid').val()
		},
		success: function(data){
			var changed = false;
			if(data){
				jQuery("#bpp option").each(function () {
					var text = jQuery(this).text();
	
					if(text == data.data){
						changed = true;
						jQuery(this).attr("selected","selected");
					}else
						jQuery(this).attr("selected","");
				});
				jQuery("#savedBpp").val(data.data);
			}
		}
	});
	jQuery.ajax({
		type: 'POST',
		url: vLab_moodleURL+'php/vmcontrols.php',
		dataType: 'json',
		async: true,
		data: {
			action: 'getResolution',
			userid: jQuery('#userid').val()
		},
		success: function(data){
			var changed = false;
			if(data){
				jQuery("#resolution option").each(function () {
					var text = jQuery(this).text();
	
					if(text == data.data){
						changed = true;
						jQuery(this).attr("selected","selected");
					}else
						jQuery(this).attr("selected","");
				});
				jQuery("#savedRes").val(data.data);
			}
		}
	});
	
	jQuery("#bpp").change(function(){
		var bpp = jQuery(this).val();
		jQuery.ajax({
			type: 'POST',
			url: vLab_moodleURL+'php/vmcontrols.php',
			dataType: 'text',
			async: true,
			data: {
				action: 'setBpp',
				userid: jQuery('#userid').val(),
				bpp: bpp
			},
			success: function(data){
				var changed = false;
				var oldBpp = jQuery("#savedBpp").val();
				if(data.trim() != "changed"){
					jQuery("#bpp option").each(function () {
						var text = jQuery(this).text();
		
						if(text == oldBpp){
							jQuery(this).attr("selected","selected");
						}else
							jQuery(this).attr("selected","");
					});
				}else{
					refreshScreen();
				}
			}
		});
	});
	
	jQuery("#resolution").change(function(){
		var resolution = jQuery(this).val();
		jQuery.ajax({
			type: 'POST',
			url: vLab_moodleURL+'php/vmcontrols.php',
			dataType: 'text',
			async: true,
			data: {
				action: 'setResolution',
				userid: jQuery('#userid').val(),
				resolution: resolution
			},
			success: function(data){
				var changed = false;
				var oldResolution = jQuery("#savedRes").val();
				if(data.trim() != "changed"){
					jQuery("#resolution option").each(function () {
						var text = jQuery(this).text();
		
						if(text == oldResolution){
							jQuery(this).attr("selected","selected");
						}else
							jQuery(this).attr("selected","");
					});
				}else{
					refreshScreen();
				}
			}
		});
	});
	
	
}
// JAM: 03/17/2012
function refreshScreen(){
	jQuery("#devaTabs a.devaTabs.selected").click();
}

function setupTimeControlButtons(){
/*
	setInterval(function(){
		alert(window.frames.mainscreen.pageIsLoaded);
	}, 10000);
*/

	// Buttons for the Time Tools
	jQuery("#timetools button.addtime").button({
		icons: {
			primary: "ui-icon-plus"
		},
		label: "Add time to your virtual-lab appointment.",
		text: false,
		disabled: true
	}).click(function(){
		//trace("#timetools button.addtime");
		var addmins = parseInt(jQuery("#editapptime").val());
		
		if(addmins){
			if(addmins >= 5){
				modifyAppointment(addmins,true);
			}else{
				noticeDialog("Extend Appointment", "You must enter 5 minutes or more.", "alert");	
			}
		}else{
			noticeDialog("Extend Appointment", "Please enter a valid number.", "alert");		
		}
	});

	jQuery("#timetools button.minustime").button({
		icons: {
			primary: "ui-icon-minus"
		},
		label: "Remove time from your virtual-lab appointment.",
		text: false,
		disabled: true
	}).click(function(){
		trace("#timetools button.minustime");
		var addmins = parseInt(jQuery("#editapptime").val());
		
		if(addmins){
			if(addmins >= 5){
				modifyAppointment(addmins, false);
			}else{
				noticeDialog("Extend Appointment", "You must enter 5 minutes or more.", "alert");	
			}
		}else{
			noticeDialog("Extend Appointment", "Please enter a valid number.", "alert");		
		}
	});

	jQuery("#timetools button.cancel").button({
		icons: {
			primary: "ui-icon-eject"
		},
		label: "Cancel the remaining virtual-lab appointment.",
		text: false,
		disabled: true
	}).click(function(){
		trace("#timetools button.cancel");
		cancelAppointment();
	
	});

	jQuery("#timetools").removeClass("ui-widget-header");
	jQuery("#timetools").removeClass("ui-corner-all");
	
	jQuery("div.navbar").addClass("timer-navbar");
	jQuery("div.navbar div.breadcrumb").addClass("timer-breadcrumb");
	jQuery("div.navbar div.navbutton").addClass("timer-navbutton");
	jQuery("div.navbar div.navbutton").addClass("navbar");
	
    //jQuery("div.timer-navbutton").hide();

}

function setupVMControlButtons(instanceId, vmname){
	var state = getRdpTabInfo('state', currentTabSelected);
/*
	
	jQuery("#vmControls li.powerOff").click(function(){
		vmInstanceCmd('powerOff');
	});
	jQuery("#vmControls li.shutdown").click(function(){
		vmInstanceCmd('shutdown');
	});
	jQuery("#vmControls li.pause").click(function(){
		vmInstanceCmd('suspend');
	});
	jQuery("#vmControls li.powerOn").click(function(){
		vmInstanceCmd('powerOn');
	});
	jQuery("#vmControls li.restart").click(function(){
		vmInstanceCmd('restart');
	});
	
	*/


	jQuery("#toolbar button.powerOff").button({
		icons: {
			primary: "ui-icon-power"
		},
		label: "Power Off",
		text: false,
		disabled: true
	}).click(function(){
		trace("#toolbar button.powerOff");
		//jQuery("#vmcDebug").html('wait');
	//	clearRDPScreen();
		popDownInfoNoticeBox("<b>Instance Command:</b><br/> Power Off");
		markCurrentInstanceState('disabled');
		
		var bvObj = new vmcObj();
		setTimeout(function(){ buttonBundleClick('powerOff', instanceId, vmname, bvObj); },3000);
		
		//setTimeout("buttonBundleClick('powerOff', '"+instanceId+"', '"+vmname+"');",3000);
		//vmInstanceCmd('powerOff', instanceId, vmname);
		//vmInstanceCmd('getState', instanceId, vmname);
		//if(getInstanceState(instanceId, vmname) == "off"){
		
		//alert("off");
		//showCmdMessages('powerOff');
	});

	jQuery("#toolbar button.shutdown").button({
		icons: {
			primary: "ui-icon-stop"
		},
		text: false,
		label: "Shutdown",
		disabled: true
	}).click(function(){
		trace("#toolbar button.shutdown");
	//	clearRDPScreen();
		popDownInfoNoticeBox("<b>Instance Command:</b><br/> Shutdown");
		markCurrentInstanceState('disabled');
		
		var bvObj = new vmcObj();
		setTimeout(function(){ buttonBundleClick('shutdown', instanceId, vmname, bvObj); },3000);
		
		//setTimeout("buttonBundleClick('shutdown', '"+instanceId+"', '"+vmname+"')",3000);
		//vmInstanceCmd('shutdown', instanceId, vmname);
		//vmInstanceCmd('getState', instanceId, vmname);
		//showCmdMessages('shutdown');
	});
	
	jQuery("#toolbar button.pause").button({
		icons: {
			primary: "ui-icon-pause"
		},
		label: "Pause",
		text: false,
		disabled: true
	}).click(function(){
		trace("#toolbar button.pause");
	//	clearRDPScreen();
		popDownInfoNoticeBox("<b>Instance Command:</b><br/> Suspend");
		markCurrentInstanceState('disabled');
		
		var bvObj = new vmcObj();
		setTimeout(function(){ buttonBundleClick('suspend', instanceId, vmname, bvObj); },3000);
		
		//setTimeout("buttonBundleClick('suspend', '"+instanceId+"', '"+vmname+"')",3000);
		//vmInstanceCmd('suspend', instanceId, vmname);
		//vmInstanceCmd('getState', instanceId, vmname);
		//showCmdMessages('suspend');
	});
	
	jQuery("#toolbar button.powerOn").button({
		icons: {
			primary: "ui-icon-play"
		},
		label: "Power On",
		text: false,
		disabled: true
	}).click(function(){
		trace("#toolbar button.powerOn");
	//	clearRDPScreen();
		popDownInfoNoticeBox("<b>Instance Command:</b><br/> Power On");
		markCurrentInstanceState('disabled');
		
		var bvObj = new vmcObj();
		setTimeout(function(){ buttonStartClick('powerOn', instanceId, vmname, bvObj); },3000);
		
		//setTimeout("buttonStartClick('powerOn', '"+instanceId+"', '"+vmname+"')",3000);
		//vmInstanceCmd('powerOn', instanceId, vmname);
		////vmInstanceCmd('getState', instanceId, vmname);
		
	});
	
	jQuery("#toolbar button.restart").button({
		icons: {
			primary: "ui-icon-refresh"
		},
		label: "Restart",
		text: false,
		disabled: true
	}).click(function(){
		trace("#toolbar button.restart");
	//	clearRDPScreen();
		popDownInfoNoticeBox("<b>Instance Command:</b><br/> Restart");
		markCurrentInstanceState('disabled');
		
		var bvObj = new vmcObj();
		setTimeout(function(){ buttonStartClick('restart', instanceId, vmname, bvObj); },3000);
		
		//setTimeout("buttonStartClick('restart', '"+instanceId+"', '"+vmname+"')",3000);
		//vmInstanceCmd('restart', instanceId, vmname);
		////vmInstanceCmd('getState', instanceId, vmname);
		
	});
	
	jQuery("#toolbar button.refresh").button({
		icons: {
			primary: "ui-icon-trash"
		},
		label: "Refresh",
		text: true,
		disabled: true
	}).click(function(){
		trace("#toolbar button.refresh");
		//clearRDPScreen();
		//setTimeout("confirmRefresh('"+instanceId+"', '"+vmname+"')",5000);
		//vmInstanceCmd('refresh');
		//vmInstanceCmd('getState');
		var bvObj = new vmcObj();
		confirmRefresh(instanceId, vmname, bvObj);
	});

	//markCurrentInstanceState("off");
	//markCurrentInstanceState("suspended");
	//markCurrentInstanceState("on");
	//markCurrentInstanceState("error");
	
	jQuery("#toolbar").removeClass("ui-widget-header");
	jQuery("#toolbar").removeClass("ui-corner-all");
	
	if(jQuery("div.navbar div.navbutton").hasClass("timer-navbutton-cert")){
		jQuery("div.navbar div.navbutton").addClass("timer-navbutton");
		jQuery("div.navbar div.navbutton").removeClass("timer-navbutton-cert");	
	}
	
	if(state)
		markCurrentInstanceState(state, 'setupVMControlButtons');
}

function clearRDPScreen(){
	
	var message = "please wait... ";
	
	jQuery("#mainscreenid").attr('src',cert_baseURI+'webRDPMessage.php?tab='+currentTabSelected+'&message='+message);

}

function buttonBundleClick(command, instanceId, vmname, obj){
	//var vbobj = new vmcObj();
	obj.vmInstanceCmd(command, instanceId, vmname);
	//parseStatefromCommand(command, currentTabSelected);
	
	//clearInterval(stateInterval);
	//checkRDPMachineStatus(true);
	
	//showCmdMessages(command);
}

function buttonStartClick(command, instanceId, vmname, obj){
	//var vsobj = new vmcObj();
	obj.vmInstanceCmd(command, instanceId, vmname);
	//parseStatefromCommand(command, currentTabSelected);
	
	//clearInterval(stateInterval);
	//checkRDPMachineStatus(true);
}
/*
function startSpinner(){
	var message = "please wait... ";
	
	//if(showSpinner){
		jQuery.loading(true,{ delay: 5000, align: 'top-center', img: 'css/images/loading.gif', text: message });
		//jQuery.loading(false);
		isSpinning = true;
		jQuery("#vmcDebug").html('isSpinning:'+isSpinning);
	//}

}
function stopSpinner(){

	if(isSpinning){
		jQuery.loading(false);
		isSpinning = false;
	}
	//jQuery("#vmcDebug").html('isSpinning:'+isSpinning);

}
*/
function getTimeControlHTML(){
	
	var html = '<span id="timetools" class="ui-widget-header ui-corner-all">' +
				'<span class="minutesform">minutes:</span> <input type="text" name="editapptime" id="editapptime" value="5" maxlength="2" class="minutesform ui-corner-all" />' +
				'<button class="addtime">Add</button>' +
				'<button class="minustime">Minus</button>' +
				'<button class="cancel">Cancel</button>' +
				'</span>';
	//if(iscerttest)
	//	html = '<span id="timetools" class="ui-widget-header ui-corner-all"></span>';
				
	return html;
}
function getTimeClockHTML(){
	
	var html = '<span class="timetools-counter"></span>';
	return html;
}

function getVMControlHTML(){

	var html = '<span id="toolbar" class="ui-widget-header ui-corner-all">' +
				'<button class="powerOff">Power Off</button>' +
				'<button class="powerOn">Power On</button>' +
				'<button class="shutdown">Shutdown</button>' +
				'<button class="restart">Reset</button>' +
				'<button class="pause">Suspend</button>' +
				'<button class="refresh">Refresh</button>' +
				'</span>';
	
	return html;
}


	//http://jquery-ui.googlecode.com/svn/tags/1.6rc5/tests/static/icons.html

function startStatusInterval(){

	//alert(currentTabSelected);
	checkRDPMachineStatus(true);

}


/*

function checkRDPStatus(instanceId, vmname, hostName, hostPort, init, repeat){

	
	var state = getInstanceState(instanceId, vmname);
	
	if(repeat){
		if(state == 'on'){
			clearInterval(stateInterval);
			isRDPReady(instanceId, vmname, hostName, hostPort, init);
		}else{
			if(init){
				stateInterval = setInterval("checkRDPStatus('"+instanceId+"','"+vmname+"','"+hostName+"','"+hostPort+"',false,true)",10000);	
			}
		}
	}else{
		if(state == 'on'){
			isRDPReady(instanceId, vmname, hostName, hostPort, init);
			//alert('here');
		}else{
			//alert("showCmdMessages(command): "+state);	
			markCurrentInstanceState(state);
			
			showCmdMessages(state);
			//vmInstanceCmd(command, instanceId, vmName);
		}
	}
	
}
*/
/*
DEFAULTS
-----------------------------------------
tabId:		'tab'+i, 
ready:		false,
showing:	false, 
state:		null,
veInsId:	vms.vmInfo[0].veInsId,
veInsAddr:	vms.vmInfo[0].accessAddress,
veInsPort:	vms.vmInfo[i].accessPort,
veInsURL:	linkURL

*/

function setRdpTabInfo(pair, tabId, value){
	//if(pair == 'state')
	//	alert(tabId + " = " +value);
	//if(pair == 'state')
		//jQuery("#vmcDebug2").html('setRdpTabInfo: '+tabId + ' value: '+value);
	for(var i = 0; i < rdpTabInfo.length; i++){
		if(rdpTabInfo[i].tabId == tabId)
			rdpTabInfo[i][pair] = value;
	}
}
function getRdpTabInfo(pair, tabId){
	//jQuery("#vmcDebug").html('getRdpTabInfo: '+tabId);
	var value;
	for(var i = 0; i < rdpTabInfo.length; i++){
		if(rdpTabInfo[i].tabId == tabId)
			value = rdpTabInfo[i][pair];
	}
	return value;
}

/*
function isRDPReady(instanceId, vmname, hostName, hostPort, init) {
 	var debug = "";
 
	jQuery.ajax({
		type: 'POST',
		url: 'php/vmcontrols.php',
		dataType: 'json',
		async: false,
		data: {
			action: 'isRDPReady',
			hostName: hostName,
			hostPort: hostPort
		},
		success: function(data) {
			if(data.success){
				if(data.ready){
					debug = "debug 1";
					rdpIsReady = true;
					if(!init){
						clearInterval(rdpInterval);
					}
					
					//var url = jQuery("#"+currentTabSelected).attr('href');
					var url = jQuery("#veInsURL-"+currentTabSelected).html();
						
					jQuery("#mainscreenid").attr('src',url.replace(/&amp;/g,"&"));
					tabAlreadyLoaded = true;
					
					markCurrentInstanceState('on');
					
				}else{
					debug = "debug 2";
					// Shows a message while waiting
					var message = "This virtual machine is not ready!<br/> Please be patient while the RDP server loads.";
					markCurrentInstanceState('disabled');

					jQuery("#mainscreenid").attr('src','webRDPMessage.php?tab='+currentTabSelected+'&message='+message);
					
					rdpIsReady = false;
					if(init){
						rdpInterval = setInterval("isRDPReady('"+instanceId+"','"+vmname+"','"+hostName+"','"+hostPort+"',false)",10000);
					}
					
				}
			}else{
				debug = "debug 3";
				noticeDialog("RDP Validation", data.reason, "alert");	
				clearInterval(rdpInterval);
				
				wasRDPMachineReady = false;
			}
			
			wasRDPMachineReady = rdpIsReady;
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			var vobj = new vmcObj();
			vobj.vmInstanceCmd('getState',instanceId, vmname);
			var header = "Instance Command Error: isRDPReady";
			var message = "Command could not be completed.";
			var icon = "alert";
			//noticeDialog(header, message, icon);
			popDownErrorNoticeBox("<b>"+header+"</b><br/> "+message);
			
			wasRDPMachineReady = false;
		}

	});
	
	//popDownErrorNoticeBox(debug);

}

*/


function parseStatefromCommand(command, workingTab){
	if(command == 'powerOff' || command == 'shutdown'){
		setRdpTabInfo('state', workingTab, 'off', 'parseStatefromCommand');
	}else if(command == 'suspend'){
		setRdpTabInfo('state', workingTab, 'suspended', 'parseStatefromCommand');
	}else if(command == 'powerOn'){
		setRdpTabInfo('state', workingTab, 'on', 'parseStatefromCommand');
	}else{
		// if 'restart' or 'refresh'	
		setRdpTabInfo('state', workingTab, null, 'parseStatefromCommand');
	}
}
	



/*
//getter
var disabled = jQuery( ".selector" ).button( "option", "disabled" );
//setter
jQuery( ".selector" ).button( "option", "disabled", true );
*/
function markCurrentInstanceState(state,debug){
	//alert('markCurrentInstanceState:'+state);
	
	//jQuery("#vmcDebug").html('markCurrentInstanceState: '+state+"<br/>Function: "+debug);
	
	if(state == "disabled"){
	
		jQuery("#toolbar button.powerOff").button("option", "disabled", true);
		jQuery("#toolbar button.powerOn").button("option", "disabled", true);
		jQuery("#toolbar button.pause").button("option", "disabled", true);
		jQuery("#toolbar button.shutdown").button("option", "disabled", true);
		jQuery("#toolbar button.restart").button("option", "disabled", true);
		jQuery("#toolbar button.refresh").button("option", "disabled", true);
	
	}else if(state == "off"){
	
		jQuery("#toolbar button.powerOff").button("option", "disabled", true);
		jQuery("#toolbar button.powerOn").button("option", "disabled", false);
		jQuery("#toolbar button.pause").button("option", "disabled", true);
		jQuery("#toolbar button.shutdown").button("option", "disabled", true);
		jQuery("#toolbar button.restart").button("option", "disabled", true);
		jQuery("#toolbar button.refresh").button("option", "disabled", false);
		
	}else if(state == "suspended"){
	
		jQuery("#toolbar button.powerOff").button("option", "disabled", true);
		jQuery("#toolbar button.powerOn").button("option", "disabled", false);
		jQuery("#toolbar button.pause").button("option", "disabled", true);
		jQuery("#toolbar button.shutdown").button("option", "disabled", true);
		jQuery("#toolbar button.restart").button("option", "disabled", true);
		jQuery("#toolbar button.refresh").button("option", "disabled", false);
	
	}else if(state == "on"){
		
		jQuery("#toolbar button.powerOff").button("option", "disabled", false);
		jQuery("#toolbar button.powerOn").button("option", "disabled", true);
		jQuery("#toolbar button.pause").button("option", "disabled", false);
		jQuery("#toolbar button.shutdown").button("option", "disabled", false);
		jQuery("#toolbar button.restart").button("option", "disabled", false);
		jQuery("#toolbar button.refresh").button("option", "disabled", false);
	
	}else{
	
		jQuery("#toolbar button.powerOff").button("option", "disabled", true);
		jQuery("#toolbar button.powerOn").button("option", "disabled", false);
		jQuery("#toolbar button.pause").button("option", "disabled", true);
		jQuery("#toolbar button.shutdown").button("option", "disabled", true);
		jQuery("#toolbar button.restart").button("option", "disabled", true);
		jQuery("#toolbar button.refresh").button("option", "disabled", false);
		
	}
	
	
}

function showCmdMessages(command){
	//alert('showCmdMessages:'+command);
	if(command == "powerOn"){
		var message = "This virtual machine is turning on! This process may take from 5 seconds up to 2 minutes. So, please be patient! If you see a Terminal Server Connection Error message, you should wait for 10 seconds and try again by clicking on the tab for this virtual machine.";
		
		//jQuery("#mainscreenid").contents().find("body").html("<center><p style='padding:120px 20px 20px 20px; width:50%;'>"+message+"<p></center>");
		jQuery("#mainscreenid").attr('src',cert_baseURI+'webRDPMessage.php?tab='+currentTabSelected+'&message='+message);
		
	}else if(command == "powerOff"){
		
		var message = "This virtual machine has been turned off! If you want to turn it on, you would need to click the Power On button.";
		jQuery("#mainscreenid").attr('src',cert_baseURI+'webRDPMessage.php?tab='+currentTabSelected+'&message='+message);
		
	}else if(command == "shutdown"){
		var message = "This virtual machine has been shutdown! If you want to turn it on, you would need to click the Power On button.";
		jQuery("#mainscreenid").attr('src',cert_baseURI+'webRDPMessage.php?tab='+currentTabSelected+'&message='+message);
		
	}else if(command == "suspend"){
		var message = "This virtual machine has been suspended/paused! If you want to turn it on, you would need to click the Power On button.";
		jQuery("#mainscreenid").attr('src',cert_baseURI+'webRDPMessage.php?tab='+currentTabSelected+'&message='+message);
		
	}else if(command == "restart"){
		var message = "This virtual machine is being restarted! This process may take from 20 seconds up to 2 minutes. So, please be patient! If you see a Terminal Server Connection Error message, you should wait for 10 seconds and try again by clicking on the tab for this virtual machine.";
		jQuery("#mainscreenid").attr('src',cert_baseURI+'webRDPMessage.php?tab='+currentTabSelected+'&message='+message);
		
	}else if(command == "refresh"){
		markCurrentInstanceState('disabled');
		var message = "This virtual machine is being refreshed! This process may take from 20 seconds up to 2 minutes. So, please be patient! If you see a Terminal Server Connection Error message, you should wait for 10 seconds and try again by clicking on the tab for this virtual machine.";
		jQuery("#mainscreenid").attr('src',cert_baseURI+'webRDPMessage.php?tab='+currentTabSelected+'&message='+message);
		
	}else if(command == "off"){
		var message = "This virtual machine has been turned off! If you want to turn it on, you would need to click the Power On button.";
		jQuery("#mainscreenid").attr('src',cert_baseURI+'webRDPMessage.php?tab='+currentTabSelected+'&message='+message);
		
	}else if(command == "suspended"){
		var message = "This virtual machine has been suspended/paused! If you want to turn it on, you would need to click the Power On button.";

		jQuery("#mainscreenid").attr('src',cert_baseURI+'webRDPMessage.php?tab='+currentTabSelected+'&message='+message);
		
	}else if(command == "on"){
		var message = "This virtual machine is getting ready! This process may take from 5 seconds up to 2 minutes. So, please be patient! If you see a Terminal Server Connection Error message, you should wait for 10 seconds and try again, by clicking on the tab for this virtual machine.";
		noticeDialog("Virtual Machine Notification", message, "alert");
	}

}


function popDownInfoNoticeBox(message,time){
	
	jQuery("#infoMessage span.buttonPanel").html('');
	jQuery("#infoMessage").removeClass("confirmMessageBox");
	jQuery("#infoMessage").addClass("infoMessageBox");	
	
	if(!time) time = 10000;

	jQuery("#infoText").html(message);
	jQuery("#infoMessage").slideDown('slow', function() {
		jQuery(this).click(function(){
			trace("#infoMessage");
			jQuery("#infoMessage").slideUp();
		});
		setTimeout('jQuery("#infoMessage").slideUp();',10000);
	});
}
function popDownErrorNoticeBox(message,time){
	if(!time) time = 10000;

	jQuery("#errorText").html(message);
	jQuery("#errorMessage").slideDown('slow', function() {
		jQuery(this).click(function(){
			trace("#errorMessage");
			jQuery("#errorMessage").slideUp();
		});
		setTimeout('jQuery("#errorMessage").slideUp();',10000);
	});
}

function callDynamicFunction(){
	buttonFunc(); 
}

function popDownButtonNoticeBox(header, message, callFunc){	
	
	var buttons = "<button class='okButton'>Ok</button><button class='cancelButton'>Cancel</button>";
	buttonFunc = function() {
		//alert('test');
		callFunc();
	};
	
	jQuery("#infoMessage span.buttonPanel").html(buttons);
	
	jQuery("#infoMessage").removeClass("infoMessageBox");
	jQuery("#infoMessage").addClass("confirmMessageBox");
	
	jQuery("#infoMessage button").button();
	jQuery("button.okButton").click(function() { 
		trace("button.okButton");
		clearRDPScreen();
		jQuery("#infoMessage").slideUp();
		markCurrentInstanceState('disabled');
		setTimeout("callDynamicFunction()",5000);
		
		//okFunc(); 
	});	
	jQuery("button.cancelButton").click(function() {
		trace("button.cancelButton");
		jQuery("#infoMessage").slideUp();
	});	
	
	jQuery("#infoText").html("<b>"+header+"</b><br/> "+message);
	jQuery("#infoMessage").slideDown('slow');

}

function noticeDialog(header, message, icon, returnObj, reloadWindow){
	
	var noticeContent = jQuery("<div id='calendar-notice' />").html('<p><span class="ui-icon ui-icon-'+icon+'" style="float:left; margin:0 7px 20px 0;"></span>'+message+'</p>');
	
	jQuery(noticeContent).dialog({
		modal: true,
		title: header,
		close: function() {
		   jQuery(noticeContent).dialog("destroy");
		   jQuery(noticeContent).hide();
		},
		buttons: {
			Ok: function() {
				jQuery(this).dialog('close');
				if(reloadWindow){
					window.location.reload();	
				}
			}
		}
	});
	
	jQuery(noticeContent).dialog('open');
	
	if(returnObj){
		return noticeContent;
	}
}


function confirmRefresh(instanceId, vmname, obj){

	var header = "Refresh Virtual Machine";
	var message = "All your work on this virtual machine will be lost.<br/>Do you want to continue?";
	
	popDownButtonNoticeBox(header, message, function(){ buttonStartClick('refresh', instanceId, vmname, obj); });

/*
	var refreshNoticeContent = jQuery("<div id='new-confirm' />").html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>WARNING! <br/>All your work on this virtual machine will be lost.<br/><br/> Do you want to continue?</p>');
	var success = false;
				
	jQuery(refreshNoticeContent).dialog({
		autoOpen: false,
		resizable: false,
		width: 350,
		title: "Refresh Virtual Machine",
		modal: true,
		close: function() {
		   jQuery(refreshNoticeContent).dialog("destroy");
		   jQuery(refreshNoticeContent).hide();
		},
		buttons: {
			Ok: function() {
				jQuery(this).dialog('close');
				//vmInstanceCmd('refresh', instanceId, vmname);
				//vmInstanceCmd('getState', instanceId, vmname);
				buttonStartClick('refresh', instanceId, vmname);
			},
			Cancel: function() {
				jQuery(this).dialog('close');
			}
		}
	});
	
	jQuery(refreshNoticeContent).dialog('open');
*/
}

function cancelAppointment(){

	var success = false;

	jQuery.ajax({
		type: 'POST',
		url: vLab_moodleURL+'../scheduler/fullcalendar/calendar.php',
		dataType: 'xml',
		async: false,
		timeout: 4000,
		data: {
			action: 'cancelAppointment',
			requestingUser:  jQuery('#username').val(),
			username: jQuery('#username').val(),
			id: currentAppointmentId,
			requestType: "User"
		},
		success: function(data){
			
			var successText, reason, successInt;
			
			jQuery(data).find('reason').each(function() {
				reason = jQuery(this).text();					  
			});
			jQuery(data).find('success').each(function() {
				successText = jQuery(this).text();								  
			});
			
			successInt = parseInt(successText);
			
			if(successInt > 0){
				success = true;
				
			}else{
				success = false;
				
			}
			
			popDownInfoNoticeBox("<b>Delete Appointment:</b> "+reason);
			//noticeDialog("Delete Appointment", reason, "alert", false, true);
			//window.location.reload();
			
			window.location = jQuery("#courseURL").val();
			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			var header = "Delete Appointment";
			var message = "We were unable to remove this appointment.<br/> **please try again later.";
			var icon = "alert";
			message = textStatus + " : " +errorThrown;
			//noticeDialog(header, message, icon);
			popDownErrorNoticeBox("<b>"+header+":</b> "+message);
		}
	});
	
	return success;

}


function modifyAppointment(mins,addmins){
	
	var dateformatter = "yyyy-mm-dd'T'HH:MM:ss";
	var success = false;
	var changedDate = new Date (currentAppointmentEndDate);

	if(addmins){
		changedDate.setMinutes(currentAppointmentEndDate.getMinutes() + mins);
	}else{
		changedDate.setMinutes(currentAppointmentEndDate.getMinutes() - mins);
	}
	
	jQuery.ajax({
		type: 'POST',
		url: vLab_moodleURL+'../scheduler/fullcalendar/calendar.php',
		dataType: 'xml',
		async: true,
		//timeout: 4000,
		data: {
			action: 'modifyAppointment',
			requestingUser:  jQuery('#username').val(),
			username: jQuery('#username').val(),
			id: currentAppointmentId,
			start: '',
			end: changedDate.format(dateformatter),
			requestType: "User"
		},
		success: function(data){
			
			var successText, reason, successInt;
			
			jQuery(data).find('reason').each(function() {
				reason = jQuery(this).text();					  
			});
			jQuery(data).find('success').each(function() {
				successText = jQuery(this).text();								  
			});
			
			successInt = parseInt(successText);
			if(successInt > 0){
				success = true;
				timeOverIsSet = false;	// flag: tell the timer control to cget time left over for WS
				setTimeControl();
				
			}else{
				success = false;
				
			}
			
			popDownInfoNoticeBox("<b>Change Appointment:</b> "+reason);
			//noticeDialog("Confirm Appointment", reason, "alert");
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			var header = "Modify Appointment";
			var message = "We were unable to modify this appointment for you.<br/><br/> **please try again later.";
			var icon = "alert";
			message = textStatus + " : " +errorThrown;
			//noticeDialog(header, message, icon);
			popDownErrorNoticeBox("<b>"+header+":</b> "+message);
			
		}
	});
	
	return success;

}

function getUserCurApp(){

	var success = false;

	jQuery.ajax({
		type: 'POST',
		url: vLab_moodleURL+'php/vmcontrols.php',
		dataType: 'json',
		async: false,
		data: {
			action: 'getUserCurAppId',
			requestingUser:  jQuery('#username').val(),
			username: jQuery('#username').val(),
			course: jQuery('#course').val(),
			resourceType: jQuery('#resourcetype').val()
		},
		success: function(data){
			
			if(data.success){
				success = data.success;
			}
			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			var header = "Delete Appointment";
			var message = "We were unable to remove this appointment.<br/> **please try again later.";
			var icon = "alert";
			message = textStatus + " : " +errorThrown;
			//noticeDialog(header, message, icon);
			popDownErrorNoticeBox("<b>"+header+":</b> "+message);
		}
	});
	
	return success;

}
	
function trace(message){
	if(!jQuery.browser.msie){
		//console.log(message);
	}
}
