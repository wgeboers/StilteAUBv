document.getElementById('play70').addEventListener('click', function(e){
	e.preventDefault();
	var myAudio = document.getElementById('audio70s')
	if (myAudio.paused && myAudio.currentTime >= 0 && !myAudio.started) {
		document.querySelector("#Play70").style.display = "None";
		document.querySelector("#Pause70").style.display = "flex";
		myAudio.play();
	} else{
		document.querySelector("#Play70").style.display = "flex";
		document.querySelector("#Pause70").style.display = "None";
		myAudio.pause();
	}
});

document.getElementById('play80').addEventListener('click', function(e){
	e.preventDefault();
	var myAudio = document.getElementById('audio80s')
	if (myAudio.paused && myAudio.currentTime >= 0 && !myAudio.started) {
		document.querySelector("#Play80").style.display = "None";
		document.querySelector("#Pause80").style.display = "flex";
		myAudio.play();
	} else{
		document.querySelector("#Play80").style.display = "flex";
		document.querySelector("#Pause80").style.display = "None";
		myAudio.pause();
	}
});

document.getElementById('play90').addEventListener('click', function(e){
	e.preventDefault();
	var myAudio = document.getElementById('audio90s')
	if (myAudio.paused && myAudio.currentTime >= 0 && !myAudio.started) {
		document.querySelector("#Play90").style.display = "None";
		document.querySelector("#Pause90").style.display = "flex";
		myAudio.play();
	} else{
		document.querySelector("#Play90").style.display = "flex";
		document.querySelector("#Pause90").style.display = "None";
		myAudio.pause();
	}
});