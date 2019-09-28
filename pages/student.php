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

    <title>Thông tin sinh viên</title>
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
                    <a class="nav-link active" href='student.php'>Thông tin sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thông tin giảng viên</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Danh mục bài tập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Upload bai tập</a>
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
            <div class="card-header"><b>Thông tin sinh viên</b></div>
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
                        include ("../lib/connectDB.php");
                        $query = "SELECT * FROM account";
                        $result = mysqli_query($connectDB, $query);
							if(mysqli_num_rows($result) > 0){
								$i=0;
								while ($r = mysqli_fetch_assoc($result)){
                                    $i++;
                                    $sinhvienID = $r['ID'];
                                    $ten= $r['Name'];
                                    $sdt = $r['Phone'];
                                    $mail = $r['Email'];
                                    $khoa = $r['Khoa'];
                                    echo "<tr>";
                                    echo "<td>$sinhvienID</td>";
                                    echo "<td>$ten</td>";
                                    echo "<td>$sdt</td>";
                                    echo "<td>$mail</td>";
                                    echo "<td>$khoa</td>";
                                    echo " <td>
                                    <a href='#'><input class= 'btn btn-primary' id='btnSua' type='button' value='Sửa' '></a>   
                                    <a href='#'><input class='btn btn-primary' id='btnXoa' type='button' value='Xóa'></a> 
                                    <a href='#'><input class='btn btn-primary' id='btnChitiet' type='button' value='Chi tiết' '></a> 
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