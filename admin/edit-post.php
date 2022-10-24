<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<?php

if($admin_info['role']=='Moderator'){
    header("location:index.php");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $src = $_GET['src'];
}

$post = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM post WHERE id=$id"));

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $tag = $_POST['tag'];
    $summery = $_POST['summery'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    $author = $admin_info['role'];
    $time = time();
    $reference = rand(1000,99999999);    

    if(!empty($_FILES['file']['name'])){
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        move_uploaded_file($file_tmp,"upload/$file_name");

        $sql = "UPDATE post SET title='$title', category='$category', tag='$tag',  author='$author', reference = '$reference', img = '$file_name', status='$status',time='$time', summery= '$summery', content = '$content' WHERE id=$id";
    }else{
        $sql = "UPDATE post SET title='$title', category='$category', tag='$tag',  author='$author', reference = '$reference', status='$status',time='$time', summery= '$summery', content = '$content' WHERE id=$id";
    }
    
    

    $query = mysqli_query($conn, $sql);
    if ($query) {

        if($src == 'draft'){
            $msg = "Successfully Updated Post!";
            header("location:draft.php?msg=$msg");
        }else{            
            $msg = "Successfully Updated Post!";
            header("location:published.php?msg=$msg");
        }
    }
}

?>

<!-- Main Content -->
<main class="main_content">
    <!-- Side Navbar Links -->
    <?php include("common/sidebar.php"); ?>
    <!-- Side Navbar Links -->

    <!-- Page Content -->
    <section class="content_wrapper">

        <!-- Page Main Content -->
        <div class="add_page_main_content" style="max-width:none;">
            <h1 class="add_page_title">Create New Post</h1>
            <form id="setting_form" action="" method="POST" enctype="multipart/form-data">
                <div>
                    <p style="text-align:center;">Required Signature Size: 200*60px</p>
                    <label>Thumbnail</label>
                    <input type="file" name="file" class="input" />
                </div>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" placeholder="Example:  Lorem ipsum Doller" value="<?php echo $post['title']?>" class="input" />
                </div>
                <div>
                    <label>Category</label>
                    <input type="text" name="category" placeholder="Example:  Programming" value="<?php echo $post['category']?>" class="input" />
                </div>
                <div>
                    <label>Tag</label>
                    <input type="text" name="tag" placeholder="Example:  html,css,js,php" value="<?php echo $post['tag']?>" class="input" />
                </div>
                <div>
                    <label>Summery</label>
                    <textarea class="note_textarea"  name="summery" rows="5"><?php echo $post['summery']?></textarea>
                </div>
                <div>
                    <label>Content</label>
                    <textarea id="summernote" name="content"><?php echo $post['content']?></textarea>
                </div>
                <div>
                    <label>Status</label>
                    <select name="status" class="input">
                    <?php
                    
                    if(($post['status'] == 'Draft')){
                        echo  '<option selected value="Draft">Draft</option>';
                        echo  '<option value="Publish">Publish</option>';
                    }else{
                        echo  '<option selected value="Publish">Publish</option>';
                        echo  '<option value="Draft">Draft</option>';
                    }
                    ?>
                    </select>
                </div>
                <input style="cursor:pointer" class="btn submit_btn" name="submit" type="submit" value="Save" />
            </form>

        </div>
    </section>
    <!-- Page Content -->
</main>

<script>
    $('#summernote').summernote({
        placeholder: 'Write here details',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>


<!-- Side Navbar Links -->
<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>


