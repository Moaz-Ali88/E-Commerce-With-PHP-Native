<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="admin/css/datepicker3.css" rel="stylesheet">
	<link href="admin/css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div>
				<?php  
					if(isset($_SESSION['log_in'])) {
						echo $_SESSION['log_in'] ;
						unset($_SESSION['log_in']);
					}

					if(isset($_SESSION['registered'])){
						echo $_SESSION['registered'];
						unset($_SESSION['registered']);
					}
				?>
			</div>
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post" action="login.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<button class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
			<div>
				<?php  
					if(isset($_SESSION['error'])) {
						echo $_SESSION['error'] ;
						unset($_SESSION['error']);
					}
				?>
			</div>
        <a href="register.php">
						<button type="button" class="btn btn-primary">Create an account</button>
					</a>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="admin/js/jquery-1.11.1.min.js"></script>
	<script src="admin/js/bootstrap.min.js"></script>
</body>
</html>





<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'admin/functions/connect.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['login'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['status'] = '<div class="alert alert-success text-center">You logedin successfully</div>';
        header("location: index.php");
    } else {
        $_SESSION['error'] = '<div class="alert alert-danger">wrong credentials</div>';
            header("location: login.php");
        }


    $conn->close();
	} 

?>

