<?php
include("../lib/connectDB.php");
include("../lib/helper.php");

session_start();

if (isset($_POST['signin'])) {
  if (empty($_POST['txtusername']) or empty($_POST['txtpasswd'])) {
    echo ' </br> <p style="color:red"> vui lòng nhập đầy đủ username và password !</p>';
  } else {
    $myusername = $_POST['txtusername'];
    $mypassword = $_POST['txtpasswd'];
    $query = "SELECT * FROM account where Username = '$myusername' and Pass = '$mypassword'";
    $result = mysqli_query($connectDB, $query);
    //Hàm này mới lấy ra kết quả
    $num = mysqli_num_rows($result);
    $result = $result->fetch_assoc();
    if ($num == 0) {
      echo '</br> <p style="color:red"> Sai tên đăng nhập hoặc mật khẩu ! </p>';
    } else {
      $_SESSION['username'] = $myusername;
      $_SESSION['user_id'] = $result['ID'];
      $_SESSION['is_teacher'] = $result['Is_teacher'];
      if(is_teacher()) {
        //dd($result);
        //dd("Tao la teacher.");
        header('location: profile.php');
      } else {
        //dd("May la hocj sinh.");
        header('location: profile.php');
      }
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../img/logoVT.png">

  <title>Signin</title>

  <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/"> -->

  <!-- Bootstrap core CSS -->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" style="text/css">
  <script src="../bootstrap/js/bootstrap.min.js" rel="stylesheet" style="text/javascript"> </script>

  <!-- Custom styles for this template -->
  <link href="../bootstrap/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" action="" method="POST">
    <img class="mb-4" src="../img/logoVT.png" alt="" width="110" height="80">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputUser" class="sr-only">User</label>
    <input type="name" id="inputUser" class="form-control" name="txtusername" placeholder="User" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="txtpasswd" placeholder="Password" required>
    <div class="checkbox mb-3">
    </div>
    <button class="btn btn-primary btn-block" type="submit" name="signin" value="signin">Sign in</button>
    <a class="d-block small mt-3" href="register.php">Register an Account</a>
    <p class="mt-5 mb-3 text-muted">&copy;2019</p>
  </form>
</body>

</html>