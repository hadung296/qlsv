<?php
include("connectDB.php");
include("helper.php");

session_start();

//check_session();
$id=$_GET['id'];
//dd($id);
//$username = $_SESSION['username'];
//dd($username);
$query = "SELECT * FROM message where ID = '$id'";
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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/logoVT.png">
    <title>Edit Message</title>
    <!-- Bootstrap core CSS-->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="">
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header"><b>Edit Message</b></div>
            <div class="card-body">
                <form method="post" action="#">
                <div class="form-group">
                    <div class="form-row">
                        <label for="InputName">Nội dung</label>
                        <input class="form-control" value="<?php echo $result['message'];?>" type="text" name="new_message"?>
                    </div>
                </div>
               
            </div>
            <div class="align-self-center mx-auto">
                <button type="submit" class="btn btn-primary btn-block" name="edit">Edit</button>
            </div>
            <?php
			if (isset($_POST['edit'])) {
                            
                // Lay thong tin
                //$username = $_GET['Username'];
                $id=$_GET['id'];
                //dd($id);
                $new_msg = $_POST['new_message'];

                $update = "UPDATE message SET message='$new_msg' WHERE ID='$id' ";
            
                if (mysqli_query($connectDB, $update)) {
                    echo '<script language="javascript">alert("Sửa thành công"); window.location="../pages/profile.php";</script>';
                } 
                else {
                    echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="edit_message.php";</script>';
                }
            
            }
            ?>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="../pages/profile.php">Trang cá nhân</a>
                <!--- <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
            </div>
        </div>
    </div>
    </div>
</body>

</html>