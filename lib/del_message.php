<?php
    include("connectDB.php");
	mysqli_query($connectDB, 'SET NAMES UTF8');
						
	if(isset($_GET['id'])){
    $id = $_GET['id'];
	$query = "DELETE FROM `message` WHERE ID='$id'";
	mysqli_query($connectDB,$query) or die("xóa dữ liệu thất bại");
    header('location:../pages/profile.php');
	}
?>
			