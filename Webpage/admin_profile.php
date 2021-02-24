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
    <link rel="stylesheet" href="css/profilePageStyle.css">
</head>
<style>
    body {
        font-family: Roboto;
    }

    table {
        border: 1px solid black;
    }
    thead{
        font-size: 1vw;
    }
    h2{
        text-align: center;
    }

</style>

<body>
    <?php include 'Header.php'; ?>
    <div class="container">
 <h2>Admin Management</h2>
   
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Users Informations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="view_customers.php">View Customers</a></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="view_vendors.php">View Vendors</a></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Transactions and Recharges</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <a href="view_transactions.php">View Transactions</a></td>

                        </tr>

                        <tr>
                            <td> <a href="view_recharges.php">View Recharges</a></td>

                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Contacted Informations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <a href="view_reviews.php">View Reviews</a></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Registrations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <a href="regVendor.php">Add new Vendor/Agent</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="regCustomer.php">Add New Customer</a></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Manual Entry</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="insert_admin.php">Manual Payment</a></td>
                        </tr>

                        <tr>
                            <td>
                                <a href="recharge.php">Card Recharge</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>
    <?php include 'Footer.php'; ?>
</body>

</html>
