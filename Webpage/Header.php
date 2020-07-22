<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/HeaderFooterStyle.css">
</head>

<body>
    <!-- Start Header Container -->
    <div class="container-fluid" id="header">
        <div class="row">
            <div class="col-md-4">
                <div class="logo"> <img src="img/logoTop.png" href="index.php" alt="LOGO" width="200px" > </div>
            </div>
            <div class="col-md-8">
                <div class="menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php#about_us">About Us</a></li>
                        <li><a href="index.php#portfolio">Fields</a></li>

                        <?php 
                        if(empty($_SESSION["username"])){?>
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sign In <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="login_customer.php">Customer Sign In</a></li>
                                <li><a href="login_vendor.php">Vendor Sign In</a></li>
                            </ul>
                        </li>
                        <?php }
                         else{?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo $_SESSION["username"] ?><span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="logout.php">Sign Out</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li><a href="Contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header container ends -->

</body>
