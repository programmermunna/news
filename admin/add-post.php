<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $tag = $_POST['tag'];
    $summery = $_POST['summery'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    $author = $admin_info['role'];
    $email = $admin_info['email'];
    $time = time();
    $reference = rand(1000,99999999);

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"upload/$file_name");
    
    $sql = "INSERT INTO post(`email`,`title`, `category`, `tag`, `author`, `reference`, `img`, `status`,`time`, `summery`, `content`) VALUE( '$email','$title', '$category', '$tag', '$author', '$reference', '$file_name', '$status', '$time', '$summery', '$content')";

    $query = mysqli_query($conn, $sql);
    if ($query) {
        $msg = "Successfully Created A New Post!";
        header("location:add-post.php?msg=$msg");
    } else {
        $msg = "Something is worng!";
        header("location:add-post.php?msg=$msg");
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
                    <input required type="file" name="file" class="input" />
                </div>
                <div>
                    <label>Title</label>
                    <input required type="text" name="title" placeholder="Example:  Lorem ipsum Doller" class="input" />
                </div>
                <div>
                    <label>Category</label>
                    <select name="category" id="" class="input">
                    <?php $category = mysqli_query($conn,"SELECT * FROM category");
                    while($row = mysqli_fetch_assoc($category)){
                        echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                    }?>
                    </select>
                </div>
                <div>
                    <label>Tag</label>
                    <input type="text" name="tag" placeholder="Example:  html,css,js,php" class="input" />
                </div>
                <div>
                    <label>Summery</label>
                    <textarea required class="note_textarea" placeholder="Write some sentence of content" name="summery" id="" rows="5"></textarea>
                </div>
                <div>
                    <label>Content</label>
                    <textarea required id="summernote" name="content"></textarea>
                </div>
                <div>
                    <label>Status</label>
                    <select name="status" class="input">
                        <option value="Draft">Draft</option>
                        <option value="Publish">Publish</option> 
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


