var is_admin_user = false;
var is_mentor_user = false;

//Numeric only control handler
jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        jQuery(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            return (
                key == 8 || 
                key == 9 ||
                key == 46 ||
                (key >= 37 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        })
    })
};

function progressDialogBox(loading){
    
	//console.log('XprogressDialogBox: loading = '+loading);
  	var progressContainer = jQuery("#progressbarContainer");
	var progressbar = jQuery("#progressbar");
	
	if(loading){
		
		// sms: updated on 6/2/2011
		// jQuery('#progess-overlay').addClass("ui-widget-overlay");		
	
		jQuery("#progressbarContainer").show();
		jQuery("#progressbar").progressbar({value: 100});
		
		jQuery("#progressbarContainer").each(function(){
			var container = jQuery(window);
			var t = jQuery(container).height();
			var l = jQuery(container).width();
			
			var scrollTop = jQuery(window).scrollTop();
			var scrollLeft = jQuery(window).scrollLeft();
	
			
			var top = -50 + scrollTop;
			var left = -125 + scrollLeft;
			
			jQuery(this).css('position', 'absolute').css({ 'margin-left': left + 'px', 'margin-top': top + 'px', 'left': '50%', 'top': '50%','z-index': '2000', 'width':'300px' });
			
			jQuery(window).scroll(function () { 
				if(jQuery("#progressbarContainer")){
					var scrollTop = jQuery(window).scrollTop();
					var scrollLeft = jQuery(window).scrollLeft();
					var top = -50 + scrollTop;
					var left = -125 + scrollLeft;
					jQuery("#progressbarContainer").css('position', 'absolute').css({ 'margin-left': left + 'px', 'margin-top': top + 'px', 'left': '50%', 'top': '50%' });
					//alert('scrollTop: '+scrollTop+' scrollLeft: '+scrollLeft);
				}
			});

			
		});
		
		
	}else{
		
		// sms: updated on 6/2/2011
		// jQuery('#progess-overlay').removeClass("ui-widget-overlay");
		jQuery(progressContainer).hide();
		jQuery(progressbar).progressbar( "destroy" );
		
	}
}

function createInstantAppointmentDialogBox(username, course, type) {
	  
	jQuery("#dialog").html("");
	var dialogContent = jQuery("#dialog").load('forms/instant-appointment-form.html', function() {
		jQuery("#dialog #hours").ForceNumericOnly();
		jQuery("#dialog #minutes").ForceNumericOnly();
		// timepicker({  timeSeparator: ' hours and ' }); 
	
	});
	    
	jQuery("#dialog").dialog({ 
		// autoOpen: false,
		width: 600,
		modal: true,
		title: "On-Demand Appointment",
		close: function() {
			jQuery(this).dialog("close");
		},
		buttons: { 
			"Confirm": function() { 
				progressDialogBox(true);
				
				setTimeout(function(){	// Added: to allow the progress bar to appear.
					
					var newevent = getCreateNewEventObjFromInstantAppForm(username, course, type);
					if (scheduleAppointment(newevent, username)) {
						// sms: updated on 6/2/2011
						// var devaWasDisplayed = false;
						// for (var i=0; i<5; i++) {
							// devaWasDisplayed = getCurDevaInsInfo();
							// if (devaWasDisplayed) {
								// progressDialogBox(false);
								// var message = "Your virutal environment is almost ready! " +
								// 		"If after trying to connect to any of your virtual machines, " +
								// 		"you receive a message  box with the title 'Terminal Server " +
								// 		"Connection Error' you should wait for 20 seconds and try again! " +
								// 		"Thank you for your patience! ";
										
								// noticeDialog("On-Demand Appointment", message, "alert");
								// break;
							// }
						// }
						// progressDialogBox(false);
						// if (!devaWasDisplayed) { 
						// 	var message = "Your virutal environment was successfully scheduled, " +
						// 			"but cannot yet be displayed. Please wait for a couple " +
						// 			"of minutes, refresh the page, and try again.";
						// 	noticeDialog("On-Demand Appointment", message, "alert");
						// }
					} else {
						alert("Your requested appointment could not be scheduled!");
					}
					// sms: updated on 6/2/2011
					// progressDialogBox(false);
					jQuery("#dialog").dialog("close"); 
					//jQuery(this).dialog("close"); 
					
				}, 2000);	// wait 2 seconds

				// sms: updated 6/4/2011 added the below line
				interval = setInterval('getCurDevaInsInfo()', 10000);
			}, 
			"Cancel": function() { 
				//history.go(-1);
				window.location = jQuery("#courseURL").val();
				jQuery(this).dialog("close"); 
			} 
		} 
	});
	
	jQuery("#dialog").dialog("open");
}

// sms: 6/28/2014 Added to support embedded version
function createInstantAppointmentEmbedded(username, course, type, hours, minutes) {
			                
	progressDialogBox(true);
				
	setTimeout(function(){	// Added: to allow the progress bar to appear.
					
		var newevent = getCreateNewEventObjFromInstantAppEmbedded(username, course, type, hours, minutes);
		if (scheduleAppointment(newevent, username)) {
			// sms: updated on 6/2/2011
			// var devaWasDisplayed = false;
			// for (var i=0; i<5; i++) {
				// devaWasDisplayed = getCurDevaInsInfo();
				// if (devaWasDisplayed) {
					// progressDialogBox(false);
					// var message = "Your virutal environment is almost ready! " +
					// 		"If after trying to connect to any of your virtual machines, " +
					// 		"you receive a message  box with the title 'Terminal Server " +
					// 		"Connection Error' you should wait for 20 seconds and try again! " +
					// 		"Thank you for your patience! ";
										
					// noticeDialog("On-Demand Appointment", message, "alert");
					// break;
				// }
			// }
			// progressDialogBox(false);
			// if (!devaWasDisplayed) { 
			// 	var message = "Your virutal environment was successfully scheduled, " +
			// 			"but cannot yet be displayed. Please wait for a couple " +
			// 			"of minutes, refresh the page, and try again.";
			// 	noticeDialog("On-Demand Appointment", message, "alert");
			// }
		} else {
			alert("Your requested appointment could not be scheduled!");
		}
		// sms: updated on 6/2/2011
		// progressDialogBox(false);
		// jQuery("#dialog").dialog("close"); 
		//jQuery(this).dialog("close"); 
					
	}, 2000);	// wait 2 seconds
				
	// sms: updated 6/4/2011 added the below line
	interval = setInterval('getCurDevaInsInfo()', 10000);

}

function createInstantAppointmentDialogBox(username, course, type) {
	  
	jQuery("#dialog").html("");
	var dialogContent = jQuery("#dialog").load('forms/instant-appointment-form.html', function() {
		jQuery("#dialog #hours").ForceNumericOnly();
		jQuery("#dialog #minutes").ForceNumericOnly();
		// timepicker({  timeSeparator: ' hours and ' }); 
	
	});
	    
	jQuery("#dialog").dialog({ 
		// autoOpen: false,
		width: 600,
		modal: true,
		title: "On-Demand Appointment",
		close: function() {
			jQuery(this).dialog("close");
		},
		buttons: { 
			"Confirm": function() { 
				progressDialogBox(true);
				
				setTimeout(function(){	// Added: to allow the progress bar to appear.
					
					var newevent = getCreateNewEventObjFromInstantAppForm(username, course, type);
					if (scheduleAppointment(newevent, username)) {
						// sms: updated on 6/2/2011
						// var devaWasDisplayed = false;
						// for (var i=0; i<5; i++) {
							// devaWasDisplayed = getCurDevaInsInfo();
							// if (devaWasDisplayed) {
								// progressDialogBox(false);
								// var message = "Your virutal environment is almost ready! " +
								// 		"If after trying to connect to any of your virtual machines, " +
								// 		"you receive a message  box with the title 'Terminal Server " +
								// 		"Connection Error' you should wait for 20 seconds and try again! " +
								// 		"Thank you for your patience! ";
										
								// noticeDialog("On-Demand Appointment", message, "alert");
								// break;
							// }
						// }
						// progressDialogBox(false);
						// if (!devaWasDisplayed) { 
						// 	var message = "Your virutal environment was successfully scheduled, " +
						// 			"but cannot yet be displayed. Please wait for a couple " +
						// 			"of minutes, refresh the page, and try again.";
						// 	noticeDialog("On-Demand Appointment", message, "alert");
						// }
					} else {
						alert("Your requested appointment could not be scheduled!");
					}
					// sms: updated on 6/2/2011
					// progressDialogBox(false);
					jQuery("#dialog").dialog("close"); 
					//jQuery(this).dialog("close"); 
					
				}, 2000);	// wait 2 seconds

				// sms: updated 6/4/2011 added the below line
				interval = setInterval('getCurDevaInsInfo()', 10000);
			}, 
			"Cancel": function() { 
				//history.go(-1);
				window.location = jQuery("#courseURL").val();
				jQuery(this).dialog("close"); 
			} 
		} 
	});
	
	jQuery("#dialog").dialog("open");
}

function createDialogBox(username, course, type) {
  
	jQuery("#dialog").html("");
	var dialogContent = jQuery("#dialog").load('forms/appointment-form.html', function() {
		jQuery("#dialog #startDate").datepicker();
		jQuery("#dialog #endDate").datepicker();
		jQuery("#dialog #start").ptTimeSelect(); 
		jQuery("#dialog #end").ptTimeSelect(); 
	
		jQuery("#dialog #startDate").focus(function() {
			jQuery("#ptTimeSelectCntr").hide();
		});
		jQuery("#dialog #start").focus(function() {
			jQuery("#dialog #endDate").datepicker('hide');
			jQuery("#dialog #startDate").datepicker('hide');
		});
		jQuery("#dialog #endDate").focus(function() {
			jQuery("#ptTimeSelectCntr").hide();
		});
		jQuery("#dialog #end").focus(function() {
			jQuery("#dialog #startDate").datepicker('hide');
			jQuery("#dialog #endDate").datepicker('hide');
		});
		
		var is_admin_user = false;
		var customLabel;
		if(is_admin_user){
			customLabel = "Host";
		}else{
			customLabel = "Course";
		}
		
		if (jQuery.browser.msie) {
			document.getElementById("customddm").innerHTML = customLabel;
		} else {
			jQuery("#dialog #customddm").text(customLabel);
		}
		
		var dayformatter = "mm/dd/yyyy";	// mmmm d, yyyy
		var timeformatter = "h:MM TT";		// h:MM:ss TT 
		
		var typeFieldOptions = "";
		var courseFieldOptions = "";
		//var timezoneFieldOptions = "";
		
		
		typeFieldOptions +=  "<option>"+type+"</option>";
		courseFieldOptions +=  "<option>"+course+"</option>";
		
		var now = new Date();
		var startDate = jQuery(this).find("input[name='startDate']");
		var endDate = jQuery(this).find("input[name='endDate']");
		var startField = jQuery(this).find("input[name='start']").val(now.format(timeformatter));
		var endField = jQuery(this).find("input[name='end']").val(now.format(timeformatter));
		var typeField = jQuery(this).find("select[name='type']").html(typeFieldOptions);
		var courseField = jQuery(this).find("select[name='course']").html(courseFieldOptions);
		//var timezoneField = jQuery(this).find("select[name='timezone']").html(timezoneFieldOptions);
		
		var startNow = jQuery(this).find("input[name='startNow']");
		
		startDate.val(now.format(dayformatter));
		endDate.val(now.format(dayformatter));
		var endTime = new Date();
		endTime.setHours(endTime.getHours()+1);
		endField.val(endTime.format(timeformatter));
		// endDate.val(event.end.format(dayformatter));
		
		// typeField.val((event.resourceType).toUpperCase());
		// courseField.val(event.course);
		
		
		jQuery("input[name='startDate']").attr('disabled', 'disabled');
		jQuery("input[name='start']").attr('disabled', 'disabled');
	
		jQuery(startNow).attr('disabled', 'disabled');
		jQuery(startDate).attr('disabled','disabled');
		jQuery(startField).attr('disabled','disabled');
		jQuery(startNow).attr('checked', 'checked');
		startDate.val("");
		startField.val("");
	});
	
	jQuery("#dialog").dialog({ 
		// autoOpen: false,
		width: 340,
		modal: true,
		title: "You are early for your appointment! Do you want to start now?",
		close: function() {
			   jQuery(this).dialog("close");
			},
		buttons: { 
			"confirm new schedule": function() { 
				var startDate = jQuery("#dialog").find("input[name='startDate']");
				var endDate = jQuery("#dialog").find("input[name='endDate']");
				var startField = jQuery("#dialog").find("input[name='start']");
				var endField = jQuery("#dialog").find("input[name='end']");
				var startNow = jQuery("#dialog").find("input[name='startNow']");
				
				if (checkStartEndFields(startDate, startField, endDate, endField, startNow)) {

					var newevent = getCreateNewEventObj();
					// jQuery(this).dialog("close"); 
					if (scheduleAppointment(newevent, username)) {
						// pausecomp(5000);
						// sms: updated on 6/2/2011
						// var devaWasDisplayed = getCurDevaInsInfo(); 
					} else {
						alert("Your requested appointment could not be scheduled!");
					}
					
				} else {
					alert("checkStartEndFields is false!");
				}
				jQuery(this).dialog("close"); 
			}, 
			"cancel schedule": function() { 
				jQuery(this).dialog("close"); 
			} 
		} 
	});
	
	jQuery("#dialog").dialog("open");
}

function pausecomp(millis)
{
	var date = new Date();
	var curDate = null;

	do { curDate = new Date(); }
	while(curDate-date < millis);
} 

function editDialogBox() {
  
	jQuery("#dialog").html("");
	var dialogContent = jQuery("#dialog").load('fullcalendar/edit_event.html', function() {
		
		jQuery("#dialog #startDate").datepicker();
		jQuery("#dialog #endDate").datepicker();
		jQuery("#dialog #start").ptTimeSelect(); 
		jQuery("#dialog #end").ptTimeSelect(); 
	
		jQuery("#dialog #startDate").focus(function() {
			jQuery("#ptTimeSelectCntr").hide();
		});
		jQuery("#dialog #start").focus(function() {
			jQuery("#dialog #endDate").datepicker('hide');
			jQuery("#dialog #startDate").datepicker('hide');
		});
		jQuery("#dialog #endDate").focus(function() {
			jQuery("#ptTimeSelectCntr").hide();
		});
		jQuery("#dialog #end").focus(function() {
			jQuery("#dialog #startDate").datepicker('hide');
			jQuery("#dialog #endDate").datepicker('hide');
		});
		
		var is_admin_user = false;
		var customLabel;
		if(is_admin_user){
			customLabel = "Host";
		}else{
			customLabel = "Course";
		}
		
		if (jQuery.browser.msie) {
			document.getElementById("customddm").innerHTML = customLabel;
		}else{
			jQuery("#dialog #customddm").text(customLabel);
		}
		
		// resetForm(this);
		
		var dayformatter = "mm/dd/yyyy";	// mmmm d, yyyy
		var timeformatter = "h:MM TT";		// h:MM:ss TT 
		
		var typeFieldOptions = "";
		var courseFieldOptions = "";
		//var timezoneFieldOptions = "";
		
		typeFieldOptions +=  "<option>"+"Virtual Lab"+"</option>";
		// Load types in the select box, and select current type
		// for(var i = 0; i<types.length; i++){
		// 	typeFieldOptions +=  "<option>"+types[i]+"</option>";
		// }
		courseFieldOptions +=  "<option>"+"IT Automation 2"+"</option>";
		// for(var i = 0; i<courses.length; i++){
		// 	courseFieldOptions +=  "<option>"+courses[i]+"</option>";
		// }
		
		// for(var i = 0; i<zones.length; i++){
		// 	timezoneFieldOptions += "<option>"+zones[i]+"</option>";
		// }
		
		var now = new Date();
		var startDate = jQuery(this).find("input[name='startDate']");
		var endDate = jQuery(this).find("input[name='endDate']");
		var startField = jQuery(this).find("input[name='start']").val(now.format(timeformatter));
		var endField = jQuery(this).find("input[name='end']").val(now.format(timeformatter));
		var typeField = jQuery(this).find("select[name='type']").html(typeFieldOptions);
		var courseField = jQuery(this).find("select[name='course']").html(courseFieldOptions);
		//var timezoneField = jQuery(this).find("select[name='timezone']").html(timezoneFieldOptions);
		
		var startNow = jQuery(this).find("input[name='startNow']");
		
		startDate.val(now.format(dayformatter));
		// endDate.val(event.end.format(dayformatter));
		
		// typeField.val((event.resourceType).toUpperCase());
		// courseField.val(event.course);
		
		
		jQuery("input[name='startDate']").attr('disabled', 'disabled');
		jQuery("input[name='start']").attr('disabled', 'disabled');
	
		jQuery(startNow).attr('disabled', 'disabled');
		jQuery(startDate).attr('disabled','disabled');
		jQuery(startField).attr('disabled','disabled');
		jQuery(startNow).attr('checked', 'checked');
		startDate.val("");
		startField.val("");
	});
	
	jQuery("#dialog").dialog({ 
		// autoOpen: false,
		width: 340,
		modal: true,
		title: "You are early for your appointment! Do you want to start now?",
		close: function() {
			   jQuery(this).dialog("close");
			},
		buttons: { 
			"confirm new schedule": function() { 
				jQuery(this).dialog("close"); 
				}, 
			"cancel schedule": function() { 
				jQuery(this).dialog("close"); 
				} 
		} 
	});
	
	jQuery("#dialog").dialog();
}


function isValidDate(dateStr) {

	var success = false;
	var datere = /[0-9]{2}\/[0-9]{2}\/[0-9][0-9]{3}/;
	
	var result = dateStr.match(datere);
	var newDate;
	
	if (result != null) {
		newDate = new Date(result[0]);
	}
	
	if (newDate != null && !isNaN(newDate.getTime())) {
		success = true;
	}
	
	return success;
}

function isValidTime(dateStr, timeStr) {
	
	var success = false;
	var datere = /[0-9]{2}\/[0-9]{2}\/[0-9][0-9]{3}/;
	var timere = /[0-9]{1,2}(:[0-9]{2})\s(pm|am)/i;
	
	var result = dateStr.match(datere);
	var time = timeStr.match(timere);
	var newDate = null;
	
	if (result != null) {
		if (time != null) {
			newDate = new Date(result[0] + " " + time[0]);
		}
	}
	
	if (newDate != null && !isNaN(newDate.getTime())) {
		success = true;
	}
	
	return success;
}

function checkStartEndFields(
		startDate, 
		startField, 
		endDate, 
		endField,
		startNow) {

	var validStartDate = false;
	var validStartTime = false;
	var validEndDate = false;
	var validEndTime = false;

	var isChecked = jQuery(startNow).attr('checked');

	startDate.removeClass('error');
	startField.removeClass('error');
	endDate.removeClass('error');
	endField.removeClass('error');

	if (isValidDate(endDate.val())) {
		validEndDate = true;
	} else {
		endDate.addClass('error');
	}

	if (isValidTime(endDate.val(), endField.val())) {
		validEndTime = true;
	} else {
		endField.addClass('error');
	}

	if (!isChecked) {
		if (isValidDate(startDate.val())) {
			validStartDate = true;
		} else {
			startDate.addClass('error');
		}

		if (isValidTime(startDate.val(), startField.val())) {
			validStartTime = true;
		} else {
			startField.addClass('error');
		}
	} else {
		if (validEndDate && validEndTime) {
			startDate.val("");
			startField.val("");
			validStartDate = true;
			validStartTime = true;
		}
	}
	
	return (validStartDate && validStartTime && validEndDate && validEndTime) 
		? true
		: false;
}
	
//Grabs the Event Obj from the create Apointment form
function getCreateNewEventObj(){
	// Retrieve Form Objects
	var startDate = jQuery("#dialog").find("input[name='startDate']");
	var endDate = jQuery("#dialog").find("input[name='endDate']");
	var startField = jQuery("#dialog").find("input[name='start']");
	var endField = jQuery("#dialog").find("input[name='end']");
	var typeField = jQuery("#dialog").find("select[name='type']");
	var courseField = jQuery("#dialog").find("select[name='course']");
	
	var startNow = jQuery("#dialog").find("input[name='startNow']");
	var isChecked = jQuery(startNow).attr('checked');
	
	/// - start now option
	if (isChecked) {
		var start = new Date();
		var end = new Date(endDate.val() + " " + endField.val());
	} else {
		var start = new Date(startDate.val() + " " + startField.val());
		var end = new Date(endDate.val() + " " + endField.val());
	}		
	
	var start = new Date(startDate.val() + " " + startField.val());
	var end = new Date(endDate.val() + " " + endField.val());
	
	// TODO I do not understand what the below code is for??? This is sms.
	if (end.getTime() < start.getTime()) {
		end.setDate(end.getDate()+1);  // changes month automatically
	} else if(start.getTime() == end.getTime()){
		end.setHours(end.getHours()+1);
	}

	var type = typeField.val().replace(/ /g,"-");
	var course = courseField.val();
	var actions = [];  // need to assign real actions
	actions[0] = "edit";
	actions[1] = "cancel";
	
	var eventClass = "div"+type.toLowerCase()+"-"+course.replace(/ /g, "-").toLowerCase()+" scheduled";
	var newevent = {
		resourceType: typeField.val(),
		title : typeField.val(),
		editable: true,
		start : (isChecked) ? "" : start,
		end : end,
		className : eventClass,
		allDay: false,
		course: course,
		type: type.toLowerCase(),
		actions: actions
	};	
	
	return newevent;
}

function fixDate(d, check) { // force d to be on check's YMD, for daylight savings purposes
	if (+d) { // prevent infinite looping on invalid dates
		while (d.getDate() != check.getDate()) {
			d.setTime(+d + (d < check ? 1 : -1) * HOUR_MS);
		}
	}
}

function parseISO8601(s, ignoreTimezone) {
	// derived from http://delete.me.uk/2005/03/iso8601.html
	// TODO: for a know glitch/feature, read tests/issue_206_parseDate_dst.html
	var m = s.match(/^([0-9]{4})(-([0-9]{2})(-([0-9]{2})([T ]([0-9]{2}):([0-9]{2})(:([0-9]{2})(\.([0-9]+))?)?(Z|(([-+])([0-9]{2}):([0-9]{2})))?)?)?)?$/);
	if (!m) {
		return null;
	}
	var date = new Date(m[1], 0, 1),
		check = new Date(m[1], 0, 1, 9, 0),
		offset = 0;
	if (m[3]) {
		date.setMonth(m[3] - 1);
		check.setMonth(m[3] - 1);
	}
	if (m[5]) {
		date.setDate(m[5]);
		check.setDate(m[5]);
	}
	fixDate(date, check);
	if (m[7]) {
		date.setHours(m[7]);
	}
	if (m[8]) {
		date.setMinutes(m[8]);
	}
	if (m[10]) {
		date.setSeconds(m[10]);
	}
	if (m[12]) {
		date.setMilliseconds(Number("0." + m[12]) * 1000);
	}
	fixDate(date, check);
	if (!ignoreTimezone) {
		if (m[14]) {
			offset = Number(m[16]) * 60 + Number(m[17]);
			offset *= m[15] == '-' ? 1 : -1;
		}
		offset -= date.getTimezoneOffset();
	}
	return new Date(+date + (offset * 60 * 1000));
}

//Grabs the Event Obj from the Instant Apointment form
function getCreateNewEventObjFromInstantAppForm(username, course, type){
	// Retrieve Form Objects
	var hours = jQuery("#dialog").find("input[name='hours']");
	var minutes = jQuery("#dialog").find("input[name='minutes']");
	var userCurTime = getUserCurrentTime(username); // new Date();
	var end = parseISO8601(userCurTime, true);
   
    end.setHours(end.getHours()+parseInt(hours.val()));
    end.setMinutes(end.getMinutes()+parseInt(minutes.val()));

    
	var typeModified = type.replace(/ /g,"-");
	var actions = [];  // need to assign real actions
	actions[0] = "edit";
	actions[1] = "cancel";
	
	var eventClass = "div"+typeModified.toLowerCase()+"-"+course.replace(/ /g, "-").toLowerCase()+" scheduled";
	var newevent = {
		resourceType: type,
		title : type,
		editable: true,
		start : "",
		end : end,
		className : eventClass,
		allDay: false,
		course: course,
		type: typeModified.toLowerCase(),
		actions: actions
	};	
	
	return newevent;
}

// sms: 6/28/2014 Added to support embedded version
//Grabs the Event Obj assuming 30 minutes initial appointment
function getCreateNewEventObjFromInstantAppEmbedded(username, course, type, hours, minutes){
			
	var userCurTime = getUserCurrentTime(username); // new Date();
	var end = parseISO8601(userCurTime, true);
   
	end.setHours(end.getHours()+parseInt(hours));
    end.setMinutes(end.getMinutes()+parseInt(minutes));

	var typeModified = type.replace(/ /g,"-");
	var actions = [];  // need to assign real actions
	actions[0] = "edit";
	actions[1] = "cancel";
	
	var eventClass = "div"+typeModified.toLowerCase()+"-"+course.replace(/ /g, "-").toLowerCase()+" scheduled";
	var newevent = {
		resourceType: type,
		title : type,
		editable: true,
		start : "",
		end : end,
		className : eventClass,
		allDay: false,
		course: course,
		type: typeModified.toLowerCase(),
		actions: actions
	};	
	
	return newevent;
}

//Grabs the Event Obj from the Instant Apointment form
function getCreateNewEventObjFromInstantApp4CTForm(username, course, type){

	var userCurTime = getUserCurrentTime(username); // new Date();
	var end = parseISO8601(userCurTime, true);
	end.setHours(end.getHours()+2);
	
	var typeModified = type.replace(/ /g,"-");
	var actions = [];  // need to assign real actions
	actions[0] = "edit";
	actions[1] = "cancel";
	
	var eventClass = "div"+typeModified.toLowerCase()+"-"+course.replace(/ /g, "-").toLowerCase()+" scheduled";
	var newevent = {
		resourceType: type,
		title : type,
		editable: true,
		start : "",
		end : end,
		className : eventClass,
		allDay: false,
		course: course,
		type: typeModified.toLowerCase(),
		actions: actions
	};	
	
	return newevent;
}

function getUserCurrentTime(username) {
	
	var userCurTime = new Date();
	
	jQuery.ajax({
		type: 'POST',
		url: 'php/virtuallabs-wscalls.php',
		dataType: 'json',
		async: false,
		timeout: 4000,
		data: {
			action: 'getUserCurrentTime',
			username: username
		},
		success: function(data){
			var message = "";
			
			if (data) {
				userCurTime = data;
			}
			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			alert("error:" + textStatus + "\n errorThrown: " + errorThrown);
		}
	});

	return userCurTime;
}

function scheduleAppointment(event, username) {
	var dateformatter = "yyyy-mm-dd'T'HH:MM:ss";	
	var success = false;
	var requestType;
	var startDate;
    
	// showProgressBar(true);
	if (event.start != "") {
		startDate = event.start.format(dateformatter);
	} else {
		startDate = "";
	}
    
	requestType = getRequestType();
	
	jQuery.ajax({
		type: 'POST',
		url: 'php/virtuallabs-wscalls.php',
		dataType: 'json',
		// sms: updated on 6/2/2011
		async: true,
		// sms: updated on 6/2/2011
		timeout: 0,
		data: {
			action: 'scheduleAppointments',
			id: '',
			requestingUser:  username, // jQuery('#username').val(),
			username: username,
			start: startDate,
			end: event.end.format(dateformatter),
			resourceType: event.resourceType,
			course: event.course,
			affiliationId: '',
			availabilityStatus: '',
			requestType: requestType
		},
		success: function(data){
			// sms: updated on 6/2/2011
			/*
			var message = "";
			
			if (data) {
				var appointments = generateAppointments(data);
				var scheduled = 0;
				var unsheduled = 0;
				var scheduledMsg = "";
				var unscheduledMsg = "";
			
				success = true;			

				for (a in appointments) {
					if(appointments[a].id == ""){
						unsheduled++;
						success = false;			
					} else {
						scheduled++;
					}
				}

				if (unscheduled > 0)
					unscheduledMsg = unsheduled + " appointment(s) could NOT be scheduled.";	
				scheduledMsg = scheduled + " appointment(s) was scheduled.";
				message = scheduledMsg + " " + unscheduledMsg;
				
				if (!success) 
					alert(message);
				
				// success = true;			
			} else {
				message = "We were unable to schedule you for this appointment.<br/><br/> ** please try again later.";
				alert(message);
			}
			
			// noticeDialog("Schedule Appointment", message, "alert");
			*/
            
            //if(iscerttest){
                if(!data.id){
                    isScheduled = false;
                    //noticeDialog("Schedule Certificate Exam", data.availabilityStatus, "alert");
					noticeDialogWithRedirect("Schedule Certificate Exam", data.availabilityStatus, "alert", jQuery("#courseURL").val());
					
                }else{
                    isScheduled = true;
                }
            //}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			var header = "Schedule Appointment";
			var message = "We were unable to schedule you for this appointment.<br/><br/> ** please try again later.";
			var icon = "alert";
			message = textStatus + " : " +errorThrown;
			noticeDialog(header, message, icon);
			
			alert(message);
			// showProgressBar(false);
		}
	});
	
	// sms: updated on 6/2/2011
	// return success;
	return true;
}

function getRequestType() {
	var requestType;
	
	if(is_admin_user){
		requestType = "Host";
	}else if(is_mentor_user){
		requestType = "Mentor";
	}else{
		requestType = "User";
	}
	
	return requestType;
}

function generateAppointments(events) {
	var appointments = [];
	
	if (jQuery.isArray(events)) {
		
		for (var i = 0; i < events.length; i++) {
			
			appointments.push({
				id: events[i].id,
				userName: (events[i].userName) ? events[i].userName : "",
				start: events[i].start,
				end: events[i].end,
				resourceType: events[i].resourceType,
				course: events[i].course,
				affiliationId: (events[i].affiliationId) ? events[i].affiliationId : "",
				availabilityStatus: (events[i].availabilityStatus) ? events[i].availabilityStatus : "",
				actions: (events[i].action) ? events[i].action : null
			});
		}
	} else {
		appointments.push({
			id: events.id,
			userName: (events.userName) ? events.userName : "",
			start: events.start,
			end: events.end,
			resourceType: events.resourceType,
			course: events.course,
			affiliationId: (events.affiliationId) ? events.affiliationId : "",
			availabilityStatus: (events.availabilityStatus) ? events.availabilityStatus : "",
			actions: (events.action) ? events.action : null
		});
	}
	
	return appointments;
}

function generateAppointment(event) {
	var appointment = [];
	
	appointment.push({
			id: event.id,
			userName: (event.userName) ? event.userName : "",
			start: event.start,
			end: event.end,
			resourceType: event.resourceType,
			course: event.course,
			affiliationId: (event.affiliationId) ? event.affiliationId : "",
			availabilityStatus: (event.availabilityStatus) ? event.availabilityStatus : "",
			actions: (event.action) ? event.action : null
	
		});
}

function noticeDialog(header, message, icon) {
	
	var noticeContent = jQuery("<div id='notice' />").html('<p><span class="ui-icon ui-icon-'+icon+'" style="float:left; margin:0 7px 20px 0;"></span>'+message+'</p>');
	
	jQuery(noticeContent).dialog({
		modal: true,
		title: header,
		buttons: {
			Ok: function() {
				jQuery(this).dialog('close');
			}
		}
	});
	
	jQuery(noticeContent).dialog('open');
}

function noticeDialogWithRedirect(header, message, icon, url) {
	progressDialogBox(false);
	var noticeContent = jQuery("<div id='notice' />").html('<p><span class="ui-icon ui-icon-'+icon+'" style="float:left; margin:0 7px 20px 0;"></span>'+message+'</p>');
	
	jQuery(noticeContent).dialog({
		modal: true,
		title: header,
		buttons: {
			Ok: function() {
				jQuery(this).dialog('close');
				window.location = url;
			}
		}
	});
	
	jQuery(noticeContent).dialog('open');
}


