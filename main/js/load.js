$(document).ready(function() {
	$(document).on('click', '#form', function(event) {
		event.preventDefault();
		$('.form-grad-course').removeClass('show');
		$('.form-grad').toggleClass('show',200);
		// $('.none').toggleClass('show');
	});
	$(document).on('click', '#form-grad', function(event) {
		event.preventDefault();
		/* Act on the event */
		$('.form-grad').removeClass('show',200);
		$('.form-grad-course').toggleClass('show');
		$('.none').removeClass('show');
	});
	$(document).on('click', '#account-info', function(event) {
		event.preventDefault();
		$('.none').toggleClass('show');
		$('.form-grad').removeClass('show',200);
		$('.form-grad-course').removeClass('show');
	});
	
});