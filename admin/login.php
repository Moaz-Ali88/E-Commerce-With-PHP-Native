<?php  

session_start();

if (isset($_COOKIE['remember_token'])) {
    include "functions/connect.php";

    $token = $_COOKIE['remember_token'];

    $selectUser = "SELECT * FROM users WHERE token = '$token'";
    $queryUser = $conn->query($selectUser);

    if ($queryUser->num_rows > 0) {
        $user = $queryUser->fetch_assoc();
        $_SESSION['login_id'] = $user['id'];
        header("location:index.php");
        exit();
    }
}

if (isset($_SESSION['login_id'])) {
	header("location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post" action="functions/auth/loginCheck.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<button class="btn btn-primary">Login</button>
						</fieldset>
						<br>
						<label>
                                <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                        </label>
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
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
