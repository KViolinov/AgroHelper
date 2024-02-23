<?php
session_start();

	$_SESSION;
	
	include("connection.php");
	include("functions.php");
	
	$user_data = check_login($con);
		include("connection2.php");
?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>AgroHelper - Визуализация на данните</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
        <style type="text/css">
        .chartCard {
        width: 50vw;
        height: calc(30vh - 10px);
        background: rgba(0, 0, 0, 0);
        margin:30px auto;
        display: flex;
        align-items: center;
        justify-content: center;}
        
            .chartBox {
                width: 700px;
                padding: 20px;
                border-radius: 20px;
                border: solid 3px rgba(57, 173, 180, 1);
                background: white;
                
            }
        </style>
        
        
      <?php
      
      try{
        $sql = "SELECT * FROM kvbbgcom_agrohelper.sensor_data";
        $result = $pdo->query($sql);
        
        if ($result->rowCount() > 0){
            $tempArray = array();
            $humidityArray = array();
            $DateArray = array();
            
            while($row = $result->fetch()){
                $tempArray[] = $row["temperature"];
                $humidityArray[] = $row["humidity"];
                $DateArray[] = $row["date"];
              //   echo $row["temperature"];
            
            }
            // print_r($tempArray);     
            unset($result);
        } else {
            echo "no records matching your query were found.";
        }
      } catch(PDOExeption $e){
          die("Error: could not able to execute $sql. ". $e->getMessage());
      } 
      
      unset($pdo);
      ?>
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
          <h1>AgroHelper</h1>
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
             <li><a href="index.php" class="active"><i class="fa fa-home fa-fw"></i>Табло за наблюдение</a></li>
            <li><a href="data-visualization.php"><i class="fa fa-database fa-fw"></i>Визуализация</a></li>
            <!--<li><a href="maps.php"><i class="fa fa-map-marker fa-fw"></i>Карта</a></li>-->
            <li><a href="display-cluster.php" ><i class="fa fa-sliders fa-fw"></i>Клъстери</a></li>
            <li><a href="display-device.php" ><i class="fa fa-sliders fa-fw"></i>Агрометеостанции</a></li>
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
                <li><a href="" class="active">Текуща агрометеостанция</a></li>
               <!-- <li><a href="data-visualization_boards.php">Boards</a></li>
                <li><a href="data-visualization_settings.php">Settings</a></li>-->
                <!--<li><a href="login.html">Sign in form</a></li>-->
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">         
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Визуализация на данните</h2>
              <div class="panel-body">
                  
                  

                  
                  
                  
                  
                  
                  
                  
                  <div class="panel panel-default no-border">
<!--времето 1
                <div >
                  <div id="ww_256c2ee75e626" v='1.3' loc='auto' a='{"t":"horizontal","lang":"bg","sl_lpl":1,"ids":[],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'>Weather Data Source: <a href="https://oneweather.org/" id="ww_256c2ee75e626_u" target="_blank">Weather</a></div><script async src="https://app1.weatherwidget.org/js/?id=ww_256c2ee75e626"></script>
                
                
                </div>
                
                <br>-->
<!-- времето 2              
                <a class="weatherwidget-io" href="https://forecast7.com/bg/43d0825d62/veliko-tarnovo/" data-label_1="VELIKO TARNOVO" data-label_2="WEATHER" data-theme="original" >VELIKO TARNOVO WEATHER</a>
                <script>
                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                </script>

<br>-->  
<!--времето 3
<script>
        (function(d, s, id) {
            if (d.getElementById(id)) {
                if (window.__TOMORROW__) {
                    window.__TOMORROW__.renderWidget();
                }
                return;
            }
            const fjs = d.getElementsByTagName(s)[0];
            const js = d.createElement(s);
            js.id = id;
            js.src = "https://www.tomorrow.io/v1/widget/sdk/sdk.bundle.min.js";

            fjs.parentNode.insertBefore(js, fjs);
        })(document, 'script', 'tomorrow-sdk');
        </script>

        <div class="tomorrow"
           data-location-id=""
           data-language="BG"
           data-unit-system="METRIC"
           data-skin="light"
           data-widget-type="upcoming"
           style="padding-bottom:22px;position:relative;"
        >
          <a
            href="https://www.tomorrow.io/weather-api/"
            rel="nofollow noopener noreferrer"
            target="_blank"
            style="position: absolute; bottom: 0; transform: translateX(-50%); left: 50%;"
          >
            <img
              alt="Powered by the Tomorrow.io Weather API"
              src="https://weather-website-client.tomorrow.io/img/powered-by.svg"
              width="250"
              height="18"
            />
          </a>
        </div>
        
        <br>-->
        <!--времето 4-->
        <div id="id781e115481881" a='{"t":"g7bs","v":"1.2","lang":"en","locs":[2840],"ssot":"c","sics":"ds","cbkg":"rgba(255,255,255,0)","cfnt":"rgb(0,0,0)","cend":"rgba(0,0,0,0)"}'>Weather Data Source: <a href="https://sharpweather.com/weather_veliko_tarnovo/30_days/">sharpweather.com/weather_veliko_tarnovo/30_days/</a></div><script async src="https://static1.sharpweather.com/widgetjs/?id=id781e115481881"></script>
        <!--край на времето-->
              
                    
                <div >
                <h2><br></h2>
              </div>

              <div class="panel-heading border-radius-10">
                <h2>Температура / Влажност</h2>
              </div>
              <div class="panel-body">
                <div class="templatemo-flex-row flex-content-row margin-bottom-30">
                  <div class="col-1">
                    
                    
                    
                             
                    <div class="chartCard">
                                            <div class="chartBox">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                            
                                            
                                            <div class="chartBox">
                                                <canvas id="myChart1"></canvas>
                                            </div>
                                            </div>
                                            
                                            
                                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                            <script>
                                            
                                            //setup block
                                            const temperature = <?php echo json_encode($tempArray); ?>;
                                            const DateLabels = <?php echo json_encode($DateArray); ?>;
                                            const data = {
                                            labels: DateLabels,
                                                    datasets: [{
                                                    label: 'Измерена температура',
                                                        data: temperature,
                                                        backgroundColor: [
                                                            //'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            //'rgba(255, 206, 86, 0.2)',
                                                            //'rgba(75, 192, 192, 0.2)',
                                                            //'rgba(153, 102, 255, 0.2)',
                                                            //'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            //'rgba(255, 99, 132, 1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            //'rgba(255, 206, 86, 1)',
                                                            //'rgba(75, 192, 192, 1)',
                                                            //'rgba(153, 102, 255, 1)',
                                                            //'rgba(255, 159, 64, 1)'
                                                        ],
                                                            borderWidth: 1
                                                        }]
                                            }
                                            
                                            
                                            
                                              //setup block
                                            const humidity = <?php echo json_encode($humidityArray); ?>;
                                            const data1 = {
                                            labels: DateLabels,
                                                    datasets: [{
                                                    label: 'Измерена влажност',
                                                        data: humidity,
                                                        backgroundColor: [
                                                            //'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            //'rgba(255, 206, 86, 0.2)',
                                                            //'rgba(75, 192, 192, 0.2)',
                                                            //'rgba(153, 102, 255, 0.2)',
                                                            //'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            //'rgba(255, 99, 132, 1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            //'rgba(255, 206, 86, 1)',
                                                            //'rgba(75, 192, 192, 1)',
                                                            //'rgba(153, 102, 255, 1)',
                                                            //'rgba(255, 159, 64, 1)'
                                                        ],
                                                            borderWidth: 1
                                                        }]
                                            }
                                            
                                            
                                            //config
                                            const config = {
                                                
                                                type: 'bar',
                                                data,
                                                options: {
                                                    
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                             }
                                                        }
                                                    }
                                                
                                            };
                                            
                                            
                                            const config1 = {
                                                
                                                type: 'line',
                                                data: data1,
                                                options: {
                                                    
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                             }
                                                        }
                                                    }
                                                
                                            };
                                            
                                            
                                            
                                            //render
                                            const myChart = new Chart(
                                          document.getElementById('myChart'),
                                          config
                                        );
                                        
                                            const myChart1 = new Chart(
                                          document.getElementById('myChart1'),
                                          config1
                                        );
                                        
                                    </script>
                                    
                                    
                    
                    
                    
                    
                  </div>              
                </div>     
              </div>
            </div>            
            
              </div>
            </div>            
            <div class="panel panel-default no-border">
              <div class="panel-heading border-radius-10">
                <div class="templatemo-flex-row flex-content-row">
            </div>
          </div>
          <footer class="text-right">
            <p>Copyright &copy; 2023 AgroHelper 
            | Design: Template Mo</p>
          </footer>         
        </div>
      </div>
    </div>
    
  </body>
</html>