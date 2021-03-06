<?php
if(!isset($_SESSION)){
    session_start();
}
include 'vendor/autoload.php';
use App\classes\Member;
use App\classes\Cart;
use App\classes\Contact;

$contact = Contact::getcontactInfo();
$social = Contact::getSocialInfo();

if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    Member::userLogOut();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Leed World</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <?php if($contact){ ?>
                            <li><a href="#"><i class="fa fa-phone"></i> <?php echo $contact['mobile']; ?></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> <?php echo $contact['email']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                    <?php if($social) { ?>
                        <ul class="nav navbar-nav">
                            <li><a target="_blank" href="<?php echo $social['fb']; ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="<?php echo $social['tw']; ?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="<?php echo $social['ln']; ?>"><i class="fa fa-linkedin"></i></a></li>
                            <li><a target="_blank" href="<?php echo $social['gp']; ?>"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <!--<a href="index.php"><img src="assets/images/home/logo.png" alt="" /></a>-->
                        <h3><a href="index.php"><span>LEED</span>-WORLD</a></h3>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php" class="active"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="about-us.php" class="active"><i class="fa fa-crosshairs"></i> About us</a></li>
                            <?php $chkcart =  Cart::checkCartTable();
                            if(!empty($chkcart)){ ?>
                            <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <?php } ?>
                            <?php if(isset($_SESSION['id'])){ ?>
                            <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="member.php"><i class="fa fa-crosshairs"></i> Member</a></li>
                            <?php } ?>
                            <li><a href="contact.php"><i class="fa fa-crosshairs"></i> Contact</a></li>
                            <?php
                            if(isset($_SESSION['id'])){ ?>
                                <li><a href="?action=logout"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                           <?php }else{ ?>
                                <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="registration.php"><i class="fa fa-lock"></i> Registration</a></li>
                            <?php }?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
</header><!--/header-->