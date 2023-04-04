<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 

    $all_post = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM post"));
    $publish = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM post WHERE status='Publish'"));
    $draft = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM post WHERE status='Draft'"));

    $moderator = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin_info WHERE role='Moderator'"));
    $super_user = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin_info WHERE role='User'"));
    $user = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin_info WHERE role='User'"));

    $ad = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ad"));
    $category = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM category"));
    $newsletter = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM newsletter"));
    $comment = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM comment"));

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
          <div class="home_card" style="background:#3B82F6;">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#10070</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $all_post; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Post</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
          
           <!-- ------box------ -->
          <div class="home_card" style="background:#16A34A;">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#10070</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $publish; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Published Post</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card" style="background:#EAB308;">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#10070</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $draft;?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Draft Post</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card" style="background:#EC4899;">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#10070</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $ad;?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Ads</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card" style="background:#06B6D4;">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#10070</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $moderator;?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Moderator</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card" style="background:#F43F5E;">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#10070</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $super_user;?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Super User</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card" style="background:#F97316;">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#10070</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $user;?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Normal User</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card" style="background:#A855F7;">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#10070</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $newsletter;?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Newsletter User</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card" style="background:#3B82F6;">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#10070</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $category;?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Categories</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card" style="background:#16A34A;">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#10070</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $comment;?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Comments</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%"></div>
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