<?php

include 'connection.php';
	  
/*
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}else{
  if($_SESSION["username"] != "admin")
  {
    header('Location: login_user.php');
  }
}
*/
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Reviews || UCPS</title>
        <link rel="icon" type="image/png" href="img/titleIcon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:image" content="img/UCPS.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> //
        <link rel="stylesheet" href="listViewStyle.css">
        <style type="text/css">
            body {
                background-color: snow;
            }
            
            table {
                width: 100%;
            }
            tr{
                width: 25%;
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
            <h1>User Reviews and Comments</h1>
            <div>
                <input id="searchBox" type="text" name="search" value="" placeholder="Enter key to search" onkeyup="usersearchTxt(this.value)">
                <!--<button type="button" name="button"
onclick="usersearchTxt(document.getElementById('searchBox').value);">search</button> -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div id="searchTable">
                                <?php
include 'reviewsDBManager.php';
echo fetch('');
?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        
                <a href="admin_profile.php">Go Back</a>
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
            xmlhttp.open("GET", "reviewsDBManager.php?search=" + str, true);
            xmlhttp.send();
        }
    </script>

    </html>