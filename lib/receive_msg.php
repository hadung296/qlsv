<?php
// <!-- Bootstrap core CSS -->
include("../lib/connectDB.php");
// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST[''])) {
    // Lấy thông tin
    // Để an toàn thì ta dùng hàm mssql_escape_string để
    // chống hack sql injection
    // $username   = isset($_POST['username']) ? mysql_escape_string($_POST['username']) : '';
    // $password   = isset($_POST['password']) ? md5($_POST['password']) : '';
    // $email      = isset($_POST['email'])    ? mysql_escape_string($_POST['email']) : '';
    // $phone      = isset($_POST['phone'])    ? mysql_escape_string($_POST['phone']) : '';
    // $level      = isset($_POST['level'])    ? (int)$_POST['level'] : '';

    // Lay thong tin
    $userID=$_SESSION['user_id'];
    $ID=$_GET['id']; 
    $msg = $_POST['msg'];
    // Validate Thông Tin Username và Email có bị trùng hay không

    // Kết nối CSDL
    mysqli_set_charset($connectDB, "utf8");

    // Kiểm tra username hoặc email có bị trùng hay không
    $query = "SELECT * FROM message where user_id_sent = '$userID' and user_id_receive = '$ID'and message='$msg'";
    $result = mysqli_query($connectDB, $query);

    // Thực thi câu truy vấn
    //$result = mysqli_query($connectDB, $insert);
    $num = mysqli_num_rows($result);
    $result = $result->fetch_assoc();
    if ($num == 0) {
      echo '</br> <p style="color:red"> Lỗi ! </p>';
    } else {
      

mysqli . close($connectDB);
}
?>
