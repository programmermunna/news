<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->

<!-- Content here -->
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">My POSTS</h4>
                </div>
                <div style="overflow:auto;" class="bg-white border border-top-0 p-4 mb-3">
                    <table class="user_table">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php
                                $email = $admin_info['email'];
                                $i = 0;
                                $user_post = mysqli_query($conn,"SELECT * FROM post WHERE email='$email'");
                                while($row = mysqli_fetch_assoc($user_post)){ $i++?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><img style="height:50px;" src="admin/upload/ss.jpg" alt=""></td>
                                <td><?php echo $row['title']?></td>
                                <td><?php echo $row['category']?></td>
                                <td><?php echo $row['status']?></td>
                                <td><?php echo date("d-m-y",$row['time']);?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php include("common/sidebar.php") ?>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
<!-- Content here -->

<!-- Side Navbar Links -->
<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
