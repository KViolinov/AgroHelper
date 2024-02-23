<?php
    $username = "kvbbgcom_kosi";
    $password = "kv0889909595";
    $datebase = "kvbbgcom_agrohelper";
    
    try{
        $pdo = new PDO("mysql:host=localhost;database=$datebase", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e){
        die("Error: could not connect. " . $e->getMessage());
    }

?>



<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> 1 creating db connection | chart js mysql database series</title>
        
        <style type="text/css">
            .chartBox {
                width: 1600px;
            }
        </style>
    </head>
    <body>
      
      
      <?php
      
      try{
        $sql = "SELECT * FROM kvbbgcom_agrohelper.sensor_data";
        $result = $pdo->query($sql);
        
        if ($result->rowCount() > 0){
            $tempArray = array();
            
            while($row = $result->fetch()){
                $tempArray[] = $row["temperature"];
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
      
      
      
      
        <div class="chartBox">
        <canvas id="myChart"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        
        //setup block
        const temperature = <?php echo json_encode($tempArray); ?>;
        const data = {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'ABC', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17','18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49',],
                datasets: [{
                label: '# of Votes',
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
        
        //render
        const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
</script>

 
        
    </body>
</html>    
    
    
    