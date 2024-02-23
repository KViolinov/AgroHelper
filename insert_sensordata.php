<?php
 
if(isset($_GET["temperature"])) {
   $temperature = $_GET["temperature"];
   $humidity = $_GET["humidity"];    // get temperature value from HTTP GET
   $macAdress = $_GET["mac"];    // get temperature value from HTTP GET
 // da definirame i syglasuwame imenata na promenliwite s ESP32
 
 
   $servername = "localhost";
   $username = "kvbbgcom_kosi";
   $password = "kv0889909595";
   $database_name = "kvbbgcom_agrohelper";
 //imeto i parolata na bazata danni
 
 
   // Create MySQL connection fom PHP to MySQL server
   $connection = new mysqli($servername, $username, $password, $database_name);
   // Check connection
   if ($connection->connect_error) {
      die("MySQL connection failed: " . $connection->connect_error);
   }
 
   $sql = "INSERT INTO `sensor_data`(`device_id`, `temperature`, `humidity`) VALUES ('$macAdress','$temperature','$humidity')";
   
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