    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Customer Sign In || UCPS</title>
        <link rel="icon" type="image/png" href="img/titleIcon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/signPageStyle.css"> </head>
    <style>
        body {
            background-image: url("img/bg.jpg");
        }
    </style>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"></div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <center>
                                <h4>Customer Sign In</h4></center>
                        </div>
                        <div class="panel-body">
                            <form action="login_customer.php" method="post">
                                <div class="form-group">
                                    <label for="username">User Name:</label>
                                    <input type="text" class="form-control" id="username" name="username" required placeholder="Username"> </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                                     </div>
                                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                            </form>
                        </div>
                        <div class="panel-footer" align="right">
                            <p>Not Registered yet? <a href="signup.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
