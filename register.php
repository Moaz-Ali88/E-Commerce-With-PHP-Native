<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link href="admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="admin/css/datepicker3.css" rel="stylesheet">
	<link href="admin/css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					<form role="form" method="post" action="register.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text" autofocus="">
                                <br>
                                            <?php  
                                            ob_start();
                                                if(isset($_SESSION['errors']['username'])) {
                                                    echo $_SESSION['errors']['username'] ;
                                                }
                                            ?>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
                                <br>
                                            <?php  
                                                if(isset($_SESSION['errors']['password'])) {
                                                    echo $_SESSION['errors']['password'] ;
                                                }
                                            ?>
							</div>
                            <div class="form-group">
								<input class="form-control" placeholder="Email" name="email" type="email" value="">
                                <br>
                                            <?php  
                                                if(isset($_SESSION['errors']['email'])) {
                                                    echo $_SESSION['errors']['email'] ;
                                                }
                                            ?>
							</div>
                            <div class="form-group">
								<input class="form-control" placeholder="Address" name="address" type="text" value="">
                                <br>
                                            <?php  
                                                if(isset($_SESSION['errors']['address'])) {
                                                    echo $_SESSION['errors']['address'] ;
                                                }
                                            ?>
							</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadiol" value="0">
                                    <label class="form-check-label" for="inlineRadiol" >Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1">
                                    <label class="form-check-label" for="inlineRadio2"> Female</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Privliges</label>
                                    <select name="priv" class="form-control" id="exampleFormControlSelect1">
                                        <option value="3" >User</option>
                                    </select>
                            </div>
							<button class="btn btn-primary">Create</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="admin/js/jquery-1.11.1.min.js"></script>
	<script src="admin/js/bootstrap.min.js"></script>
</body>
</html>
<?php unset($_SESSION['errors']); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'admin/functions/connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $priv = $_POST['priv'];
    
    $errors = [];

    $selectuser = "SELECT username FROM users WHERE username = '$username'";
    $result = $conn -> query($selectuser);
    $row = $result -> num_rows > 0;
    
    if($row){
        $errors['username'] = '<div class="alert alert-danger">this name is resevred</div>';
    }elseif(empty($username)){
        $errors['username'] = '<div class="alert alert-danger">username is required</div>';
        ob_end_flush();
    }

    if(empty($password)){
        $errors['password'] = '<div class="alert alert-danger">password is required</div>';
        }
    
        $hashed_password = md5($password);
    
        if(empty($email)){
        $errors['email'] = '<div class="alert alert-danger">email is required</div>';
        }
    
        if(empty($address)){
        $errors['address'] = '<div class="alert alert-danger">address is required</div>';
        }
    
    if(!empty($errors)){
        $_SESSION["errors"] = $errors;
        header("location: register.php");
        exit();
    
    }else{
        $sql = "INSERT INTO users

        (username, password, email, address, gender, priv)
        VALUES
        ('$username', '$hashed_password', '$email', '$address', '$gender', '$priv')";
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['registered'] = '<div class="alert alert-success">Your account created successfully, Just login here with it.</div>';
            header("location: login.php");
        }
    }
    

    $conn->close();
}

?>
