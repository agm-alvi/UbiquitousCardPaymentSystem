<?php
include 'connection.php';
/*
session_start();
if(!(empty($_SESSION["username"]))
{
session_destroy();
}else{
    header('Location: login_vendor.php');
  }
*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Vendors Registration|| UCPS</title>
    <link rel="icon" type="image/png" href="img/titleIcon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="img/UCPS.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/regStyle.css">
    <style type="text/css">
      

        h1 {
            text-align: center;
        }

    </style>
</head>

<body>
    <?php include 'Header.php';?>
    <h1>Vendor Registration</h1>
    <div class="regform">
        <form name="LoginForms" class="regforms" action="regVendor.php" method="POST" onsubmit="return validateForm();">
            <table>
                <tr>
                    <td>
                        <label>Field:</label>
                    </td>
                    <td>
                        <input type="radio" name="field" id="field" value="Recharge Center">
                        <label>Recharge Center</label>
                        <input type="radio" name="field" id="field" value="Parking Lot">
                        <label>Parking Lot</label>
                        <input type="radio" name="field" id="field" value="Filling Station">
                        <label>Filling Station</label>
                        <input type="radio" name="field" id="field" value="Toll Booth">
                        <label>Toll Booth</label>
                        <input type="radio" name="field" id="field" value="Ferry Terminal">
                        <label>Ferry Terminal</label>
                        <label id="fieldError"></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category:</label>
                    </td>
                    <td>
                        <input type="number" name="category" value="" placeholder="Category">
                        <label id="categoryError"></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Username:</label>
                    </td>
                    <td>
                        <input type="text" name="uname" value="" placeholder="Username">
                        <label id="usernameError"></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password:</label>
                    </td>
                    <td>
                        <input type="password" name="psw" value="" placeholder="Password">
                        <label id="passwordError"></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Re-type password:</label>
                    </td>
                    <td>
                        <input type="password" name="repsw" value="" placeholder="Re-type Password">
                        <label id="repasswordError"></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Contact no:</label>
                    </td>
                    <td>
                        <input type="text" name="contact" value="" placeholder="Contact No">
                        <label id="contactError"></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email:</label>
                    </td>
                    <td>
                        <input type="Email" name="email" value="" placeholder="Email@ucps.com">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Division:</label>
                    </td>
                    <td>
                        <select name="division">
                            <option value="">Choose Division</option>
                            <option value="Barishal" name="division">Barishal</option>
                            <option value="Chattogram" name="division">Chattogram</option>
                            <option value="Dhaka" name="division">Dhaka</option>
                            <option value="Khulna" name="division">Khulna</option>
                            <option value="Mymensingh" name="division">Mymensingh</option>
                            <option value="Rajshahi" name="division">Rajshahi</option>
                            <option value="Rangpur" name="division">Rangpur</option>
                            <option value="Sylhet" name="division">Sylhet</option>
                        </select>
                        <label id="divisionError"></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>District:</label>
                    </td>
                    <td>
                        <input type="text" name="district" value="" placeholder="District">
                        <label id="districtError"></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Thana:</label>
                    </td>
                    <td>
                        <input type="text" name="thana" value="" placeholder="Thana">
                        <label id="thanaError"></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="Submit" class="btn2" id="button" name="" value="Submit"></td>
                </tr>
                
            </table>
        </form>
    </div>
    <?php
if(isset($_POST['uname'])){
$field = $_POST['field'];
$category = $_POST['category'];
$uname = $_POST['uname'];
$psw = $_POST['psw'];

$contact = $_POST['contact'];
$email = $_POST['email'];
$division = $_POST['division'];
$district = $_POST['district'];
$thana = $_POST['thana'];



if($uname != ""){

	if (mysqli_query($conn,  "INSERT INTO vendors (Field, Category, Thana, District, Division, username, password, contact_no, email) VALUES ('".$field."','".$category."','".$thana."','".$district."','".$division."','".$uname."','".$psw."','".$contact."','".$email."')")) {
	echo "New record created successfully";
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



mysqli_close($conn);
}
?> <a href="admin_profile.php">Go Back</a>
    <?php include 'Footer.php'; ?>
</body>
<script type="text/javascript">
    function validateForm() {
        var field = document.forms["LoginForms"]["field"].value;
        var category = document.forms["LoginForms"]["category"].value;
        var name = document.forms["LoginForms"]["category"].value;
        var username = document.forms["LoginForms"]["uname"].value;
        var password = document.forms["LoginForms"]["psw"].value;
        var repass = document.forms["LoginForms"]["repsw"].value;
        var contact = document.forms["LoginForms"]["contact"].value;
        var division = document.forms["LoginForms"]["division"].value;
        var district = document.forms["LoginForms"]["district"].value;
        var thana = document.forms["LoginForms"]["district"].value;
        var flag = true;
        if (field == "") {
            document.getElementById('fieldError').innerHTML = "Field cannot be empty";
            flag = false;
        }
        if (category == "") {
            document.getElementById('categoryError').innerHTML = "Category cannot be empty";
            flag = false;
        }
        if (username == "") {
            document.getElementById('usernameError').innerHTML = "Username cannot be empty";
            flag = false;
        } else if (username.length != 8) {
            flag = false;
            document.getElementById('usernameError').innerHTML = "Username must be 8 digits";
        } else {
            for (var i = 0; i < username.length; i++) {
                if (username[i] == ' ') {
                    flag = false;
                    document.getElementById('usernameError').innerHTML = "Username cannot contain whitespace";
                    break;
                }
            }
        }
        if (password == "") {
            document.getElementById('passwordError').innerHTML = "Password cannot be empty";
            flag = false;
        } else {
            if (!(password.length >= 8 && password.length <= 32)) {
                flag = false;
                document.getElementById('passwordError').innerHTML = "Password Length must be within 8-32 chars";
            }
        }
        if (repass != password) {
            document.getElementById('repasswordError').innerHTML = "Password doesn't Match";
            flag = false;
        }
        if (contact == "") {
            document.getElementById('contactError').innerHTML = "Contact cannot be empty";
            flag = false;
        } else {
            for (var i = 0; i < contact.length; i++) {
                if (!(contact[i] == '0' || contact[i] == '1' || contact[i] == '2' || contact[i] == '3' || contact[i] == '4' || contact[i] == '5' || contact[i] == '6' || contact[i] == '7' || contact[i] == '8' || contact[i] == '9')) {
                    flag = false;
                    document.getElementById('contactError').innerHTML = "Contact no contains number only";
                    break;
                }
            }
        }
        if (division == "") {
            document.getElementById('divisionError').innerHTML = "Division must be selected";
            flag = false;
        }
        if (district == "") {
            document.getElementById('districtError').innerHTML = "District must be selected";
            flag = false;
        }
        if (thana == "") {
            document.getElementById('thanaError').innerHTML = "Thana must be selected";
            flag = false;
        }
        return flag;
    }

</script>

</html>
