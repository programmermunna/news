<?php include("include/functions.php");
if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
  if($id>0){
    header('location:index.php');
  }
} 
if(isset($_COOKIE['admin_id'])){
  $id = $_COOKIE['admin_id'];
  if($id>0){
    header('location:index.php');
  }
}

if(isset($_POST['submit'])){
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $pass = md5($_POST['pass']);
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $sql = "SELECT * FROM admin_info WHERE email='$email' AND pass='$pass' AND role !='User' AND role !='Normal User'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  if($row){
  $id = $row['id'];
  $_SESSION['admin_id'] = $id;
  setcookie('admin_id', $id , time()+86000);
   $msg = "Welcome! Successfull login.";
   header("location:index.php?msg=$msg");
  }else{
     $msg = "Your Email or password is wrong!";
     header("location:login.php?msg=$msg");
  }
  }else{
    $msg = "Your Email is not validate!";
    header("location:login.php?msg=$msg");
  }
}



$setting = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM setting"));
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="dist/css/styles.css" />
    <link rel="stylesheet" href="dist/css/custom.css" />
  </head>
  <body class="bg-gray-100">
    <div class="w-11/12 mx-auto sm:w-96 flex_center min-h-screen py-10">
      <div style="width:100%;" class="text-left w-fit h-fit bg-white shadow-lg rounded overflow-hidden"
      >
        <div
          style="
            background-image: url('https://i.postimg.cc/XJ7NvTb6/istockphoto-1221025677-170667a.jpg');
          "
          class="flex_center p-8 bg-gradient-to-r from-yellow-600 to-red-600 text-white"
        >
          <h2><?php echo $setting['name']?></h2>
        </div>
        <form action="" method = "POST" class="p-6">
          <div class="space-y-5">
            <div>
              <label for="email" class="block" for="email">Email</label>
              <input
                type="email" name="email"
                placeholder="Email"
                id="email"
                class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-600"
              />
              <span class="text-xs tracking-wide text-red-600"></span>
            </div>

            <div>
              <label for="password" class="block">Password</label>
              <input
                type="password" name="pass"
                placeholder="Password"
                id="password"
                class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-600"
              />
            </div>
            <div class="flex items-baseline justify-between">
              <input type="submit" name="submit"
                class="btn bg-blue-500 hover:bg-blue-600 focus:bg-blue-400 active:bg-blue-700 text-white px-5 py-2 focus:ring rounded" value="Login" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>

<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

<script>
window.addEventListener('DOMContentLoaded', () => {

const munna = document.getElementById("munna");
if (munna) {

  munna.innerHTML = `
<div id="munna" style="position: fixed; top: 100px; right: 20px; z-index:999; background:#31B0D5; color:white; display:flex; padding:12px; align-items:center; gap:6px; border-radius: 5px; line-height: 0px; ">
<span style="font-size:18px;"> 
<i class="fa-sharp fa-solid fa-circle-info"></i>
</span>
<h6 style="background:black;color:white;">
${munna?.dataset?.text} </div>
</h6> `

  setTimeout(() => {
    munna.innerHTML = ''
  }, munna?.dataset?.time || 2000)

}})
</script>

<style>#munna{padding:30px !important;}</style>