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

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <?php  $resu = mysqli_fetch_array($resultu); 
    $uAccountNo = $resu['uAccountNo'];
            ?>
    <?php

include_once("connection.php");

$resultw = "SELECT
  YEAR(Date) AS YEAR, MONTH(Date) AS MONTH, SUM(Amount) AS Total_Paid
FROM transactions
WHERE uAccountNo = '$uAccountNo'
GROUP BY YEAR(Date), MONTH(Date)
ORDER BY YEAR(Date) DESC, MONTH(Date) DESC";
   
$resultw = mysqli_query($conn, $resultw);

    $resultc = "SELECT
  YEAR(Date) AS YEAR, MONTH(Date) AS MONTH, SUM(Amount) AS Recharged
FROM card_recharge
WHERE uAccountNo = '$uAccountNo'
GROUP BY YEAR(Date), MONTH(Date)
ORDER BY YEAR(Date) DESC, MONTH(Date) DESC";
   
$resultc = mysqli_query($conn, $resultc);


?>
    <div class="container">
        <h1>Monthly Transactions</h1>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Total Paid</th>
                        </tr>
                    </thead>
                    <?php 
                    while($res = mysqli_fetch_array($resultw)) {
                        if($res['MONTH']<= date("m") && $res['YEAR']<(date("Y")))
 {
 	break;
 }
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $res['YEAR']; ?>
                            </td>
                            <td>
                                <?php echo $res['MONTH']; ?>
                            </td>
                            <td>
                                <?php echo $res['Total_Paid'];?>
                            </td>
                        </tr>
                    </tbody>
                    <?php   
                    }
                    ?>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
        <h1>Monthly Recharges</h1>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Total Paid</th>
                        </tr>
                    </thead>
                    <?php 
                    while($resc = mysqli_fetch_array($resultc)) { 
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $resc['YEAR']; ?>
                            </td>
                            <td>
                                <?php echo $resc['MONTH']; ?>
                            </td>
                            <td>
                                <?php echo $resc['Recharged'];?>
                            </td>
                        </tr>
                    </tbody>
                    <?php   
                    }
                    ?>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>

</html>
