   <!-- Footer Start -->
   <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
     <div class="container">
       <div class="row py-4">

         <div class="col-lg-3 col-md-6 mb-5">
           <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
           <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i><?php echo $setting['address']?></p>
           <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i><?php echo $setting['phone']?></p>
           <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i><?php echo $setting['email']?></p>
           <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
           <div class="d-flex justify-content-start">
            <?php if(!empty($setting['twitter'])){ ?>
              <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="<?php echo $setting['twitter']?>"><i class="fab fa-twitter"></i></a>
              <?php } ?>
              <?php if(!empty($setting['facebook'])){ ?>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="<?php echo $setting['facebook']?>"><i class="fab fa-facebook-f"></i></a>
              <?php } ?>
             <?php if(!empty($setting['linkedin'])){ ?>
              <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="<?php echo $setting['linkedin']?>"><i class="fab fa-linkedin-in"></i></a>
              <?php } ?>
             <?php if(!empty($setting['instagram'])){ ?>
              <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="<?php echo $setting['instagram']?>"><i class="fab fa-instagram"></i></a>
              <?php } ?>
             <?php if(!empty($setting['youtube'])){ ?>
              <a class="btn btn-lg btn-secondary btn-lg-square" href="<?php echo $setting['youtube']?>"><i class="fab fa-youtube"></i></a>
              <?php } ?>
           </div>
         </div>

         <div class="col-lg-3 col-md-6 mb-5">
           <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
           <?php $post = mysqli_query($conn,"SELECT * FROM post  WHERE status='Publish' ORDER BY RAND() DESC LIMIT 2");
            while($row = mysqli_fetch_assoc($post)){ ?>
           <div class="mb-3">
             <div class="mb-2">
               <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="post-all.php?category=<?php echo $row ['category']?>"><?php echo $row ['category']?></a>
               <a class="text-body" href="post-all.php?date=<?php echo $row ['time']?>"><small><?php echo date('d-m-y',$row ['time']);?></small></a>
             </div>
             <a class="small text-body text-uppercase font-weight-medium" href="single.php?id=<?php echo $row ['id']?>"><?php echo $row ['title']?></a>
           </div>
            <?php } ?>
         </div>

         <div class="col-lg-3 col-md-6 mb-5">
           <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
           <div class="m-n1">
           <?php $post = mysqli_query($conn,"SELECT * FROM category ORDER BY RAND() DESC LIMIT 20");
            while($row = mysqli_fetch_assoc($post)){ ?>
             <a href="post-all.php?category=<?php echo $row ['name']?>" class="btn btn-sm btn-secondary m-1"><?php echo $row ['name']?></a>
             <?php } ?>
           </div>
         </div>

         <div class="col-lg-3 col-md-6 mb-5">
           <h5 class="mb-4 text-white text-uppercase font-weight-bold">Our Location</h5>
           <div class="row">
           <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d57556.3072124917!2d88.6447778!3d25.6291895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1666603993687!5m2!1sen!2sbd" width="600" height="207" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           </div>
         </div>
         
       </div>
     </div>
   </div>
   <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
     <p class="m-0 text-center">&copy; <a href="index.php"><?php echo $setting['name']?></a>. All Rights Reserved <a href="index.php"><?php echo date("Y",time())?></a>
     </p>
   </div>
   <!-- Footer End -->
   <!-- Back to Top -->
   <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


   <!-- JavaScript Libraries -->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
   <script src="lib/easing/easing.min.js"></script>
   <script src="lib/owlcarousel/owl.carousel.min.js"></script>

   <!-- Template Javascript -->
   <script src="js/popup.js"></script>
   <script src="lib/pagination/pagination.js"></script>
   <script src="lib/slicknav/slicknav.js"></script>
   <script src="js/main.js"></script>

   </body>

   </html>
   <?php ob_flush(); ?>