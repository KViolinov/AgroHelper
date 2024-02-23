<?php
session_start();

	$_SESSION;
	
	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);
    include("connection2.php");
	
	$id=$_REQUEST['id'];
	$user_name_global = $_SESSION['user_name'];	
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgreHelper - Редактиране на агрометеостанция</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

    

  </head>
  <body>
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <h1>Agrohelper</h1>
        </header>
        
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">
          <ul>
            <li><a href="index.php"><i class="fa fa-home fa-fw"></i>Табло за наблюдение</a></li>
            <li><a href="data-visualization.php"><i class="fa fa-database fa-fw"></i>Визуализация</a></li>
            <!--<li><a href="maps.php"><i class="fa fa-map-marker fa-fw"></i>Карта</a></li>-->
            <li><a href="display-cluster.php" ><i class="fa fa-sliders fa-fw"></i>Клъстери</a></li>
            <li><a href="display-device.php" class="active"><i class="fa fa-sliders fa-fw"></i>Агрометеостанции</a></li>
            <li><a href="about.php"><i class="fa fa-users fa-fw"></i>За нас</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                 <li><a href="display-device.php" >Визуализация на агрометеостанции</a></li>
                 <li><a href="add-device.php" >Добавяне на агрометеостанция</a></li>
                 <!--<li><a href="edit-device.php" class="active">Настройки </a></li>
                 <li><a href="delete-device.php">Изтриване на агрометеостанция</a></li>-->
                </ul>
            </nav>
          </div>
        </div>
        
        
        
         <?php
      
      try{
  
        $sql = "SELECT * FROM kvbbgcom_agrohelper.devices WHERE `user_id`='$user_name_global' and `id`='$id'";
        $result = $pdo->query($sql);
        
      //echo $id;
        
        if ($result->rowCount() > 0){
            while($row = $result->fetch()){
                    //$device_id_var = $row["device_id"];
                    $device_name_var= $row["device_name"];
                    $device_mac_var = $row["device_mac"];
                    $device_description_var = $row["device_description"];
                    $device_cluster_var = $row['cluster_id'];
                    $device_geolocation1_var = $row["device_geolocation_1"];
                    $device_geolocation2_var = $row["device_geolocation_2"];
                    $device_wifi_network_name_var = $row["device_wifi_network_name"];
                    $device_wifi_network_password_var = $row["device_wifi_network_password"];
                    $device_additional_description_var = $row["device_additional_description"];
            
            
              
           //         echo $device_name_var;
           //         echo $device_mac_var;
           //         echo $device_description_var ;
           //         echo $device_geolocation1_var;
           //         echo $device_geolocation2_var;
           //         echo $device_wifi_network_name_var;
           //         echo $device_wifi_network_password_var ;
           //         echo $device_additional_description_var;
            
            }
               
            unset($result);
        } else {
            echo "no records matching your query were found.";
        }
      } catch(PDOExeption $e){
          die("Error: could not able to execute $sql. ". $e->getMessage());
      } 
      
      unset($pdo);
      ?>
      
         
              
        
        
        
        
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Редактиране на информация за асоциирана агрометеостанция</h2>
            <p>Страницата позволява редакция на информация за асоциираните агрометеостанции.</p>
            <form action="update-device-in-db.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
               <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputDeviceName">Име на агрометеостанцията</label>
                    <input type="text" class="form-control" id="inputDeviceName" name="device_name1" value=<?php echo str_replace([' ', "\t"], ['&nbsp;', '&nbsp;&nbsp;'], nl2br(htmlentities($device_name_var))) ?>>                  
                </div>
                </div>
                <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputDeviceDescription">Описание на агрометеостанцията</label>
                    <input type="text" class="form-control" id="inputDeviceDescription" name="device_description1" value=<?php echo str_replace([' ', "\t"], ['&nbsp;', '&nbsp;&nbsp;'], nl2br(htmlentities($device_description_var))) ?>>                  
                </div> 
              </div>
              
              
            <!-- да се добави четене от база данни с клъстери и да се предвиди падащо меню за избор -->
                <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputDeviceCluster">Принадлежност към клъстер</label>
                    <input type="number" class="form-control" id="inputDeviceCluster" name="device_cluster1" value=<?=$device_cluster_var;?>>                  
                </div> 
              </div>
                 
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputDeviceCoordinate1">Геолокация / Географска ширина (във формат 43.078151)</label>
                    <input type="text" class="form-control" id="inputDeviceCoordinate1" name="device_geolocation11" value=<?=$device_geolocation1_var;?>>                  
                </div>
                </div>
            <div class="row form-group">    
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputDeviceCoordinate2">Геолокация / Географска дължина (във формат 25.6272318)</label>
                    <input type="text" class="form-control" id="inputDeviceCoordinate2" name="device_geolocation21" value=<?=$device_geolocation2_var;?>>                  
                </div> 
              </div>
              
               <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputWiFiName">Име на безжичната мрежа, към която ще се свърже агрометеостанцията</label>
                    <input type="text" class="form-control" id="inputWiFiName" name="device_wifi_network_name1" value=<?php echo str_replace([' ', "\t"], ['&nbsp;', '&nbsp;&nbsp;'], nl2br(htmlentities($device_wifi_network_name_var))) ?>>                  
                </div>
                </div>
            <div class="row form-group">    
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputWiFiPassword">Парола за безжичната мрежа, към която ще се свърже агрометеостанцията</label>
                    <input type="text" class="form-control" id="inputWiFiPassword" name="device_wifi_network_password1" value=<?php echo str_replace([' ', "\t"], ['&nbsp;', '&nbsp;&nbsp;'], nl2br(htmlentities($device_wifi_network_password_var))) ?>>                  
                </div> 
              </div>
              
              
              <div class="row form-group">    
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputMAC">MAC адрес / сериен номер на агрометеостанцията</label>
                    <input type="text" class="form-control" id="inputMAC" name="device_mac1" value=<?php echo str_replace([' ', "\t"], ['&nbsp;', '&nbsp;&nbsp;'], nl2br(htmlentities($device_mac_var))) ?>>                  
                </div> 
              </div>
              
              
              
             
              </div>
                
                           
            
              
              
              <div class="form-group text-left">
                <button type="submit" class="templatemo-blue-button" name="id1"  value=<?=$id;?>>Актуализирай информация за агрометеостанция</button>
                <button type="reset" class="templatemo-white-button">Отказ</button>
              </div>                           
            </form>
          </div>
          <footer class="text-right">
            <p>Copyright &copy; 2023 AgroHelper 
            | Design: Template Mo</p>
          </footer>
        </div>
      </div>
    </div>

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>        <!-- jQuery -->
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>        <!-- Templatemo Script -->
  </body>
</html>
