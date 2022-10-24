<?php include("include/functions.php");
if($admin_info['role']=='Moderator'){
  header("location:index.php");
}
if (isset($_GET['src'])) {
  $src = $_GET['src'];
  $order = $_GET['order'];
  $id = $_GET['id'];
}

$action = "$src";
switch ($action) {
  case "customer":
    $customer = mysqli_query($conn, "DELETE FROM customer WHERE id=$id;");
    $msg = "Customer has beeen delted!";
    header("location:customer-all.php?msg=$msg");
    break;
  case "category":
    $category = mysqli_query($conn, "DELETE FROM category WHERE id=$id;");
    $msg = "category has beeen delted!";
    header("location:category-all.php?msg=$msg");
    break;
  case "product":
    $product = mysqli_query($conn, "DELETE FROM product WHERE id=$id;");
    $msg = "product has beeen delted!";
    header("location:product-all.php?msg=$msg");
    break;
  case "draft":
    $pending = mysqli_query($conn, "DELETE FROM post WHERE id=$id");
    $msg = "Has beeen delted!";
    header("location:draft.php?msg=$msg");
    break;
  case "success":
    $success = mysqli_query($conn, "DELETE FROM product WHERE id=$id AND status='Success'");
    $msg = "Has beeen delted!";
    header("location:success.php?msg=$msg");
    break;
  case "ad":
    $brand = mysqli_query($conn, "DELETE FROM ad WHERE id='$id'");
    $msg = "Has beeen delted!";
    header("location:ad-all.php?msg=$msg");
    break;
  case "moderator":
    $brand = mysqli_query($conn, "DELETE FROM admin_info WHERE id='$id'");
    $msg = "Has beeen delted!";
    header("location:moderator.php?msg=$msg");
    break;
  default:
    echo "Something is wrong! Please try again.";
}
