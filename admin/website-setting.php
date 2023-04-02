<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if($admin_info['role']=='Moderator'){
  header("location:index.php");
}
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $linkedin = $_POST['linkedin'];
  $instagram = $_POST['instagram'];
  $youtube = $_POST['youtube'];
  $map = $_POST['map'];
  $time = time();

  $sql = "UPDATE setting SET name='$name',email='$email',phone='$phone',address='$address',twitter='$twitter',facebook='$facebook',linkedin='$linkedin',instagram='$instagram',youtube='$youtube',map='$map',time='$time' WHERE id=1";
  $query = mysqli_query($conn,$sql);
  if($query){
  $msg = "Successfully Updated Setting!";
  header("location:website-setting.php?msg=$msg");
  echo "somethings";
  }else{
  $msg = "Something is worng!";
  }
}


$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM setting WHERE id=1"));
?>
<!-- Main Content -->
<main class="main_content">
    <!-- Side Navbar Links -->
    <?php include("common/sidebar.php");?>
    <!-- Side Navbar Links -->

    <!-- Page Content -->
    <section class="content_wrapper">

        <!-- Page Main Content -->
        <div class="add_page_main_content">
            <h1 class="add_page_title">Website Setting</h1>

            <form action="" method="POST" enctype="multipart/form-data">

                <div>
                    <label>Logo Name</label>
                    <input type="text" name="name" value="<?php echo $row['name']?>" class="input" />
                </div>

                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo $row['phone']?>" class="input" />
                </div>

                <div>
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $row['email']?>" class="input" />
                </div>

                <div>
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $row['address']?>" class="input" />
                </div>
                <div>
                    <label>Twitter</label>
                    <input type="text" name="twitter" value="<?php echo $row['twitter']?>" class="input" />
                </div>
                <div>
                    <label>Facebook</label>
                    <input type="text" name="facebook" value="<?php echo $row['facebook']?>" class="input" />
                </div>
                <div>
                    <label>Linkedin</label>
                    <input type="text" name="linkedin" value="<?php echo $row['linkedin']?>" class="input" />
                </div>
                <div>
                    <label>Instagram</label>
                    <input type="text" name="instagram" value="<?php echo $row['instagram']?>" class="input" />
                </div>
                <div>
                    <label>Youtube</label>
                    <input type="text" name="youtube" value="<?php echo $row['youtube']?>" class="input" />
                </div>
                <div>
                    <label>Map</label>
                    <input type="text" name="map" value="<?php echo $row['youtube']?>" class="input" />
                    <textarea class="note_textarea" name="map" cols="30" rows="5"><?php echo $row['map']?></textarea>
                    <p style="text-align:center;color:gray;">Note: Please Resize Embed <b style="color:red">Width And
                            Height</b> From Embed Code.</p>
                </div>

                <input style="cursor:pointer" class="btn submit_btn" name="submit" type="submit" value="Update" />
            </form>

            <?php      
       if(isset($_POST['favicon'])){
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        move_uploaded_file($file_tmp,"upload/$file_name");

        $sql = "UPDATE setting SET favicon = '$file_name' WHERE id=1";
        $query = mysqli_query($conn,$sql);
        if($query){
        $msg = "Successfully Updated Setting!";
        header("location:website-setting.php?msg=$msg");
        echo "somethings";
        }else{
        $msg = "Something is worng!";
        }
        }elseif(isset($_POST['remove_favicon'])){          
  
          $sql = "UPDATE setting SET favicon = '' WHERE id=1";
          $query = mysqli_query($conn,$sql);
          if($query){
          $msg = "Favicon has been removed Successfull!";
          header("location:website-setting.php?msg=$msg");
          echo "somethings";
          }else{
          $msg = "Something is worng!";
          }
          }
        ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label style="text-align:center">Requirement Size: 16*16</label>
                    <img style="width:100px;height:100px;margin:0 auto" src="upload/<?php echo $row['favicon']?>">
                    <label>Favicon</label>
                    <input type="file" name="file" class="input" />
                </div>
                <input style="cursor:pointer" class="btn submit_btn" name="favicon" type="submit" value="Update" />
                <input style="cursor:pointer" class="btn submit_btn" name="remove_favicon" type="submit" value="Remove" />
            </form>

            <?php      
          if(isset($_POST['logo'])){
          $file_name = $_FILES['file']['name'];
          $file_tmp = $_FILES['file']['tmp_name'];
          move_uploaded_file($file_tmp,"upload/$file_name");

          $sql = "UPDATE setting SET logo='$file_name' WHERE id=1";
          $query = mysqli_query($conn,$sql);
          if($query){
          $msg = "Successfully Updated Setting!";
          header("location:website-setting.php?msg=$msg");
          echo "somethings";
          }else{
          $msg = "Something is worng!";
          }
        }elseif(isset($_POST['remove_logo'])){

          $sql = "UPDATE setting SET logo='' WHERE id=1";
          $query = mysqli_query($conn,$sql);
          if($query){
          $msg = "Logo has been removed successfull";
          header("location:website-setting.php?msg=$msg");
          echo "somethings";
          }else{
          $msg = "Something is worng!";
          }
        }
        ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label style="text-align:center">Requirement Size: 200*60</label>
                    <?php if(!empty($row['logo'])){ ?>
                    <img style="widht:200px;height:100px;margin:0 auto;" src="upload/<?php echo $row['logo']?>" alt="">
                    <?php } ?>
                    <label>Logo</label>
                    <input type="file" name="file" class="input" />
                </div>
                <input style="cursor:pointer" class="btn submit_btn" name="logo" type="submit" value="Update" />
                <input style="cursor:pointer" class="btn submit_btn" name="remove_logo" type="submit" value="Remove" />
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