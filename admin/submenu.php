<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<?php

if (isset($_POST['add_menu'])) {
    $id = $_POST['menu_id'];
    $sub_menu = $_POST['sub_menu'];
    $content = $_POST['content'];
    $url = 'page.php?page='.strtolower($sub_menu).'.php';

    $check = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM menu WHERE name='$sub_menu'"));
    if($check<1){
    $insert_sub_menu = mysqli_query($conn, "INSERT INTO menu(parent_id,name,url,content) VALUE('$id','$sub_menu','$url','$content')");
    if ($insert_sub_menu) {
        $msg = "Successfully created a Subnew menu";
        header("location:submenu.php?msg=$msg");
    }
}else{
    $msg = "Alrady have menu";
    header("location:submenu.php?msg=$msg");
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
        <h4 class="text-xl font-medium">menu All</h4>
        <br>
        <!-- Page Details Title -->

        <!-- Page Main Content -->
        <section class="page_main_content">
            <div class="main_content_container">
                <!-- Table -->
                <div class="table_content_wrapper" style="overflow:unset;">
                    <header class="table_header">
                        <div class="table_header_left">
                            <button class="add_menu_btn px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add
                                New
                                menu</button>
                        </div>

                        <form action="" method="POST">
                            <div class="table_header_right">
                                <input type="search" name="src_text" placeholder="Search All Order" />
                                <input style="cursor:pointer;" type="submit" name="search" class="btn"
                                    placeholder="Search" />
                            </div>
                        </form>
                    </header>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Sl.</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Menu </span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Sub Menu</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Action</span></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="customers_wrapper" class="text-sm">
                            <?php
                            if (isset($_POST['search'])) {
                                $src_text = trim($_POST['src_text']);
                                $sql = "SELECT * FROM menu WHERE name = '$src_text'";
                                $search_query = mysqli_query($conn, $sql);
                            }
                            if (isset($search_query)) {
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($search_query)) {
                                    $i++;

                            ?>
                            <tr>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $i ?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['name'] ?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <?php if ($admin_info['role'] == 'Moderator') { ?>
                                    <div class="w-full flex_center gap-1">
                                        <a class="btn table_edit_btn">Edit</a>
                                        <a class="btn table_edit_btn"
                                            onclick="alert('Moderator now allowed.')">Delete</a>
                                    </div>
                                    <?php } else { ?>
                                    <div class="w-full flex_center gap-1">
                                        <a class="edit_menu_btn btn table_edit_btn">Edit</a>
                                        <a class="btn table_edit_btn"
                                            href="delete.php?src=menu&&id=<?php echo $row['id'] ?>">Delete</a>
                                    </div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php }
                            } else {                                

                                $empSQL = "SELECT * FROM menu WHERE parent_id !=0 ORDER BY name ASC";
                                $query = mysqli_query($conn, $empSQL);
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $i++; ?>
                            <tr>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $i ?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php 
                                    $id = $row['parent_id'];
                                    $menu = mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM menu WHERE id= $id"));
                                    echo $menu['name'];?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['name'] ?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <?php if ($admin_info['role'] == 'Moderator') { ?>
                                    <div class="w-full flex_center gap-1">
                                        <a class="btn table_edit_btn">Edit</a>
                                        <a class="btn table_edit_btn"
                                            onclick="alert('Moderator now allowed.')">Delete</a>
                                    </div>
                                    <?php } else { ?>
                                    <div class="w-full flex_center gap-1">
                                        <a style="cursor:pointer" class="edit_menu_btn btn table_edit_btn"
                                            href="menu-edit.php?src=submenu&&id=<?php echo $row['id'] ?>">Edit</a>
                                        <a style="cursor:pointer" class="btn table_edit_btn"
                                            href="delete.php?src=sub_menu&&id=<?php echo $row['id'] ?>">Delete</a>
                                    </div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php  }} ?>
                    </table>

                </div>
            </div>
            </div>

            <!-- -------------add menu---------------- -->
            <form action="" method="POST">
                <div class="add_menu_wrapper add_menu" style="display: none;">
                    <div class="hide_add_new_cat fixed inset-0 w-full h-screen bg-black bg-opacity-50 z-40"></div>
                    <div class="fixed w-[96%] md:w-[500px] inset-0 m-auto bg-white rounded shadow z-50 h-fit" style="width:60%">
                        <h1 class="p-4 border-b">
                            Add SubMenu
                        </h1>

                        <div class="p-4 space-y-2">
                            <label for="cat_name">Menu Name</label>
                            <select class="input" name="menu_id">
                                <?php 
                            $menu = mysqli_query($conn,"SELECT * FROM menu WHERE parent_id=0");
                            while($row=mysqli_fetch_assoc($menu)){ ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="p-4 space-y-2">
                            <label for="cat_name">Sub Menu Name</label>
                            <input name="sub_menu" type="text" class="input">
                        </div>

                        <div class="p-4 space-y-2">
                            <label for="cat_name">Content</label>
                            <textarea name="content" id="summernote"></textarea>
                        </div>

                        <div class="p-4 flex items-center justify-end gap-x-3 border-t mt-4">
                            <button class="btn w-fit p-2 bg-blue-600 text-white rounded focus:ring-2" type="submit"
                                name="add_menu">Create Submenu</button>
                            <button
                                class="btn w-fit p-2 bg-red-400 text-white rounded focus:ring-2 hide_add_new_cat">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>


            </div>
        </section>
    </section>
    <!-- Page Content -->
</main>

<script>
let add_menu_btn = document.querySelector(".add_menu_btn");
let add_menu = document.querySelector(".add_menu");
let all_edit_menu_btn = document.querySelectorAll(".edit_menu_btn");
let edit_menu = document.querySelector(".edit_menu");
let hide_add_new_cat = document.querySelectorAll(".hide_add_new_cat");
const menu_name_input = document.getElementById("menu_name")
const menu_id_input = document.getElementById("menu_id")

add_menu_btn.addEventListener("click", () => {
    add_menu.style.display = "block";
});



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
<!-- <?php if (isset($_GET['msg'])) { ?><script>swal("Good job!", "<?php echo $_GET['msg']; ?>", "success");</script><?php } ?> -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>