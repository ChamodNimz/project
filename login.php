	<?php 
	require_once('connection.php');

	if(isset($_POST['txtUsername']) && isset($_POST['txtPassword']))
	{
		$username=$_POST['txtUsername'];
		$password=$_POST['txtPassword'];
		$query="select username,password from admin where username ='$username' and password= '$password' ";
		$dataSet=mysqli_query($connection,$query);
		$row=mysqli_fetch_array($dataSet);
		if($row['username']==$username && $row['password'] ==$password)
		{	
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;

			header('Location:adminHome.php');
		}
		else
		{
			include('errors.php');
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/toast.css">
	<?php include('links.php');?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!--Header | Start-->
	<div class="header current-menu-item center" style="animation-duration: 2s; animation-name: exampless;" >
		<div class="logo">
            <a href="index.php" ><img src="Hotel/logo.png"></a>
		</div>
		<!-- Navigation | START -->
		<nav>
            <ul> 
                <li class="current-menu-item">
					<a href="index.php"><span style="color:#56D5C4; !important">Back to home</span></a>
                </li>    
			</ul>
		</nav>
        <!-- Navigation | END -->
    </div>  
        <!--Header  |  END-->  
            <!-- login| START -->
		<div class=" text-center"><br>
		<form method="post" action="#">
			<div class="form-group">
				<div class="container-fluid">
			<div class="row ">
				<div class="col-md-4"></div>
				<div class="col-md-4 shadow-lg p-5 rounded mt-5 mt-5 ">
					<!--title of the logging form-->
				<div class="col-md-12">
					<h2 class="display-4 text-info">Admin login</h2>
				</div>
				<hr class="my-4">
				<img src="Hotel/men.png" width="100px" height="100px" class="p-1 m-4">
				<div class="col p-3">
					<div class="input-group shadow ">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
						</div>
						<input type="text" name="txtUsername" placeholder="Username" id="txtUserNameEmail" class="form-control " required>
					</div>
				</div>
				<div class="col">
				</div>
				<div class="col p-3">	
					<div class="input-group shadow ">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
						</div>
						<input type="password" placeholder="Password" name="txtPassword" id="txtPassword" class="form-control "  required>
					</div>
				</div>
					<input type="submit" name="btnSubmit" class="btn btn-info mt-5 mr-2  shadow " value="login">
				</div>
				<div class="col-md-4"></div>	
			</div>				
				</div>
			</div>
		</form><br><br>
	</div>	
	<!-- loging form finish-->

            <!-- login | END -->
</body>
</html>