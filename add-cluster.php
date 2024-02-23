<?php
session_start();
	$_SESSION;
	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgreHelper - Добавяне на клъстер</title>
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
                 <li><a href="add-cluster.php" class="active">Добавяне на клъстер</a></li>
                 <!--<li><a href="edit-cluster.php" >Настройки на клъстер</a></li>
                 <li><a href="delete-cluster.php">Изтриване на клъстер</a></li>-->
                </ul>
            </nav>
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Добавяне на клъстер</h2>
            <p>Страницата позволява обединяването в клъстер на групи от агрометеостанции, който са разположени в близка географска локация или по друг избран от потребителя признак.</p>
            <form action="insert-cluster-in-db.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputKlusterName">Име на клъстера</label>
                    <input type="text" class="form-control" id="inputKlusterName" name="cluster_name1" placeholder="Клъстер 1">                  
                </div>
                </div>
                <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputKlusterDescription">Описание на клъстера</label>
                    <input type="text" class="form-control" id="inputKlusterDescription" name="cluster_description1" placeholder="Овощна градина с. Умаревци">                  
                </div> 
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputKlusterCoordinate1">Геолокация / Географска ширина (във формат 43.078151)</label>
                    <input type="text" class="form-control" id="inputKlusterCoordinate1" name="cluster_geolocation11" placeholder="43.078151">                  
                </div>
                </div>
            <div class="row form-group">    
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputKlusterCoordinate2">Геолокация / Географска дължина (във формат 25.6272318)</label>
                    <input type="text" class="form-control" id="inputKlusterCoordinate2" name="cluster_geolocation21" placeholder="25.6272318">                  
                </div> 
              </div>
             
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputTemperature">Критична темтература за известяване (в градуси по Целзий)</label>
                    <input type="text" class="form-control" id="inputKlusterCoordinate1" name="cluster_critical_temperature1" placeholder="3">                  
                </div>
                </div>
            <div class="row form-group">    
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputemail">Електронна поща за известяване</label>
                    <input type="email" class="form-control" id="inputemail" name="cluster_email_notation1" placeholder="agrohelper@gmail.com">                  
                </div> 
              </div>
             
                     <div class="row form-group">    
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputphone">Телефон за известяване</label>
                    <input type="text" class="form-control" id="inputphone" name="cluster_phone_notation1" placeholder="0888 888 888">                  
                </div> 
              </div>
             
             
              </div>
                
                
          <!--    
              <div class="row form-group">
                <div class="col-lg-12 form-group">                   
                    <label class="control-label" for="inputNote">Допълнителна информация</label>
                    <textarea class="form-control" id="inputNote" name="cluster_additional_description1" rows="3"></textarea>
                </div>
              </div>
              
              -->
              
              
              <div class="form-group text-left">
                <button type="submit" class="templatemo-blue-button">Създаване на клъстер</button>
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
