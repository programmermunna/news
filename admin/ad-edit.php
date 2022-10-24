<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if($admin_info['role']=='Moderator'){
    header("location:index.php");
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ad WHERE id='$id'"));


if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $embed = $_POST['embed'];

 $update_ad = mysqli_query($conn, "UPDATE ad SET name='$name',embed='$embed' WHERE id=$id");
 if ($update_ad) {
     $msg = "Successfully Updated a new Ad";
     header("location:ad-all.php?msg=$msg");
 }
}

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
                <span>Category Information</span>
            </div>
            <form action="" method="POST">

                <div>
                    <label>Name</label>
                    <input type="text" name="name" class="input" value="<?php echo $row['name']?>" />
                </div>

                <div>
                    <label>Embed Code</label>
                    <textarea style="margin:20px 0;padding:10px;border:2px solid #dfdfdf;" name="embed" id="text_area" cols="30" rows="5"><?php echo $row['embed'];?></textarea>
                    <p id="embed_show"><?php echo $row['embed'];?></p>
                </div>

                <input style="cursor:pointer" class="btn submit_btn" name="submit" type="submit" valu="Update" />
            </form>
        </div>
    </section>
    <!-- Page Content -->
</main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<!-- <?php if(isset($_GET['msg'])){ ?><script>swal("Good job!", "<?php echo $_GET['msg'];?>", "success");</script><?php }?> -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>