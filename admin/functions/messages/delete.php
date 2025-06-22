<?php
session_start();

$id = $_GET['id'];

include "../connect.php";

$del = "DELETE FROM messages WHERE id = $id";
$query = $conn->query($del);

if ($query) {
    $_SESSION['status'] = '<div class="alert alert-success">Message Deleted Successfully</div>';
    header("location: ../../messages.php");
}