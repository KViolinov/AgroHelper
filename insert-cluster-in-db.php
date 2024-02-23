<?php
	session_start();
	
	include("connection.php");
	include("functions.php");
	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		
		            $cluster_id_var = $_POST['cluster_id'];
                    $cluster_name_var = $_POST['cluster_name1'];
                    $cluster_description_var = $_POST['cluster_description1'];
                    $cluster_geolocation1_var = $_POST['cluster_geolocation11'];
                    $cluster_geolocation2_var = $_POST['cluster_geolocation21'];
                    $cluster_critical_temperature_var = $_POST['cluster_critical_temperature1'];
                    $cluster_email_notation_var = $_POST['cluster_email_notation1'];
                    $cluster_phone_notation_var = $_POST['cluster_phone_notation1'];
                    $cluster_additional_description_var = $_POST['cluster_additional_description1'];
                    	$user_name_global = $_SESSION['user_name'];


		            

//                    echo $user_name_global;
//                    echo $cluster_id_var;
//                    echo $cluster_name_var;
//                    echo $cluster_description_var ;
//                    echo $cluster_geolocation1_var;
//                    echo $cluster_geolocation2_var ;
//                    echo $cluster_critical_temperature_var ;
//                    echo $cluster_email_notation_var ;
//                    echo $cluster_phone_notation_var ;
//                    echo $cluster_additional_description_var ;
 
 	        $cluster_id_var = random_num(20); 
			$query = "insert into clusters (cluster_id, user_id, cluster_name, cluster_description, cluster_geolocation1, cluster_geolocation2, cluster_critical_temperature, cluster_email_notation, cluster_phone_notation, cluster_additional_description) 
			values ('$cluster_id_var', '$user_name_global', '$cluster_name_var', '$cluster_description_var', '$cluster_geolocation1_var', '$cluster_geolocation2_var', '$cluster_critical_temperature_var', '$cluster_email_notation_var', '$cluster_phone_notation_var', '$cluster_additional_description_var')";
			
			mysqli_query($con, $query);
 
			header("Location: display-cluster.php");
			die;

	}
?>

