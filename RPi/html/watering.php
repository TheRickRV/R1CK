<html>

<head>
	<title>Watering plants</title>
</head>

<body onload="loadDoc()">
<p id="demo"></p>
<button id="watering_button" onclick="start_pump();">Start watering</button>
<br/>
<button id="refill_button" style="float: right;" onclick="bothFunc();">Confirm tank refill</button>

<script>
function loadDoc() {
  const button = document.getElementById("watering_button")
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		console.log(xhttp.responseText);
		if (this.responseText != 0){
			document.getElementById("demo").innerHTML = "WATERING READY";
			document.getElementById("watering_button").disabled = false;
		}
		else{
			document.getElementById("demo").innerHTML = "WATERING NOT READY. FILL IN THE TANK";
			document.getElementById("watering_button").disabled = true;
		}
    }
  };
  xhttp.open("GET", "water_level.txt", true);
  xhttp.send();
}
</script>

<script>
function refillTank() {
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    /*if (this.readyState == 4 && this.status == 200) {
	  some_function();
    }*/
  };
  xhttp.open("GET", "refill_tank.php", true);
  xhttp.send();
}
</script>

<script>
function bothFunc(){
refillTank();
setTimeout(() => { loadDoc(); }, 3000);
}
</script>

<script>
function start_pump(){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    /*if (this.readyState == 4 && this.status == 200) {
	  some_function();
    }*/
  };
  xhttp.open("GET", "exec_watering.php", true);
  xhttp.send();
}
</script>

</body>



</html>
