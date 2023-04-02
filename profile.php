<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
if($id<1){
  header("location:index.php");
}
$admin_id = $admin_info['id'];
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];

  if(!empty($_FILES['file']['name'])){
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"admin/upload/$file_name");
  }

  if(empty($_POST['pass']) || empty($_POST['new_pass']) || empty($_POST['confirm_pass'])){
    $sql = "UPDATE admin_info SET name='$name',email='$email',file='$file_name' WHERE id=$admin_id";
    $query = mysqli_query($conn,$sql);
    if($query){
      $msg = "Successfully Updated";
      header("location:profile.php?msg=$msg");
    }
    exit;
  }else{
  $pass = md5($_POST['pass']);
  $new_pass = md5($_POST['new_pass']);
  $confirm_pass = md5($_POST['confirm_pass']);
  }
  $old_pass = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$admin_id"));
  $old_pass = $old_pass['pass'];

  if($pass==$old_pass){
    if($new_pass===$confirm_pass){
      $sql = "UPDATE admin_info SET name='$name',file='$file_name',email='$email',pass='$new_pass' WHERE id=$admin_id";
      $query = mysqli_query($conn,$sql);
      if($query){
        $msg = "Successfully Updated";
        header("location:profile.php?msg=$msg");
      }else{
        $msg = "Somethings error! Please try again.";  
      }
  }else{
    $msg = "Password and Confirm Password are not matched!";
    header("location:profile.php?msg=$msg");
  }  
}else{
  $msg = "Old Password are not matched!";
  header("location:profile.php?msg=$msg");
}
}

?>
<!-- Content here -->
    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Update Profile Details</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control p-4" placeholder="Name" value="<?php echo $admin_info['name']?>" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control p-4" placeholder="Email" value="<?php echo $admin_info['email']?>" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control p-4" placeholder="Old Password" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="new_pass" class="form-control p-4" placeholder="New Password" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_pass" class="form-control p-4" placeholder="Confirm Password" />
                        </div>
                        <div class="form-group">
                            <input style="padding:3px;" type="file" name="file" class="form-control"/>
                        </div>
                        <div style="padding:10px;">
                            <img src="admin/upload/<?php echo $admin_info['file']?>" alt="">
                        </div>

                        <div>
                            <button name="submit" class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Change Profile</button>
                        </div>
                    </form>
                    </div>
                </div>                
                <?php include("common/mini-sidebar.php") ?>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End --> 
<!-- Content here -->

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
