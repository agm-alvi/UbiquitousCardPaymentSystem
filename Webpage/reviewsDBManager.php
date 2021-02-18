<?php
function conectionStart()
{
 /*$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ucps";
  $connection = mysqli_connect($servername, $username, $password, $dbname);*/
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
$sql = "SELECT * FROM contacts WHERE name LIKE '%".$value."%' OR
email LIKE '%".$value."%' OR
subject LIKE '%".$value."%' OR comments LIKE '%".$value."%'";
$result = mysqli_query($connection, $sql);
if($result) {

echo "<table>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Subject</th>";
echo "<th>Comments</th>";
echo "</tr>";
while ($row = mysqlI_fetch_assoc($result)) {
echo "<tr>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']." </td>";
echo "<td>".$row['subject']." </td>";
echo "<td>".$row['comments']."</td>";
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