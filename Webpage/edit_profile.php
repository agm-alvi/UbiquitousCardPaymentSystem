<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
require 'connection.php';
//include 'connection.php';
$username = $_SESSION["username"];

//$email = $_SESSION["email"];
$search_user= "SELECT * FROM customers U where U.username = '".$username."' ";
$result_user = $conn->query($search_user);

if ($result_user->num_rows > 0) {
  while($row_user = $result_user->fetch_assoc()) {
    $password = $row_user['password'];
    $name = $row_user['name'];
    $gender = $row_user['gender'];
    $hNs_no = $row_user['houseAndStreet'];
    $thana = $row_user['thana'];
    $district = $row_user['district'];
    $zip_code = $row_user['zip_code'];
    $country = $row_user['country'];
    $contact_no = $row_user['contact_no'];
    $email = $row_user['email'];
  }
}
$msg="Update Failed";
if(isset($_POST['submit']))
{
  $password = $_POST['password'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $hNs_no = $_POST['houseAndStreet'];
    $thana = $_POST['thana'];
    $district = $_POST['district'];
    $zip_code = $_POST['zip_code'];
    $country = $_POST['country'];
//      $update_info ="UPDATE `userinfo` SET `fullname`='$fullname',`username`='$username',`email`='$email',`password`='$password' WHERE userinfo_id = '$user_id'";
    
    $update_info = "UPDATE `customers` SET `name`= '$name',`password`= '$password', `contact_no`= '$contact_no', `gender`= '$gender', `email`= '$email' ,`houseAndStreet`= '$hNs_no', `thana`='$thana', `district`='$district', `zip_code`='$zip_code', `country`= '$country' WHERE username = '".$username."'";
  
    if ($conn->query($update_info) === TRUE) {
        $_SESSION["username"] = $username;
        $msg="successfully updated";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile || UCPS</title>
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

<body>
    <?php include 'Header.php'; ?>

    <div class="container" style="margin-top: 70px">
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 well">
                <?php
          if(isset($_POST['submit'])){ 
          ?>
                <div class="alert alert-success alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $msg;?>
                </div>
                <?php
          } ?>
                <center>
                    <h3>Update Profile</h3>
                </center>
                <form action="edit_profile.php" method="post">
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Update Fullname" name="name" value="<?php echo $name ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="update password" name="password" value="<?php echo $password ?>" required>
                        <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <input type="radio" name="gender" id="gender" value="Male">
                        <label>Male</label>
                        <input type="radio" name="gender" id="gender" value="Female">
                        <label>Female</label>
                        <input type="radio" name="gender" id="gender" value="Other">
                        <label>Other</label>
                        <label id="genderError"></label>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_no">Contact No:</label>
                        <input type="text" class="form-control" id="contact_no" placeholder="Update Contact No" name="contact_no" value="<?php echo $contact_no ?>" required>
                    </div> 
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" placeholder="update email" name="email" value="<?php echo $email ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="hNs_no">House & Street No:</label>
                        <input type="text" class="form-control" id="hNs_no" placeholder="Update House & Street No" name="hNs_no" value="<?php echo $hNs_no ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="thana">Thana:</label>
                        <input type="text" class="form-control" id="thana" placeholder="Update Thana" name="thana" value="<?php echo $thana ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="district">District:</label>
                        <input type="text" class="form-control" id="district" placeholder="Update District" name="district" value="<?php echo $district ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="zip_code">Zip Code:</label>
                        <input type="text" class="form-control" id="zip_code" placeholder="Update Zip Code" name="zip_code" value="<?php echo $zip_code ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input type="text" class="form-control" id="country" placeholder="Update Country" name="country" value="<?php echo $country ?>" required>
                    </div>
                    <input type="submit" class="btn btn-primary pull-right" name="submit" value="update">
                </form>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
        </div>
    </div>

<a href="user_profile.php" style="font-size:30px">Go Back</a>




    <?php include 'Footer.php'; ?>
</body>

</html>

<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

</script>
