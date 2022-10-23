<div class="col-lg-4">
                    <!-- Social Follow Start -->
                    <div style="box-shadow: -6px 7px#ddd;" class="mb-3">
                        <div class="section-title mb-0">
                            <div class="search">
                                <form action="">
                                    <input type="text">
                                    <button>Search</button>
                                </form>
                            </div>
                        </div>
                        <div class="border bg-white border border-top-0 p-3">
                            <a href="./single.php" class="d-block w-100 text-white text-decoration-none mb-3"
                                style="background: #39569E;">
                                <i class="fab fa-facebook-f text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Fans</span>
                            </a>
                            <a href="./single.php" class="d-block w-100 text-white text-decoration-none mb-3"
                                style="background: #52AAF4;">
                                <i class="fab fa-twitter text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="./single.php" class="d-block w-100 text-white text-decoration-none mb-3"
                                style="background: #0185AE;">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Connects</span>
                            </a>
                            <a href="./single.php" class="d-block w-100 text-white text-decoration-none mb-3"
                                style="background: #C8359D;">
                                <i class="fab fa-instagram text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="./single.php" class="d-block w-100 text-white text-decoration-none mb-3"
                                style="background: #DC472E;">
                                <i class="fab fa-youtube text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Subscribers</span>
                            </a>
                            <a href="./single.php" class="d-block w-100 text-white text-decoration-none"
                                style="background: #055570;">
                                <i class="fab fa-vimeo-v text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    <div class="border mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                        </div>
                        <div class="col-12">
                            <div style="margin:0;" class="section-title">
                                <?php $ad = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ad ORDER BY RAND() LIMIT 1"));echo $ad['embed'];?>                        
                            </div>
                        </div>
                    </div>


                    <!-- Ads End -->

                    <!-- Popular News Start -->                    
                    <div class="border mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Popular News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">

                        <?php $post = mysqli_query($conn,"SELECT * FROM post ORDER BY visits LIMIT 5");
                        while($row = mysqli_fetch_assoc($post)){ ?>

                            <div class="d-flex align-items-center bg-white" style="height: 110px;">
                                <a href="single.php?id=<?php echo $row['id'];?>">
                                    <img style="width:90px;height:70px;"  src="admin/upload/<?php echo $row['img']?>" alt="">
                                </a>
                                <div
                                    class="w-100 h-100 px-3 d-flex flex-column justify-content-center ">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                            href="post-all.php?category=<?php echo $row['category'];?>"><?php echo $row['category']?></a>
                                        <a class="text-body" href="post-all.php?date=<?php echo $row['time']?>"><small><?php echo date('d-m-y',$row['time']);?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                        href="single.php?id=<?php echo $row['id'];?>"><?php $my_string = $row['title'];echo implode(' ', array_slice(explode(' ', $my_string), 0, 6));?></a>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="border mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                            <div class="input-group mb-2" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                </div>
                            </div>
                            <small>Lorem ipsum dolor sit amet elit</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="border mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                        <div class="d-flex flex-wrap m-n1">

                             <?php

                            $post = mysqli_query($conn, "SELECT * FROM post ORDER BY RAND() ");
                            $post = mysqli_fetch_assoc($post);
                            $tag = explode(",", $post['tag']);
                            $count = count($tag);
                            foreach ($tag as $key => $value) {
                                echo '<a class="btn btn-sm btn-outline-secondary m-1" href="post-all.php?tag=' . $value . '">' . $value . '</a>';
                            }?>

                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>