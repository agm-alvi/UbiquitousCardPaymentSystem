<?php include 'connection.php';
echo "found";
    if(!empty($_POST['uAccountNo']))
    {

$idValue = $_POST['id'];
		$acNo = $_POST['uAccountNo'];
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
    $d = date("Y-m-d");
    $t = date("H:i:s");
    $timestamp = date("His");
        echo "online ";
        //$d = $_POST['date'];
        //$t = $_POST['time'];
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