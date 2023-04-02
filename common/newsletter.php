<?php 
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $time = time();

   $insert = mysqli_query($conn,"INSERT INTO newsletter(email,time) VALUE('$email','$time')");
   if($insert){
    $msg = "Congratulations";
    header("location:index.php?msg=$msg");
   }
}

?>
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
    </div>
    <div class="bg-white text-center border border-top-0 p-3">
        <form action="" method="POST">
            <div class="input-group mb-2" style="width: 100%;">
                <input name="email" type="text" class="form-control form-control-lg" placeholder="Your Email">
                <div class="input-group-append">
                    <button name="submit" type="submit" class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
</div>