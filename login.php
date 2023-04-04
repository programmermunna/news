<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->

<?php


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user_info = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$id"));

    $email = $user_info['email'];
    $pass = $user_info['pass'];

    $sql = "SELECT * FROM admin_info WHERE email='$email' AND pass='$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $id = $row['id'];
        $_SESSION['user_id'] = $id;
        setcookie('user_id', $id , time()+86000);
        $msg = "Welcome! Successfull login.";
        header("location:index.php?msg=$msg");
    } else {
        $msg = "Your Email or password is wrong!";
        header("location:login.php?msg=$msg");
    }

}

if (isset($_POST['login_submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['pass']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM admin_info WHERE email='$email' AND pass='$pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $id = $row['id'];
            $_SESSION['user_id'] = $id;
            setcookie('user_id', $id , time()+86000);
            $msg = "Welcome! Successfull login.";
            header("location:index.php?msg=$msg");
        } else {
            $msg = "Your Email or password is wrong!";
            header("location:login.php?msg=$msg");
        }
    } else {
        $msg = "Your Email is not validate!";
        header("location:login.php?msg=$msg");
    }
}




if (isset($_POST['sign_in_submit'])) {
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
            $newsletter = mysqli_query($conn,"INSERT INTO newsletter(email,time) VALUE('$email','$time')");
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
            <div class="col-lg-6">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">LogIN</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <h6 class="text-uppercase font-weight-bold mb-3">Fill-Up Carefully</h6>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control p-4" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control p-4" placeholder="Password" />
                        </div>

                        <div>
                            <button name="login_submit" class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6">
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
                            <button name="sign_in_submit" class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
<!-- Content here -->

<!-- Side Navbar Links -->
<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
