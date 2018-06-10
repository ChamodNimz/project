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
	<title>Admin-Cancel reservations</title>
	<?php include('links.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/notificationBulb.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!--thses 2 links are used to create dynamic tables using jslib-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
	<!-- table lib links over-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('admin-navigation.php'); ?><br><br>
	<div class="container mt-5">
		<h1 class="float-left display-5 text-info mt-3">Cancel reservations</h1>
		<hr class="my-5 bg-warning">
		<table class="table table-striped table-light " id="table_id">
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
					<td><i class=" fa fa-ban" aria-hidden="true"></i> Cancel </td>
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
					<td><button class="btn btn-danger" onclick="cancelRequest( <?php echo"".$row['bookingID'].""; ?>);"><i class="fa fa-minus-circle" aria-hidden="true"></i> Cancel</button></td>
				</tr>
			<?php endwhile; ?>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		//ajax request to cancel the selected booking
		function cancelRequest(id){

		var data={"id":id};//data object to store values
		
		jQuery.ajax({

			url:"cancellationAjaxCall.php",
			method:"post",
			data:data,
			success:function(data){
				if(data==2){
					//jQuery('body').load('Messages/successPayment.php');
					jQuery('#cancelModal').modal('toggle');
						
				}
				else{
					alert("error");
				}
				
			},
			error:function(){
				alert("error occured");
			}


		});
	}
//to refresh the page
	function refresh(){
		location.reload();
	}
	
	//code for table creating functional
		$(document).ready( function () {
    		$('#table_id').DataTable();
		} );
	</script>

	<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Booking Cancellation Success!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="">Booking which has done by this user has removed!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="refresh();">Okay</button>
        
      </div>
    </div>
  </div>
</div>
</body>
</html>