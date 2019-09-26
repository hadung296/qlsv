<?php
  <link href="/qlsv/bootstrap/css/bootstrap.min.css" rel="stylesheet" style="text/css">
  <script src="/qlsv/bootstrap/js/bootstrap.min.js" rel="stylesheet" style="text/javascript"> </script>

  include("../lib/connectDB.php");
  session_start();
   
  if(isset($_POST['signin'])){
    if ( empty($_POST['txtusername']) or empty($_POST['txtpasswd'])) { echo ' </br> <p style="color:red"> vui lòng nhập đầy đủ username và password !</p>';}
    else
    {
      $myusername= $_POST['txtusername'];
      $mypassword= $_POST['txtpasswd'];
      $query="SELECT * FROM account where Username = '$myusername' and Pass = '$mypassword'";
      $result = mysqli_query($connectDB, $query);
      $num = mysqli_num_rows($result);
      if($num==0)
        {
          // echo'</br> <p style="color:red"> Sai tên đăng nhập hoặc mật khẩu ! </p>';
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong> Sai tên đăng nhâp hoặc mật khẩu.
          </div>
        }
      else {

        $_SESSION['username']= $myusername;
        header('location: ../home.php');
        
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
    <link rel="icon" href="/qlsv/img/logoVT.png">

    <title>Signin</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/"> -->

    <!-- Bootstrap core CSS -->
    <link href="/qlsv/bootstrap/css/bootstrap.min.css" rel="stylesheet" style="text/css">
    <script src="/qlsv/bootstrap/js/bootstrap.min.js" rel="stylesheet" style="text/javascript"> </script>

    <!-- Custom styles for this template -->
    <link href="/qlsv/bootstrap/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="" method="POST">
      <img class="mb-4" src="/qlsv/img/logoVT.png" alt="" width="72" height="72">
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
