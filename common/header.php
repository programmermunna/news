<?php include("admin/include/functions.php");?>
<?php

if(isset($_SESSION['user_id'])){
   $id = $_SESSION['user_id'];  
}elseif(isset($_COOKIE['user_id'])){
  $id = $_COOKIE['user_id'];
}else{
  $id = 0;
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
    <link rel="shortcut icon" href="admin/upload/<?php echo $setting['favicon']?>" type="image/x-icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.2.1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet"> -->
    <link href="https://fonts.maateen.me/mukti/font.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anek Bangla" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="lib/slicknav/slicknav.css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
</head>

<body>
    <!-- Header area -->
    <div class="container-fluid py-4 px-sm-3 px-md-5 header_container">
        <div class="container">
            <div class="head">
                <div class="logo">
                <?php if($setting['logo']!=""){ ?> 
                    <a href="index.php"><img style="width:200px;height:60px" src="admin/upload/<?php echo $setting['logo'];?>"></a>
                    <?php }else{ ?> 
                    <a href="index.php"><?php echo $setting['name']?></a>
                    <?php  } ?>
                </div>

                <div  class="nav">
                    <ul id="menu">
                        <li><a href="index.php">হোম</a></li>

                        
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

                        <li><a href="post-all.php">পাঠ্য</a></li>
                        <li><a href="contact.php">যোগাযোগ</a></li>
                    </ul>
                </div>


                <div class="login">
                    <?php 
                    if(!isset($_SESSION['user_id'])){ ?>
                    <a class="account_btn" href="login.php">লগিন/সাইন-ইন</a>
                    <?php }else{?>
                    <a class="account_btn" href="#!">আমার একাউন্ট</a>
                    <div class="my_profile">
                        <ul>
                            <?php
                            if($admin_info['role'] == 'Normal User'){?>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            <?php }else{ ?>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="add-post.php">New Post</a></li>
                            <li><a href="my-post.php">My Posts</a></li>
                            <li><a href="logout.php">Logout</a></li>
                            <?php }?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <?php
    $ad = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ad WHERE position=1 ORDER BY RAND() LIMIT 1"));
    if($ad>0){ ?>
    <div class="container">
        <div class="row">
        <div class="col-12 mt-5">
                <div style="margin: 0 auto;" class="section-title border">
                    <?php echo $ad['embed'];?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    


<script>
    $(document).ready(function(){
        $('#menu').slicknav();
    })
</script>
