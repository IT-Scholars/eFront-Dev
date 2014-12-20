function displayError(parent, message)
{
    jQuery("#"+parent+" .messageContainer").empty();
    jQuery("#"+parent+" .messageContainer").removeClass('ui-state-highlight ui-corner-all');
    jQuery("#"+parent+" .messageContainer").addClass('ui-state-error ui-corner-all');
	jQuery("#"+parent+" .messageContainer").html('<p><span class="ui-icon ui-icon-alert"></span><strong>Error:</strong> '+message+'</p>');
	jQuery("#"+parent+" .messageContainer").addClass("clear");
	jQuery("#"+parent+" .messageContainer").click(function(){
		jQuery("#"+parent+" .messageContainer").slideUp('slow');
	});
	
	jQuery("#"+parent+" .messageContainer").slideDown('slow', function(){
		setTimeout(function(){ jQuery("#"+parent+" .messageContainer").slideUp('slow');}, 5000);
		
	});

}

function displayMessage(parent,message)
{
	jQuery("#"+parent+" .messageContainer").die();
    jQuery("#"+parent+" .messageContainer").empty();
    jQuery("#"+parent+" .messageContainer").removeClass('ui-state-error ui-corner-all');
	jQuery("#"+parent+" .messageContainer").addClass('ui-state-highlight ui-corner-all');
	jQuery("#"+parent+" .messageContainer").html('<p><span class="ui-icon ui-icon-check"></span><strong>'+message+'<strong></p>');
	jQuery("#"+parent+" .messageContainer").addClass("clear");
	jQuery("#"+parent+" .messageContainer").live('click',function(){
		jQuery("#"+parent+" .messageContainer").slideUp('slow');
	});
	
	jQuery("#"+parent+" .messageContainer").slideDown('slow', function(){	
		setTimeout(function(){ jQuery("#"+parent+" .messageContainer").slideUp('slow');}, 5000);
		
	});

}
