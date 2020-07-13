<?php
$host ='sql207.epizy.com';
$user = 'epiz_26195168';
$pass = 'e1rOM8dsMU7';
$dbname = "epiz_26195168_ucps";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
