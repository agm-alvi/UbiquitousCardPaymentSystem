<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
require 'connection.php';

include 'connection.php';

$result = "SELECT * FROM customers U ORDER BY U.Name ASC";
$result = mysqli_query($conn, $result);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Customers List || UCPS</title>
        <link rel="icon" type="image/png" href="img/titleIcon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:image" content="img/UCPS.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        //<link rel="stylesheet" href="listViewStyle.css">
        <style>
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
            <div class="container-fluid" id="top">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h1 align="center">Customers Informations</h1>
                        <hr> </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="container-fluid" id="tab">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>User Id</th>
                                    <th>Balance</th>
                                    <th>House & Street no</th>
                                    <th>Thana</th>
                                    <th>District</th>
                                    <th>Zip Code</th>
                                    <th>Country</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    
                                </tr>
                            </thead>
                            <?php 
                    while($res = mysqli_fetch_array($result)) { 
                    ?>
                                <tbody>
                                    <tr>
                                        <td class="count"></td>
                                        <td>
                                            <?php echo $res['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $res['u_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $res['Balance'];?>
                                        </td>
                                        <td>
                                            <?php echo $res['hNs_no'];?>
                                        </td>
                                        <td>
                                            <?php echo $res['thana'];?>
                                        </td>
                                        <td>
                                            <?php echo $res['district'];?>
                                        </td>
                                        <td>
                                            <?php echo $res['zip_code'];?>
                                        </td>
                                        <td>
                                            <?php echo $res['country'];?>
                                        </td>
                                        <td>
                                            <?php echo $res['contact_no'];?>
                                        </td>
                                        <td>
                                            <?php echo $res['email'];?>
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
            <?php include 'Footer.php'; ?>
    </body>

    </html>