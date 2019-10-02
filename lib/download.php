<?php
include("../lib/connectDB.php");
include("../lib/helper.php");
	// $file = '../download/'.$_GET['ID'];
   	// $title=$_GET['ID'];

    // header("Pragma: public");
    // header('Content-disposition: attachment; filename='.$title);
  
    
    // header('Content-Transfer-Encoding: binary');
    // ob_clean();
    // flush();

    // $chunksize = 1 * (1024 * 1024); // how many bytes per chunk
    // if (filesize($file) > $chunksize) {
    //     $handle = fopen($file, 'rb');
    //     $buffer = '';

    //     while (!feof($handle)) {
    //         $buffer = fread($handle, $chunksize);
    //         echo $buffer;
    //         ob_flush();
    //         flush();
    //     }

    //     fclose($handle);
    // } else {
    //     readfile($file);
    // }
    $id = $_GET['id'];
    $query = "SELECT * FROM qlsv.student_upload where ID='$id'";
    $result = mysqli_query($connectDB, $query);
    //Hàm này mới lấy ra kết quả
    $num = mysqli_num_rows($result);
    $result = $result->fetch_assoc();
    if ($num == 0) {
      echo '</br> <p style="color:red"> Sai tên đăng nhập hoặc mật khẩu ! </p>';
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