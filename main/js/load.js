$(document).ready(function() {
	$(document).on('click', '#form', function(event) {
		event.preventDefault();
		$('.form-grad-course').removeClass('show');
		$('.form-grad').toggleClass('show',200);
	});
	$(document).on('click', '#form-grad', function(event) {
		event.preventDefault();
		/* Act on the event */
		$('.form-grad').removeClass('show',200);
		$('.form-grad-course').toggleClass('show');
	});
	
});