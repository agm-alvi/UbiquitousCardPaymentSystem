<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
require 'connection.php';
include 'connection.php';
$name = $_SESSION["username"];
$resultu = "SELECT * FROM customers U where U.username = '".$name."' ";
$resultu = mysqli_query($conn, $resultu);

$result = "SELECT * FROM transactions T, customers U where T.u_id = U.u_id && U.username = '".$name."'";
$result = mysqli_query($conn, $result);


$resultr = "SELECT * FROM card_recharge C, customers U where C.u_id = U.u_id && U.username = '".$name."'";
$resultr = mysqli_query($conn, $resultr);


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>User Profile || UCPS</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="img/titleIcon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/profilePageStyle.css"> </head>

    <body>
        <?php include 'Header.php'; ?>
            <?php  $resu = mysqli_fetch_array($resultu); ?>
                <div class="container" id="top">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <center>
                                        <h1>Welcome <?php echo $resu['Name'];?>
                            </h1>
                                        <h4>Your Current Balance: <?php echo $resu['Balance'];?></h4> </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
                    </div>
                </div>
                <div class="container-fluid" id="tab">
                    <div class="row">
                        <nav class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#Transactions">Transactions</a></li>
                                <li><a data-toggle="tab" href="#Recharges">Recharges</a></li>
                            </ul>
                        </nav>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <div class="tab-content">
                                <div id="Transactions" class="tab-pane fade in active">
                                    <h2>Transactions</h2>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>User Id</th>
                                                <th>Amount</th>
                                                <th>Sector</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Transaction Id</th>
                                            </tr>
                                        </thead>
                                        <?php 
                    while($res = mysqli_fetch_array($result)) { 
                    ?>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php echo $res['sl']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['u_Name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['u_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['Amount'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['trx_field']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['Date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['Time'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['trx_id'];?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php   
                    }
                    ?>
                                    </table>
                                </div>
                                <div id="Recharges" class="tab-pane fade">
                                    <h2>Recharges</h2>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>User Id</th>
                                                <th>Amount</th>
                                                <th>Sector</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Recharge Id</th>
                                            </tr>
                                        </thead>
                                        <?php 
                    while($res = mysqli_fetch_array($resultr)) { 
                    ?>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php echo $res['sl']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['u_Name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['u_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['Amount'];?>
                                                    </td>
                                                    <td> </td>
                                                    <td>
                                                        <?php echo $res['Date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['Time'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $res['trx_id'];?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php   
                    }
                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
                    </div>
                </div>
                <?php include 'Footer.php'; ?>
    </body>

    </html>