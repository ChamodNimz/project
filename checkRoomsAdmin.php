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
	<title>Admin check rooms</title>
	<?php include('links.php');?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('admin-navigation.php')?><br><br><br><br><br>
	<div class="container">
		<h1 class="display-4 text-info">Check rooms</h1><hr class="my-4">
		<?php 
			require_once('connection.php');
			$query="select  * from rooms ";
			$dataSet=mysqli_query($connection,$query);

		?>
		<table class="table table-dark round shadow-lg">
			<thead class="text-warning">
				<tr>					
					<td>Room ID</td>
					<td>Room Type</td>
					<td>Total Rooms</td>
					<td class=" ">Currently Available Rooms</td>
				</tr>
				<tbody>
					<?php while($row=mysqli_fetch_array($dataSet)): ?>
					<tr>				
						<td><?php echo"".$row['rID']."";?></td>
						<td><?php echo"".$row['type']."";?></td>
						<td class="text-danger"><?php echo"".$row['fullAmount']."";?></td>
						<td class=" text-info"><?php echo"".$row['availableAmount']."";?></td>	
					</tr>
					<?php endwhile; ?>
				</tbody>
			</thead>
		</table>	
	</div>
</body>
</html>