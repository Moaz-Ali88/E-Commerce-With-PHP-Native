<?php
session_start();
// extract($_POST);
include "../connect.php";

$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$stock = $_POST['stock'];
$cat = $_POST['cat'];

$errors = [];

$imageName = $_FILES['img']['name'];
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
        $errors['img'] = '<div class="alert alert-danger">You must upload an image.</div>';
    }
}

    $imageString = implode( ',' , $arrayImage);

if(empty($name)){
    $errors['name'] = '<div class="alert alert-danger">name is required</div>';
}

if(empty($price)){
    $errors['price'] = '<div class="alert alert-danger">price is required</div>';
}

if(empty($sale)){
    $errors['sale'] = '<div class="alert alert-danger">sale is required</div>';
}

if(empty($stock)){
    $errors['stock'] = '<div class="alert alert-danger">stock is required</div>';
}

if(!empty($errors)){
    $_SESSION["errors"] = $errors;
    header("location: ../../products.php?action=add");
    exit();

}
    // query insert
$insert = "INSERT INTO products (img , cat_id, name , sale , stock, price)
                                VALUES 
                                ('$imageString'  , '$cat' , '$name','$sale' , '$stock', '$price' )";

$query = $conn -> query($insert);

if ($query) {
    $lastId = $conn->insert_id;

    foreach ($arrayImage as $imgName) {
        $checkImg = "SELECT * FROM images WHERE pro_id = '$lastId' AND img = '$imgName'";
        $checkQuery = $conn->query($checkImg);

        if ($checkQuery->num_rows == 0) {
            $insertImg = "INSERT INTO images (pro_id, img) VALUES ('$lastId', '$imgName')";
            $conn->query($insertImg);
        }
    }
}

if ($query) {
    $_SESSION['status'] = '<div class="alert alert-success">Product Added Successfully</div>';
    header("location: ../../products.php");
}else{
    echo $conn -> error;
}
?>