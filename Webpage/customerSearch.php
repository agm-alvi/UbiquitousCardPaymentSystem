<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
require 'connection.php';
include 'connection.php';
$username = $_SESSION["username"];
$resultu = "SELECT * FROM customers U where U.username = '".$username."' ";
$resultu = mysqli_query($conn, $resultu);
$resu = mysqli_fetch_array($resultu);
$uAccountNo = $resu['uAccountNo'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Search Transaction || UCPS</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="img/titleIcon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/profilePageStyle.css"> </head>

    <body>
        <?php include 'Header.php'; 
        
    echo $uAccountNo;?>
       <br> db9132cT725a
            <div>
                <form action="customerSearch.php" method="post">
                    <input id="searchBox" type="text" name="search" value="" placeholder="Enter key to search">
                    <input type="submit" name="Submit" value="Search"> </form>
            </div>
            <?php  
        $search = null;
    if(!empty($_POST['Submit']))

    {
		$search = $_POST['search'];
    }
echo $search;
    
$resultss = "SELECT * FROM transactions t WHERE t.trx_id LIKE '%".$search."%' AND t.uAccountNo LIKE '".$uAccountNo."'" ;

    $resultss = mysqli_query($conn, $resultss);
    $ress = mysqli_fetch_array($resultss);
    $sVid =  substr($ress['trx_field'], -3);
    
        echo $ress['trx_id'];
        echo $sVid;
    
$resultv = "SELECT Field,RIGHT(`username`, 3) AS ID, Thana, District, Division FROM `vendors` WHERE RIGHT(`username`, 3)='".$sVid."'";
    $resultv = mysqli_query($conn, $resultv);
 $resv = mysqli_fetch_array($resultv);
            ?>
                <?php echo "\nThana: ".$resv['Thana']." ok ";
    echo "\nDistrict: ".$resv['District'];
    echo "\nDivision: ".$resv['Division'];
    ?>
                    <?php include 'Footer.php'; ?>
    </body>

    </html>