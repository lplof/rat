<!DOCTYPE html>
<html>
<body>

<?php
 $id = $_GET["code"];
include 'DatabaseConfig.php' ;
 
 $conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `clm_date`,`clm_msg` FROM `tbl_smslogs` WHERE clm_device_number=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
         echo "<tr>";
       echo "<td>"."  Date : " .  $row["clm_date"] ."</td>"."<br>";
        echo "<td>"." From : " .  $row["clm_from"] ."</td>"."<br>";
       echo "<td>"."  Message : ".$row["clm_msg"] ."</td>"."<br>";

        echo "<tr>"."<--------------------------------EOLINE----------------------------------->";

        echo "</tr>";
    }
    
} else {
    echo "No SMS found! Please add the command again!";
}