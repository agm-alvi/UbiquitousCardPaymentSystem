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
    <link rel="stylesheet" href="css/HeaderFooterStyle.css">
</head>

<body>
    <!-- Start Header Container -->
    <div class="container-fluid" id="header">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="logo"> <img src="img/logoTop.png" alt="LOGO" width="200px"> </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#about_us">About Us</a></li>
                        <li><a href="#portfolio">Fields</a></li>
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sign In <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="login_customer.php">Customer Sign In</a></li>
                                <li><a href="login_vendor.php">Vendor Sign In</a></li>
                            </ul>
                        </li>
                        <li><a href="Contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header container ends -->
    <!-- Slider in Carousel -->
    <div class="container-fluid starter">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active"> <img src="img/bannerTollBooth.png" alt="Toll Booth" style="width:100%;">
                            <div class="carousel-caption myclass">
                                <h1>Toll Booth</h1>
                            </div>
                        </div>
                        <div class="item"> <img src="img/bannerParkingLot.png" alt="Parking Lot" style="width:100%;">
                            <div class="carousel-caption myclass">
                                <h1> Parking Lot</h1>
                            </div>
                        </div>
                        <div class="item"> <img src="img/bannerFillingStation.png" alt="Filling Station" style="width:100%;">
                            <div class="carousel-caption myclass">
                                <h1>Filling Station</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Carousel -->
    </div>
    <!-- End Container -->
    <div class="container" id="explanations">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h1>Goals</h1>
                <p>Lorem ipsum dolor sit amet, ea doming until epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est.</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h1>Future Plans</h1>
                <p>Lorem ipsum dolor sit amet, ea doming until epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est.</p>
            </div>
        </div>
    </div>
    <!-- myself ends -->
    <div class="container-fluid" id="about_us">
        <div class="row">
            <div class="col-md-5" id="img"> <img src="img/UCPS.png" alt="" width="100%"> </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="about_us_p">
                        <h1>About Us</h1>
                        <p>Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei. Vel dicam vivendo accusata ei, cum ne periculis molestiae pri.</p>
                        <p> Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei.</p>
                    </div>
                </div>
                <div class="row fields">
                    <div class="col-md-6">
                        <h3><span class="glyphicon glyphicon-globe icon1"></span>Toll Booth Payment</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="col-md-6">
                        <h3><span class="glyphicon glyphicon-pencil icon1"></span>Parking Lot Payment</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="row fields">
                    <div class="col-md-6">
                        <h3><span class="glyphicon glyphicon-user icon1"></span>Filling Station Payment</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="col-md-6">
                        <h3><span class="glyphicon glyphicon-link icon1"></span>Card Recharge</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
            </div>
            <!-- col-md-8 ends -->
        </div>
    </div>
    <!-- about us ends -->
    <!-- Slider in Carousel -->
    <div class="container-fluid speech">
        <div id="myrCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myrCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myrCarousel" data-slide-to="1"></li>
                <li data-target="#myrCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <p>“Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei. Vel dicam vivendo accusata ei, cum ne periculis molestiae pri. Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam.”</p>
                    <h5>JOHN STONE</h5>
                </div>
                <div class="item">
                    <p>“Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei. Vel dicam vivendo accusata ei, cum ne periculis molestiae pri. Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam.”</p>
                    <h5>JOHN STONE</h5>
                </div>
                <div class="item">
                    <p>“Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei. Vel dicam vivendo accusata ei, cum ne periculis molestiae pri. Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam.”</p>
                    <h5>JOHN STONE</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->
    <div class="container" id="portfolio">
        <div class="row">
            <h1>Fields</h1>
            <p>Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei. Vel dicam vivendo accusata ei, cum ne periculis molestiae pri. </p>
        </div>
        <div class="row">
            <div class="col-md-4 category" id="CR">
                <h4>Filtered By Category</h4>
                <div class="p_menu">
                    <ul type="none">
                        <li><a href="#TB">Toll Booths</a></li>
                        <li><a href="#PL">Parking Lots</a></li>
                        <li><a href="#FS">Filling Stations</a></li>
                        <li><a href="#CR">Recharge Counters</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4"><img src="img/CR2.jpg" alt="CR2"></div>
            <div class="col-md-4"><img src="img/CR1.jpg" alt="CR1"></div>
        </div>
        <div class="row" id="TB">
            <div class="col-md-4"><img src="img/TB1.jpg" alt="TB1"></div>
            <div class="col-md-4"><img src="img/TB2.jpg" alt="TB2"></div>
            <div class="col-md-4"><img src="img/TB3.jpg" alt="TB3"></div>
        </div>
        <div class="row" id="PL">
            <div class="col-md-4"><img src="img/PL2.jpg" alt="PL2"></div>
            <div class="col-md-4"><img src="img/PL3.jpg" alt="PL3"></div>
            <div class="col-md-4"><img src="img/PL1.jpg" alt="PL1"></div>
        </div>
        <div class="row" id="FS">
            <div class="col-md-4"><img src="img/FS3.jpg" alt="FS3"></div>
            <div class="col-md-4"><img src="img/FS2.jpg" alt="FS2"></div>
            <div class="col-md-4"><img src="img/FS1.jpg" alt="FS1"></div>
        </div>
    </div>
    <!-- portfolio ends -->
    <!-- Footer Container Starts -->
    <div class="container-fluid footer">
        <div class="row">
            <p>Copyright 2020 UCPS - Built For Better Future</p>
        </div>
        <div class="row">
            <div class="sites">
                <ul>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-snapchat-ghost"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer end -->
</body>

</html>
