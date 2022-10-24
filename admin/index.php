<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 

    $time = time(); 

    $customer = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customer"));
    $moderator = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin_info WHERE role='Moderator'"));

?>
    <!-- Main Content -->
    <main class="w-full flex bg-gray-100">
      <!-- Side Navbar Links -->
      <?php include('common/sidebar.php')?>
      <!-- Side Navbar Links -->

      <!-- Content -->
      <section class="content_wrapper">
        <h4 class="text-xl font-medium">Dashboard</h4>
        <br />
        <div class="home_content">

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $customer; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Customer</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $moderator; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Moderator</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>
          
        </div>


        
      </section>
      <!-- Content -->
    </main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->