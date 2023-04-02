<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<!-- Main Content -->
<main class="main_content">
    <!-- Side Navbar Links -->
    <?php include("common/sidebar.php"); ?>
    <!-- Side Navbar Links -->

    <!-- Page Content -->
    <section class="content_wrapper">
        <!-- Page Details Title -->

        <!-- Page Main Content -->
        <section class="page_main_content">
            <h4 class="text-xl font-medium">Success Delivery</h4>
            <br>
            <div class="main_content_container">
                <!-- Table -->
                <div style="overflow:scroll;padding:15px;" class="table_content_wrapper">
                    <header class="table_header">
                        <div class="table_header_left">

                        </div>

                        <form action="" method="POST">
                            <div class="table_header_right">
                                <input type="search" name="src_text" placeholder="Search Only Order No" />
                                <input style="cursor:pointer;" type="submit" name="search" class="btn" placeholder="Search" />
                            </div>
                        </form>
                    </header>

                    
                    <div style="width: 100%; overflow:auto">
                    <table class="table">
                        <thead>
                        <tr>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Sl.</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Thumbnail</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Title</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Category</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>email</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Author</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Status</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Date</span></div>
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
                                $sql = "SELECT * FROM post WHERE (email = '$src_text' OR title = '$src_text' OR category = '$src_text' OR email = '$src_text') AND status='Publish'";
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
                                            <div class="text-center"><img style="height:50px" src="upload/<?php echo $row['img'] ?>" alt=""></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['title'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['category'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['email'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['author'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['status'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                        <div class="text-center"><?php $date = $row['time'];  echo date('d-m-Y', $date); ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <?php if ($admin_info['role'] == 'Moderator') { ?>
                                                <div class="w-full flex_center gap-1">
                                                <div class="w-full flex_center gap-1">                                              
                                                    <a onclick="alert('Moderator Can not do it!')" class="btn table_edit_btn">Edit</a>
                                                    <a onclick="alert('Moderator Can not do it!')" class="btn table_edit_btn">Delete</a>
                                                    <a class="btn table_edit_btn" href="../single.php?id=<?php echo $row['id'] ?>">View Post</a>
                                                </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="w-full flex_center gap-1">                                              
                                                    <a class="btn table_edit_btn" href="edit-post.php?src=draft&&id=<?php echo $row['id'] ?>">Edit</a>
                                                    <a class="btn table_edit_btn" href="delete.php?src=draft&&id=<?php echo $row['id'] ?>">Delete</a>
                                                    <a class="btn table_edit_btn" href="../single.php?id=<?php echo $row['id'] ?>">View Post</a>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                // ------------                                
                                $showRecordPerPage = 8;
                                if (isset($_GET['page']) && !empty($_GET['page'])) {
                                    $currentPage = $_GET['page'];
                                } else {
                                    $currentPage = 1;
                                }
                                $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                                $totalEmpSQL = "SELECT * FROM post WHERE status ='Publish' ORDER BY id DESC";
                                $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                $totalEmployee = mysqli_num_rows($allEmpResult);
                                $lastPage = ceil($totalEmployee / $showRecordPerPage);
                                $firstPage = 1;
                                $nextPage = $currentPage + 1;
                                $previousPage = $currentPage - 1;

                                $empSQL = "SELECT * FROM post WHERE status ='Publish' ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                $query = mysqli_query($conn, $empSQL);
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $i++;

                                ?>
                                    <tr>
                                    <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $i ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><img style="height:50px" src="upload/<?php echo $row['img'] ?>" alt=""></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['title'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['category'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['email'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['author'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['status'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                        <div class="text-center"><?php $date = $row['time'];  echo date('d-m-Y', $date); ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <?php if ($admin_info['role'] == 'Moderator') { ?>
                                                <div class="w-full flex_center gap-1">
                                                <div class="w-full flex_center gap-1">                                              
                                                    <a onclick="alert('Moderator Can not do it!')" class="btn table_edit_btn">Edit</a>
                                                    <a onclick="alert('Moderator Can not do it!')" class="btn table_edit_btn">Delete</a>
                                                    <a class="btn table_edit_btn" href="../single.php?id=<?php echo $row['id'] ?>">View Post</a>
                                                </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="w-full flex_center gap-1">                                              
                                                    <a class="btn table_edit_btn" href="edit-post.php?src=draft&&id=<?php echo $row['id'] ?>">Edit</a>
                                                    <a class="btn table_edit_btn" href="delete.php?src=draft&&id=<?php echo $row['id'] ?>">Delete</a>
                                                    <a class="btn table_edit_btn" href="../single.php?id=<?php echo $row['id'] ?>">View Post</a>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php  } ?>
                        </tbody>
                    </table></div>

                    <!-- -------------pagination---------------- -->
                    <br>
                    <div class="w-full" style="display: flex; justify-content: space-between;">

                        <nav aria-label="Page navigation">
                            <ul class="pagination_buttons">

                                <?php if ($currentPage >= 2) { ?>
                                    <li class="pagination"><a class="page-link" href="?page=<?php echo $previousPage ?>">Previws</a>
                                    </li>
                                <?php } ?>
                                <?php if ($currentPage != $firstPage) { ?>
                                    <li class="pagination">
                                        <a class="page-link" href="?page=<?php echo $firstPage ?>">
                                            <span class="page-link" aria-hidden="true">1</span>
                                        </a>
                                    </li>
                                <?php } ?>

                                <li class="pagination active"><a class="page-link active" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>

                                <?php if ($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link" href="?page=<?php echo $currentPage + 1 ?>"><?php echo $currentPage + 1 ?></a></li>
                                <?php } ?>

                                <?php if ($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link" href="?page=<?php echo $currentPage + 1 + 1 ?>"><?php echo $currentPage + 1 + 1 ?></a></li>
                                <?php } ?>

                                <?php if ($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link" href="?page=<?php echo $currentPage + 1 + 1 + 1 ?>"><?php echo $currentPage + 1 + 1 + 1 ?></a></li>
                                <?php } ?>

                                <?php if ($currentPage < $lastPage) { ?>
                                    <li class="pagination"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php //echo $nextPage  
                                                                                                                        ?>Next</a></li>
                                <?php } ?>

                                <li class="pagination">
                                    <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
                                        <span aria-hidden="true">Last</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="pagination_buttons">Page <?php echo $currentPage ?> of <?php echo $lastPage ?></div>
                    </div>
                <?php } ?>



                <!-- -------------pagination---------------- -->
                </div>
            </div>
            </div>
            </div>
        </section>
    </section>
    <!-- Page Content -->
</main>
<!-- Side Navbar Links -->
<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->

