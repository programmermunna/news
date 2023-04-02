<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $post = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM post WHERE id=$id"));
    $visitors = mysqli_query($conn, "UPDATE post SET visits = visits+1 WHERE id = $id");
}

?>
<!-- Content here -->
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="border position-relative mb-3">
                    <img style="height:400px;" class="img-fluid w-100" src="admin/upload/<?php echo $post['img'] ?>" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="post-all.php?category=<?php echo $post['category']; ?>"><?php echo $post['category'] ?></a>
                            <a class="text-body" href="post-all.php?date=<?php echo $post['time'] ?>"><?php $date = $post['time'];
                                                                                                        echo date('d-m-Y', $date); ?></a>
                        </div>
                        <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?php echo $post['title'] ?></h1>

                        <?php echo $post['content'] ?>
                    </div> 

                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        <div class="d-flex align-items-center">
                            <a href="post-all.php?author=<?php echo $post['author']; ?>"><img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                <small><?php echo $post['author']; ?></small></a>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="ml-3"><i class="far fa-eye mr-2"></i><?php echo $post['visits']; ?></span>
                            <span class="ml-3"><i class="far fa-comment mr-2"></i>123</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        <div class="d-flex align-items-center tag">
                            <h6 style="padding-right:10px">Tags: </h6>
                            <?php
                            $post = mysqli_query($conn, "SELECT * FROM post WHERE id=" . $post['id'] . "");
                            $post = mysqli_fetch_assoc($post);
                            $tag = explode(",", $post['tag']);
                            $count = count($tag);
                            foreach ($tag as $key => $value) {
                                echo '<a href="post-all.php?tag=' . $value . '">' . $value . '</a>';
                            } ?>
                        </div>
                    </div>

                </div>
                <!-- News Detail End -->

                <!-- =============ad================ -->
                <?php 
                $ad = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ad WHERE position=5 ORDER BY RAND() LIMIT 1"));
                if($ad>0){ ?>
                <div class="col-12">
                    <div class="section-title border">
                        <?php echo $ad['embed'];?>                        
                    </div>
                </div>
                <?php }?>
                <!-- =============ad================ -->

                <?php                 
                if(isset($_POST['send_message'])){

                    if(!isset($_SESSION['user_id'])){
                        header("location:single.php?id=$id&&msg=Please login first");
                    }else{        
                    
                    if(isset($_GET['comment'])){
                    $parent_id = $_GET['comment'];
                    }else{
                    $parent_id = $_POST['parent_id'];
                    }
                        
                    $user_id = $_SESSION['user_id'];
                    $user_info = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$user_id"));
                    $name = $user_info['name'];
                    $email = $user_info['email'];                  
                    $img = $user_info['file'];                  
                    $message = $_POST['message'];
                    $time = time();
                    $insert = mysqli_query($conn,"INSERT INTO comment(post_id,parent_id,name,email,content,img,time) VALUE('$id','$parent_id','$name','$email','$message','$img','$time')");
                    if($insert){
                        $msg='Message Sent Successfull';
                        header("location:single.php?id=$id&&msg=$msg");
                    }
                    
                }
                }                
                ?>
                <!--- Comment Form Start -->
                <div class="border mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        <form action="" method="POST">                       
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <input name="parent_id" type="hidden" value="0">
                                <textarea name="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input name="send_message" type="submit" value="Leave a comment" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Comment Form End -->
                <!-- =============ad================ -->
                <?php 
                $ad = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ad WHERE position=6 ORDER BY RAND() LIMIT 1"));
                if($ad>0){ ?>
                <div class="col-12">
                    <div class="section-title border">
                        <?php echo $ad['embed'];?>                        
                    </div>
                </div>
                <?php }?>
                <!-- =============ad================ -->


            </div>
            <?php include("common/sidebar.php"); ?>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
<!-- Content here -->

<!-- Side Navbar Links -->
<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
