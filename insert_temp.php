<?php
 
if(isset($_GET["temperature"])) {
   $temperature = $_GET["temperature"]; // get temperature value from HTTP GET
 // da definirame i syglasuwame imenata na promenliwite s ESP32
 
 
   $servername = "localhost";
   $username = "root";
   $password = "0889909595";
   $database_name = "testingdb";
 //imeto i parolata na bazata danni
 
 
   // Create MySQL connection fom PHP to MySQL server
   $connection = new mysqli($servername, $username, $password, $database_name);
   // Check connection
   if ($connection->connect_error) {
      die("MySQL connection failed: " . $connection->connect_error);
   }
 
   $sql = "INSERT INTO tbl_temp (temp_value) VALUES ($temperature)";
 // da se dopylni zaqwkata s ostanalite promenliwi i stojnosti
 
 
   if ($connection->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . $connection->error;
   }
 
   $connection->close();
} else {
   echo "temperature is not set in the HTTP request";
}
?>