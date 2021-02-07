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

include 'connection.php';

$result = "SELECT t.sl, t.uAccountNo, t.trx_field, t.Amount,t.Date, t.Time, t.trx_id, c.username FROM transactions t, customers c WHERE t.uAccountNo= c.uAccountNo";
$result = mysqli_query($conn, $result);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Transactions || UCPS</title>
        <link rel="icon" type="image/png" href="img/titleIcon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:image" content="img/UCPS.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="listViewStyle.css">
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
                                        <td>
                                            <?php echo $res['sl']; ?>
                                        </td>
                                        <td>
                                            <?php echo $res['username']; ?>
                                        </td>
                                        <td>
                                            <?php echo $res['uAccountNo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $res['Amount'];?>
                                        </td>
                                        <td>
                                            <?php //echo substr($res['trx_id'],0,5); 
                                            echo $res['trx_field'];?>
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
                </div> <a href="admin_profile.php">Go Back</a> </div>
            <?php include 'Footer.php'; ?>
    </body>

    </html>