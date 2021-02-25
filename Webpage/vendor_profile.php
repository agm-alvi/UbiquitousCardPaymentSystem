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
$wid = substr($name,-3);
if($wid>=1 && $wid<200){
$id = "Recharge Center ".$wid;    
}
else if($wid>=200 && $wid<400){
$id = "Parking Lot ".$wid;    
}
else if($wid>=400 && $wid<600){
$id = "Filling Station ".$wid;    
}
else if($wid>=600 && $wid<800){
$id = "Toll Booth ".$wid;    
}
else{
$id = "Toll Booth ".$wid;    
}
$result = "SELECT * FROM transactions T where T.trx_field LIKE '".$id."'";
$result = mysqli_query($conn, $result);

$lng = 0;
$lat = 0;
//23.707915762579372, 90.43987408046792

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
    <link rel="stylesheet" href="css/profilePageStyle.css">
    <style>
        body {
            background-image: url("img/profileBG.jpg");
            background-color: #115511;
            background-size: 100%;
        }

        table {
            counter-reset: section;
        }

        .count:before {
            counter-increment: section;
            content: counter(section);
        }

    </style>
</head>

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
                        </center>
                        <h3>
                            <table>
                                <tr>
                                    <th>Platform:</th>
                                    <td> <?php echo $resu['Field'];?></td>
                                </tr>
                                <tr>
                                    <th>
                                        Address: </th>
                                    <td><?php echo $resu['Thana'];?>, <?php echo $resu['District'];?>, <?php echo $resu['Division'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Contact:</th>
                                    <td> <?php echo $resu['contact_no'];?></td>

                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td> <?php echo $resu['email'];?></td>
                                </tr>
                            </table>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </div>
    <div class="container-fluid" id="tab">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>Trasnsaction List</h1>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
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
                            <td class="count"></td>
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
    <div class="container-fluid" id="top">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <?php 
                        if($wid>=1 && $wid<200){?> <a href="insert_card-recharge.php">Insert Card Recharge</a>
                <?php    }
                        else if($wid>=200 && $wid<400){
                            ?> <a href="insert_parking-lot.php">Insert Parking Lot</a>
                <?php   }
                        else if($wid>=400 && $wid<600){
                          ?> <a href="insert_Filling-station.php">Insert Filling Station</a>
                <?php       
                        }
                        else if($wid>=600 && $wid<800){
                            ?> <a href="insert_toll-booth.php">Insert Toll Booth</a>
                <?php       
                        }
                        else if($wid>=800 && $wid<1000){
                            ?> <a href="insert_ferry-terminal.php">Insert Ferry Terminal</a>
                <?php
                            }
                            else{ ?> <a href="index.php">Homepage</a>
                <?php                           }

                        ?>
                <hr>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4"></div>
        </div>
        <div class="row">
            <div id="googleMap" style="width:100%;height:400px;"></div>
            <script>
                function myMap() {
                    var mapProp = {
                        center: new google.maps.LatLng(23.707915762579372, 90.43987408046792),
                        zoom: 3,
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                }

            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
        </div>
    </div>
    <?php include 'Footer.php'; ?>
</body>

</html>
