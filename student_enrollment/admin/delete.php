
<?php 
session_start();
if (isset($_SESSION['user_login'])) {
	$id = base64_decode($_GET['id']);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	if(mysqli_query($db_con,"DELETE FROM student WHERE id = '$id'")){
		header('Location: dashboard-index.php?page=all-student&delete=success');
	}else{
		header('Location: dashboard-index.php?page=all-student&delete=error');
	}
}else{
	header('Location: index.php');
 }
