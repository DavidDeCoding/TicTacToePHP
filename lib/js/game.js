var HttpObj;

if(window.XMLHttpRequest) {
	HttpObj = new window.XMLHttpRequest();
}
else {
	HttpObj = new ActiveXObject("Microsoft.XMLHTTP");
}

function reloadBoard() {
	
	HttpObj.open("GET", "reloadgame.php");
	HttpObj.onreadystatechange = getGame;
	HttpObj.send(null);
	
}

function getGame() {
	
	if(HttpObj.readyState == 4 && HttpObj.status == 200) {
		document.getElementById("board").innerHTML = HttpObj.responseText;
	}
}


var HttpObj2;

if(window.XMLHttpRequest) {
	HttpObj2 = new window.XMLHttpRequest();
}
else {
	HttpObj2 = new ActiveXObject("Microsoft.XMLHTTP");
}

function reloadControl() {
	
	HttpObj2.open("GET", "reloadcontrol.php");
	HttpObj2.onreadystatechange = getControlText;
	HttpObj2.send(null);
	
}

function getControlText() {
	
	if(HttpObj2.readyState == 4 && HttpObj2.status == 200) {
		document.getElementById("control_text").innerHTML = HttpObj2.responseText;
	}
}

