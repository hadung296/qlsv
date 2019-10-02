<?php
include("../lib/connectDB.php");
include("../lib/helper.php");

session_start();

check_session();

$username = $_SESSION['username'];
$query = "SELECT * FROM account where Username = '$username'";
$result = mysqli_query($connectDB, $query);
//Hàm này mới lấy ra kết quả
$num = mysqli_num_rows($result);
$result = $result->fetch_assoc();
if ($num == 0) {
  echo '</br> <p style="color:red"> Khong co du lieu ! </p>';
} 
else {
  //dd($result);

}
?>

<!-- include("connectDB.php");
session_start();
if (isset($_SESSION['username'])){
mysqli_query($connectDB, 'SET NAMES UTF8');
$query = "SELECT * FROM account where Username = '$username'";
$result = mysqli_query($connectDB, $query);
if(mysqli_num_rows($result) > 0){
    $i=0;
    while ($r = mysqli_fetch_assoc($result)){
        dd($r);
        $i++;
        $username = $r['username'];
        //$password = $_POST['password'];
        $is_teacher = $r['is_teacher'];
        $name=$r['name'];
        $phone=$r['phone'];
        $mail=$r['mail'];
        $khoa=$r['khoa'];
        }
    }
}
	//echo $query;
	
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/qlsv/img/logoVT.png">
    <title>Sửa danh sách</title>
    <!-- Bootstrap core CSS-->
    <link href="/qlsv/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="qlsv/bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="">
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header"><b>Sửa thành viên</b></div>
            <div class="card-body">
                <form method="post" action="#">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="InputName">Username</label>
                            <input class="form-control" id="InputName" type="text" name="username"  value="<?php echo $result['Username']; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_teacher">Vai trò</label>
                    <input class="form-control" id="is_teacher" type="int" placeholder="teacher is 1 - student is 0" value="<?php $result['Is_teacher']; ?>" name="is_teacher">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <label for="InputPassword">Password</label>
                        <input class="form-control" id="InputPassword" type="password" name="password" value="<?php $result['Pass']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <label for="InputName">Họ tên</label>
                        <input class="form-control" id="InputName" value="<?php echo $result['Name'];?>" type="text" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <label for="InputPhone">Số điện thoại</label>
                        <input class="form-control" id="InputPhone" type="number" value="<?php echo $result['Phone'];?>" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <label for="InputEmail">Email</label>
                        <input class="form-control" id="InputEmail" type="text" value="<?php echo $result['Email'];?>" name="mail">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <label for="InputKhoa">Khoa</label>
                        <input class="form-control" id="InputKhoa" type="text" value="<?php echo $result['Khoa'];?>" name="khoa">
                    </div>
                </div>
            </div>
            <div class="align-self-center mx-auto">
                <button type="submit" class="btn btn-primary btn-block" name="edit">Edit</button>
            </div>
            <?php
			if (isset($_POST['edit'])) {
                            
                // Lay thong tin
                $username = $_GET['Username'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $is_teacher = $_POST['is_teacher'];
                $name=$_POST['name'];
                $phone=$_POST['phone'];
                $mail=$_POST['mail'];
                $khoa=$_POST['khoa'];

                $update = "UPDATE account SET Username= '$username', Pass='$password', Is_teacher='$is_teacher', Name ='$name', Phone='$phone', Email='$mail', Khoa='$khoa' WHERE Username='$username' " ;
            
                if (mysqli_query($connectDB, $update)) {
                    echo '<script language="javascript">alert("Sửa thành công"); window.location="../pages/student.php";</script>';
                } 
                else {
                    echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="edit_student.php";</script>';
                }
            
            }
            ?>
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