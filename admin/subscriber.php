<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->

<?php
if(isset($_POST['submit'])){ 

    $arr = $_POST['check_data'];
    $implode = implode(',',$arr);

    $email_list = mysqli_query($conn,"SELECT * FROM newsletter WHERE id in($implode)");
    if($email_list){
        while($row = mysqli_fetch_assoc($email_list)){
            $email = $row['email'];
            include("newsletter.php");
            $template;           
            $mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail_setting WHERE id=1"));

            $smtp_host = $mail['smtp_host'];
            $smtp_username = $mail['smtp_user_name'];
            $smtp_password = $mail['smtp_user_pass'];
            $smtp_port = $mail['smtp_port'];
            $smtp_secure = $mail['smtp_security'];
            $site_email = $mail['site_email'];
            $site_name = $mail['site_replay_email'];
            $address = $email;
            $body = $template;
            $subject = 'Our Most Important Post';
            $send = sendVarifyCode($smtp_host,$smtp_username,$smtp_password,$smtp_port,$smtp_secure,$site_email,$site_name,$address,$body,$subject); 

            if(!$send){
                $msg = "Successfully Sent Newsletter";
                header("location:subscriber.php?msg=$msg");
            }
        }
    }
}

?>
<!-- Main Content -->
<main class="main_content">
    <!-- Side Navbar Links -->
    <?php include("common/sidebar.php");?>
    <!-- Side Navbar Links -->

    <!-- Page Content -->
    <section class="content_wrapper">
    <h4 class="text-xl font-medium">Subscriber All</h4>
    <br>
        <!-- Page Details Title -->

        <!-- Page Main Content -->
        <section class="page_main_content">
            <div class="main_content_container">
                <!-- Table -->
                <div class="table_content_wrapper" style="overflow:unset;">
                    <header class="table_header"></header>
                    <div class="table_parent"">
                        <div class="table_sub_parent">
                            <form action="" method="POST">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="table_th"><div class="table_th_div"><span>Sl.</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>Email</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>Date</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>Action</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><button style="margin:0 auto;" class="btn table_edit_btn" type="submit" name="submit">Send Newsletter</button></div></th>
                                    </tr>
                                </thead>
                                <tbody id="customers_wrapper" class="text-sm">
                                <?php        
                                $query = mysqli_query($conn,"SELECT * FROM newsletter ORDER BY id DESC");
                                $i = 0;
                                while($row = mysqli_fetch_assoc($query)){ $i++; 
                                ?>
                                    <tr>
                                        <td class="p-3 border whitespace-nowrap"><div class="text-center"><?php echo $i?></div></td>
                                        <td class="p-3 border whitespace-nowrap"><div class="text-center"><?php echo $row['email']?></div></td> 
                                        <td class="p-3 border whitespace-nowrap"><div class="text-center"><?php echo date('d-m-y', $row['time']);?></div></td>
                                        <td class="p-3 border whitespace-nowrap"><div class="text-center"><a class="btn table_edit_btn" href="delete.php?id=<?php echo $row['id']?>">Delete</a></div></td>
                                        <td class="p-3 border whitespace-nowrap"><div class="text-center"><input name="check_data[]" value="<?php echo $row['id']?>" class="checkbox" type="checkbox"></div></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- Page Content -->
</main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->

<!-- <?php if(isset($_GET['msg'])){ ?><script>swal("Good job!", "<?php echo $_GET['msg'];?>", "success");</script><?php }?> -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>


