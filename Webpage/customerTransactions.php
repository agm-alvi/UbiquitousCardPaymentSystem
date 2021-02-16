<?php

session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
//require 'connection.php';
include 'connection.php';
$username = $_SESSION["username"];
$resultu = "SELECT * FROM customers U where U.username = '".$username."' ";
$resultu = mysqli_query($conn, $resultu);

?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
       <meta charset="UTF-8">
    <title>transactions</title>
    <link rel="stylesheet" href="reviewStyle.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Mate:ital@1&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <style type="text/css">
            body {
                background-color: snow;
            }
            
            
            table {
                width: 100%;
            }
        </style>
        <script>
            function usersearchTxt(str) {
                console.log(str);
            }
        </script>
    </head>

    <body>

            <?php include 'header.php';?>
                <h1>Transactions</h1> 
        
        <div>
            <input id="searchBox" type="text" name="search" value="" placeholder="Enter key to search" onkeyup="usersearchTxt(this.value)">
            <!--<button type="button" name="button"
onclick="usersearchTxt(document.getElementById('searchBox').value);">search</button> -->
            <div id="searchTable">
                <table width="100%">
                    <tr>
                        <th width="30%">Name</th>
                        <th width="30%">Email</th>
                        <th width="40%">Comments</th>
                    </tr>
                    <?php
include 'customerTransactionsDBManager.php';
echo fetch('');
?>
                </table>
            </div> </div>
         <?php include 'footer.php';?>
           
    </body>
    <script type="text/javascript">
        function usersearchTxt(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('searchTable').innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "customerTransactionsDBManager.php?search=" + str, true);
            xmlhttp.send();
        }
    </script>

    </html>