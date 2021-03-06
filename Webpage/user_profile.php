<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
require 'connection.php';
include 'connection.php';
$username = $_SESSION["username"];
$resultu = "SELECT * FROM customers U where U.username = '".$username."' ";
$resultu = mysqli_query($conn, $resultu);

$result = "SELECT * FROM transactions T, customers U where T.uAccountNo = U.uAccountNo && U.username = '".$username."' GROUP BY T.Date DESC";
$result = mysqli_query($conn, $result);


$resultr = "SELECT * FROM card_recharge C, customers U where C.uAccountNo = U.uAccountNo && U.username = '".$username."' GROUP BY C.Date DESC";
$resultr = mysqli_query($conn, $resultr);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Profile || UCPS</title>
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
                            <h1>Welcome <?php echo $resu['name'];?>
                            </h1>
                            <h4>Your Current Balance: <?php echo $resu['Balance']." ";?> BDT</h4> <a href="edit_profile.php">Edit Profile</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </div>
    <div class="container-fluid" id="tab">
        <div class="row">
            <nav class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <ul class="nav nav-pills flex-column">
                    <li class="active"><a data-toggle="tab" href="#Profile">Profile</a></li>
                    <br>
                    <li><a data-toggle="tab" href="#Transactions">Transactions</a></li>
                    <br>
                    <li><a data-toggle="tab" href="#Recharges">Recharges</a></li>
                    <br>
                    <li><a data-toggle="tab" href="#Summery">Monthly Summery</a></li>
                </ul>
            </nav>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="tab-content">
                    <div id="Profile" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <?php 
                   // while($resi = mysqli_fetch_array($resultu)) { ?>
                                <table class="table">
                                    <tr>
                                        <td>Username: </td>
                                        <td>
                                            <?php echo $resu['username']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Account No:</td>
                                        <td>
                                            <?php echo $resu['uAccountNo']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td>
                                            <?php 
                                            if($resu['gender']==1)
                                                echo "Male";
                                            else if($resu['gender']==2)
                                                echo "Female";
                                            else
                                            echo "Other"?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Contact no:</td>
                                        <td>
                                            <?php echo $resu['contact_no']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>
                                            <?php echo $resu['email'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>House & Street no:</td>
                                        <td>
                                            <?php echo $resu['houseAndStreet']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Thana:</td>
                                        <td>
                                            <?php echo $resu['thana']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>District:</td>
                                        <td>
                                            <?php echo $resu['district'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Zip Code:</td>
                                        <td>
                                            <?php echo $resu['zip_code'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Country:</td>
                                        <td>
                                            <?php echo $resu['country'];?>
                                        </td>
                                    </tr>
                                </table>
                                <?php   //}                    ?>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
                                <?php if ($resu['gender']==1){?> <img src="img/profile-pic-male.jpg">
                                <?php
    
                                        } else{?> <img src="img/profile-pic-female.jpg">
                                <?php
    
} ?>
                            </div>
                        </div>
                    </div>
                    <div id="Transactions" class="tab-pane fade">
                        <h2>Transactions</h2>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Account No</th>
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
                                        <?php echo $res['uAccountNo']; ?>
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
                                    <th>Account No</th>
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
                                    <td class="count"></td>
                                    <td>
                                        <?php echo $res['uAccountNo']; ?>
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
                    <div id="Summery" class="tab-pane fade">
                        <h2>Monthly Summery</h2>
                        <?php include 'customer_monthlyTransactions.php'?>
                        <?php include 'customer_Graph.php'?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-0 col-md-1 col-lg-1"></div>
        </div>
    </div>
    <?php include 'Footer.php'; ?>
</body>

</html>
