<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<?php 
if(isset($_GET['page'])){
    $page = 'page.php?page='.$_GET['page'];
}
$content = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM menu WHERE url='$page'"));?>
<!-- Content here -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold"><?php echo $content['name'];?></h4>
                </div>
                <div style="overflow:auto;" class="bg-white border border-top-0 p-4 mb-3">
                <?php echo $content['content'];?>
                </div>
            </div>
            <?php include("common/sidebar.php") ?>
        </div>
    </div>
</div>
<!-- Content here -->

<!-- Side Navbar Links -->
<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
 
