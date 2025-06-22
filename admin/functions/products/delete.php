<?php
session_start();

$id = $_GET['id'];

include "../connect.php";

$del = "DELETE FROM products WHERE id = $id";
$query = $conn->query($del);

if ($query) {
    $_SESSION['status'] = '<div class="alert alert-success">Product Deleted Successfully</div>';
    header("location: ../../products.php");
}