<!DOCTYPE html>
<html>

<head>
    <title>Card Recharge</title>
</head>

<body>

    <h1>Toll Booth</h1>
    <hr>

    <form action="" method="post" name="">



        <h3>TB id:
            <input type="text" name="id" placeholder="Enter id"></h3>
      <!--  <h3>NAme:
            <input type="text" name="u_name" placeholder="Enter u name"></h3>-->

        <h3>uID:
            <input type="text" name="u_id" placeholder="Enter uID"></h3>


        <h3>AMount:
            <input type="text" name="amount" placeholder="Enter your amount"></h3>


        <input type="submit" name="Submit" value="Submit">



    </form>


    <?php
 //Creates new record as per request
    //Connect to database
    $servername = "localhost";		//example = localhost or 192.168.0.0
    $username = "root";		//example = root
    $password = "";	
    $dbname = "ucps";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    //Get current date and time
    date_default_timezone_set('Asia/Dhaka');
    $d = date("Y-m-d");
    $t = date("H:i:s");
    $timestamp = date("ymdHis");
    if(!empty($_POST['u_id']))
    {
        echo "online";
		$id = $_POST['id'];
        $idValue = (int)$id;
		$u_id = $_POST['u_id'];
	//	$u_name = $_POST['u_name'];
		$amount = $_POST['amount'];
        $amountValue = (int)$amount;
        $trx_field = "Card Recharge ". $id;
        
        
        $result = "SELECT U.u_sl, U.u_id, U.Name, U.Balance FROM users U WHERE U.u_id = '$u_id'";
        $result = mysqli_query($conn, $result);

        $res = mysqli_fetch_array($result);
        
        $bal = (int)$res['Balance'] ;
         $bal = $bal + $amountValue;
        $u_name = $res['Name']; 
        
        $trx_id = "CR".$id."-".$res['u_sl']."-".$timestamp;
        echo $res['Balance'];
        echo $bal;
        echo $trx_id;
        $sqlUp = "UPDATE `users` SET `Balance`='".$bal."' WHERE u_id='".$u_id."'";
        
		$sql1 = "INSERT INTO card_recharge (ID, u_id, u_Name, Amount, Date, Time, trx_id) VALUES ('".$id."','".$u_id."','".$u_name."','".$amountValue."', '".$d."', '".$t."', '".$trx_id."')"; //insert on toll booth
        /*
        $sql2 = "INSERT INTO transactions (u_id, u_Name, Amount, trx_field, Date, Time, trx_id) VALUES ('".$u_id."','".$u_name."','".$amountValue."','".$trx_field."', '".$d."', '".$t."', '".$trx_id."')"; //insert on transaction table
        echo "insert";*/
		if ($conn->query($sql1) === TRUE&&$conn->query($sqlUp) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>

</body>

</html>
