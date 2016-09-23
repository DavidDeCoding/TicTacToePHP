
	var HttpObjCha;
	
	if(window.XMLHttpRequest) {
		HttpObjCha = new window.XMLHttpRequest();
	}
	else {
		HttpObjCha = new ActiveXObject("Microsoft.XMLHTTP");
	}

	function getChallegesFromServer() {
		HttpObjCha.open("GET", "challenges.php");
		
		HttpObjCha.onreadystatechange = getDataFromServer;
		
		HttpObjCha.send(null);
	}

	function getDataFromServer() {
		if(HttpObjCha.readyState == 4 && HttpObjCha.status == 200) {
			document.getElementById("challenges").innerHTML = HttpObjCha.responseText;
		}
	}

	
	var HttpObjCha2;
	
	if(window.XMLHttpRequest) {
		HttpObjCha2 = new window.XMLHttpRequest();
	}
	else {
		HttpObjCha2 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	
	
	
	
	
	
	function rejectGame() {
		HttpObjCha2.open("GET", "reject.php?mode=1");
		
		HttpObjCha2.onreadystatechange = setRejectData;
		
		HttpObjCha2.send(null);
	}
	
	function setRejectData() {
		if(HttpObjCha2.readyState == 4 && HttpObjCha2.status == 200) {
			document.getElementById("challenges").innerHtml = HttpObjCha2.responseText;
		}
	}
