$(document).ready(function(){
	$('#form').click(function(){
		$('.form-grad').toggle(100);
		$('.form-grad-course').hide();
	});
	$('#form-grad-course').click(function(){
		$('.form-grad-course').toggle(100);
		$('.form-grad').hide();
	});
	$('#view').click(function(){
		$('.view-data').toggle(200);
	});
	$('#close').click(function(){
		$('.view-data').hide();
	});

	$('#forms').click(function(event) {
		$('.form-application').toggleClass('show');
		$('#up').toggleClass('rotate');
	});
	
	
});