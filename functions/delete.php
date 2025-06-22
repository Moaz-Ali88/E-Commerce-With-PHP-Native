<?php

$id = $_GET['id'];

include "../admin/functions/connect.php";

$del = "DELETE FROM cart WHERE id = $id";
$query = $conn->query($del);

if ($query) {
    header("location: ../cart.php");
}