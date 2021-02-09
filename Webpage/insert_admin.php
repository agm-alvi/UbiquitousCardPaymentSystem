<html>

<head> </head>

<body><h3>Account No:</h3>
    <h4>"3F AD 4D 29", "Jahid Hasan Alvi" <br>
  "B0 77 BB 25", "Ekhtear Uddin Khan"<br>
        "A1 F4 78 D5", "Asha Das"<br><br></h4>
    <h3>TB ID</h3>
    <h4>622<br>603</h4>
    <h3>PL ID</h3>
    <h4>205<br>226</h4>
    <h3>FS ID</h3>
    <h4>422<br>529</h4>
    <h3>FT ID</h3>
    <h4>803<br>812</h4>
    
    
    <form action="insert_admin.php" method="post">
        <nav>
            <label>Platform:</label>
            <input type="radio" name="platform" id="platform" value="TB">
            <label>Toll Booth</label>
            <input type="radio" name="platform" id="platform" value="PL">
            <label>Parking Lot</label>
            <input type="radio" name="platform" id="platform" value="FS">
            <label>Filling Station</label>
            <input type="radio" name="platform" id="platform" value="FT">
            <label>Ferry Terminal</label>
        </nav>
        <nav>
            <label>ID</label>
            <input type="text" name="id" placeholder="id" required> </nav>
        <nav>
            <label>Account No:</label>
            <input type="text" name="uAccountNo" placeholder="Account No" required> </nav>
        
        <nav>
            <label>Amount: </label>
            <input type="text" name="amount" placeholder="amount" required> </nav>
        <nav>
            <label>Time: </label>
            <input type="time" name="time" placeholder="time" required> </nav>
        <nav>
            <label>Date: </label>
            <input type="date" name="date" placeholder="date" required> </nav>
        <input type="submit"> </form>
</body>

</html>
<?php include 'connection.php';
echo "found";
    if(!empty($_POST['uAccountNo']))
    {

$idValue = $_POST['id'];
		$acNo = $_POST['uAccountNo'];
	//	$u_name = $_POST['u_name'];
		$amount = $_POST['amount'];
        $amountValue = (int)$amount;
        $platform = $_POST['platform'];
        
function random_color_part(){
    return str_pad(dechex(mt_rand(0,255)),2,'0', STR_PAD_LEFT);
}
function rand_hex(){
    return random_color_part().random_color_part();
}

    //Get current date and time
    date_default_timezone_set('Asia/Dhaka');
    //$d = date("Y-m-d");
    //$t = date("H:i:s");
    $timestamp = date("His");
        echo "online ";
        $d = $_POST['date'];
        $t = $_POST['time'];
    echo " ".$d. " ".$t;    
        
        $result = "SELECT U.cSL, U.uAccountNo, U.Balance FROM customers U WHERE U.uAccountNo = '$acNo'";
        $result = mysqli_query($conn, $result);

        $res = mysqli_fetch_array($result);
        
        $bal = (int)$res['Balance'] ;
         $bal = $bal - $amountValue;
        if($platform=='TB'){
        $trx_field = "Toll Booth ".$idValue;
        }
        else if($platform=='PL'){
        $trx_field = "Parking Lot ".$idValue;
        }
        else if($platform=='FS'){
        $trx_field = "Filling Station ".$idValue;
        }
        else if($platform=='FT'){
        $trx_field = "Ferry Terminal ".$idValue;
        }
        //$trx_id = "TB".$idValue."-".sprintf('%03d', $res['cSL'])."-".$timestamp;
        //id for Toll Booth (TB)
        $trx_id = rand_hex().str_pad(dechex($idValue),3,'0', STR_PAD_LEFT).substr($platform, -1).rand_hex();
        echo $res['Balance']." ";
        echo $bal." ";
        echo $trx_id;
        $sqlUp = "UPDATE `customers` SET `Balance`='".$bal."' WHERE uAccountNo='".$acNo."'";
        if($platform=='TB'){
		$sql1 = "INSERT INTO toll_booth (tbID, uAccountNo, Amount, Date, Time, trx_id) VALUES ('".$idValue."','".$acNo."','".$amountValue."', '".$d."', '".$t."', '".$trx_id."')"; //insert on toll booth table
        }
        else if($platform=='PL'){
		$sql1 = "INSERT INTO parking_lot (plID, uAccountNo, Amount, Date, Time, trx_id) VALUES ('".$idValue."','".$acNo."','".$amountValue."',  '".$d."', '".$t."', '".$trx_id."')"; //insert on parking lot table
        }
        
        else if($platform=='FS'){
		$sql1 = "INSERT INTO filling_station (fsID, uAccountNo, Amount, Date, Time, trx_id) VALUES ('".$idValue."','".$acNo."','".$amountValue."', '".$d."', '".$t."', '".$trx_id."')"; //insert on filling St table
        }
        
        
        else if($platform=='FT'){
		$sql1 = "INSERT INTO ferry_terminal (ftID, uAccountNo, Amount, Date, Time, trx_id) VALUES ('".$idValue."','".$acNo."','".$amountValue."', '".$d."', '".$t."', '".$trx_id."')"; //insert on ferry terminal table
        }
        
        $sql2 = "INSERT INTO transactions (uAccountNo, Amount, trx_field, Date, Time, trx_id) VALUES ('".$acNo."','".$amountValue."', '".$trx_field."', '".$d."', '".$t."', '".$trx_id."')"; //insert on transaction table
        echo " inserting ";
		if ($conn->query($sql1) === TRUE&&$conn->query($sql2) === TRUE&&$conn->query($sqlUp) === TRUE) {
		    echo " done";
		} else {
		    echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
	}
	$conn->close();
   //*/ 

    ?>