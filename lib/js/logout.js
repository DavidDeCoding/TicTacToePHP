var HttpObjLog;
	
	if(window.XMLHttpRequest) {
		HttpObjLog = new window.XMLHttpRequest();
	}
	else {
		HttpObjLog = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	function logoutProfile() {
		HttpObjLog.open("GET", "logoutProf.php");
		
		HttpObjLog.onreadystatechange = logoutData;
		
		HttpObjLog.send(null);
	}

	function logoutData() {
		if(HttpObjLog.readyState == 4 && HttpObjLog.status == 200) {
			
		}
	}