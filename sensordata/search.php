<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://cdn.jsdelivr.net/npm/kute.js@2.1.2/dist/kute.min.js"></script>
	
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
?>
	<div class="spacer layer">
		
		<form action="search.php" style="padding: 20px;">
  			<label for="datesearch" style="font-weight: bold; font-size: 20px; color: white">Chọn ngày:</label><br>
  			<input type="date" name="search"><br>
  			<input type="submit" name="ok" value="Search"><br>
		</form>
		<a style="padding: 20px;" href="index.php">
		   <button>Quay lại trang chủ</button>
		</a>
		<br>
		<div style=" padding-left: 150px; padding-right: 150px;display: grid; grid-template-columns: auto auto auto auto auto;">
			<div class="grid-item">ID</div>
			<div class="grid-item">Nhiệt độ (°C)</div>
			<div class="grid-item">Độ ẩm (%)</div>
			<div class="grid-item">Nhiệt độ (°F)</div>
			<div class="grid-item">Thời gian</div>
<?php 
if (isset($_REQUEST['ok'])) {
	$date = $_GET['search'];
	$sql = "SELECT id, value1, value2, value3, reading_time FROM sensordata WHERE reading_time LIKE '%{$date}%' ORDER BY id DESC ";
	if (empty($date)){
		$sql = "SELECT id, value1, value2, value3, reading_time FROM sensordata WHERE reading_time ORDER BY id DESC LIMIT 30";
	}
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
}
$conn->close();
?>
		</div>
	</div>
</body>
</html>