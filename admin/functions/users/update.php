    <?php
    session_start();
    include "../connect.php";

    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $priv = $_POST['priv'];


    $errors = [];
    if(empty($username)){
        $errors['username'] = '<div class="alert alert-danger">sorry the username felid cannot be empty</div>';
    }
    
    if(empty($email)){
        $errors['email'] = '<div class="alert alert-danger">sorry the email felid cannot be empty</div>';
    }
    
    if(empty($address)){
        $errors['address'] = '<div class="alert alert-danger">sorry the address felid cannot be empty</div>';
    }
    
    if(!empty($errors)){
        $_SESSION["errors"] = $errors;
        header("location: ../../users.php?action=edit&id=$id");
        exit();
    
    }
    

    if(!empty($_POST['password'])){

        $pass = md5($_POST['password']);
        $update_pass = "UPDATE users SET password = '$pass' WHERE id = $id";
        $query_pass = $conn -> query($update_pass);
    }

    $update = "UPDATE users SET
                username = '$username',
                email = '$email',
                address = '$address',
                gender = '$gender',
                priv = '$priv'
            WHERE id = $id
    ";

        $query = $conn -> query($update);

        if ($query) {
            $_SESSION['status'] = '<div class="alert alert-success">User Updated Successfully</div>';
            header("location: ../../users.php");
        
        }else{
        
            echo $conn -> error;
            
        
        }