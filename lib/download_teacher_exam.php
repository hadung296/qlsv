<?php
include("../lib/connectDB.php");
include("../lib/helper.php");
	
    $id = $_GET['id'];
    //dd($id);
    $query = "SELECT * FROM qlsv.exam where ID='$id'";
    $result = mysqli_query($connectDB, $query);
    //Hàm này mới lấy ra kết quả
    $num = mysqli_num_rows($result);
    $result = $result->fetch_assoc();
    if ($num == 0) {
      echo '</br> <p style="color:red"> Lỗi ! </p>';
    } else {
        // dd($result);
        $file = "../upload/".$result['file_path'];

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
    }
    
}
	?>