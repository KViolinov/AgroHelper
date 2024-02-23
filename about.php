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
    <title>AgroHelper - За нас</title>
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
             <li><a href="index.php"><i class="fa fa-home fa-fw"></i>Табло за наблюдение</a></li>
            <li><a href="data-visualization.php"><i class="fa fa-database fa-fw"></i>Визуализация</a></li>
            <!--<li><a href="maps.php"><i class="fa fa-map-marker fa-fw"></i>Карта</a></li>-->
            <li><a href="display-cluster.php" ><i class="fa fa-sliders fa-fw"></i>Клъстери</a></li>
            <li><a href="display-device.php" ><i class="fa fa-sliders fa-fw"></i>Агрометеостанции</a></li>
            <li><a href="about.php"class="active"><i class="fa fa-users fa-fw"></i>За нас</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
             <!-- <ul class="text-uppercase">
                <li><a href="" class="active">Admin panel</a></li>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Overview</a></li>
                <li><a href="login.html">Sign in form</a></li>
              </ul>  -->
            </nav> 
          </div>
        </div> 
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-2">
              <i class="fa fa-times"></i>
              
              <h2><img class="media-object" src="images/logo.png" alt="logo"></h2><hr>
              <h3>
              <p>Настоящият проект цели да подпомогне решаването на един съществен проблем за селското стопанство, а именно: възможността за предпазване на растенията от пролетните слани.</p>
              <p>Основната цел на проекта е да се разработи цялостна платформа за събиране, агрегиране, анализ и визуализация на метеорологични данни, събрани в реално време чрез автоматизирана метеорологична станция, като основа за предсказване на локални неблагоприятни агрометеорологични явления (слани). </p>              
            </h3>
            </div>
            <div class="templatemo-content-widget white-bg col-1 text-center">
              <i class="fa fa-times"></i>
              <h2 class="text-uppercase">Автор</p></h2>
              <h3 class="text-uppercase margin-bottom-10">Константин Виолинов</h3>
               <a href="http://kvb-bg.com/home/konstantin.html"  target="_blank"> <img src="images/kosi2.jpg" alt="Bicycle" class="img-circle img-thumbnail"> </a>
              <h3>8 г клас</h3>
              <h3><a href="http://www.pmgvt.org/"  target="_blank">ПМГ "В. Друмев"</h3></а>
              <h3>Велико Търново</h3>
            </div>
            <div class="templatemo-content-widget white-bg col-1 text-center">
              <i class="fa fa-times"></i>
              <h2 class="text-uppercase">Консултант</h2> </br>
              <h3 class="text-uppercase margin-bottom-10">Георги Игнатов</h3></br>
              <img src="images/ignatov.jpg" alt="Bicycle" class="img-circle img-thumbnail"></br></br></br>
              <h3>старши учител</h3>
              <h3><a href="http://www.pmgvt.org/"  target="_blank">ПМГ "В. Друмев"</h3></а>
              <h3>Велико Търново</h3>
            </div>
            
          </div>
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="templatemo-content-widget white-bg">
                <i class="fa fa-times"></i>                
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/logo1.png" alt="logo">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase"><B>Планирана функционалност</B></h2>
                    <p></p><p>
                        <h4><br><br><b>
                        Платформата „AgroHelper – Frost Preventing System“ включва:</b><p><br><br>

1. Автономна агрометеостанция, базирана на ESP32 и DHT сензори, с възможност за WiFi, GSM и LoRa комуникация </p>

<p>2. Web платформа с интуитивен дизайн и български интерфейс, позволяваща:</p>
<p> - Управление на множество автономни агрометеостанции</p>
<p> - Обединяване на агрометеостанции в клъстери</p>
<p> - Визуализация на събраните данни от агрометеостанциите</p>
<p> - Съпоставяне на събраните с исторически метеоданни и данни от външни източници, с цел прогнозиране на вероятността за възникване на слана</p>
<p> - Възможности за активно известяване при настъпване на ключови събития (определени нива на температура и влажност)</p>
<p> - Възможности за дистанционно задействане на системи за активна превенция на слани (системи за дъждуване, автоматизирани газови горелки)</p>

                        </p>
                        </h4>
                  </div>        
                </div>                
              </div>            
              
              <!--
              <div class="templatemo-content-widget white-bg">
                <i class="fa fa-times"></i>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/logo1.png" alt="logot">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">Концептуална идея</h2>
                      <img src="images/shema1.png" width="600" height="300" alt="shema">
                    <p></p>  
                  </div>
                </div>                
              </div>            
            </div>
            
           </div> -->
           
           <!-- Second row ends -->
           
           
             <div class="templatemo-content-widget white-bg">
                <i class="fa fa-times"></i>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/logo1.png" alt="logot">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">Концептуална идея</h2>
                      <center><img src="images/AgroHelper2.gif" width="800" height="500" alt="shema"></center>
                    <p></p>  
                  </div>
                </div>                
              </div>            
            </div>
            </div> <!-- Second row ends -->
            
           
         
          <footer class="text-right">
            <p>Copyright &copy; 2023 AgroHelper 
            | Design: Template Mo</p>
          </footer>         
        </div>
      </div>
    </div>
    
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
    <script>
      /* Google Chart 
      -------------------------------------------------------------------*/
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart); 
      
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Topping');
          data.addColumn('number', 'Slices');
          data.addRows([
            ['Mushrooms', 3],
            ['Onions', 1],
            ['Olives', 1],
            ['Zucchini', 1],
            ['Pepperoni', 2]
          ]);

          // Set chart options
          var options = {'title':'How Much Pizza I Ate Last Night'};

          // Instantiate and draw our chart, passing in some options.
          var pieChart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
          pieChart.draw(data, options);

          var barChart = new google.visualization.BarChart(document.getElementById('bar_chart_div'));
          barChart.draw(data, options);
      }

      $(document).ready(function(){
        if($.browser.mozilla) {
          //refresh page on browser resize
          // http://www.sitepoint.com/jquery-refresh-page-browser-resize/
          $(window).bind('resize', function(e)
          {
            if (window.RT) clearTimeout(window.RT);
            window.RT = setTimeout(function()
            {
              this.location.reload(false); /* false to get page from cache */
            }, 200);
          });      
        } else {
          $(window).resize(function(){
            drawChart();
          });  
        }   
      });
      
    </script>
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>