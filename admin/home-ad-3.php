<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<?php

if (isset($_POST['add_ad'])) {
    $add_ad = $_POST['add_ad_name'];
    $embed_code = $_POST['embed_code'];

    $insert_ad = mysqli_query($conn, "INSERT INTO ad(name,embed,position) VALUE('$add_ad','$embed_code',4)");
    if ($insert_ad) {
        $msg = "Successfully created a new ad";
        header("location:home-ad-3.php?msg=$msg");
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
        <h4 class="text-xl font-medium">Home Page ads 3</h4>        
        <br>
        <section class="page_main_content">
            <div class="main_content_container">
                <!-- Table -->
                <div class="table_content_wrapper" style="overflow:unset">
                    <header class="table_header">
                        <div class="table_header_left">
                            <button class="add_ad_btn px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add New Ad</button>
                        </div>
                    </header>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Sl.</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>ad Name</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Embed Code</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Action</span></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="customers_wrapper" class="text-sm">
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM ad WHERE position = 4  ORDER BY id DESC");
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($query)) { $i++; ?>
                            <tr>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $i ?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['name'] ?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <!-- <div class="text-center"><?php echo $row['embed'] ?></div> -->
                                    <textarea style="width:100%"><?php echo $row['embed'] ?></textarea>
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
                                        <a style="cursor:pointer" class="edit_ad_btn btn table_edit_btn"
                                            href="ad-edit.php?src=home-ad-3&&id=<?php echo $row['id'] ?>">Edit</a>
                                        <a style="cursor:pointer" class="btn table_edit_btn"
                                            href="delete-ad.php?src=home-ad-3&&id=<?php echo $row['id'] ?>">Delete</a>
                                    </div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php }?>
                    </table>
                </div>
            </div>
            </div>

            <!-- -------------add ad---------------- -->
            <form action="" method="POST">
                <div class="add_ad_wrapper add_ad" style="display: none;">
                    <div class="hide_add_new_cat fixed inset-0 w-full h-screen bg-black bg-opacity-50 z-40"></div>
                    <div class="fixed w-[96%] md:w-[500px] inset-0 m-auto bg-white rounded shadow z-50 h-fit">
                        <h1 class="p-4 border-b">
                            Add ad
                        </h1>

                        <div class="p-4 space-y-2">
                            <label for="cat_name">Ad Name</label>
                            <input name="add_ad_name" type="text" class="input">
                        </div>

                        <div class="p-4 space-y-2">
                            <label for="cat_name">Embed Code</label>
                            <input name="embed_code" type="text" class="input">
                        </div>

                        <div class="p-4 flex items-center justify-end gap-x-3 border-t mt-4">
                            <button class="btn w-fit p-2 bg-blue-600 text-white rounded focus:ring-2" type="submit"
                                name="add_ad">Create ad</button>
                            <button
                                class="btn w-fit p-2 bg-red-400 text-white rounded focus:ring-2 hide_add_new_cat">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>

            </div>
        </section>  
     </section>    
</main>

<script>
let add_ad_btn = document.querySelector(".add_ad_btn");
let add_ad = document.querySelector(".add_ad");

add_ad_btn.addEventListener("click", () => {
    add_ad.style.display = "block";
});
</script>

<!-- Side Navbar Links -->
<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>