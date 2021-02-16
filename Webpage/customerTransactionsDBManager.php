<?php

//session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
require 'connection.php';
$username = $_SESSION["username"];
$resultu = "SELECT * FROM customers U where U.username = '".$username."' ";
$resultu = mysqli_query($conn, $resultu);
     $resu = mysqli_fetch_array($resultu); 
    $uAccountNo = $resu['uAccountNo'];

function conectionStart()
{
    
include 'connection.php';
  $connection = $conn;

return $connection;
}
function conectionEnd($value)
{
mysqli_close($value);
}
function fetch($value='')
{
$connection = conectionStart();
$sql = "SELECT * FROM transactions WHERE trx_field LIKE '%".$value."%' OR trx_id LIKE '%".$value."%'
AND uAccountNo = '".$uAccountNo."'";
    
$result = mysqli_query($connection, $sql);
if($result) {

echo "<table>";
echo "<tr>";
echo "<th>SL</th>";
echo "<th>Account No</th>";
echo "<th>Amount</th>";
    echo "<th>Sector</th>";
    echo "<th>Date</th>";
    echo "<th>Time</th>";
    echo "<th>Transaction Id</th>";
echo "</tr>";
while ($row = mysqlI_fetch_assoc($result)) {
echo "<tr>";
echo "<td>".$row['sl']."</td>";
echo "<td>".$row['uAccountNo']." </td>";
echo "<td>".$row['Amount']."</td>";
    echo "<td>".$row['trx_field']."</td>";
    echo "<td>".$row['Date']."</td>";
    echo "<td>".$row['Time']."</td>";
    echo "<td>".$row['trx_id']."</td>";
echo "</tr>";
}
echo "</table>";
} else {
echo "Error :".$sql."<br>".mysqli_error($connection);
}
conectionEnd($connection);
}
if (isset($_GET['search'])) {
fetch($_GET['search']);
}
?>