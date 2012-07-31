jQuery.fn.countDown = function(settings,to) {
	settings = jQuery.extend({
		startFontSize: '20px',
		endFontSize: '10px',
		duration: 1000,
		startNumber: 10,
		endNumber: 0,
		callBack: function() { }
	}, settings);
	return this.each(function() {
		
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
			}else{
				settings.callBack(this);
			}
		});
				
	});
};

