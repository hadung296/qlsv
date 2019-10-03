
<?php
    include("helper.php");
    include("connectDB.php");
    
    mysqli_query($connectDB, 'SET NAMES UTF8');
    session_start();	
	if(isset($_GET['id'])){
    $ID = $_GET['id'];
    dd($ID);
	$query = "DELETE FROM message WHERE ID ='$ID'";
	mysqli_query($connectDB,$query) or die("xóa dữ liệu thất bại");
    header('location: ../pages/message.php');
    }
?>
			