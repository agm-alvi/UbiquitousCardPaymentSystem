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
        <title>Card Recharge || UCPS</title>
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
            <div class="container inputform">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                        <h1>Recharge Center</h1>
                        <hr>
                        <form action="insert_toll-booth.php" method="post" name="TBForm" id="TBForm">
                            <div class="form-group">
                                <h3>Recharge Center ID:
                            <input type="text" name="u_id" value="<?php
                                echo $wid?>" disabled></h3> </div>
                            <div class="form-group">
                                <h3>User ID:
                            <input type="text" name="u_id" placeholder="Enter User ID" required></h3> </div>
                           
                           
                                <div class="form-group">
                                    <h3>Amount:
                            <input type="text" name="amount" placeholder="Enter Amount" ></h3> </div>
                                <button type="submit" class="btn btn-dark" style="font-weight:900;" value="submit">Submit</button>
                        </form>
                    </div>
                </div> <a class="btn2" href="login_vendor.php">Go Back</a> </div>
            <?php
        
                                    
        ///*
include 'connection.php';
function random_color_part(){
    return str_pad(dechex(mt_rand(0,255)),2,'0', STR_PAD_LEFT);
}
function rand_hex(){
    return random_color_part().random_color_part();
}
                                                                 
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
        $trx_field = "Recharge Center". $wid;//tollbooth
        
        
        $result = "SELECT U.u_sl, U.uAccountNo, U.Balance FROM customers U WHERE U.u_id = '$u_id'";
        $result = mysqli_query($conn, $result);

        $res = mysqli_fetch_array($result);
        
        $bal = (int)$res['Balance'] ;
         $bal = $bal + $amountValue;
        $u_name = $res['Name']; 
        
       // $trx_id = "RC".$wid."-".$res['u_sl']."-".$timestamp;//id for Toll Booth (TB)
        $trx_id = rand_hex().str_pad(dechex($idValue),3,'0', STR_PAD_LEFT).substr($platform, -1).rand_hex();
        
        echo $res['Balance'];
        echo $bal;
        echo $trx_id;
        $sqlUp = "UPDATE `customers` SET `Balance`='".$bal."' WHERE uAccountNo='".$u_id."'";
        
		$sql1 = "INSERT INTO toll_booth (ID, uAccountNo, Amount, Date, Time, trx_id) VALUES ('".$wid."','".$u_id."','".$amountValue."', '".$d."', '".$t."', '".$trx_id."')"; //insert on toll booth table
        
        $sql2 = "INSERT INTO transactions (u_id, u_Name, Amount, trx_field, Date, Time, trx_id) VALUES ('".$u_id."','".$amountValue."','".$trx_field."', '".$d."', '".$t."', '".$trx_id."')"; //insert on transaction table
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