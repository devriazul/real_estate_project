<?php
ob_start();
session_start();
$cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
include 'config/config.php';
if($cur_page == 'agent-payment.php' || $cur_page == 'agent-paypal-success.php') {
    include 'config/config_paypal.php';
}
if($cur_page == 'agent-payment.php' || $cur_page == 'agent-stripe-success.php') {
    include 'config/config_stripe.php';
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$sessionTimeout = 1200; // 20 minutes
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $sessionTimeout) {
    session_unset();
    session_destroy();
    header('location: '.BASE_URL.'select-user');
    exit;
}
// Update the last activity time
$_SESSION['last_activity'] = time();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <title>The Home</title>

    <link rel="icon" type="image/png" href="uploads/favicon.png">

    <!-- All CSS -->
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/animate.min.css">
    <link rel="stylesheet" href="dist/css/magnific-popup.css">
    <link rel="stylesheet" href="dist/css/select2.min.css">
    <link rel="stylesheet" href="dist/css/all.css">
    <link rel="stylesheet" href="dist/css/meanmenu.css">
    <link rel="stylesheet" href="dist/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="dist/css/owl.carousel.min.css">
    <link rel="stylesheet" href="dist/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/iziToast.min.css">
    <link rel="stylesheet" href="dist/css/spacing.css">
    <link rel="stylesheet" href="dist/css/style.css">

    <!-- All Javascripts -->
    <script src="dist/js/jquery-3.6.3.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.magnific-popup.min.js"></script>
    <script src="dist/js/wow.min.js"></script>
    <script src="dist/js/select2.min.js"></script>
    <script src="dist/js/jquery.waypoints.min.js"></script>
    <script src="dist/js/moment.min.js"></script>
    <script src="dist/js/dataTables.bootstrap5.min.js"></script>
    <script src="dist/js/owl.carousel.min.js"></script>
    <script src="dist/js/jquery.meanmenu.js"></script>
    <script src="dist/js/iziToast.min.js"></script>
    <script src="dist/tinymce/tinymce.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="navbar-area" id="stickymenu">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="index.html" class="logo">
                <img src="uploads/logo.png" alt="">
            </a>
        </div>

        <!-- Menu For Desktop Device -->
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="">
                        <img src="uploads/logo.png" alt="">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a href="" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="properties.php?name=&location_id=&type_id=&amenity_id=&purpose=&bedrooms=&bathrooms=&price=&p=1" class="nav-link">Properties</a>
                            </li>
                            <li class="nav-item">
                                <a href="agents/1" class="nav-link">Agents</a>
                            </li>
                            <li class="nav-item">
                                <a href="locations" class="nav-link">Locations</a>
                            </li>
                            <li class="nav-item">
                                <a href="pricing" class="nav-link">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a href="faq" class="nav-link">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a href="blog" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="contact" class="nav-link">Contact</a>
                            </li>
                            <?php if(isset($_SESSION['customer'])): ?>
                                <li class="nav-item">
                                <a href="customer-dashboard" class="nav-link">Dashboard</a>
                            </li>
                            <?php endif; ?>

                            <?php if(isset($_SESSION['agent'])): ?>
                                <li class="nav-item">
                                <a href="agent-dashboard" class="nav-link">Dashboard</a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if( !isset($_SESSION['customer']) && !isset($_SESSION['agent']) ): ?>
                            <li class="nav-item">
                                <a href="select-user" class="nav-link">Login</a>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>