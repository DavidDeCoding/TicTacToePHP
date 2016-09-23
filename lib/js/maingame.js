	var HttpObjCha;
	
	if(window.XMLHttpRequest) {
		HttpObjCha = new window.XMLHttpRequest();
	}
	else {
		HttpObjCha = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	function playGame(tile) {
		
		HttpObjCha.open("GET", "playgame.php?tile="+tile);
		HttpObjCha.onreadystatechange = getServerText;
		HttpObjCha.send(null);
	}
	
	function getServerText() {
		if(HttpObjCha.readyState == 4 && HttpObjCha.status == 200) {
			document.getElementById("control_text").innerHTML = HttpObjCha.responseText;
		}
	}
		