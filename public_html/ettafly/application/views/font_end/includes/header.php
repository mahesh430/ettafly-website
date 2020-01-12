<!DOCTYPE html>
<html lang="en">
    <head>

        <base href='<?php echo base_url(); ?>'>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="author" content="<?php echo $site->meta_tittle; ?>" />
        <meta name="keywords" content="<?php echo $site->meta_keywords; ?>" />
        <meta name="description" content="<?php echo $site->meta_description; ?>" />
        <title><?php echo $site->meta_tittle; ?></title> 
        <link rel="shortcut icon" href="public/images/admin/<?php echo $site->favicon; ?>" type="image/x-icon">
        <!-- Web Fonts
        ============================================= -->

        <!-- Stylesheet
        ============================================= -->
        <link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="public/vendor/font-awesome/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="public/vendor/owl.carousel/assets/owl.carousel.min.css" />
        <link rel="stylesheet" type="text/css" href="public/vendor/owl.carousel/assets/owl.theme.default.min.css" />
        <link rel="stylesheet" type="text/css" href="public/vendor/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="public/vendor/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="public/css/stylesheet.css" />
        <script src="public/vendor/jquery/jquery.min.js"></script>
    </head>
    <body>
        <!-- Preloader -->
        <!--<div id="preloader"><div data-loader="dual-ring"></div></div> Preloader End -->

        <!-- Document Wrapper   
        ============================================= -->
        <div id="main-wrapper"> 

            <!-- Header
            ============================================= -->
            <header id="header">
                <div class="container">
                    <div class="header-row">
                        <div class="header-column justify-content-start"> 

                            <!-- Logo
                            ============================================= -->
                            <div class="logo"> <a href="index" title="Quickai - HTML Template"><img src="public/images/admin/<?php echo $site->sitelogo; ?>" alt="Quickai" width="220" height="80" /></a> </div>
                            <!-- Logo end --> 

                        </div>
                        <div class="header-column justify-content-end"> 

                            <!-- Primary Navigation
                            ============================================= -->
                            <nav class="primary-menu navbar navbar-expand-lg">
                                <div id="header-nav" class="collapse navbar-collapse">
                                    <ul class="navbar-nav">
                                        <li class="dropdown active"> <a class="dropdown-toggle" href="index">Home</a></li>
                                        <li class="dropdown active"> <a class="dropdown-toggle" href="aboutus">About Us</a></li>
                                        <li class="dropdown active"> <a class="dropdown-toggle" href="faq">Faq's</a></li>
                                        <li class="dropdown active"> <a class="dropdown-toggle" href="support">Support</a></li>
                                        <li class="dropdown active"> <a class="dropdown-toggle" href="contact">Contact Us</a></li>
                                        
<!--                                        <li class="dropdown"> <a class="dropdown-toggle" href="#">Pages</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="about-us.php">About Us</a></li>
                                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Login/Signup</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="login-signup.php">Page</a></li>
                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#login-signup" href="#">Dialog Popup</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                                                <li><a class="dropdown-item" href="orders.php">Orders</a></li>
                                                <li><a class="dropdown-item" href="payment.php">Payment</a></li>
                                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Elements</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="elements.php">Elements</a></li>
                                                        <li><a class="dropdown-item" href="elements-2.php">Elements 2</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="dropdown-item" href="faq.php">Faq</a></li>
                                                <li><a class="dropdown-item" href="support.php">Support</a></li>
                                                <li><a class="dropdown-item" href="contact-us.php">Contact Us</a></li>
                                            </ul>
                                        </li>-->
                                        <?php if($this->session->userdata('user_email') == ""){ ?>
                                        <li class="login-signup ml-lg-2"><a class="pl-lg-4 pr-0" data-toggle="modal" data-target="#login-signup" href="#" title="Login / Sign up">Login / Sign up <span class="d-none d-lg-inline-block"><i class="fas fa-user"></i></span></a></li>
                                        <?php } else { ?>
                                        <li class="login-signup ml-lg-2"><a class="pl-lg-4 pr-0" href="profile" title="Login / Sign up">Dashboard <span class="d-none d-lg-inline-block"><i class="fas fa-user"></i></span></a></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Primary Navigation end --> 

                        </div>

                        <!-- Collapse Button
                        ============================================= -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav"> <span></span> <span></span> <span></span> </button>
                    </div>
                </div>
            </header>
            <!-- Header end --> 