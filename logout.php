<?php

session_start();

include 'admin/functions/connect.php';

$userId = $_SESSION['login'] ?? '';

if ($userId) {

    $updateToken = "UPDATE users SET token = NULL WHERE id = $userId";
    $conn->query($updateToken);

    session_unset();
    session_destroy();

    if (isset($_COOKIE['remember_token'])) {
        setcookie('remember_token', '', time() - 3600, '/'); // حذف الكوكيز
    }

    header("location: index.php");
    exit();
} 
else {
    header("location: index.php");
    exit();
}

?>