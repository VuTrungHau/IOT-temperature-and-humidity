<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://cdn.jsdelivr.net/npm/kute.js@2.1.2/dist/kute.min.js"></script>
	<meta http-equiv="refresh" content="15">
	<style type="text/css">
		.spacer{
			aspect-ratio: 900/424;
			width: 100%;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		.layer{
			background-image: url('./low-poly-grid-haikei.svg');

		}
		body{
			margin: 0;
		}
		.grid-item {
			background-color: rgba(255, 255, 255, 0.8);
			border: 1px solid rgba(0, 0, 0, 0.8);
			padding: 20px;
			font-size: 20px;
			text-align: center;
		}
		.sub:hover{
			background-color: orange;
			border: 1px solid red;
		}
	</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensordata";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT value1, value2, value3 FROM sensordata ORDER BY id DESC limit 30";
if ($result = $conn->query($sql)) {
    $row = $result->fetch_assoc();
   	$value1 = $row["value1"];
    $value2 = $row["value2"]; 
    $value3 = $row["value3"]; 
	$result->free();
}
?>
	<div class="spacer layer">
		<div style="text-align: center; font-size: 50px; color: white; font-weight: bold; padding: 40px;">Thông tin đo được từ sensor</div>
		<div style="top: 270px; left: 570px; font-size: 50px; color: white; position: absolute;"><?=$value1;?>°C</div>
		<div style="top: 270px; left: 930px; font-size: 50px; color: white; position: absolute;"><?=$value2;?>%</div>
		<div style="top: 270px; left: 1290px; font-size: 50px; color: white; position: absolute;"><?=$value3;?>°F</div>
		<div style="text-align: center;">
		<svg id="visual" viewBox="0 0 900 1100" width="350" height="400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><g transform="translate(447.6946052759062 454.2948541638333)"><path id="blob1" d="M191.7 -334.8C252.2 -297.2 307.5 -253.3 344.2 -196.5C380.9 -139.7 399 -69.8 396.6 -1.3C394.3 67.2 371.7 134.3 335.5 192.1C299.3 249.8 249.7 298.1 191.5 335.9C133.3 373.6 66.7 400.8 -0.2 401.1C-67 401.4 -134 374.8 -197.7 340.2C-261.3 305.6 -321.6 263 -353.9 205C-386.3 147 -390.6 73.5 -391.9 -0.7C-393.2 -75 -391.5 -150 -361.5 -212.1C-331.5 -274.1 -273.2 -323.3 -208.3 -358.3C-143.3 -393.3 -71.7 -414.1 -3 -408.9C65.6 -403.7 131.3 -372.3 191.7 -334.8" fill="#6892a5"></path></g><g transform="translate(451.42021898955795 448.36325592356945)" style="visibility: hidden;"><path id="blob2" d="M207.4 -361C264.9 -326.1 304.8 -262.6 340.5 -197.6C376.1 -132.7 407.6 -66.3 411.5 2.2C415.4 70.8 391.7 141.7 355.6 205.9C319.5 270.1 271 327.8 209.7 362C148.3 396.3 74.2 407.1 4.3 399.7C-65.6 392.3 -131.3 366.7 -193.9 333.2C-256.5 299.7 -316.2 258.3 -356.1 201.5C-395.9 144.7 -416 72.3 -414.7 0.8C-413.4 -70.8 -390.7 -141.7 -352.9 -202C-315 -262.3 -262 -312.2 -200.7 -344.7C-139.3 -377.3 -69.7 -392.7 2.7 -397.3C75 -401.9 150 -395.8 207.4 -361" fill="#a56868"></path></g></svg>

		<svg id="visual" viewBox="0 0 900 1100" width="350" height="400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><g transform="translate(456.82446423086475 467.5024960933192)"><path id="blob3" d="M193.6 -342.2C252.4 -301.2 302.9 -252.6 340.2 -194.3C377.6 -136 401.8 -68 401.2 -0.3C400.6 67.3 375.2 134.7 340 196.6C304.7 258.5 259.6 315 201.3 347C143 378.9 71.5 386.3 1.8 383.3C-68 380.3 -136 366.8 -195.3 335.4C-254.6 304.1 -305.3 254.8 -344.3 195.9C-383.3 137 -410.6 68.5 -414.4 -2.2C-418.2 -72.8 -398.3 -145.7 -360.2 -206.1C-322.1 -266.6 -265.8 -314.7 -202.7 -353.3C-139.7 -391.9 -69.8 -421 -1.3 -418.8C67.3 -416.6 134.7 -383.2 193.6 -342.2" fill="#6892a5"></path></g><g transform="translate(448.4025782370943 439.5396717357987)" style="visibility: hidden;"><path id="blob4" d="M202.9 -349.5C261.5 -317.7 306.6 -260.3 341.2 -197.8C375.7 -135.3 399.9 -67.7 400.7 0.5C401.6 68.7 379.2 137.3 345.5 201.3C311.7 265.2 266.6 324.4 207.1 359.9C147.7 395.4 73.8 407.2 0 407.2C-73.8 407.2 -147.7 395.4 -212.6 363.1C-277.6 330.8 -333.6 277.9 -364.4 213.9C-395.1 150 -400.6 75 -396.2 2.5C-391.9 -70 -377.8 -140 -345.4 -201.1C-313 -262.1 -262.2 -314.2 -201.6 -344.8C-141 -375.5 -70.5 -384.6 0.8 -386.1C72.2 -387.5 144.3 -381.2 202.9 -349.5" fill="#BB004B"></path></g></svg>

		<svg id="visual" viewBox="0 0 900 1100" width="350" height="400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><g transform="translate(441.04944888098754 455.28272120922657)"><path id="blob5" d="M204 -351.9C268.9 -315.8 329.3 -270.4 363.9 -210.2C398.5 -150 407.2 -75 399.1 -4.7C391 65.6 366 131.3 332.1 192.6C298.2 253.9 255.3 311 198.5 348C141.7 385 70.8 402 -1 403.8C-72.8 405.5 -145.7 392 -205 356.4C-264.3 320.8 -310.1 263.2 -340.5 200.1C-371 137 -386 68.5 -383.8 1.3C-381.6 -66 -362.3 -132 -329.9 -191.6C-297.5 -251.2 -252 -304.4 -194.8 -345.1C-137.7 -385.8 -68.8 -413.9 0.3 -414.5C69.5 -415 139 -388.1 204 -351.9" fill="#6892a5"></path></g><g transform="translate(445.9400429068337 440.66404362285584)" style="visibility: hidden;"><path id="blob6" d="M202.9 -346.7C263.8 -316.3 314.6 -263.6 354.1 -202.2C393.6 -140.7 421.8 -70.3 420.1 -1C418.4 68.3 386.7 136.7 348.5 200.5C310.4 264.3 265.7 323.5 206.5 359C147.3 394.5 73.7 406.3 4.1 399.2C-65.5 392.1 -131 366.2 -189.7 330.5C-248.5 294.7 -300.5 249.1 -341.7 192.4C-383 135.7 -413.5 67.8 -412 0.8C-410.6 -66.2 -377.2 -132.3 -336.5 -189.9C-295.7 -247.5 -247.6 -296.5 -190.3 -329.1C-133 -361.6 -66.5 -377.7 2.2 -381.6C71 -385.5 142 -377.2 202.9 -346.7" fill="#BB004B"></path></g></svg>
		</div>
		<div style="text-align: center; font-size: 40px; color: white; font-weight: bold; padding: 40px; padding-top: 5px; white-space: pre;"> Nhiệt độ (°C)		Độ ẩm (%)		Nhiệt độ (°F)</div>
		<div id="CB1" style="text-align: center; font-size: 30px; color: white; font-weight: bold; padding: 5px; visibility: hidden;">Cảnh báo: Nhiệt độ cao</div>
		<div id="CB2" style="text-align: center; font-size: 30px; color: white; font-weight: bold; padding: 5px; visibility: hidden;">Cảnh báo: Nhiệt độ thấp</div>
		<div id="CB3" style="text-align: center; font-size: 30px; color: white; font-weight: bold; padding: 5px; visibility: hidden;">Cảnh báo: Độ ẩm cao</div>
		<div id="CB4" style="text-align: center; font-size: 30px; color: white; font-weight: bold; padding: 5px; visibility: hidden;">Cảnh báo: Độ ẩm thấp</div>
		<a style="padding: 200px; padding-top: 20px" href="search.php">
		   <button>Tìm kiếm</button>
		</a>
		<br>
		<div style=" padding-left: 150px; padding-right: 150px;display: grid; grid-template-columns: auto auto auto auto auto;">
			<div class="grid-item">ID</div>
			<div class="grid-item">Nhiệt độ (°C)</div>
			<div class="grid-item">Độ ẩm (%)</div>
			<div class="grid-item">Nhiệt độ (°F)</div>
			<div class="grid-item">Thời gian</div>
<?php 
	$sql = "SELECT id, value1, value2, value3, reading_time FROM sensordata ORDER BY id DESC limit 30";

	if ($result = $conn->query($sql)) {
    	while ($row = $result->fetch_assoc()) {
        	$row_id = $row["id"];
        	$row_reading_time = $row["reading_time"];
        	$row_value1 = $row["value1"];
        	$row_value2 = $row["value2"]; 
        	$row_value3 = $row["value3"]; 
        	
		echo '
			<div class="grid-item sub">' . $row_id . '</div>
			<div class="grid-item sub">' . $row_value1 . '(°C)</div>
			<div class="grid-item sub">' . $row_value2 . '(%)</div>
			<div class="grid-item sub">' . $row_value3 . '(°F)</div>
			<div class="grid-item sub">' . $row_reading_time . '</div>';
		}
		$result->free();
		
	}
$conn->close();
?>
	
	<script>
		var $valu1 = KUTE.fromTo('#blob1', {path: '#blob1' }, { path: '#blob2' }, { repeat: true, duration: 1000, yoyo: true}).start();
		var $valu2 = KUTE.fromTo('#blob3', {path: '#blob3' }, { path: '#blob4' }, { repeat: true, duration: 1000, yoyo: true}).start();
		var $valu3 = KUTE.fromTo('#blob5', {path: '#blob5' }, { path: '#blob6' }, { repeat: true, duration: 1000, yoyo: true}).start();
		
    }
	</script>
	<script>
		var CanhBao1 = document.getElementById('CB1');
		var CanhBao2 = document.getElementById('CB2');
		var CanhBao3 = document.getElementById('CB3');
		var CanhBao4 = document.getElementById('CB4');
		var vl1 = '<?php echo (float)$value1; ?>';
		var vl2 = '<?php echo (float)$value2; ?>';
		if (vl1 > 35) {
			CanhBao1.style.visibility = "visible";
		}
		else if(vl1 < 18) {
			CanhBao2.style.visibility = "visible";
		}
		else {
			CanhBao1.style.visibility = "hidden";
			CanhBao2.style.visibility = "hidden";
		}

		if (vl2 > 80) {
			CanhBao3.style.visibility = "visible";
		}
		else if(vl2 < 40) {
			CanhBao4.style.visibility = "visible";
		}
		else {
			CanhBao3.style.visibility = "hidden";
			CanhBao4.style.visibility = "hidden";
		}

	</script>

</body>
</html>	