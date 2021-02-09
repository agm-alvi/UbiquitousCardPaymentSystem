<?php

if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
require 'connection.php';
include 'connection.php';
$username = $_SESSION["username"];
$resultu = "SELECT * FROM customers U where U.username = '".$username."' ";
$resultu = mysqli_query($conn, $resultu);
 $resu = mysqli_fetch_array($resultu); 
       $uAccountNo = $resu['uAccountNo'];
        
?>

<?php

        // $sql ="SELECT * FROM gas_uses WHERE id = 101";

$sql = "SELECT
  YEAR(Date) AS YEAR, MONTH(Date) AS MONTH, SUM(Amount) AS Total_Paid
FROM transactions
WHERE uAccountNo = '$uAccountNo'
GROUP BY YEAR(Date), MONTH(Date)
ORDER BY YEAR(Date) DESC, MONTH(Date) DESC";
 
         $result = mysqli_query($conn,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
 if($row['MONTH']== date("m") && $row['YEAR']==(date("Y")-1))
 {
 	break;
 }
            $duration[]  = $row['MONTH']." ".$row['YEAR']  ;
            $data[] = $row['Total_Paid'];
        }
 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title> 
        <style type="text/css">
        	body{
        		margin-left: 50px;
        	}
        </style>
    </head>
    <body>
        <div style="width:60%;hieght:20%;text-align:center">
            <h2 class="page-header" >Monthly Transaction Graph </h2>
            <div>Transaction in last 12 Months</div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($duration); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                
                                "#9422f6",
                                "#ffc750",
                                "#ff6347",
                                "#7040fa",
                                
                                "#9ce6ae",
                                "#ff69b4",
                                "#660057",
                                
                                "#966f33",
                                "#33924a"
                            ],
                            data:<?php echo json_encode($data); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>