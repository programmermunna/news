<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $post = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM post WHERE id=$id"));
    $visitors = mysqli_query($conn,"UPDATE post SET visits = visits+1 WHERE id = $id");
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
                        <img style="height:400px;" class="img-fluid w-100" src="admin/upload/<?php echo $post['img']?>" style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="post-all.php?category=<?php echo $post['category'];?>"><?php echo $post['category']?></a>
                                <a class="text-body" href="post-all.php?date=<?php echo $post['time']?>"><?php $date = $post['time'];  echo date('d-m-Y', $date); ?></a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?php echo $post['title']?></h1>
 
                            <?php echo $post['content']?> 
                        </div>

                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        <div class="d-flex align-items-center">
                                <a href="post-all.php?author=<?php echo $post['author'];?>"><img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                <small><?php echo $post['author'];?></small></a>                                        
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i><?php echo $post['visits'];?></span>
                                <span class="ml-3"><i class="far fa-comment mr-2"></i>123</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        <div class="d-flex align-items-center tag">                          
                            <h6 style="padding-right:10px">Tags: </h6>
                            <?php 
                            $post = mysqli_query($conn,"SELECT * FROM post WHERE id=".$post['id']."");
                            $post = mysqli_fetch_assoc($post);                                
                            $tag = explode(",",$post['tag']);
                            $count = count($tag);
                            foreach($tag AS $key => $value){
                                 echo'<a href="post-all.php?tag='.$value.'">'.$value.'</a>';
                             }?>
                        </div>
                        </div>

                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class="border mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">3 Comments</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <div class="media mb-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><a class="text-secondary font-weight-bold" href="./single.php">John Doe</a>
                                        <small><i>01 Jan 2045</i></small></h6>
                                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                        accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                        ipsum.</p>
                                    <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                </div>
                            </div>
                            <div class="media">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><a class="text-secondary font-weight-bold" href="./single.php">John Doe</a>
                                        <small><i>01 Jan 2045</i></small></h6>
                                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                        accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                        ipsum.</p>
                                    <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                    <div class="media mt-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                            style="width: 45px;">
                                        <div class="media-body">
                                            <h6><a class="text-secondary font-weight-bold" href="./single.php">John
                                                    Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                                labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed
                                                sed
                                                eirmod ipsum.</p>
                                            <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="border mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <form>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave a comment"
                                        class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Comment Form End -->
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
