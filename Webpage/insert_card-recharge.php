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
    <link rel="stylesheet" href="css/insertPagesStyle.css"> </head>

<body>
    <?php include 'Header.php'; ?>
        <h1>Card Recharge</h1>
        <hr>
        <form action="" method="post" name="">
            <h3>CR id:
            <input type="text" name="id" placeholder="Enter id"></h3>
            <!--  <h3>Name:
            <input type="text" name="u_name" placeholder="Enter u name"></h3>-->
            <h3>uID:
            <input type="text" name="u_id" placeholder="Enter uID"></h3>
            <h3>Amount:
            <input type="text" name="amount" placeholder="Enter your amount"></h3>
            <input type="submit" name="Submit" value="Submit"> </form>
        <?php
include 'connection.php';
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
    //  $u_name = $_POST['u_name'];
        $amount = $_POST['amount'];
        $amountValue = (int)$amount;
        $trx_field = "Card Recharge ". $id;//tollbooth
        
        
        $result = "SELECT U.u_sl, U.u_id, U.Name, U.Balance FROM customers U WHERE U.u_id = '$u_id'";
        $result = mysqli_query($conn, $result);

        $res = mysqli_fetch_array($result);
        
        $bal = (int)$res['Balance'] ;
         $bal = $bal + $amountValue;
        $u_name = $res['Name']; 
        
        $trx_id = "CR".$id."-".$res['u_sl']."-".$timestamp;//id for Toll Booth (TB)
        echo $res['Balance'];
        echo $bal;
        echo $trx_id;
        $sqlUp = "UPDATE `customers` SET `Balance`='".$bal."' WHERE u_id='".$u_id."'";
        
        $sql1 = "INSERT INTO card_recharge (ID, u_id, u_Name, Amount, Date, Time, trx_id) VALUES ('".$id."','".$u_id."','".$u_name."','".$amountValue."', '".$d."', '".$t."', '".$trx_id."')"; //insert on toll booth table
        
        $sql2 = "INSERT INTO transactions (u_id, u_Name, Amount, trx_field, Date, Time, trx_id) VALUES ('".$u_id."','".$u_name."','".$amountValue."','".$trx_field."', '".$d."', '".$t."', '".$trx_id."')"; //insert on transaction table
        echo "insert";
        if ($conn->query($sql1) === TRUE&&$conn->query($sql2) === TRUE&&$conn->query($sqlUp) === TRUE) {
            echo "OK";
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    }
    $conn->close();
    
    php include 'Footer.php';
    ?>
</body>

</html>
