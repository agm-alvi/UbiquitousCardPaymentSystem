<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
require 'connection.php';

$name = $_SESSION["username"];
$wid = substr($name,-3);
$vType = "null";

if (!empty($_POST["vType"])){
    
    $vType = $_POST["vType"];
    }
$amount = 0;
  
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Toll Booth Bill Pay || UCPS</title>
        <link rel="icon" type="image/png" href="img/titleIcon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/insertPagesStyle.css"> </head>

    <body>
        <?php include 'Header.php'; ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                        <h1>Toll Booth Fare Pay</h1>
                        <hr>
                        <form action="insert_toll-booth.php" method="post" name="TBForm" id="TBForm">
                            <div class="form-group">
                                <h3>Toll Booth ID:
                            <input type="text" name="u_id" value="<?php
                                echo $wid?>" disabled></h3> </div>
                            <div class="form-group">
                                <h3>User ID:
                            <input type="text" name="u_id" placeholder="Enter User ID" required></h3> </div>
                            <div class="form-group">
                                <h3><label for="vType">Vehicle:</label>
                            <select class="vType" id="vType" name="vType">
                                <option value="none" selected disabled <?php if (isset($vType) && $vType=="null") echo "selected";?>>--Select--</option>
                                <option value="privateCar" <?php if (isset($vType) && $vType=="privateCar") echo "selected";?>>Private Car</option>
                                <option value="micro" <?php if (isset($vType) && $vType=="micro") echo "selected";?>>Micro Bus</option>
                                <option value="bus" <?php if (isset($vType) && $vType=="bus") echo "selected";?>>Bus</option>
                                <option value="cng" <?php if (isset($vType) && $vType=="cng") echo "selected";?>>CNG</option>
                                <option value="motorCycle" <?php if (isset($vType) && $vType=="motorCycle") echo "selected";?>>Motor Cycle</option>
                            </select></h3> </div>
                            <?php
                            
                            if($vType=="privateCar"){
                                $amount = 100;
                            }
                            else if($vType=="micro"){
                                $amount = 150;
                            }
                            else if($vType=="bus"){
                                $amount = 300;
                            }
                            else if($vType=="cng"){
                            $amount = 50;
                            }
                            else if($vType=="motorCycle"){
                            $amount = 10;
                            }
                            else{
                                $amount = 0;
                            }
                                
                            ?>
                                <div class="form-group">
                                    <h3>Amount:
                            <input type="text" name="amount" placeholder="null" value="<?php
                                echo $amount?>" disabled></h3> </div>
                                <button type="submit" class="btn btn-dark" style="font-weight:900;" value="submit">Submit</button>
                        </form>
                    </div>
                </div> <a href="login_vendor.php">Go Back</a> </div>
            <?php
                                          echo $vType;
        ///*
include 'connection.php';
    //Get current date and time
    date_default_timezone_set('Asia/Dhaka');
    $d = date("Y-m-d");
    $t = date("H:i:s");
    $timestamp = date("ymdHis");
    if(!empty($_POST['u_id']))
    {
        echo "online";
        
        $idValue = (int)$wid;
		$u_id = $_POST['u_id'];
	//	$u_name = $_POST['u_name'];
	//	$amount = $_POST['amount'];
        $amountValue = (int)$amount;
        $trx_field = "Toll Booth ". $wid;//tollbooth
        
        
        $result = "SELECT U.u_sl, U.u_id, U.Name, U.Balance FROM customers U WHERE U.u_id = '$u_id'";
        $result = mysqli_query($conn, $result);

        $res = mysqli_fetch_array($result);
        
        $bal = (int)$res['Balance'] ;
         $bal = $bal - $amountValue;
        $u_name = $res['Name']; 
        
        $trx_id = "TB".$wid."-".$res['u_sl']."-".$timestamp;//id for Toll Booth (TB)
        echo $res['Balance'];
        echo $bal;
        echo $trx_id;
        $sqlUp = "UPDATE `customers` SET `Balance`='".$bal."' WHERE u_id='".$u_id."'";
        
		$sql1 = "INSERT INTO toll_booth (ID, u_id, u_Name, Amount, Date, Time, trx_id) VALUES ('".$wid."','".$u_id."','".$u_name."','".$amountValue."', '".$d."', '".$t."', '".$trx_id."')"; //insert on toll booth table
        
        $sql2 = "INSERT INTO transactions (u_id, u_Name, Amount, trx_field, Date, Time, trx_id) VALUES ('".$u_id."','".$u_name."','".$amountValue."','".$trx_field."', '".$d."', '".$t."', '".$trx_id."')"; //insert on transaction table
        echo "insert";
		if ($conn->query($sql1) === TRUE&&$conn->query($sql2) === TRUE&&$conn->query($sqlUp) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
	}
	$conn->close();
   //*/ 
 include 'Footer.php';
    ?>
    </body>

    </html>