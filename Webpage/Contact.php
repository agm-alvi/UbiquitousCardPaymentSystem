<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UCPS || Homepage </title>
    <link rel="icon" type="image/png" href="img/titleIcon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="img/UCPS.png" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/indexPageStyle.css">
</head>

<body>
    <?php include "Header.php" ?>
    <div class="container-fluid" id="contact">
        <div class="row">
            <div class="col-md-6 c_left">
                <h1>Contact</h1>
                <p>Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei. Vel dicam vivendo accusata ei,</p>
                <p> Block B, Bashundhara Residencial Area
                    <br> Baridhara, Dhaka-1229
                    <br> Bangladesh</p>
                <p><span>Email:</span> info@ucps.com
                    <br><span>Phone:</span>+88-0120-8277223</p>
            </div>
            <div class="col-md-6 c_right">
                <form>
                    <h5>Name*:</h5>
                    <input type="text" class="form-control">
                    <h5>Email Address*:</h5>
                    <input type="email" class="form-control">
                    <h5>Comments*:</h5>
                    <textarea id="" cols="30" rows="10" style="width:100%; color:#fff;"></textarea> <a href="#" class="btn btn-info" role="button" value="Contact Me">Contact Us</a>
                </form>
            </div>
        </div>
        <h2>Find Us</h2>
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="100%" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=north%20south%20university&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <a href="https://123movies-to.org"></a>
                <br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 350px;
                        width: 100%;
                    }

                </style><a href="https://google-map-generator.com">google maps in iframe</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 350px;
                        width: 100%;
                    }

                </style>
            </div>
        </div>
    </div>

    <?php include "Footer.php" ?>
</body>

</html>
