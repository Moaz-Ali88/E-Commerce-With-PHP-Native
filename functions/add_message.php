<?php

extract($_POST);

include "../admin/functions/connect.php";

$query = $conn -> query("INSERT INTO messages (name , phone , email , messages) VALUES ('$username' , '$phone' , '$email' , '$message') ");

if ($query) {
    echo "message sent successfully";
}