<?php
// <!-- Bootstrap core CSS -->
include("../lib/connectDB.php");
// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['add'])) {
    // Lấy thông tin
    // Để an toàn thì ta dùng hàm mssql_escape_string để
    // chống hack sql injection
    // $username   = isset($_POST['username']) ? mysql_escape_string($_POST['username']) : '';
    // $password   = isset($_POST['password']) ? md5($_POST['password']) : '';
    // $email      = isset($_POST['email'])    ? mysql_escape_string($_POST['email']) : '';
    // $phone      = isset($_POST['phone'])    ? mysql_escape_string($_POST['phone']) : '';
    // $level      = isset($_POST['level'])    ? (int)$_POST['level'] : '';

    // Lay thong tin 
    $username = mysqli_real_escape_string($connectDB,$_POST['username']);
    $password = mysqli_real_escape_string($connectDB,$_POST['password']);
    $is_teacher = mysqli_real_escape_string($connectDB,$_POST['is_teacher']);
    $name = mysqli_real_escape_string($connectDB,$_POST['name']);
    $phone = mysqli_real_escape_string($connectDB,$_POST['phone']);
    $mail = mysqli_real_escape_string($connectDB,$_POST['mail']);
    $khoa = mysqli_real_escape_string($connectDB,$_POST['khoa']);
    

    $password=md5($password);

    // Kết nối CSDL
    mysqli_set_charset($connectDB, "utf8");

    // Kiểm tra username hoặc email có bị trùng hay không
    $query = "SELECT * FROM account WHERE Username = '$username' and Pass = '$password'and Is_teacher='$is_teacher' and Name='$name' and Phone='$phone' and Email='$mail' and Khoa='$khoa'";

    // Thực thi câu truy vấn
    $result = mysqli_query($connectDB, $query);

    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Quá trình xử lý bị lỗi"); window.location="add_student.php";</script>';

        // Dừng chương trình
        die();
    } else {
        // Ngược lại thì thêm bình thường
        $insert = "INSERT INTO account (`Username`, `Pass`, `Is_teacher`,`Name`,`Phone`,`Email`,`Khoa`) VALUES ('$username','$password','$is_teacher','$name','$phone','$mail','$khoa')";

        if (mysqli_query($connectDB, $insert)) {
            echo '<script language="javascript">alert("Thêm thành công"); window.location="../pages/student.php";</script>';
        } else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="add_student.php";</script>';
        }
    }
    mysqli_close($connectDB);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/logoVT.png">
    <title>Thêm danh sách</title>
    <!-- Bootstrap core CSS-->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="">
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header"><b>Thêm thành viên</b></div>
            <div class="card-body">
                <form method="post" action="add_student.php">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="InputName">Username</label>
                                <input class="form-control" id="InputName" type="text" name="username">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="is_teacher">Vai trò</label>
                        <input class="form-control" id="is_teacher" type="int" placeholder="teacher is 1 - student is 0" name="is_teacher">
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="InputPassword">Password</label>
                            <input class="form-control" id="InputPassword" type="password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="InputName">Họ tên</label>
                            <input class="form-control" id="InputName" type="text" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="InputPhone">Số điện thoại</label>
                            <input class="form-control" id="InputPhone" type="number" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="InputEmail">Email</label>
                            <input class="form-control" id="InputEmail" type="text" name="mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="InputKhoa">Khoa</label>
                            <input class="form-control" id="InputKhoa" type="text" name="khoa">
                        </div>
                    </div>
            </div>
            <div class="align-self-center mx-auto">
                <button type="submit" class="btn btn-primary btn-block" name="add">Thêm</button>
            </div>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="../pages/student.php">Danh sách sinh viên</a>
                <!--- <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
            </div>
        </div>
    </div>
    </div>
</body>

</html>