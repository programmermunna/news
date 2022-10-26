<div class="col-lg-4">
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <div class="search">
                                <form action="">
                                    <input type="text">
                                    <button>Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Social Follow End -->



                    <!------------- ad --------->
                    <?php $ad = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ad WHERE position=7 ORDER BY RAND() LIMIT 1"));
                        if($ad>0){ ?>

                    <div class=" mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                        </div>
                        <div class="col-12">
                            <div style="margin:0;" class="section-title">
                                <?php echo $ad['embed'];?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!------------- ad --------->


                    <!-- Ads End -->

                    <!-- Popular News Start -->                    
                    <div class="border mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Popular News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">

                        <?php $post = mysqli_query($conn,"SELECT * FROM post  WHERE status='Publish' ORDER BY visits LIMIT 5");
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
                    <?php include("newsletter.php")?>
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
                            <?php
                            $post = mysqli_query($conn, "SELECT * FROM post ORDER BY RAND() ");
                            $post = mysqli_fetch_assoc($post);
                            $tag = explode(",", $post['tag']);
                            $count = count($tag);
                            foreach ($tag as $key => $value) {
                                echo '<a class="btn btn-sm btn-outline-secondary m-1" href="post-all.php?tag=' . $value . '">' . $value . '</a>';
                            }?><?php
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