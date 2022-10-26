<?php include("admin/include/functions.php");?>
<?php

if(isset($_SESSION['user_id'])){
   $id = $_SESSION['user_id'];  
}elseif(isset($_COOKIE['user_id'])){
  $id = $_COOKIE['user_id'];
}else{
  $id = 0;
}

if($id==0){
    // header("location:logout.php");
}

if(isset($_SESSION['user_id'])){
  $id = $_SESSION['user_id'];
}

$admin_info = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$id"));
$setting = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM setting WHERE id=1"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $setting['name']?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="admin/upload/<?php echo $setting['favicon']?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.2.1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet" />

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
                <?php if($setting['logo']!=""){ ?> 
                    <img style="width:200px;height:60px" src="admin/upload/<?php echo $setting['logo'];?>">
                    <?php }else{ ?> 
                    <a href="index.php"><?php echo $setting['name']?></a>
                    <?php  } ?>
                </div>

                <div class="nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>                       

                        <?php                      
                        function show_menu(){                      
                           $menus = '';                       
                           $menus .= menus();
                           echo $menus;
                       }
                       
                       function menus($parent_id=0){
                           global $conn;
                           $menu = '';
                           $sql = '';
                           if($parent_id==0){
                               $sql = "SELECT * FROM menu WHERE parent_id = 0";
                           }else{
                               $sql = "SELECT * FROM menu WHERE parent_id = $parent_id";
                           }
                       
                           $result = mysqli_query($conn,$sql);
                           while($row = mysqli_fetch_assoc($result)){
                               if($row['name']){
                                   $menu.= '<li><a href="'.$row['url'].'">'.$row['name'].'</a>';
                               }else{
                               }
                               $menu.= '<ul class="dropdown">'.menus($row['id']).'</ul>';
                               $menu.= '</li>';
                           }
                           return $menu;
                       }                       
                        show_menu(); 
                        ?>

                        <li><a href="post-all.php">POSTS</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>
                </div>


                <div class="login">
                    <?php 
                    if(!isset($_SESSION['user_id'])){ ?>
                    <a href="login.php">Login</a>
                    <a href="sign-in.php">Sign In</a>
                    <?php }else{?>
                    <a href="#!">My Account</a>
                    <div class="my_profile">
                        <ul>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="add-post.php">Add Post</a></li>
                            <li><a href="my-post.php">My POsts</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>





    <!-- Header area -->
    <!-- <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #fff;box-shadow:0px 1px 1px 1px #dfdfdf;">
        <div class="container">
            <div class="head">
                <div class="logo">
                <?php if($setting['logo']!=""){ ?> 
                    <img style="width:200px;height:60px" src="admin/upload/<?php echo $setting['logo'];?>">
                    <?php }else{ ?> 
                    <a href="index.php"><?php echo $setting['name']?></a>
                    <?php  } ?>
                </div>
                <div class="nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#!">CATEGORIES</a>
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
                        <li><a href="post-all.php">POSTS</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>
                </div>
                <div class="login">
                    <?php 
                    if(!isset($_SESSION['user_id'])){ ?>
                    <a href="login.php">Login</a>
                    <a href="sign-in.php">Sign In</a>
                    <?php }else{?>
                    <a href="#!">My Account</a>
                    <div class="my_profile">
                        <ul>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="add-post.php">Add Post</a></li>
                            <li><a href="my-post.php">My POsts</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div> -->

    <?php
    $ad = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ad WHERE position=1 ORDER BY RAND() LIMIT 1"));
    if($ad>0){ ?>
    <div class="container">
        <div class="row">
        <div class="col-12 mt-5">
                <div style="width: fit-content;margin: 0 auto;" class="section-title border">
                    <?php echo $ad['embed'];?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    