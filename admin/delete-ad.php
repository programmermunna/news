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
  case "top-ad":
    $customer = mysqli_query($conn, "DELETE FROM ad WHERE id=$id");
    $msg = "Ad has beeen delted!";
    header("location:$action.php?msg=$msg");
    break;
  case "home-ad-1":
    $customer = mysqli_query($conn, "DELETE FROM ad WHERE id=$id");
    $msg = "Ad has beeen delted!";
    header("location:$action.php?msg=$msg");
    break;
  case "home-ad-2":
    $customer = mysqli_query($conn, "DELETE FROM ad WHERE id=$id");
    $msg = "Ad has beeen delted!";
    header("location:$action.php?msg=$msg");
    break;
  case "home-ad-3":
    $customer = mysqli_query($conn, "DELETE FROM ad WHERE id=$id");
    $msg = "Ad has beeen delted!";
    header("location:$action.php?msg=$msg");
    break;
  case "single-post-ad-1":
    $customer = mysqli_query($conn, "DELETE FROM ad WHERE id=$id");
    $msg = "Ad has beeen delted!";
    header("location:$action.php?msg=$msg");
    break;
  case "single-post-ad-2":
    $customer = mysqli_query($conn, "DELETE FROM ad WHERE id=$id");
    $msg = "Ad has beeen delted!";
    header("location:$action.php?msg=$msg");
    break;
  case "sidebar-ad":
    $customer = mysqli_query($conn, "DELETE FROM ad WHERE id=$id");
    $msg = "Ad has beeen delted!";
    header("location:$action.php?msg=$msg");
    break;
  default:
    $msg = "Something is wrong. Please check again.";
    header("location:index.php?msg=$msg");
}