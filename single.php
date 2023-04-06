<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
    $post = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM post WHERE id=$id"));
    $title = $post['title'];
    $title = str_replace(" ","-",$title);
    
    $visitors = mysqli_query($conn, "UPDATE post SET visits = visits+1 WHERE id = $id");

    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM comment WHERE post_id=$id"))){
    }else{
        header("location:single-post.php?$title&id=$id");
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

                <!-- Comment List Start -->
                <div class="border mb-3">
                    <div class="section-title mb-0">
                    <?php 
                    $comment_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM comment WHERE post_id=$id"));
                    if($comment_count){
                        echo '<h4 class="m-0 text-uppercase font-weight-bold"> '.$comment_count.' Comments</h4>';
                    }else{
                        echo '<h4 class="m-0 text-uppercase font-weight-bold">No Comments</h4>';
                    }
                    ?>                        
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                    <?php                    
                    $comment = mysqli_query($conn,"SELECT * FROM comment WHERE post_id=$id");
                    while ($row = mysqli_fetch_assoc($comment)) {
                        $array[] = $row;
                    }
                    
                    $arr = buildTree($array);
                    function buildTree($data, $parent = 0) {
                        $tree = array();
                        foreach ($data as $d) {
                            if ($d['parent_id'] == $parent) {
                                $children = buildTree($data, $d['id']);
                                // set a trivial key
                                if (!empty($children)) {
                                    $d['_children'] = $children;
                                }
                                $tree[] = $d;
                            }
                        }
                        return $tree;
                    }            
                    

                    printTree($arr);
                    function printTree($arr, $r = 0, $p = null) {
                        foreach ($arr as $i => $t) {
                            $dash = ($t['parent_id'] == 0) ? '' : str_repeat('30+',$r);
                            $dash = array_sum(explode( '+', $dash));
                            $img = $t['img'];
                            $name = $t['name'];
                            $content = $t['content'];
                            $comment_id = $t['id'];
                            $time = date('d-m-y',$t['time']);
                            $post_id = $_GET['id'];
                        echo "<div style='border-bottom:1px solid gray;overflow-wrap: anywhere;'>";
                                echo "<div style='padding-left:".$dash."px;margin:20px;display:flex;'>
                                <img style='width:40px;height:40px;margin-right:10px;' src='admin/upload/$img' alt='img'>                              
                                    <div>
                                        <h4>$name <span style='font-size:14px'>$time</span> </h4>                                     
                                        <p>$content</p>
                                        <a style='padding:5px 10px;border:1px solid gray;color:gray' href='single.php?id=$post_id&&comment=$comment_id'>Reply</a>                                   
                                    </div>
                                </div>";
                        echo "</div>";
                           
                            if (isset($t['_children'])) {
                                echo "<div>";
                                printTree($t['_children'], ++$r, $t['parent_id']);
                                --$r;
                                echo "</div>";
                            }
                        }
                    }                    
                    ?>
                    </div>
                </div>

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
