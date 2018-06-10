<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
 header('Location:login.php');
}
	?>
<!DOCTYPE html>
<html>
<head>
	<title> Admin view inquries</title>
	<?php include('links.php');?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/notificationBulb.css">
	<link rel="stylesheet" type="text/css" href="notificationBulb.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php include('admin-navigation.php'); ?>
	<div class="container-fluid">
	
	</div>
</body>
</html>