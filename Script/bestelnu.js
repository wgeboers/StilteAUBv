//Afhandeling data verzamelen, alert wanneer goed/niet goed is ingevuld(Werkt alleen als je pagina helemaal opnieuw opent, refresh werkt niet)
window.document.addEventListener('submit', (e) => {
	e.preventDefault();
	var order = document.getElementById('orderForm').elements;
	var orderArray = [];
	
	for(var i = 0; i < order.length; i++) {
		if(order[i].type != 'checkbox' && order[i].type != 'submit') {
			if(!order[i].classList.contains('invoice'))
				orderArray.push(order[i].value);
			else {
				if(f_box.checked == true && order[i].type != 'submit')
					orderArray.push(order[i].value);
			}
		}
	}
	alertFunction(orderArray);
	scrollTo(
	{
		top: 0,
		left: 0,
		behavior: "smooth"
	});
});

//checkbox functionaliteit
window.document.querySelector('#f_box').addEventListener('click', function() {
	var form = document.getElementById('f_form');
	var cbox = document.getElementById('f_box');
	
	if(cbox.checked)
		form.style.display = 'block';
	else
		form.style.display = 'none';
	
});

//herlaad pagina op laden; zorgt ervoor dat checkbox altijd false is; voor consistentie bij herladen.
window.document.addEventListener("DOMContentLoaded", function() {
	var inputs = document.getElementsByTagName('input');
	
	for(var i = 0; i < inputs.length; i++){
		if(inputs[i].type == 'checkbox')
			inputs[i].checked = false;
	}
});

//Reload page voor error msg functionaliteit...
window.document.querySelector('#alertBtn').addEventListener('click', function() {
	var aCtnr = document.getElementById('alertContainer');
	
	if(aCtnr.classList.contains('hide'))
		aCtnr.classList.remove('hide');
	else
		aCtnr.classList.add('hide');
});

function alertFunction(orderArray) {
	var aId = document.getElementById('alertId');
	var aCtnr = document.getElementById('alertContainer');
	for(item in orderArray) {
		if(orderArray[item] === 'Maak een keuze...' || orderArray[item] === '' || orderArray[item] === null){
			aId.classList.remove('alert-success');
			aId.classList.add('alert-warning');
			aCtnr.classList.remove('hide');
			document.getElementById('alertText').innerHTML = 'Vul AUB alle velden in.';
			break;
		}
		else{
			aId.classList.remove('alert-warning');
			aId.classList.add('alert-success');
			aCtnr.classList.remove('hide');
			document.getElementById('alertText').innerHTML = 'Bestelling succesvol verzonden.';
			console.log(orderArray[item]);
		}
	}
}