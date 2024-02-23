<?php
session_start();
	
	include("connection.php");
	include("functions.php");
	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
			//read from db
			 
			$query = "select * from users where user_name = '$user_name' limit 1";
			
			$result = mysqli_query($con, $query);
			
			if($result){
				if($result && mysqli_num_rows($result) > 0)
					{
						$user_data = mysqli_fetch_assoc($result);
						
						if($user_data['password'] === $password){
							
							$_SESSION['user_id'] = $user_data['user_id'];
							$_SESSION['user_name'] = $user_data['user_name'];
							header("Location: index.php");
							die;
						}
					}
				}
			}
			
			echo "wrong username or password!";
		}
		else {
			echo "Please enter some valid information";
		}
		
	
?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	    <link rel="stylesheet" href="css/login.css">
	    <title>AgroHelper - Login</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">
        <!-- 
        Visual Admin Template
        https://templatemo.com/tm-455-visual-admin
        -->
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
	    <link href="css/font-awesome.min.css" rel="stylesheet">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <!--<link href="css/templatemo-style.css" rel="stylesheet">-->
	    
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body class="light-gray-bg">
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	          <h1><b>AgroHelper</b></h1>
	          <h1>Вход в системата</h1>
	        </header>
			

	        <form method ="post" class="templatemo-login-form">
	        
	        <!--	
	        	<div class="form-group">
	        		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
		  <img src="images/AgroHelper.jpg" width="200"> 
	            	</div>
	        	</div>
	        	-->
	        	
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>	        		
		              	<input id="text" type="text" class="form-control" name="user_name">           
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>	        		
		              	<input id="text" type="password" class="form-control" name="password">           
		          	</div>	
	        	</div>	          	
	          	<div class="form-group">
				    <div class="checkbox squaredTwo">
				        <input type="checkbox" id="c1" name="cc" />
						<label for="c1"><span></span>Запомни ме</label>
				    </div>				    
				</div>
				<div class="form-group">
					<button type="submit" class="templatemo-blue-button width-100" value="Login">Вход в системата</button>
				</div>
	        </form>
		
		
		</div>
		<!--
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>Не си регистриран още? <strong><a href="signup.php" class="blue-text">Регистрирай се сега!</a></strong></p>
		</div> -->
	
		
	
		
		
		
	</body>
</html>