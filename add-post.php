<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->

<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $tag = $_POST['tag'];
    $summery = $_POST['summery'];
    $content = $_POST['content'];

    $time = time();
    $status = 'Draft';

    $author = $admin_info['role'];
    $time = time();
    $reference = rand(1000,99999999);

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"admin/upload/$file_name");
    
    $sql = "INSERT INTO post(`title`, `category`, `tag`, `author`, `reference`, `img`, `status`,`time`, `summery`, `content`,time) VALUE( '$title', '$category', '$tag', '$author', '$reference', '$file_name', '$status', '$time', '$summery', '$content','$time')";

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

<!-- Content here -->
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Make A New Post</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <form class="login_form" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Thumbnail</label>
                            <input name="file" style="padding-top:3px;" type="file" class="form-control"
                                required="required" />
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name="title" type="text" class="form-control p-4" placeholder="Lorem Ipsum Dollar"
                                required="required" />
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category" class="form-control">
                                <?php $category = mysqli_query($conn,"SELECT * FROM category");
                                while($row = mysqli_fetch_assoc($category)){
                                    echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tag</label>
                            <input name="tag" type="text" class="form-control p-4" placeholder="html,css,js,php"
                                required="required" />
                        </div>

                        <div class="form-group">
                            <label for="">Summery</label>
                            <textarea name="summery" placeholder="Post Summery" rows="5" class="note_textarea"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea id="summernote" name="content"  class="note_textarea"></textarea>
                        </div>

                        <div>
                            <button name="submit" class="btn btn-primary font-weight-semi-bold px-4"
                                style="height: 50px;" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php include("common/mini-sidebar.php") ?>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
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
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>