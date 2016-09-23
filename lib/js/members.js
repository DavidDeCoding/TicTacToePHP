
	var HttpObj;
	
	if(window.XMLHttpRequest) {
		HttpObj = new window.XMLHttpRequest();
	}
	else {
		HttpObj = new ActiveXObject("Microsoft.XMLHTTP");
	}

	function getMembersOnline() {
		HttpObj.open("GET", "members.php");
		
		HttpObj.onreadystatechange = getData;
		
		HttpObj.send(null);
	}

	function getData() {
		if(HttpObj.readyState == 4 && HttpObj.status == 200) {
			document.getElementById("membersonline").innerHTML = HttpObj.responseText;
		}
	}
