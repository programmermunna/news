<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->

<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $u_pass = md5($_POST['pass']);
    $u_cpass = md5($_POST['cpass']);
    $time = time();

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp, "admin/upload/$file_name");

    $sign_check = "SELECT * FROM admin_info WHERE email='$email'";
    $sign_query = mysqli_query($conn, $sign_check);
    $sign_query = mysqli_fetch_assoc($sign_query);
    if ($sign_query > 0) {
        $msg = "You have an Account! Please login or forgot.";
        header("location:sign-in.php?msg=$msg");
    } else {
            if($u_pass==$u_cpass){
            $insert = "INSERT INTO admin_info(name,email,pass,file,time) VALUE('$name','$email','$u_pass','$file_name','$time')";
            $insert_query = mysqli_query($conn, $insert);
            if ($insert_query) {
                $sql = "SELECT * FROM admin_info WHERE email='$email' AND pass='$u_pass'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                if ($row > 0) {
                    $id = $row['id'];
                      $_SESSION['user_id'] = $id;
                      setcookie('user_id', $id , time()+86000);
                    header('location:index.php');
                }
            }
        }else{
            $msg = "Password And Confirm Password are not matched!";
            header("location:sign-in.php?msg=$msg");
        }     
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
                    <h4 class="m-0 text-uppercase font-weight-bold">Sign IN</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <h6 class="text-uppercase font-weight-bold mb-3">Fill-Up Carefully</h6>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control p-4" placeholder="Name" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control p-4" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control p-4" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="cpass" class="form-control p-4" placeholder="Confirm Password" />
                        </div>
                        <div class="form-group">
                            <input style="padding:3px;" type="file" name="file" class="form-control" />
                        </div>

                        <div>
                            <button name="submit" class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php include("common/sidebar.php") ?>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
<!-- Content here -->

<!-- Side Footer Links -->
<?php include("common/footer.php"); ?>
<!-- Side Footer Links -->

<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
