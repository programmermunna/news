<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM category WHERE id='$id'"));

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $time = time();

  $sql = "UPDATE category SET name='$name' WHERE id='$id'";
  $query = mysqli_query($conn,$sql);
  if($query){
  $msg = "Successfully Updated Category!";
  header("location:category-all.php?msg=$msg");
  }else{
  $msg = "Something is worng!";
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
          <form id="edit_customer_form" action="" method="POST" enctype="multipart/form-data">
          <div>
            <label>Category Name</label>
            <input type="text" name="name" class="input" value="<?php echo $row['name']?>" />
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

