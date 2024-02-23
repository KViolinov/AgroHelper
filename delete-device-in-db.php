<?php
	session_start();
	
	include("connection.php");
	include("functions.php");
	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		
		           
		             $id = $_POST['id1'];
                    $device_name_var = $_POST['device_name1'];
                    $device_description_var = $_POST['device_description1'];
                    $device_geolocation1_var = $_POST['device_geolocation11'];
                    $device_geolocation2_var = $_POST['device_geolocation21'];
                    $device_wifi_network_name_var = $_POST['device_wifi_network_name1'];
                    $device_wifi_network_password_var = $_POST['device_wifi_network_password1'];
                    $device_mac_var = $_POST['device_mac1'];
                    $device_additional_description_var = $_POST['device_additional_description1'];
                    
                    	$user_name_global = $_SESSION['user_name'];
		            

//echo $user_name_global;echo '<br>';
  //                 echo $id;echo '<br>';
    //               echo $device_id_var;echo '<br>';
      //             echo $device_name_var;echo '<br>';
        //           echo $device_description_var ;echo '<br>';
          //         echo $device_geolocation1_var;echo '<br>';
            //       echo $device_geolocation2_var ;echo '<br>';
              //     echo $device_wifi_network_name_var ;echo '<br>';
                //   echo $device_wifi_network_password_var ;echo '<br>';
                  // echo $device_mac_var ;echo '<br>';
                   //echo $device_additional_description_var ; echo '<br>';
 
 
 	        
 	        
 	        
 	        
			$query = "DELETE FROM devices WHERE id=$id";
			
			mysqli_query($con, $query);
 
			header("Location: display-device.php");
			die;
//
	}
?>

