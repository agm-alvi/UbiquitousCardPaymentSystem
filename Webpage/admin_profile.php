<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}else{
  if($_SESSION["username"] != "admin")
  {
    header('Location: login_customer.php');
  }
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Admin Profile || UCPS</title>
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
            <div class="container">
                <div class="row"> <a href="view_customers.php">View Customers</a>
                    <br> <a href="view_vendors.php">View Vendors</a>
                    <br> <a href="view_transactions.php">View Transactions</a>
                    <br> </div>
            </div>
            <?php include 'Footer.php'; ?>
    </body>

    </html>