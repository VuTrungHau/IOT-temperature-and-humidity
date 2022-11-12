<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sensordata";


if(!empty($_POST['value1'])  && !empty($_POST['value2']) && !empty($_POST['value3']) && $_POST['value1'] > 0){
    
    $value1 = $_POST["value1"];
    $value2 = $_POST["value2"];
    $value3 = $_POST["value3"];


    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO SensorData (value1, value2, value3)
    VALUES ('" . $value1 . "', '" . $value2 . "', '" . $value3 . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}  