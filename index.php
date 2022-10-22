<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php include("common/slider.php");?>

<!-- Content here -->
    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none"
                                    href="post-all.php">View All</a>
                            </div>
                        </div>

                        <?php $post = mysqli_query($conn,"SELECT * FROM post ORDER BY id DESC LIMIT 4");
                        while($row = mysqli_fetch_assoc($post)){ ?>

                        <div class="col-lg-6 col-md-6 col-sm-12 pb-3">
                            <div class="position-relative border">
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
                                        <a style="color:#9A9DA2;" href="post-all.php?author=<?php echo $row['author'];?>"><img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                        <small><?php echo $row['author'];?></small></a>                                        
                                    </div>
                                    <div class="d-flex align-items-center">                                        
                                        <span class="ml-3"><i class="far fa-eye mr-2"></i><?php echo $row['visits'];?></span>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?> 

                        <!-- =============ad================ -->

                        <!-- =============ad================ -->

                        <?php $post = mysqli_query($conn,"SELECT * FROM post ORDER BY RAND() LIMIT 4");
                        while($row = mysqli_fetch_assoc($post)){ ?>

                        <div class="col-lg-6">
                            <div class="d-flex align-items-center bg-white mb-3 border" style="height: 110px;">
                                 <a href="single.php?id=<?php echo $row['id'];?>">
                                    <img style="width:100;height:105px;" class="img-fluid" src="admin/upload/<?php echo $row['img'];?>" alt="">
                                </a>
                                <div
                                    class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                            href="post-all.php?category=<?php echo $row['category'];?>"><?php echo $row['category']?></a>
                                        <a class="text-body" href="post-all.php?date=<?php echo $row['time']?>"><small><?php echo date('d-m-y', $row['time']);?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                        href="single.php?id=<?php echo $row['id'];?>"><?php echo $row['title']?></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php $post = mysqli_query($conn,"SELECT * FROM post ORDER BY RAND() LIMIT 4");
                        while($row = mysqli_fetch_assoc($post)){ ?>

                        <div class="col-lg-6 col-md-6 col-sm-12 pb-3">
                            <div class="position-relative border">
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
                                        <a style="color:#9A9DA2;" href="post-all.php?author=<?php echo $row['author'];?>"><img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                        <small><?php echo $row['author'];?></small></a>                                        
                                    </div>
                                    <div class="d-flex align-items-center">                                        
                                        <span class="ml-3"><i class="far fa-eye mr-2"></i><?php echo $row['visits'];?></span>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
                <?php include("common/sidebar.php");?>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End --> 
<!-- Content here -->

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->