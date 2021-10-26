var frm1 = document.querySelector('.form_log');
var slideIndex = 0;
showSlides();

window.onload = addEventListener();

function addEventListener(){
	if (window.addEventListener) {
		document.getElementById('log_form').addEventListener('click', modal_login,false);

	}
}

function modal_login(){
	console.log("12");
	frm1.classList.add('bg-active');
}
function modal_close(){
	frm1.classList.remove('bg-active');

}
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}

function dis(){
	alert("My Puhpnn ♥");
}


