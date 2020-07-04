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


//fetching data in descending order (lastest entry first)


$result = "SELECT U.u_id, U.Name, U.Balance FROM users U ORDER BY U.Name ASC";
$result = mysqli_query($conn, $result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="listViewStyle.css">
    <style>
        table {
            counter-reset: section;
            }

        .count:before {
            counter-increment: section;
            content: counter(section);
        }
    </style>
</head>
<body>

    <div class= "container-fluid" id="header">
        <div class="row">
            <div class="col-md-4">
                <div class="logo"><img src="" alt="LOGO">   </div>  
            </div>
            <div class="col-md-8">
                <div class="menu">
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a href="About us">About Us</a></li>
                        <li><a href="Contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
                <h1>Users Informations</h1>
                <hr>
            </div>

            <div class="col-md-3"></div>
        </div>
    </div>
    
    <div class="container-fluid" id="tab">
            <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
                <table class="table table-hover">
                    <thead> <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>User Id</th>
                        <th>Balance</th>
                    </tr> </thead>
                    <?php 
                    while($res = mysqli_fetch_array($result)) { 
                    ?>
                    <tbody><tr> 
                        
                        <td class="count"></td>
                        <td><?php echo $res['Name']; ?></td>
                        <td><?php echo $res['u_id']; ?></td>
                        <td><?php echo $res['Balance'];?></td>
                    </tr> </tbody> 

                    <?php   
                    }
                    ?>

                </table>

            </div>

            <div class="col-md-3"></div>
        </div>

    </div>


</body>
</html>
