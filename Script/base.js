const btnScrollToBottom = document.querySelector("#btnScrollToBottom");
btnScrollToBottom.addEventListener("click", function(){
	window.scrollTo(
		{
			top: 1000,
			left: 0,
			behavior: "smooth"
		}
	);
	document.querySelector(".footer").style.display = "None";
});

const btnScrollToTop = document.querySelector("#btnScrollToTop");
btnScrollToTop.addEventListener("click", function(){
	window.scrollTo(
		{
			top: 0,
			left: 0,
			behavior: "smooth"
		}
	);
	setTimeout(() => {
		document.querySelector(".footer").style.display = "flex";
	}, 400);
});

window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
		document.querySelector("#btnScrollToBottom").style.display = "None";
		document.querySelector("#btnScrollToTop").style.display = "flex";
    }
	if (window.scrollY == 0){
		document.querySelector("#btnScrollToBottom").style.display = "flex";
		document.querySelector("#btnScrollToTop").style.display = "None";
	}
};

var firstName = document.getElementById('firstName')
var lastName = document.getElementById('lastName')
var inputEmail = document.getElementById('inputEmail')
var phoneNumber = document.getElementById('phoneNumber')
var subject = document.getElementById('subject')
var Textarea1 = document.getElementById('Textarea1')
var contactForm = document.getElementById('contactForm')

contactForm.addEventListener('submit', (e) => {
	let messages = []
	if (firstName.value === '' || firstName.value == null){
		messages.push('Voornaam is verplicht')
	}
	if (lastName.value === '' || lastName.value == null){
		messages.push('Achternaam is verplicht')
	}
	if (inputEmail.value === '' || inputEmail.value == null){
		messages.push('Email is verplicht')
	}
	if (subject.value === '' || subject.value == null){
		messages.push('Onderwerp is verplicht')
	}
	if (Textarea1.value === '' || Textarea1.value == null){
		messages.push('Omschrijving is verplicht')
	}
	if (messages.length > 0){
		e.preventDefault()
		alert(messages.join(', '))
	} else {
		window.open(
			'mailto:wesleygeboers@outlook.com?subject='+firstName.value+' '+lastName.value+', '+subject.value+'&body='+'Voornaam: '+firstName.value+'%0D'+'Achternaam: '+lastName.value+'%0D'+'Email: '+inputEmail.value+'%0D'+'Omschrijving: '+Textarea1.value+''
			);
	}
})