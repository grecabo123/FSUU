$(document).ready(function(){
	$('#form-grad').click(function(){
		$('.form-grad').toggle();
		// alert("wad");
		$('.lahi').fadeOut();
	});
	$('#form-lahi').click(function(){
		$('.lahi').toggle();
		$('.form-grad').fadeOut();
	});
});