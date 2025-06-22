<?php

session_start();

$username = $_POST['username'];
$password = md5($_POST['password']); 
$remember = $_POST['remember'] ?? '';

include "../connect.php";

$selectLogin = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$queryLogin = $conn->query($selectLogin);

if ($queryLogin->num_rows > 0) {
    $user = $queryLogin->fetch_assoc();
    $id = $user['id'];

    $_SESSION['login_id'] = $id;
    $_SESSION['priv'] = (int)$user['priv'];

    if ($remember === 'Remember Me') {
        $token = md5($username . time()); 

        $updateToken = "UPDATE users SET token = '$token' WHERE id = $id";
        $conn->query($updateToken);

        setcookie('remember_token', $token, time() + (30 * 24 * 60), '/'); 
    }
    $_SESSION['status'] = '<div class="alert alert-success">You logedin successfully</div>';
    header("location: ../../index.php");
    exit();
} else {
    $_SESSION['error'] = '<div class="alert alert-danger">wrong credentials</div>';
    header("location: ../../login.php?error=1");
    exit();
}
?>