<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
require 'connection.php';
include 'connection.php';
$name = $_SESSION["username"];
$resultu = "SELECT * FROM vendors U where U.username = '".$name."' ";
$resultu = mysqli_query($conn, $resultu);
$id = "Toll Booth ".substr($name,-3);

$result = "SELECT * FROM transactions T where T.trx_field LIKE '".$id."'";
$result = mysqli_query($conn, $result);



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
                                        <h1>Welcome <?php echo $resu['username'];?>
                            </h1>
                                        <h3>Type: <?php echo $resu['Field'];?></h3>
                                    
                                        <h3>Address: <?php echo $resu['Thana'];?>, <?php echo $resu['District'];?>, <?php echo $resu['Division'];?></h3></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
                    </div>
                </div>
        <div class="container-fluid" id="top">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1>Trasnsaction List</h1>
                        <hr> </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <div class="container-fluid" id="tab">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
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
                    <div class="col-md-2"></div>
                </div>
            </div>
                <?php include 'Footer.php'; ?>
    </body>

    </html>