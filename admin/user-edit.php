<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$id"));

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $time = time();

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  if(empty($file_name)){
    $sql = "UPDATE admin_info SET name='$name', email='$email',role='$role', time='$time' WHERE id='$id'";
  }else{
    $sql = "UPDATE admin_info SET name='$name', email='$email', file='$file_name',role='$role', time='$time' WHERE id='$id'";
  }
  $query = mysqli_query($conn,$sql);
  if($query){
  $msg = "Successfully Updated User!";
  header("location:user-edit.php?msg=$msg&&id=$id");
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
            <span>Customer Information</span>
            <a href="user-view.php?id=<?php echo $id;?>">
              <span class="eye_icon"></span>
            </a>
          </div>
          <form id="edit_customer_form" action="" method="POST" enctype="multipart/form-data">
          <div>
            <label>Full Name</label>
            <input type="text" name="name" class="input" value="<?php echo $row['name']?>" />
            </div>
            <div>
            <label>Email</label>
            <input type="text" name="email" class="input" value="<?php echo $row['email']?>" />
            </div>
            <div>
            <label>Image</label>
            <input type="file" name="file" class="input" />
            </div>
            <div>
            <label>Role</label>
            <select name="role" class="input" id="">
              <?php 
              if($row['role']=='Moderator'){
                echo '<option selected value="Moderator">Moderator</option>';
                echo '<option  value="User">User</option>';
                echo '<option  value="Normal User">Normal User</option>';
              }elseif($row['role']=='User'){
                echo '<option selected value="User">User</option>';
                echo '<option  value="Normal User">Normal User</option>';
                echo '<option  value="Moderator">Moderator</option>';

              }else{
                echo '<option  value="User">User</option>';
                echo '<option value="Moderator">Moderator</option>';
                echo '<option selected value="Normal User">Normal User</option>';
              }
              ?>
            </select>
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

