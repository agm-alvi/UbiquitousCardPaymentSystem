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

$result = "SELECT * FROM customers U ORDER BY U.regDate ASC";
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
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> //
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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 align="center">Customers Informations</h1>
                <hr>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="container-fluid" id="tab">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>User Account No</th>
                            <th>Balance</th>
                            <th>Member Since</th>
                            <th>Level</th>
                            <th>Gender</th>
                            <th>House & Street no</th>
                            <th>Thana</th>
                            <th>District</th>
                            <th>Zip Code</th>
                            <th>Country</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php 
                    while($res = mysqli_fetch_array($result)) { 
                        if($res['uAccountNo']=="000"){
                            continue;
                        }
                    ?>
                    <tbody>
                        <tr>
                            <td class="count"></td>
                            <td>
                                <?php echo $res['name']; ?>
                            </td>
                            <td>
                                <?php echo $res['uAccountNo']; ?>
                            </td>
                            <td>
                                <?php echo $res['Balance'];?>
                            </td>
                            <td>
                                <?php echo $res['regDate'];?>
                            </td>
                            <td>

                                <?php 
                        $lvl = $res['level'];
                        if( $lvl==1){
                        echo "Premium";
                    }
                        else if( $lvl==2){
                        echo "Elite";
                    }
                        else{
                            echo "General";
                        }
                                            ?>
                            </td>
                            <td>
                                <?php if( $res['gender']==1){
                        echo "Male";
                    }
                        else if( $res['gender']==2){
                        echo "Female";
                    }
                        else{
                            echo "Other";
                        }
                                            ?>
                            </td>
                            <td>
                                <?php echo $res['houseAndStreet'];?>
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
                            <td>
                                <form action="view_customers.php" method="post">
                                    <input type="hidden" name="levelInc" value="<?php echo $lvl+1 ?>">
                                    <input type="submit" name="submit" value="Increase Level"> </form><br>
                                <form action="view_customers.php" method="post">
                                    <input type="hidden" name="levelDec" value="<?php echo $lvl-1 ?>">
                                    <input type="submit" name="submit" value="Decrease Level"> </form>
                            </td>
                        </tr>
                    </tbody>
                    <?php   
                    }
                    ?>
                </table>
            </div>
        </div> <a href="admin_profile.php">Go Back</a>
    </div>
    <?php include 'Footer.php'; ?>
</body>

</html>
