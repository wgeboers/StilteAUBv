window.document.addEventListener("DOMContentLoaded", function () {
	var pathName = window.location.pathname;
	
	switch(pathName) {
		case "/stilteaubv/index.php" :
		document.getElementById('index').className = 'nav-link active';
		break;
		case "/stilteaubv/onsaanbod.php" :
		document.getElementById('onsaanbod').className = 'nav-link active';
		break;
		case "/stilteaubv/bestelnu.php" :
		document.getElementById('bestelnu').className = 'nav-link active';
		break;
		case "/stilteaubv/overons.php" :
		document.getElementById('overons').className = 'nav-link active';
		break;
		case "/stilteaubv/test.php" :
		document.getElementById('test').className = 'nav-link active';
		break;
		case "/stilteaubv/dashboard.php" :
		document.getElementById('dashboard').className = 'nav-link active';
		break;
	}
});