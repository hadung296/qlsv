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
} else {
  //dd($result);
}
//mysqli.close($connectDB);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/qlsv/img/logoVT.png">

    <title>Profile</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/"> -->

    <!-- Bootstrap core CSS -->
    <link href="/qlsv/bootstrap/css/bootstrap.min.css" rel="stylesheet" style="text/css">
    <script src="/qlsv/bootstrap/js/bootstrap.min.js" rel="stylesheet" style="text/javascript"> </script>

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='student.php'>Thông tin sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teacher.php">Thông tin giảng viên</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="list_exam.php?id=$ID">Danh mục bài tập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student_upload.php">Upload bai tập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <nav class="navbar navbar-expand-sm bg-dark navbar-darks">
                    <form class="form-inline" action="#">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </nav>
                <li class="nav-item">
                    <a class="nav-link" href="../lib/signout.php">SignOut</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-9">
                <h2>Thông tin cá nhân</h2>
                <div>
                    <div>
                        <div class="row">
                            <div class="col-sm-3 col-md-6 col-lg-4">
                                <div class="card" style="width:250px">
                                <?php 
                                        $avatar=$result['Avatar'];
                                        //dd($avatar);
                                        $image_src = "../upload/".$avatar;
                                ?>
                                    <img class="card-img-top" src='<?php echo $image_src;  ?>' alt="Card image">

                                </div>
                                <div class="input-group">
                                <div class="custom-file">
                                    <form method="POST" action="" enctype='multipart/form-data'>
                                    <!-- <input type="file" accept=".png,.jpg,.gif" class="custom-file-input" id="avatar" name="file">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                                    <input type='file' class='btn btn-outline-primary btn-sm' name='file' />
                                    <!-- <input type='submit' class="btn btn-primary" value='Save' name='but_upload'> -->
                                    <button type="submit" class='btn btn-primary' name="but_upload">Upload</button>
                                </form>
                                </div>
                                
                                <?php
                                check_session();
                                //dd($username);
                                if(isset($_POST['but_upload'])){
                                    $name = $_FILES['file']['name'];
                                    $target_dir = "../upload/";
                                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                                                                    
                                    // Select file type
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                                                            
                                    // Valid file extensions
                                    $extensions_arr = array("jpg","jpeg","png","gif");
                                                                        
                                    // Check extension
                                    if( in_array($imageFileType,$extensions_arr) ){
                                                                        
                                    // Insert record
                                    //$query = "INSERT INTO `account` (`Avatar`) values('$name') WHERE Username='$username'";
                                    $query = "UPDATE account SET Avatar='$name' WHERE Username='$username' " ;
                                    mysqli_query($connectDB,$query);
                                                                        
                                    // Upload file
                                    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                                                                    
                                    }
                                    // $sql = "select Avatar from account where Username='$username'";
                                    // $result = mysqli_query($connectDB,$sql);
                                    // $row = mysqli_fetch_array($result);

                                    // $image = $row['Avatar'];
                                    // $image_src = "upload/".$image;
                                    
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-9 col-md-6 col-lg-8">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <?php
                                        $ID=$result['ID'];
                                        $ten= $result['Name'];
                                        $sdt = $result['Phone'];
                                        $mail = $result['Email'];
                                        $khoa = $result['Khoa'];

                                        echo "Họ tên: $ten <br>";
                                        echo "Số điện thoại: $sdt <br>";
                                        echo "Email: $mail <br>";
                                        echo "Khoa: $khoa <br>";
                                        ?>
                                    </h4>
                                    <form action="../lib/edit_student.php?id=<?=$ID ?>" method="POST">
                                    <button class="btn btn-primary" type="submit" name="Edit">Sửa thông tin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <h2>Message</h2>
                <?php
                    // Thiết lập charset utf8
                        // Kết nối CSDL
                        mysqli_set_charset($connectDB, "utf8");
                    
                        $query = "SELECT * FROM message where user_id_receive = '$ID'";
                        $result = mysqli_query($connectDB, $query);
                    
                        // Thực thi câu truy vấn
                        //$result = mysqli_query($connectDB, $insert);
                        $num = mysqli_num_rows($result);
                        $results =mysqli_fetch_all($result,MYSQLI_ASSOC);
                        //dd($results);

                        if ($num == 0) {
                          echo '</br> <p style="color:red"> Not message ! </p>';
                        } else {?>
                            <ul>
                            <?php foreach($results as $ketqua) {?>
                            <li><?php dd($ketqua); 
                             ?></li>
                        <?php }?>
                        </ul>
                    <?php } ?>
                    
            </div>
        </div>
    </div>
</body>

</html>