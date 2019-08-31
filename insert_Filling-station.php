<!DOCTYPE html>
<html>
<head>
	<title>Filling Station</title>
</head>
<body>

	<h1>Filling Station</h1>
	<hr>

	<form action="" method="post" name="">
		

			
				<h3>id: 
				<input type="text" name="id" placeholder="Enter id"></h3>
			<h3>NAme:
				<input type="text" name="u_name" placeholder="Enter u name"></h3>
			
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

    if(!empty($_POST['u_id']))
    {
        echo "online";
		$id = $_POST['id'];
        $idValue = (int)$id;
		$u_id = $_POST['u_id'];
		$u_name = $_POST['u_name'];
		$amount = $_POST['amount'];
        $amountValue = (int)$amount;
        $trx_field = "Filling Station ". $id;
		$sql1 = "INSERT INTO filling_station (ID, u_id, u_Name, Amount, Date, Time) VALUES ('".$id."','".$u_id."','".$u_name."','".$amountValue."', '".$d."', '".$t."')"; //nodemcu_ldr_table = Youre_table_name
        
        $sql2 = "INSERT INTO transactions (u_id, u_Name, Amount, trx_field, Date, Time) VALUES ('".$u_id."','".$u_name."','".$amountValue."','".$trx_field."', '".$d."', '".$t."')"; //nodemcu_ldr_table = Youre_table_name
echo "insert";
		if ($conn->query($sql1) === TRUE&&$conn->query($sql2) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>
    
    </body>
</html>