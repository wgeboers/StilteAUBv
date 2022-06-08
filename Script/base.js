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