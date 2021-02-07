<?php
include 'connection.php';
?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <title>UCPS || About Us </title>
        <link rel="icon" type="image/png" href="img/titleIcon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:image" content="img/UCPS.png" />
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/aboutUsStyle.css"> </head>

    <body>
        <header>
            <?php include 'header.php';?>
        </header>
        <div class="Developed__By">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h1>Designed And Developed By</h1>
                        <p>We strategically design and develop websites that elevate your brand and communicate your message effectively. </p>
                    </div>
                </div>
                <div class="row">
                    <div class="team-members">
                        <div class="member"> <img src="Images/alvi.jpg">
                            <div class="inner">
                                <div class="info">
                                    <h5>Jahid Hasan Alvi</h5>
                                    <p>Developer & Assembler</p>
                                    <div class="social-links"> <a href="https://www.facebook.com/alvi226"><span class="fa fa-facebook"></span></a> <a href=""><span class="fa fa-instagram"></span></a> <a href=""><span class="fa fa-twitter"></span></a> <a href=""><span class="fa fa-linkedin"></span></a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="member"> <img src="Images/asha.jpg">
                            <div class="inner">
                                <div class="info">
                                    <h5>Asha Das</h5>
                                    <p>Creative Designer & Content Maker</p>
                                    <div class="social-links"> <a href="https://www.facebook.com/"><span class="fa fa-facebook"></span></a> <a href=""><span class="fa fa-instagram"></span></a> <a href=""><span class="fa fa-twitter"></span></a> <a href=""><span class="fa fa-linkedin"></span></a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="member"> <img src="Images/ekhtear.jpg">
                            <div class="inner">
                                <div class="info">
                                    <h5>Md. Ekhtear Uddin Khan</h5>
                                    <p>QA Manager & Analyst</p>
                                    <div class="social-links"> <a href="https://www.facebook.com/EkhtearUddinKhan"><span class="fa fa-facebook"></span></a> <a href=""><span class="fa fa-instagram"></span></a> <a href=""><span class="fa fa-twitter"></span></a> <a href=""><span class="fa fa-linkedin"></span></a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="member"> <img src="Images/tnf.jpg">
                            <div class="inner">
                                <div class="info">
                                    <h5>Tanjila Farah</h5>
                                    <p>Supervisor</p>
                                    <div class="social-links"> <a href="https://www.facebook.com/"><span class="fa fa-facebook"></span></a> <a href=""><span class="fa fa-instagram"></span></a> <a href=""><span class="fa fa-twitter"></span></a> <a href=""><span class="fa fa-linkedin"></span></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <?php include 'footer.php';?>
        </footer>
    </body>

    </html>