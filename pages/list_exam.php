<?php
    include("../lib/connectDB.php");
    include("../lib/helper.php");
    session_start();
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

    <title>Danh mục bài tập</title>
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
                    <a class="nav-link " href='student.php'>Thông tin sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teacher.php">Thông tin giảng viên</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link active" href="list_exam.php">Danh mục bài tập</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link "  href="student_upload.php">Upload bai tập</a>
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
        <div class="card">
            <div class="card-header"><b>Danh mục bài tập</b></div>
            <div class="input-group">
                <form class="container" action="#" method="post" enctype="multipart/form-data">
                    <div class="custom-file">
                    <?php
                        if (is_teacher()) {
                            echo "<input type='file' name='file' class='custom-file-input' id='inputGroupFile01' aria-describedby='inputGroupFileAddon01'>";
                            echo"<label class='custom-file-label' for='inputGroupFile01'>Choose file</label>";
                        }
                    ?>
                    </div>
                    <div>
                        <?php
                        if (is_teacher()) {
                            echo "<button type='submit' class='btn btn-primary' name='btn_1'>Upload</button>";
                        }
                    ?>
                    </div>
                </form>
                <?php
                //session_start();

                //check_session();

                if (isset($_POST['btn_1'])) {

                    //$userID = $_SESSION['user_id'];
                    //$ID = $_GET['id'];
                    $username = $_SESSION['username'];

                    $name = $_FILES['file']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir.basename($_FILES["file"]["name"]);

                    // Select file type
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Valid file extensions
                    $extensions_arr = array("doc", "docx", "xlsx", "pdf");

                    // Check extension
                    if (in_array($imageFileType, $extensions_arr)) {

                        // Insert record
                        $query = "INSERT INTO `exam` (`file_path`,`teacher_user_id`) values('$name','$username')";
                        //$query = "UPDATE account SET Avatar='$name' WHERE Username='$username' ";
                        mysqli_query($connectDB, $query);

                        // Upload file
                        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
                    }
                    // $sql = "select Avatar from account where Username='$username'";
                    // $result = mysqli_query($connectDB,$sql);
                    // $row = mysqli_fetch_array($result);

                    // $image = $row['Avatar'];
                    // $image_src = "upload/".$image;

                }
                ?>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>File</th>
                            <th>Người upload</th>
                            <th>Tải xuống</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        //session_start();
                        $query = "SELECT * FROM exam";
                        $result = mysqli_query($connectDB, $query);
                        mysqli_set_charset($connectDB, "utf8");
							if(mysqli_num_rows($result) > 0){
                                $i=0;
								while ($r = mysqli_fetch_assoc($result)){
                                    
                                    $i++;
                                    $ID = $r['ID'];
                                    $file_path= $r['file_path'];
                                    $teacher_user_id = $r['teacher_user_id'];
                                    
                                    echo "<tr>";
                                    echo "<td>$ID</td>";
                                    echo "<td>$file_path</td>";
                                    echo "<td>$teacher_user_id</td>";
                                    echo " <td>";
                                    // if (is_teacher()) {
                                    //     echo "
                                    //     <a href='../lib/edit_student.php?id=$ID'><input class= 'btn btn-primary' id='btnSua' type='button' value='Sửa' '></a>   
                                    //     <a href='../lib/del_student.php?id=$ID''><input class='btn btn-primary' id='btnXoa' type='button' value='Xóa'></a> 
                                    //     ";
                                    // }
                                   
                                    echo "<a href='../lib/download_teacher_exam.php?id=$ID'><input class='btn btn-primary' id='btnDownload' type='button' value='Download' '></a> 
                                    </td>";
                                    echo"</tr>";
                                    
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>