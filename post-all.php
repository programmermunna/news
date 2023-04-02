<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 

if(isset($_GET['category'])){
    $category = $_GET['category'];
    $post_by = mysqli_query($conn,"SELECT * FROM post WHERE status='Publish' AND category='$category'");
}elseif(isset($_GET['author'])){
    $author = $_GET['author'];
    $post_by = mysqli_query($conn,"SELECT * FROM post WHERE status='Publish' AND author='$author'");
}elseif(isset($_GET['tag'])){
    $tag = $_GET['tag'];
    $post_by = mysqli_query($conn,"SELECT * FROM post WHERE status='Publish' AND tag LIKE '%".$tag."%'");
}elseif(isset($_GET['date'])){
    $date = $_GET['date'];
    $post_by = mysqli_query($conn,"SELECT * FROM post WHERE status='Publish' AND time='$date'");
}elseif(isset($_GET['search'])){
    $search = $_GET['search'];
    $post_by = mysqli_query($conn,"SELECT * FROM post WHERE status='Publish' AND (title LIKE '%$search%' OR category LIKE '%$search%' OR author LIKE '%$search%' OR time LIKE '%$search%')");
}else{
    $post_by = mysqli_query($conn,"SELECT * FROM post WHERE status='Publish' ORDER BY id DESC");
}
?>

<!-- Content here -->
    <!-- News With Sidebar Start -->
    <div class="container-fluid my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                            <?php 
                            if(isset($_GET['category'])){
                            echo '<h4 class="m-0 text-uppercase font-weight-bold">All Posts</h4>'.$_GET['category'];
                            }elseif(isset($_GET['author'])){
                            echo '<h4 class="m-0 text-uppercase font-weight-bold">All Posts</h4>'.$_GET['author'];
                            }elseif(isset($_GET['tag'])){
                            echo '<h4 class="m-0 text-uppercase font-weight-bold">All Posts</h4>'.$_GET['tag'];
                            }elseif(isset($_GET['date'])){
                            echo '<h4 class="m-0 text-uppercase font-weight-bold">All Posts</h4>'. date('d-m-Y', $_GET['date']);
                            }elseif(isset($_GET['search'])){
                            echo '<h4 class="m-0 text-uppercase font-weight-bold">All Posts</h4>'.$_GET['search'];
                            }else{
                            echo '<h4 class="m-0 text-uppercase font-weight-bold">All Posts</h4>';
                            }
                            ?>
                            </div>
                        </div>

                        <?php 
                        while($row = mysqli_fetch_assoc($post_by)){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-3">
                            <div class="position-relative">
                                <img style="height:200px;" class="img-fluid w-100" src="admin/upload/<?php echo $row['img'];?>" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="post-all.php?category=<?php echo $row['category'];?>"><?php echo $row['category'];?></a>

                                        <a href="post-all.php?date=<?php echo $row['time']?>"><small class="ml-3"><?php $date = $row['time'];  echo date('d-m-Y', $date); ?></small></a>  
                                    </div>
                                    <a style="text-decoration: none;" class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="single.php?id=<?php echo $row['id'];?>"><?php $my_string = $row['title'];echo implode(' ', array_slice(explode(' ', $my_string), 0, 6));?></a></p>

                                    <p><?php $my_string = $row['summery'];echo implode(' ', array_slice(explode(' ', $my_string), 0, 15));?></p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <a style="color:#9A9DA2;" href="post-all.php?author=<?php echo $row['author'];?>"><img class="rounded-circle mr-2" src="admin/upload/<?php echo $row['author_img'];?>" width="25" height="25" alt="">
                                        <small><?php echo $row['author'];?></small></a>                                        
                                    </div>
                                    <div class="d-flex align-items-center">                                        
                                        <span class="ml-3"><i class="far fa-eye mr-2"></i><?php echo $row['visits'];?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>  




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End --> 
<!-- Content here -->

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->