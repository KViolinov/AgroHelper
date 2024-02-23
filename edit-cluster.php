<?php
session_start();

	$_SESSION;
	
	include("connection.php");
	include("functions.php");
	
	$user_data = check_login($con);
	include("connection2.php");
	
	$id=$_REQUEST['id'];
//	$user_name_current=$_REQUEST['user_name_current'];
	$user_name_global = $_SESSION['user_name'];
//	 $cluster_id_var = $_REQUEST['id'];
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgreHelper - Редактиране на клъстер</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
    Visual Admin Template
    https://templatemo.com/tm-455-visual-admin
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <h1>Agrohelper</h1>
        </header>
        <!--<div class="profile-photo-container">
          <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
          <div class="profile-photo-overlay"></div>
        </div>      -->
        <!-- Search box -->
        <!--
        <form class="templatemo-search-form" role="search">
          <div class="input-group">
              <button type="submit" class="fa fa-search"></button>
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
          </div>
        </form>
        -->
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">
          <ul>
            <li><a href="index.php"><i class="fa fa-home fa-fw"></i>Табло за наблюдение</a></li>
            <li><a href="data-visualization.php"><i class="fa fa-database fa-fw"></i>Визуализация</a></li>
            <!--<li><a href="maps.php"><i class="fa fa-map-marker fa-fw"></i>Карта</a></li>-->
            <li><a href="display-cluster.php" class="active"><i class="fa fa-sliders fa-fw"></i>Клъстери</a></li>
            <li><a href="display-device.php"><i class="fa fa-sliders fa-fw"></i>Агрометеостанции</a></li>
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
                 <li><a href="display-cluster.php" >Визуализация на клъстерите</a></li>
                 <li><a href="add-cluster.php" >Добавяне на клъстер</a></li>
                 <!--<li><a href="edit-cluster.php" class="active">Настройки на клъстер</a></li>
                 <li><a href="delete-cluster.php">Изтриване на клъстер</a></li>-->
                </ul>
            </nav>
          </div>
        </div>
        
        
         <?php
      
      try{
       //  echo $user_name_global;
//         echo $id;
        // echo $user_name_current;
         
      //$user_name_global = $_SESSION['user_name'];
        //  $cluster_id_var = $_REQUEST['id'];
          
        //$sql = "SELECT * FROM kvbbgcom_agrohelper.clusters WHERE `user_id`='$user_name_global' and `cluster_id`='$cluster_id_var'";
        $sql = "SELECT * FROM kvbbgcom_agrohelper.clusters WHERE `user_id`='$user_name_global' and `id`='$id'";
        $result = $pdo->query($sql);
        
      
        
        if ($result->rowCount() > 0){
            while($row = $result->fetch()){
                    //$cluster_id_var = $row["cluster_id"];
                    $cluster_name_var= $row["cluster_name"];
                    $cluster_description_var = $row["cluster_description"];
                    $cluster_geolocation1_var = $row["cluster_geolocation1"];
                    $cluster_geolocation2_var = $row["cluster_geolocation2"];
                    $cluster_critical_temperature_var = $row["cluster_critical_temperature"];
                    $cluster_email_notation_var = $row["cluster_email_notation"];
                    $cluster_phone_notation_var = $row["cluster_phone_notation"];
                    $cluster_additional_description_var = $row["cluster_additional_description"];
            
            
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
            <h2 class="margin-bottom-10">Редактиране на клъстер</h2>
            <p>Страницата позволява редактиране на информация за клъстер (група от агрометеостанции, който са разположени в близка географска локация или по друг избран от потребителя признак).</p>
            
           
            
            <!-- да добавя обработка-->
            <form action="update-cluster-in-db.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputKlusterName">Име на клъстера</label>
                    <input type="text" class="form-control" id="inputKlusterName" name="cluster_name1"  value=<?php echo str_replace([' ', "\t"], ['&nbsp;', '&nbsp;&nbsp;'], nl2br(htmlentities($cluster_name_var))) ?>>
                </div>
              </div>
                
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputKlusterDescription">Описание на клъстера</label>
                    <input type="text" class="form-control" id="inputKlusterDescription" name="cluster_description1"  value=<?php echo str_replace([' ', "\t"], ['&nbsp;', '&nbsp;&nbsp;'], nl2br(htmlentities($cluster_description_var))) ?>>                  
                </div> 
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputKlusterCoordinate1">Геолокация / Географска ширина (във формат 43.078151)</label>
                    <input type="text" class="form-control" id="inputKlusterCoordinate1" name="cluster_geolocation11"  value=<?=$cluster_geolocation1_var;?>>                  
                </div>
                </div>
            <div class="row form-group">    
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputKlusterCoordinate2">Геолокация / Географска дължина (във формат 25.6272318)</label>
                    <input type="text" class="form-control" id="inputKlusterCoordinate2" name="cluster_geolocation21"  value=<?=$cluster_geolocation2_var;?>>                  
                </div> 
              </div>
            
            <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputTemperature">Критична темтература за известяване (в градуси по Целзий)</label>
                    <input type="text" class="form-control" id="inputKlusterCoordinate1" name="cluster_critical_temperature1"  value=<?=$cluster_critical_temperature_var;?>>                  
                </div>
                </div>
            <div class="row form-group">    
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputemail">Електронна поща за известяване</label>
                    <input type="email" class="form-control" id="inputemail" name="cluster_email_notation1"  value=<?=$cluster_email_notation_var;?>>                  
                </div> 
              </div>
             
                     <div class="row form-group">    
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputphone">Телефон за известяване</label>
                    <input type="number" class="form-control" id="inputphone" name="cluster_phone_notation1"  value=<?=$cluster_phone_notation_var;?>>                  
                </div> 
              </div>
              
              

              
              </div>
                
                
        <!--      
                         <div class="row form-group">
                <div class="col-lg-12 form-group">                   
                    <label class="control-label" for="inputNote">Допълнителна информация</label>
                    <textarea class="form-control" type="text" id="inputNote" name="cluster_additional_description1"  value=<?php echo str_replace([' ', "\t"], ['&nbsp;', '&nbsp;&nbsp;'], nl2br(htmlentities($cluster_additional_description_var))) ?>></textarea>
                </div>
              </div>   
        -->      
             
              <div class="form-group text-left">
                <button type="submit" class="templatemo-blue-button" name="id1"  value=<?=$id;?>>Актуализирай данните на клъстера</button>
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
