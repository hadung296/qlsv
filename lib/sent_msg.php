<?php
session_start();
// <!-- Bootstrap core CSS -->
include("../lib/connectDB.php");
include("../lib/helper.php");

// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['submit'])) {
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
    $insert = "INSERT INTO message (`user_id_sent`, `user_id_receive`, `message`) VALUES ('$userID','$ID','$msg')";


    // Thực thi câu truy vấn
    //$result = mysqli_query($connectDB, $insert);
    
    if (mysqli_query($connectDB, $insert)) {?>
        <script language="javascript">alert("Gửi thành công"); window.location="../pages/message.php?id=<?=$ID?>"</script>
    <?php } else {?>
        <script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../pages/message.php?id=<?=$ID?>"</script>
    <?php }
}?>