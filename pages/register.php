
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register account</title>
    <!-- Bootstrap core CSS-->
    <link href="/qlsv/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body class="">
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Register an Account</div>
            <div class="card-body">
                <!-- <form method="post" action="register.php"> -->
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="exampleInputName">Username</label>
                            <input class="form-control" id="InputName" type="text" name="username" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_teacher">Role</label>
                    <input class="form-control" id="is_teacher" type="int" placeholder="teacher is 1 - student is 0" name="is_teacher" value="">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" id="exampleInputPassword1" type="password" name="password_1">
                    </div>
                </div>
            </div>
            <div class="align-self-center mx-auto">
                <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
            </div>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="signin.php">Login Page</a>
                <!--- <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
            </div>
        </div>
    </div>
    </div>
    <?php
// <!-- Bootstrap core CSS -->
<link href="/qlsv/bootstrap/css/bootstrap.min.css" rel="stylesheet" style="text/css">
<script src="/qlsv/bootstrap/js/bootstrap.min.js" rel="stylesheet" style="text/javascript"> </script>

include ("../lib/connectDB.php");
// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['register']))
{
    // Lấy thông tin
    // Để an toàn thì ta dùng hàm mssql_escape_string để
    // chống hack sql injection
    // $username   = isset($_POST['username']) ? mysql_escape_string($_POST['username']) : '';
    // $password   = isset($_POST['password']) ? md5($_POST['password']) : '';
    // $email      = isset($_POST['email'])    ? mysql_escape_string($_POST['email']) : '';
    // $phone      = isset($_POST['phone'])    ? mysql_escape_string($_POST['phone']) : '';
    // $level      = isset($_POST['level'])    ? (int)$_POST['level'] : '';


    // Validate Thông Tin Username và Email có bị trùng hay không
      
    // Kết nối CSDL
    mysqli_set_charset($connectDB, "utf8");
      
    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        // echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="register.php";</script>';
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
        </div> 
        header('location: register.php')
        // Dừng chương trình
        die ();
    }
    else {
        // Ngược lại thì thêm bình thường
        $sql = "INSERT INTO member (username, password, email, phone, level) VALUES ('$username','$password','$email','$phone', '$level')";
          
        if (mysqli_query($conn, $sql)){
            echo '<script language="javascript">alert("Đăng ký thành công"); window.location="register.php";</script>';
        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
        }
    }
}

?>
</body>
</html>