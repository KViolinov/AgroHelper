<?php
	session_start();
	
	include("connection.php");
	include("functions.php");
	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		
		            //$cluster_id_var = $_POST['cluster_id'];
                    $id = $_POST['id1'];
                    $cluster_name_var = $_POST['cluster_name1'];
                    $cluster_description_var = $_POST['cluster_description1'];
                    $cluster_geolocation1_var = (float)$_POST['cluster_geolocation11'];
                    $cluster_geolocation2_var = (float)$_POST['cluster_geolocation21'];
                    $cluster_critical_temperature_var = intval($_POST['cluster_critical_temperature1']);
                    $cluster_email_notation_var = $_POST['cluster_email_notation1'];
                    $cluster_phone_notation_var = $_POST['cluster_phone_notation1'];
                    $cluster_additional_description_var = $_POST['cluster_additional_description1'];
                    	$user_name_global = $_SESSION['user_name'];


		            
                    //echo $id;
                    //echo $user_name_global;
                    //echo $cluster_id_var;echo "<br>";
                    //echo $cluster_name_var;echo "<br>";
                    //echo $cluster_description_var ;echo "<br>";
                    //echo $cluster_geolocation1_var;echo "<br>";
                    //echo $cluster_geolocation2_var ;echo "<br>";
                    //echo $cluster_critical_temperature_var ;echo "<br>";
                    //echo $cluster_email_notation_var ;echo "<br>";
                    //echo $cluster_phone_notation_var ;echo "<br>";
                    //echo $cluster_additional_description_var ;echo "<br>";
 
 	         
			$query = "UPDATE clusters SET cluster_name = '$cluster_name_var', cluster_description = '$cluster_description_var', cluster_geolocation1 = '$cluster_geolocation1_var', cluster_geolocation2 = '$cluster_geolocation2_var', cluster_critical_temperature = '$cluster_critical_temperature_var', cluster_email_notation = '$cluster_email_notation_var', cluster_phone_notation = '$cluster_phone_notation_var', cluster_additional_description = '$cluster_additional_description_var' WHERE id='$id'";
			
        	mysqli_query($con, $query);
 
			header("Location: display-cluster.php");
			die;

	}
?>

