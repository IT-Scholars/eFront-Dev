/*
	Class:    	countDown
	Author:   	David Walsh
	Website:    http://davidwalsh.name
	Version:  	1.0.0
	Date:     	11/30/2008
	Built For:  jQuery 1.2.6
*/



jQuery.fn.extend({
	countDown : function(settings,to) {
		settings = jQuery.extend({
			resizeFont		: false,	 
			startFontSize	: '14px',
			endFontSize		: '14px',
			duration		: 1000,
			startNumber		: 10,
			endNumber		: 0,
			returnDate		: true,
			callBack		: function() { }//alert(this.id); $(this).detach(); }
		}, settings);
		return this.each(function() {
			
			var params;
			if(settings.resizeFont){
				params = ({ 'fontSize': settings.endFontSize });
			}else{
				params = ({ 'color': '#000000' });
			}
				
			
			if(!settings.returnDate){
				//where do we start?
				if(!to && to != settings.endNumber) { to = settings.startNumber; }
				
				//set the countdown to the starting number
				if(settings.resizeFont){
					$(this).text(to).css('fontSize',settings.startFontSize);
				}
				
				//loopage
				$(this).animate(params ,settings.duration,'',function() {
					if(to > settings.endNumber + 1) {
						if(settings.resizeFont){
							$(this).css('fontSize',settings.startFontSize).text(to - 1).countDown(settings,to - 1);
						}else{
							$(this).text(to - 1).countDown(settings,to - 1);
						}
					}
					else
					{
						settings.callBack(this);
					}
				});
			
			}else{
				
				// Edit: Jam - 09.30.2011 				// Instead of using the current date parameter passed, 
				//var start = settings.startNumber;		// create one for exact time, since there is no sync method.
				var start = new Date();			
				var end = settings.endNumber;
				
			
				var dif = end.getTime() - start.getTime();
	
				var Seconds_from_D1_to_D2 = dif / 1000;
				var Seconds_Between_Dates = Math.abs(Seconds_from_D1_to_D2);
				
				String.prototype.pad = function(l, s){
					return (l -= this.length) > 0 
						? (s = new Array(Math.ceil(l / s.length) + 1).join(s)).substr(0, s.length) + this + s.substr(0, l - s.length) 
						: this;
				};
				 
				var time = secondsToTime(Seconds_Between_Dates);	//Seconds_Between_Dates
				
				
				// Edited by SMS: 7/29/2011 The seconds and minutes should not be 60
				/*
				var hours = time.h;
				//var mins, secs;
				var mins = (time.m == 60) ? "00" : time.m;
				var secs = (time.s == 60) ? "00" : time.s;
				*/
				var hours 	= time.h;
				var mins	= time.m;
				var secs	= time.s;
				if (secs == 60) {mins  += 1; secs = 0;}
				if (mins == 60) {hours += 1; mins = 0;}
				
				//if(time.m == 60){ mins = "00"; hours++; }else{ mins = time.m; }
				//if(time.s == 60){ secs = "00"; mins++; }else{ secs = time.s; }
				
				if(hours == 0 && mins < 5){
					params = ({ 'color': '#FF0000' });
				}
				
				if(hours > 0 && hours < 10) { hours = "0" + hours; }
				if(hours == 0) { hours = "00"; }
				if(mins > 0 && mins < 10) { mins = "0" + mins; }
				if(mins == 0) { mins = "00"; }
				if(secs > 0 && secs < 10) { secs = "0" + secs; }
				// Added by SMS: 7/29/2011 
				if(secs == 0) { secs = "00"; }
			
				var timeLeftover = hours + ":" + mins + ":" + secs;
				
				// Change the color from black to red
				if(hours == 0 && mins < 5){
					params = ({ 'color': '#FF0000' });
				}else{
					params = ({ 'color': '#000000' });
				}
				//$("#vmcDebug").html(timeLeftover);
				
				
				//alert(timeLeftover);
				
				//loopage
				var looping = $(this).animate(params ,settings.duration,'',function() {
									//if(Seconds_Between_Dates > 0){
									if(end>start){
										
										if(settings.resizeFont){
											//$(this).css('fontSize',settings.startFontSize).text(timeLeftover).countDown(settings,end.setSeconds(end.getSeconds()-1));
											$(this).css('fontSize',settings.startFontSize).text(timeLeftover).countDown(settings,end);
										}else{
											//$(this).text(timeLeftover).countDown(settings,end.setSeconds(end.getSeconds()-1));
											$(this).text(timeLeftover).countDown(settings,end);
										}
									
									}
									else
									{
										
										settings.callBack(this);
									}
								});
				
			
			}
					
		});
		
	},
	getthisID : function () { return this.id; }
	

});

/*

jQuery.fn.countDown = function(settings,to) {
	settings = jQuery.extend({
		startFontSize: '15px',
		endFontSize: '15px',
		duration: 1000,
		startNumber: 10,
		endNumber: 0,
		returnDate: true,
		callBack: function() { }
	}, settings);
	return this.each(function() {
		
		if(!settings.returnDate){
			//where do we start?
			if(!to && to != settings.endNumber) { to = settings.startNumber; }
			
			//set the countdown to the starting number
			$(this).text(to).css('fontSize',settings.startFontSize);
			
			//loopage
			$(this).animate({
				'fontSize': settings.endFontSize
			},settings.duration,'',function() {
				if(to > settings.endNumber + 1) {
					$(this).css('fontSize',settings.startFontSize).text(to - 1).countDown(settings,to - 1);
				}
				else
				{
					settings.callBack(this);
				}
			});
		
		}else{
			
			var start = settings.startNumber;
			var end = settings.endNumber;
			
			var dif = end.getTime() - start.getTime();

			var Seconds_from_D1_to_D2 = dif / 1000;
			var Seconds_Between_Dates = Math.abs(Seconds_from_D1_to_D2);
			
			String.prototype.pad = function(l, s){
				return (l -= this.length) > 0 
					? (s = new Array(Math.ceil(l / s.length) + 1).join(s)).substr(0, s.length) + this + s.substr(0, l - s.length) 
					: this;
			};
			 
			var time = secondsToTime(Seconds_Between_Dates);	//Seconds_Between_Dates
			
			
			
			var hours = time.h;
			var mins = (time.m == 60) ? "00" : time.m;
			var secs = (time.s == 60) ? "00" : time.s;
			
			if(hours > 0 && hours < 10){ hours = "0" + hours; }
			if(hours == 0){ hours = "00"; }
			if(mins > 0 && mins < 10){ mins = "0" + mins; }
			if(secs > 0 && secs < 10){ secs = "0" + secs; }
			
			var timeLeftover = hours + ":" + mins + ":" + secs;
			
			
			
			//alert(timeLeftover);
			
			//loopage
			$(this).animate({
				'fontSize': settings.endFontSize
			},settings.duration,'',function() {
				if(Seconds_Between_Dates > 0){
					$(this).css('fontSize',settings.startFontSize).text(timeLeftover).countDown(settings,end.setSeconds(end.getSeconds()-1));
				}
				else
				{
					settings.callBack(this);
				}
			});
			
		
		}
				
	});
};
*/

function secondsToTime(secs)
{
    var hours = Math.floor(secs / (60 * 60));
   
    var divisor_for_minutes = secs % (60 * 60);
    var minutes = Math.floor(divisor_for_minutes / 60);
 
    var divisor_for_seconds = divisor_for_minutes % 60;
    var seconds = Math.ceil(divisor_for_seconds);
   
    var obj = {
        "h": hours,
        "m": minutes,
        "s": seconds
    };
    return obj;
}


/* sample usage 

$('#countdown').countDown({
	startNumber: 10,
	callBack: function(me) {
		$(me).text('All done! This is where you give the reward!').css('color','#090');
	}
});

*/