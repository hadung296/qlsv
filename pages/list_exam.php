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
        <div class="card">
            <div class="card-header"><b>Danh mục bài tập</b></div>
            <div class="input-group">
                <form class="container" action="#" method="post" enctype="multipart/form-data">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    <div>
                        <button type="submit" class='btn btn-primary' name="btn_1">Upload</button>
                    </div>
                </form>
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>