<?php

session_start();

include "../connect.php";

if(isset($_POST['delete_selected'])) {

    if(isset($_POST['product_ids']) && is_array($_POST['product_ids'])) {
        $product_ids = $_POST['product_ids'];

        $ids = implode(',' , $product_ids);

        $sql = "DELETE FROM products WHERE id IN ($ids)";
    }
}

    if(!isset($sql)){
        $_SESSION['error'] = '<div class="alert alert-danger">Must Select An Items</div>';
        header("location: ../../products.php");
        exit();
    }else{
        $query = $conn -> query($sql);

        if($query){
            $_SESSION['status'] = '<div class="alert alert-success">Products Deleted Successfully</div>';
            header("location: ../../products.php");
        }
    }


?>