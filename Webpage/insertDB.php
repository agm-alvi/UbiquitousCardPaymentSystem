<html>
<head>
    
    </head>
<body>
    <form action="insertDB.php" method="post">
    <input type="text" name="id"  placeholder="id">
            <input type="text" name="uAccountNo"  placeholder="Account No">
            <input type="text" name="amount"  placeholder="amount">
            <input type="submit">
    </form>
    
    
    </body>
</html>
<?php include 'connection.php';
echo ok;
    //Get current date and time
    date_default_timezone_set('Asia/Dhaka');
    $d = date("Y-m-d");
    $t = date("H:i:s");
    $timestamp = date("ymdHis");
    if(!empty($_POST['uAccountNo']))
    {
        echo "online";
        
        $idValue = $_POST['id'];
		$acNo = $_POST['uAccountNo'];
	//	$u_name = $_POST['u_name'];
		$amount = $_POST['amount'];
        $amountValue = (int)$amount;
        
        
        $result = "SELECT U.u_sl, U.uAccountNo, U.Balance FROM customers U WHERE U.u_id = '$acNo'";
        $result = mysqli_query($conn, $result);

        $res = mysqli_fetch_array($result);
        
        $bal = (int)$res['Balance'] ;
         $bal = $bal - $amountValue;
        $u_name = $res['Name']; 
        
        $trx_id = "TB".$idValue."-".$res['u_sl']."-".$timestamp;//id for Toll Booth (TB)
        echo $res['Balance'];
        echo $bal;
        echo $trx_id;
        $sqlUp = "UPDATE `customers` SET `Balance`='".$bal."' WHERE uAccountNo='".$acNo."'";
        
		$sql1 = "INSERT INTO toll_booth (ID, uAccountNo, Amount, Date, Time, trx_id) VALUES ('".$idValue."','".$acNo."','".$amountValue."', '".$d."', '".$t."', '".$trx_id."')"; //insert on toll booth table
        
        $sql2 = "INSERT INTO transactions (u_id, u_Name, Amount, Date, Time, trx_id) VALUES ('".$acNo."','".$amountValue."', '".$d."', '".$t."', '".$trx_id."')"; //insert on transaction table
        echo "insert";
		if ($conn->query($sql1) === TRUE&&$conn->query($sql2) === TRUE&&$conn->query($sqlUp) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
	}
	$conn->close();
   //*/ 

    ?>
