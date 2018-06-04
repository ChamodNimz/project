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
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include('admin-navigation.php');?><br><br><br>
<div class="container-fluid mt-5">
	<!-- to view only booked customers-->
<div class="row p-2 ">
	<div class="col-md-6">
		<?php require_once('connection.php');
			$query="select  bookingID,fname,statusPayment,telephone,roomType,price from bookings where statusPayment='bookedOnly' ";
			$dataSet=mysqli_query($connection,$query);
		?>
		<h1 class="display-5 text-center pb-4 text-warning">Payment pendings</h1>
		<table id="bookedCustomers" class="table table-striped shadow">
			<thead class="thead-dark">
				<tr>
					<td>bookID</td>
					<td>Status</td>
					<td>Name</td>
					<td>Contact</td>
					<td>Room type</td>
					<td>Total Price</td>
					<td><i class="fa fa-credit-card" aria-hidden="true"></i> Payment</td>
				</tr>
			</thead>
			<tbody>
				<?php while($row=mysqli_fetch_array($dataSet)): ?>
				<tr>
					<td><?php echo"".$row['bookingID'].""; ?> </td>
					<td class="table-danger"><?php echo"".$row['statusPayment'].""; ?></td>
					<td><?php echo"".$row['fname'].""; ?></td>
					<td><?php echo"".$row['telephone']."";?></td>
					<td><?php echo"".$row['roomType'].""; ?></td>
					<td><?php echo"".$row['price'].""; ?></td>
					<td><button class="btn btn-info" onclick="payRequest(<?php echo"".$row['bookingID']."";?>);"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay Now</button></td>
				</tr><?php endwhile;?>
			</tbody>
		</table>
	</div>
	<!--to view paid customers-->
	<div class="col-md-6">
		<?php 
			$queryPaid="select  bookingID,fname,lname,statusPayment,telephone,roomType from bookings where statusPayment='paid' ";
			$dataSetPaid=mysqli_query($connection,$queryPaid);
		?>
		<h1 class="display-5 text-center text-success pb-4 ">Paid Customers</h1>
		<table id="paidCustomers" class="table table-striped shadow">
			<thead class="thead-dark">
				<tr>
					<td>Book ID</td>
					<td>First Name</td>
					<td>Last Name</td>
					<td>Contact</td>
					<td>Room type</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php while($rowPaid=mysqli_fetch_array($dataSetPaid)): ?>
					<td ><?php echo"".$rowPaid['bookingID'].""; ?></td>
					<td class="table-success"><?php echo"".$rowPaid['fname'].""; ?></td>
					<td class="table-success"><?php echo"".$rowPaid['lname'].""; ?></td>
					<td class="table-success"><?php echo"".$rowPaid['telephone'].""; ?></td>
					<td><?php echo"".$rowPaid['roomType'].""; ?></td>
				</tr>
			<?php endwhile; ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<script type="text/javascript">
	//payrequest  function
	function payRequest(id){

		var data={"id":id};//data object to store values
		
		jQuery.ajax({

			url:"paymentAjaxCall.php",
			method:"post",
			data:data,
			success:function(data){
				if(data==1){
					//jQuery('body').load('Messages/successPayment.php');
					jQuery('#successModal').modal('toggle');
						
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
</script>
<!-- Modal message success -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Payment Success!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Payment has accepeted for this guest!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="refresh();">Okay</button>
        
      </div>
    </div>
  </div>
</div>
</body>
</html>