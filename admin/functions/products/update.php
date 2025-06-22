<?php
session_start();

include "../connect.php";
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$stock = $_POST['stock'];
$old_img = $_POST['old_img'];
$cat = $_POST['cat'];

$errors = [];

$imageName = $_FILES['img']['name'];

if(empty($imageName)){
    $imageString = $old_img;
}else{

$temp = $_FILES['img']['tmp_name'];
$arrayImage = [];

for($i = 0; $i < count($imageName); $i++) {
    if ($_FILES['img']['error'][$i] == 0) {
        $extensions = ["jpg", "jpeg", "gif", "png"];

        $ext = pathinfo($imageName[$i], PATHINFO_EXTENSION);
        
        if (in_array($ext, $extensions)) {
            if ($_FILES['img']['size'][$i] < 2 * 1024 * 1024) {
                $newName = md5(uniqid()) . "." . $ext;
                move_uploaded_file($temp[$i], '../../images/' . $newName);
                $arrayImage[] = $newName;
            } else {
                $errors['img'] = '<div class="alert alert-danger">File size is too big.</div>';
            }
        } else {
            $errors['img'] = '<div class="alert alert-danger">Extension not allowed.</div>';
        }
    } else {
        $errors['img'] = '<div class="alert alert-danger">sorry you must upload an image or the same image that were uploaded before.</div>';
    }
}

    $imageString = implode( ',' , $arrayImage);
}

if(empty($name)){
    $errors['name'] = '<div class="alert alert-danger">sorry the name felid cannot be empty</div>';
}

if(empty($price)){
    $errors['price'] = '<div class="alert alert-danger">sorry the price felid cannot be empty</div>';
}

if(empty($sale)){
    $errors['sale'] = '<div class="alert alert-danger">sorry the sale felid cannot be empty</div>';
}

if(empty($stock)){
    $errors['stock'] = '<div class="alert alert-danger">sorry the stock felid cannot be empty</div>';
}

if(!empty($errors)){
    $_SESSION["errors"] = $errors;
    header("location: ../../products.php?action=edit&id=$id");
    exit();

}

$update = "UPDATE products SET 
            img = '$imageString',
            cat_id = '$cat',
            name = '$name' , 
            price = '$price' , 
            sale = '$sale' , 
            stock = '$stock' 
            

        WHERE id = $id 
";

$query = $conn -> query($update);

if ($query) {
    $_SESSION['status'] = '<div class="alert alert-success">Product Updated Successfully</div>';
    header("location: ../../products.php");
}