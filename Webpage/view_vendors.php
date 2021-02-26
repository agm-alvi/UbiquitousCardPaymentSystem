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

$result = "SELECT v.vID, v.Field, v.Category, v.Thana, v.District, v.Division, v.contact_no, v.email, v.username FROM vendors v ORDER BY v.vID ASC";
$result = mysqli_query($conn, $result);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Vendors List|| UCPS</title>
    <link rel="icon" type="image/png" href="img/titleIcon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="img/UCPS.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="listViewStyle.css">
    <style>
        body {
            background-image: url("img/profileBG.jpg");
            background-color: #115511;
            background-size: 100%;
            background-repeat: round;
        }

        .table-hover {
            border: 1px solid black;
            background: white;
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
    <div class="container-fluid" id="top">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1>Vendors Informations</h1>
                <hr>
            </div>
            <div class="col-md-3"></div>
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
                            <th>Field</th>
                            <th>Category</th>
                            <th>Thana</th>
                            <th>District</th>
                            <th>Division</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Vendor ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php 
                    while($res = mysqli_fetch_array($result)) { 
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $res['vID']; ?>
                            </td>
                            <td>
                                <?php echo $res['Field']; ?>
                            </td>
                            <td>
                                <?php $category = $res['Category'];
                        echo $category ?>
                            </td>

                            <td>
                                <?php echo $res['Thana']; ?>
                            </td>
                            <td>
                                <?php echo $res['District'];?>
                            </td>
                            <td>
                                <?php echo $res['Division']; ?>
                            </td>
                            <td>
                                <?php echo $res['contact_no']; ?>
                            </td>
                            <td>
                                <?php echo $res['email']; ?>
                            </td>
                            <td>
                                <?php echo $res['username'];?>
                            </td>
                            <td>
                                <form action="view_vendors.php" method="post">
                                    <input type="hidden" name="catInc" value="<?php echo $lvl+1 ?>">
                                    <input type="submit" name="submit" value="Increase Category"> </form><br>
                                <form action="view_vendors.php" method="post">
                                    <input type="hidden" name="catDec" value="<?php echo $lvl-1 ?>">
                                    <input type="submit" name="submit" value="Decrease Category"> </form>
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
        <a href="admin_profile.php">Go Back</a>
    </div>
    <?php include 'Footer.php'; ?>
</body>

</html>
