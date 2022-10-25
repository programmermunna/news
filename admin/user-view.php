<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id='$id'"));
?>
<!-- Main Content -->
<main class="main_content">
    <!-- Side Navbar Links -->
    <?php include("common/sidebar.php");?>
    <!-- Side Navbar Links -->
    <!-- Page Content -->
    <section class="content_wrapper">
        <!-- Page Details Title -->

        <!-- Page Main Content -->
        <div class="add_page_main_content">
            <div class="add_page_title">
                <span>user view</span>

                <?php if($admin_info['role']=='Moderator'){ ?>
                <a onclick="alert('Moderator now allowed.')">
                  <span class=" edit_icon"></span>
                </a>
                <?php }else{ ?>
                <a href="user-edit.php?id=<?php echo $id;?>">
                   <span class=" edit_icon"></span>
                </a>
                <?php } ?>


            </div>
            <form id="view_user_form">
                <div>
                    <b>Name</b>
                    <p><?php echo $row['name']?></p>
                </div>
                <div>
                    <b>Email</b>
                    <p><?php echo $row['email']?></p>
                </div>
                <div>
                    <b>Role</b>
                    <p><?php echo $row['role']?></p>
                </div>
                <div>
                    <b>Image</b>
                    <img style="width:300px;height:300px;margin:0 auto;" src="upload/<?php echo $row['file']?>">
                </div>
            </form>
        </div>


    </section>
    <!-- Page Content -->
</main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->