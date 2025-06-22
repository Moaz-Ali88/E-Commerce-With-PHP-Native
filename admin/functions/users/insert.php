<?php

session_start();

include "../connect.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $priv = $_POST['priv'];

    $errors = [];

if(empty($username)){
    $errors['username'] = '<div class="alert alert-danger">username is required</div>';
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
    header("location: ../../users.php?action=add");
    exit();

}else{
    $insert = "INSERT INTO users

                            (username, password, email, address, gender, priv)
                            VALUES
                            ('$username', '$hashed_password', '$email', '$address', '$gender', '$priv')";

    $query = $conn -> query($insert);

    if ($query) {
        $_SESSION['status'] = '<div class="alert alert-success">User Added Successfully</div>';
    header("location: ../../users.php");
    exit();
    
    }else{

    echo $conn -> error;
    

    }
}
