
<?php
    include ("connectDB.php");
	mysqli_query($connectDB, 'SET NAMES UTF8');
						
	if(isset($_GET['id'])){
	$hoten = $_GET['id'];
	$query = "DELETE FROM `account` WHERE ID ='$hoten'";
	mysqli_query($connectDB,$query) or die("xóa dữ liệu thất bại");
    header('location:../pages/student.php');
	}
?>
			