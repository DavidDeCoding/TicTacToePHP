	var HttpObjCha;
	
	if(window.XMLHttpRequest) {
		HttpObjCha = new window.XMLHttpRequest();
	}
	else {
		HttpObjCha = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	function cancelGame(player) {
		HttpObjCha.open("GET", "cancel.php");
		
		HttpObjCha.onreadystatechange = setDataInServer;
		
		HttpObjCha.send(null);
	}
	
	function setDataInServer() {
		if(HttpObjCha.readyState == 4 && HttpObjCha.status == 200) {
			document.getElementById("challenges").innerHTML = HttpObjCha.responseText;
		}
	}
	