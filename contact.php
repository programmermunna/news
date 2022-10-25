<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->

<?php 
    $mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail_setting WHERE id=1"));
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];    
    $subject = $_POST['subject'];
    $message = $_POST['message'];    
    $headers = 'From: '.$email;    
    $to = $mail['site_replay_email'];
    $send = mail($to, $subject, $message, $headers);

    if($send){
        $msg = "Send Message Successfully";
        header("location:contact.php?msg=$msg");
    }else{
        $msg = "Something is wrong!";
        header("location:contact.php?msg=$msg");
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
                        <h4 class="m-0 text-uppercase font-weight-bold">Contact Us For Any Queries</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <div class="mb-4">
                            <h6 class="text-uppercase font-weight-bold">Contact Info</h6>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore animi similique eum iste optio? Nisi aliquid nobis doloribus delectus alias modi excepturi voluptas ex assumenda esse quia eos, maiores repudiandae ea quod error ipsum commodi fugit voluptatum voluptatem perferendis</p>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Our Office</h6>
                                </div>
                                <p class="m-0"><?php echo $setting['address']?></p>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-envelope-open text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Email Us</h6>
                                </div>
                                <p class="m-0"><?php echo $setting['email']?></p>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-phone-alt text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Call Us</h6>
                                </div>
                                <p class="m-0"><?php echo $setting['phone']?></p>
                            </div>
                        </div>
                        <h6 class="text-uppercase font-weight-bold mb-3">Contact Us</h6>
                        <form action="" method="POST">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control p-4" placeholder="Your Name"
                                            required="required" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control p-4" placeholder="Your Email"
                                            required="required" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="subject" type="text" class="form-control p-4" placeholder="Subject" required="required" />
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="4" placeholder="Message"
                                    required="required"></textarea>
                            </div>
                            <div>
                                <button name="submit" class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit">Send Message</button>
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
