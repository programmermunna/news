<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if($admin_info['role']=='Moderator'){
    header("location:index.php");
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $src = $_GET['src'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM menu WHERE id='$id'"));


if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $content = $_POST['content'];

 $update_menu = mysqli_query($conn, "UPDATE menu SET name='$name',content='$content' WHERE id=$id");
 if ($update_menu) {
     $msg = "Successfully Updated a new Menu";
     header("location:menu-edit.php?src=$src&&id=$id&&msg=$msg");
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
        <div class="add_page_main_content" style="max-width:unset;">
            <div class="add_page_title">
                <span>Category Information</span>
            </div>
            <form action="" method="POST">

                <div>
                    <label>Menu</label>
                    <input type="text" name="name" class="input" value="<?php echo $row['name']?>" />
                </div>

                <div>
                    <label>Page Content</label>
                    <textarea style="margin:20px 0;padding:10px;border:2px solid #dfdfdf;" name="content" id="summernote" cols="30" rows="5"><?php echo $row['content'];?></textarea>
                </div>

                <input style="cursor:pointer" class="btn submit_btn" name="submit" type="submit" valu="Update" />
            </form>
        </div>
    </section>
    <!-- Page Content -->
</main>
<script>
    $('#summernote').summernote({
        placeholder: 'Write here details',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<!-- <?php if(isset($_GET['msg'])){ ?><script>swal("Good job!", "<?php echo $_GET['msg'];?>", "success");</script><?php }?> -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>