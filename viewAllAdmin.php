<?php 
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
		header('Location:login.php');
	}
	//else the code will run
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin View Details</title>
	<?php include('links.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/notificationBulb.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--thses 2 links are used to create dynamic tables using jslib-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<!-- table lib links over-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('admin-navigation.php'); ?><br><br>
	<div class="container mt-5">
		<h1 class="float-left display-5 text-info mt-3">View all details</h1>
		<hr class="my-5 bg-warning">
		<table class="table table-striped table-light shadow display" id="table_id" >
			<?php 
			//code for creating the table dynamically
			require_once('connection.php');
			$query="select  * from bookings ";
			$dataSet=mysqli_query($connection,$query);
			?>
			<thead class="thead-light text-info lead">
				<tr>
					<td>bookingID</td>
					<td>First Name</td>
					<td>Last Name</td>
					<td>Contact</td>
					<td>E-mail</td>
					<td>Room Booked</td>
					<td>No of rooms</td>
					<td>Check In Date</td>
					<td>Check Out Date</td>
					<td>Special Requests</td>
					<td>Pice</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php while($row=mysqli_fetch_array($dataSet)): ?>
					<td><?php echo"".$row['bookingID'].""; ?></td>
					<td><?php echo"".$row['fName'].""; ?></td>
					<td><?php echo"".$row['lName'].""; ?></td>
					<td><?php echo"".$row['telephone'].""; ?></td>
					<td><?php echo"".$row['email'].""; ?></td>
					<td><?php echo"".$row['roomType'].""; ?></td>
					<td><?php echo"".$row['noRooms'].""; ?></td>
					<td><?php echo"".$row['checkInDate'].""; ?></td>
					<td><?php echo"".$row['chekOutDate'].""; ?></td>
					<td class="mr-5 ml-5"><?php echo"".$row['reqs'].""; ?></td>
					<td><?php echo"".$row['price'].""; ?></td>
				</tr>
			<?php endwhile; ?>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		//code for table creating functional
		$(document).ready( function () {
    		$('#table_id').DataTable();
		} );
	</script>
</body>
</html>