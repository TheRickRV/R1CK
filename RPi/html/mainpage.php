<html>

<head>
	<link rel="stylesheet" href="styles_mainpage.css" type="text/css" />
	<title>Server</title>
</head>

<body>

<?php

if ($_COOKIE["myServerLogin"] != "YES"){                                               //this part checks if there is a cookie file that confirms previous successful login
	if ($_POST["username"] != "pi" || $_POST["password"] != "raspberry") {
		header("Location: index.php");                                                 //if either username or password is incorrect it redirects you to the login page
	}
}

setcookie("myServerLogin","YES");                                                      //this sets cookie file with "YES" value to confirm previous successful login

	
?>

<h1> This is my server </h1>

<p> <a href="http://r1ck.hopto.org:8081" target="_blank"><button style="float: right;" >Webcam stream</button></a> </p>          <!-- webcam stream button -->

<p> <a href="watering.php" target="_blank"><button style="float: right;" >Water the plant</button></a> </p>        <!-- watering page button -->



<button type="button" onclick="runScript()">Measure moisture</button>

<script>
function runScript() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	  readTxt();
    }
  };
  xhttp.open("GET", "exec_moisture.php", true);
  xhttp.send();
}

function readTxt() {
	var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      "Soil moisture is "+this.responseText+" %";
	}
  };
	xhttp.open("GET", "textfile.txt", true);
    xhttp.send();
	
	
}
	

</script>

<br />
<div id="demo">
<p></p>
</div>

<p style="position: absolute; bottom:0px;">This page uses cookies just to simplify your user experience </p>

</body>



</html>
