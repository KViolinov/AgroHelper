<?php
session_start();

	$_SESSION;
	
	include("connection.php");
	include("functions.php");
	
	$user_data = check_login($con);
	include("connection2.php");
	$user_name_global = $_SESSION['user_name'];
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgreHelper - Визуализация на агрометеостанция</title>
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
        <!--<div class="profile-photo-container">
          <img src="images/AgroHelper.jpg" alt="Agrohelper" class="img-responsive">  
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
                 <li><a href="display-device.php" class="active">Визуализация на агрометеостанции</a></li>
                 <li><a href="add-device.php" >Добавяне на агрометеостанция</a></li>
                 <!--<li><a href="edit-device.php" >Настройки </a></li>
                 <li><a href="delete-device.php">Изтриване на агрометеостанция</a></li>-->
                </ul>
            </nav>
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Информация за асоциираните агрометеостанции</h2>
            <p>Страницата визуализира информация за асоциираните агрометеостанции.</p>
            
              <div class="row form-group">
            
            
              <!-- показване на таблица-->         
            
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Номер на агрометеостанцията</strong></th>
<th><strong>Име на агрометеостанцията</strong></th>
<th><strong>Описание на агрометеостанцията</strong></th>
<th><strong>Редактиране</strong></th>
<th><strong>Изтриване</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;


$sql="SELECT * FROM kvbbgcom_agrohelper.devices WHERE `user_id`=?";
//echo $user_name_global;
$stmt = $con->prepare($sql); 
$stmt->bind_param("s", $user_name_global); //i for integer, d for double (float), s for string, b for blobs;
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result



while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $row["device_id"]; ?></td>
<td align="center"><?php echo $row["device_name"]; ?></td>
<td align="center"><?php echo $row["device_description"]; ?></td>
<td align="center">
<a href="edit-device.php?id=<?php echo $row["id"]; ?>&user_name_current=<?php echo $user_name_global; ?>">Редактиране</a>
</td>
<td align="center">
<a href="delete-device.php?id=<?php echo $row["id"]; ?>&user_name_current=<?php echo $user_name_global; ?>">Изтриване</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
            
      <!-- край на таблицата-->    
              
              
              
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
