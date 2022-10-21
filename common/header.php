<?php include("admin/include/functions.php");?>
<?php

// if(isset($_SESSION['admin_id'])){
//    $id = $_SESSION['admin_id'];  
// }elseif(isset($_COOKIE['admin_id'])){
//   $id = $_COOKIE['admin_id'];
// }else{
//   $id = 0;
// }
// if(isset($_SESSION['admin_id'])){
//   $id = $_SESSION['admin_id'];
// }
// if($id<1){
//   header('location:login.php');
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BizNews - Free News Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
    <!-- Header area -->
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #fff;box-shadow:0px 1px 1px 1px #dfdfdf;">
        <div class="container">
            <div class="head">
                <div class="logo">
                    <a href="index.php">LOGO</a>
                </div>
                <div class="nav">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">CATEGORIES</a>
                            <ul>
                                <li><a href="">PHP</a></li>
                                <li><a href="">PYTHON</a></li>
                                <li><a href="">JS</a></li>
                                <li><a href="">C</a></li>
                                <li><a href="">JAVA</a></li>
                                <li><a href="">RUBY</a></li>
                            </ul>
                        </li>
                        <li><a href="">SERVICES</a></li>
                        <li><a href="">TEMPLATES</a></li>
                        <li><a href="">CONTACT</a></li>
                    </ul>
                </div>
                <div class="login">
                    <a href="">Login</a>
                    <a href="">Sign In</a>
                    <!-- <a href="">My Account</a> -->
                </div>
            </div>
        </div>
    </div>