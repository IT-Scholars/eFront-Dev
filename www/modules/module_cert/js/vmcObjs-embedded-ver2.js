
function vmcObj()
{
    this.workingTab = currentTabSelected;
}
 
/*var obj = new vmcObj();

obj.checkRDPMachineStatus();

obj.AddX(5); 
var obj3 = new vmcObj();

*/


function checkRDPMachineStatus(init) {
	var obj = new vmcObj();
	obj.workingTab = currentTabSelected;
	var today = new Date();
	//jQuery("#vmcDebug").html("checkRDPMachineStatus: "+today);
	//jQuery("#vmcDebug").append("<br/>rdpIsReady: "+getRdpTabInfo('ready', currentTabSelected));
	//jQuery("#vmcDebug").html("<br/>this.workingTab: "+currentTabSelected+" ready: "+getRdpTabInfo('ready', currentTabSelected));
	
	if(init){
		stateInterval = setInterval(function(){ checkRDPMachineStatus(false); },30000);	

	}
	
	if(currentTabSelected){
		var istab = currentTabSelected.indexOf("tab");
		
		if(istab >= 0){
			
			var vmname = jQuery("#"+currentTabSelected+" span").html();
			var instanceId = jQuery('#veInsId').html();
			var hostName = jQuery("#veInsAddr").html();
			var hostPort = jQuery("#veInsPort-"+currentTabSelected).html();
			
			//var state = 
			obj.getInstanceState(instanceId, vmname, hostName, hostPort);
			
			/*
			setRdpTabInfo('state', obj.workingTab, state, 'checkRDPMachineStatus');
		
			if(state == 'on'){
				obj.isRDPMachineReady(instanceId, vmname, hostName, hostPort);
				//alert('here');
			}else{
				//alert("showCmdMessages(command): "+state);	
				markCurrentInstanceState(getRdpTabInfo('state',obj.workingTab), 'checkRDPMachineStatus - '+getRdpTabInfo('state',currentTabSelected));
				//alert(getRdpTabInfo('state',currentTabSelected));
				showCmdMessages(state);
				//vmInstanceCmd(command, instanceId, vmName);
			}
			*/
		}
	}
	

}

vmcObj.prototype.isRDPMachineReady = function(instanceId, vmname, hostName, hostPort) {
	var current = this;
	//this.workingTab = currentTabSelected;
	var workingTab = this.workingTab;
	var debug = "";
	//jQuery("#vmcDebug").html("<br/>this.workingTab: "+this.workingTab+" ready: "+getRdpTabInfo('ready', this.workingTab));
 
	jQuery.ajax({
		type: 'POST',
		url: vLab_moodleURL+'php/vmcontrols.php',
		dataType: 'json',
		async: true,
		data: {
			action: 'isRDPReady',
			hostName: hostName,
			hostPort: hostPort,
			userid: jQuery('#userid').val(),	// JAM added: 03.21.2012
			defaultHeight: jQuery("#bottomFrameHeightPercentage").val()
		},
		success: function(data) {
			if(data){
				if(data.success){
								
					//jQuery("#vmcDebug").html("<br/>isRDPMachineReady: "+data.ready);
					//jQuery("#vmcDebug").append("<br/>this.workingTab: "+workingTab+" ready: "+getRdpTabInfo('ready', workingTab));
					//jQuery("#vmcDebug").append("<br/>currentTabSelected: "+currentTabSelected);
					//jQuery("#vmcDebug").append("<br/>Showing: "+getRdpTabInfo('showing', workingTab));
					
					if(data.ready){
						clearInterval(stateInterval);
						
						if(workingTab == currentTabSelected){
							if(!getRdpTabInfo('ready', workingTab)){
								setRdpTabInfo('ready', workingTab, true);
								//alert('mainscreenid');
								if(!getRdpTabInfo('showing', workingTab)){
									var url = jQuery("#veInsURL-"+workingTab).html();
									url = url + "&frameBpp=" + data.bpp;
									url = url + "&frameHeight=" + data.height;
									url = url + "&frameWidth=" + data.width;
									
									var currentSRC = jQuery("#mainscreenid").attr('src');
									//jQuery("#mainscreenid").attr('src',url.replace(/&amp;/g,"&"));
									
									if(currentSRC == url){
									    jQuery('#mainscreenid')[0].contentWindow.location.reload(true);
									}else{
									    jQuery("#mainscreenid").attr('src',url.replace(/&amp;/g,"&"));
									}
									
									setRdpTabInfo('showing', workingTab, true);
									/*
									var iframeInterval = setInterval(function(){
									    ////console.log("pageIsLoaded:"+window.frames.mainscreen.pageIsLoaded);
									    ////console.log("isActive:"+window.frames.mainscreen.isActive());
									    if(window.frames.mainscreen.pageIsLoaded){
										if(window.frames.mainscreen.isActive()){
										    clearInterval(iframeInterval);
										    jQuery("iframe#mainscreenid").contents().find("p.message").css("display","none");
										}
									    }
									},10000);
									*/
								}
							}
							markCurrentInstanceState(getRdpTabInfo('state', workingTab),'isRDPMachineReady - '+getRdpTabInfo('state', workingTab));
						}
						
					}else{
						debug = "debug2 3";
						if(workingTab == currentTabSelected){
							debug = "debug2 4";
							if(getRdpTabInfo('ready', workingTab)){
								// Shows a message while waiting
								var message = "This virtual machine is not ready!<br/> Please be patient while the RDP server loads.";
								markCurrentInstanceState('disabled');
			
								jQuery("#mainscreenid").attr('src',cert_baseURI+'webRDPMessage.php?tab='+workingTab+'&message='+message);
								
								setRdpTabInfo('ready', workingTab, false);
								setRdpTabInfo('showing', workingTab, false);
							}
						}
					}
				
				}else{
					//noticeDialog("RDP Validation", data.reason, "alert");		
					setRdpTabInfo('ready', workingTab, false);
					setRdpTabInfo('showing', workingTab, false);
				}
			
			//wasRDPMachineReady = getRdpTabInfo('ready', this.workingTab);
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			// current.vmInstanceCmd('getState',instanceId, vmname);
			var header = "Instance Command Error: isRDPReady";
			var message = "Command could not be completed.";
			var icon = "alert";
			//noticeDialog(header, message, icon);
			popDownErrorNoticeBox("<b>"+header+"</b><br/> "+message);
			
			setRdpTabInfo('ready', workingTab, false);
			//wasRDPMachineReady = false;
		}/*,
		complete: function(){
		    // Handle the complete event
		    alert('complete');
		}*/

	});
	//popDownErrorNoticeBox(debug);

}

vmcObj.prototype.getInstanceState = function(instanceId, vmName, hostName, hostPort) {
	//alert('getInstanceState: '+instanceId+" "+vmName);
	var result = '';
	var obj = this;

	jQuery.ajax({
		type: 'POST',
		url: vLab_moodleURL+'php/vmcontrols.php',
		dataType: 'text',
		async: true,
		data: {
			action: 'getState',
			instanceId:  instanceId,
			vmName: vmName,
			requestingUser:  jQuery('#username').val()
		},
		success: function(data) {
			if(data){
				// result = data;
				var state = data;
				result = state;
		
				setRdpTabInfo('state', obj.workingTab, state, 'checkRDPMachineStatus');
				
				if(state == 'on'){
					obj.isRDPMachineReady(instanceId, vmName, hostName, hostPort);
					//alert('here');
				}else{
					//alert("showCmdMessages(command): "+state);	
					markCurrentInstanceState(getRdpTabInfo('state',obj.workingTab), 'checkRDPMachineStatus - '+getRdpTabInfo('state',currentTabSelected));
					//alert(getRdpTabInfo('state',currentTabSelected));
					showCmdMessages(state);
					//vmInstanceCmd(command, instanceId, vmName);
				}
			}
		}
	});
	
	return result;
}

vmcObj.prototype.vmInstanceCmd = function(command, instanceId, vmName) {
	//alert('vmInstanceCmd: '+command);
	var current = this;
	//this.workingTab = currentTabSelected;
	var workingTab = this.workingTab;
	

	parseStatefromCommand(command,workingTab);
	
	var isASync = true;
	if(command == "getState")
		isASync = false;
		
	jQuery.ajax({
		type: 'POST',
		url: vLab_moodleURL+'php/vmcontrols.php',
		dataType: 'text',
		async: true,
		data: {
			action: command,
			instanceId:  instanceId,
			vmName: vmName,
			requestingUser:  jQuery('#username').val()
		},
		success: function(data) {
			if(data){
				if(command == "getState"){
					setRdpTabInfo('state', workingTab, data,'vmInstanceCmd: getState');
					markCurrentInstanceState(data,'vmInstanceCmd');
				}else{
					// if the command fails
					noticeDialog("VM Command", "Please retry your request.", "alert");	
				}
				
			}else if(command != "getState"){
				
				//alert('this.workingTab: '+workingTab+' currentTabSelected: '+currentTabSelected);
				
				if(workingTab == currentTabSelected){
					//parseStatefromCommand(command, this.workingTab);
					
					setRdpTabInfo('ready', workingTab, false);
					setRdpTabInfo('showing', workingTab, false);
					
					showCmdMessages(command);
					setTimeControl();
					
					clearInterval(stateInterval);
					
					if(command == "powerOff" || command == "shutdown"){
						setRdpTabInfo('state', workingTab, 'off','vmInstanceCmd: getState');
						markCurrentInstanceState(data,'vmInstanceCmd');
					}else if(command == "suspend"){
						setRdpTabInfo('state', workingTab, 'suspended','vmInstanceCmd: getState');
						markCurrentInstanceState(data,'vmInstanceCmd');
					}else{
						current.vmInstanceCmd('getState', instanceId, vmName);	// -- original
						
						checkRDPMachineStatus(true);
					}
				}
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			// current.vmInstanceCmd('getState',instanceId, vmname);
			var header = "Instance Command Error: "+command;
			var message = "Command could not be completed.";
			var icon = "alert";
			//noticeDialog(header, message, icon);
			popDownErrorNoticeBox("<b>"+header+"</b><br/> "+message);
		}

	});

}
