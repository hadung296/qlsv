<?php
	
	session_start();
 	 if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/qlsv/img/logoVT.png">
    <!-- Bootstrap core CSS -->
    <link href="/qlsv/bootstrap/css/bootstrap.min.css" rel="stylesheet" style="text/css">
    <link href="/qlsv/bootstrap/css/bootstrap.css" rel="stylesheet" style="text/css">
    <script src="/qlsv/bootstrap/js/bootstrap.min.js" rel="stylesheet" style="text/javascript"> </script>

    <title>Thông tin tìm kiếm</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href='profile.php?id=$ID'>HOME</a>
                    <!-- <a class="nav-link" href='profile.php?id=$ID'><input id='btnHome' type='button' value='HOME'>HOME</a> -->
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
                    <a class="nav-link" href="list_exam.php?id=$ID ">Danh mục bài tập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student_upload.php">Upload bai tập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <nav class="navbar navbar-expand-sm bg-dark navbar-darks">
                    <form class="form-inline" action="#" method="POST">
                        <input class="form-control mr-sm-2" type="text" name="input" placeholder="Search">
                        <button class="btn btn-success" type="submit" name="search">Search</button>
                    </form>
                </nav>
                <li class="nav-item">
                    <a class="nav-link" href="../lib/signout.php">SignOut</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header"><b>Kết quả tìm kiếm</b></div>
            <div class="card-body">
                <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Khoa</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        include("../lib/connectDB.php");
                        include("../lib/helper.php");
                        //session_start();
                        
                        if (isset($_POST['search'])) {
                            $input=$_POST['input']; 
                            // Lay thong tin
                            $query = "SELECT * FROM `account` WHERE `Name` LIKE '%$input%'";
                            $result = mysqli_query($connectDB, $query);
                            mysqli_set_charset($connectDB, "utf8");
                            //dd($result);
							    if(mysqli_num_rows($result) > 0){
                                    $i=0;
								    while ($r = mysqli_fetch_assoc($result)){
                                    //$username = $_SESSION['username'];
                                   // $_SESSION['is_teacher'] = $result['Is_teacher'];
                                   // if(is_teacher()) {
                                        //dd($result);
                                        //dd("Tao la teacher.");
                                        //header('location: profile.php');
                                    //} else {
                                        //dd("May la hocj sinh. ");
                                        //header('location: profile.php');
                                    //}
                                        $i++;
                                        $ID = $r['ID'];
                                        $ten= $r['Name'];
                                        $sdt = $r['Phone'];
                                        $mail = $r['Email'];
                                        $khoa = $r['Khoa'];
                                        echo "<tr>";
                                        echo "<td>$ID</td>";
                                        echo "<td>$ten</td>";
                                        echo "<td>$sdt</td>";
                                        echo "<td>$mail</td>";
                                        echo "<td>$khoa</td>";
                                        echo " <td>";
                                        if (is_teacher()) {
                                            echo "
                                            <a href='../lib/edit_student.php?id=$ID'><input class= 'btn btn-primary' id='btnSua' type='button' value='Sửa' '></a>   
                                            <a href='../lib/del_student.php?id=$ID''><input class='btn btn-primary' id='btnXoa' type='button' value='Xóa'></a> 
                                            ";
                                        }
                                    
                                        echo "<a href='message.php?id=$ID'><input class='btn btn-primary' id='btnChitiet' type='button' value='Chi tiết' '></a> 
                                        </td>";
                                        echo"</tr>";
                                    
                                }
                            }
                        }
                        
					?>
                </tbody>
                </table>
            </div>
        </div>
        <div class="col text-center"> 
            <?php       
            if (is_teacher()){ 
                echo"        
                <a href='../lib/add_student.php'><input class='btn btn-primary center-block' id='add' type='button' value='add_student'></a> 
                ";
        }
            ?>
         </div>
    </div>
</body>

</html>
<?php
	}
	else {
		header('location:signin.php');
	}
?>