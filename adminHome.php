<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
 header('Location:login.php');
}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin-Home</title>
	<?php include('links.php');?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php include('admin-navigation.php');?><br><br><br>
<div class="container-fluid mt-5">
	<!-- to view only booked customers-->
<div class="row p-2">
	<div class="col-md-6">
		<table id="bookedCustomers" class="table">
			<thead class="thead-dark">
				<tr>
					<td>cusID</td>
					<td>bookID</td>
					<td>Status</td>
					<td>Contact</td>
					<td>Room type</td>
				</tr>
			</thead>
		</table>
	</div>
	<!--to view paid customers-->
	<div class="col-md-6">
		<table id="paidCustomers" class="table">
			<thead class="thead-light">
				<tr>
					<td>cusID</td>
					<td>bookID</td>
					<td>Status</td>
					<td>Contact</td>
					<td>Room type</td>
				</tr>
			</thead>
		</table>
	</div>
</div>
</div>

</body>
</html>