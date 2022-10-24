<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->

<?php

if (isset($_POST['submit'])) {
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


?>

<!-- Content here -->
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
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
                            <button name="submit" class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Login</button>
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

<!-- Side Navbar Links -->
<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
