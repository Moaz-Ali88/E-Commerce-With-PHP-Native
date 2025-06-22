<?php
session_start();

$id = $_GET['id'];

include "../connect.php";

$del = "DELETE FROM users WHERE id = $id";
$query = $conn->query($del);

if ($query) {
    $_SESSION['status'] = '<div class="alert alert-success">User Deleted Successfully</div>';
    header("location: ../../users.php");
}