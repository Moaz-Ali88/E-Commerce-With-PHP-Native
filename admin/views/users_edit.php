    <?php

    $id = $_GET['id'];
    $select = "SELECT * FROM users WHERE id = $id";
    $query = $conn -> query($select);
    $user = $query -> fetch_assoc();


    ?>


    <form method="post" action="functions/users/update.php">

    <input type="hidden" name="id" value="<?= $user['id'] ?>">

    <div class="form-group">

    <label for="exampleInput Email1">username</label>

    <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" id="exampleInputEmail1">
    <br>
    <?php if(isset($_SESSION['errors']['username'])){
        echo $_SESSION['errors']['username'];
    }?>

    </div>

    <div class="form-group">


    <label for="exampleInputEmail1">password</label>

    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="password">

    </div>

    <div class="form-group">

    <label for="exampleInputEmail1"> Email </label>

    <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" id="exampleInputEmail">
    <br>
    <?php if(isset($_SESSION['errors']['email'])){
        echo $_SESSION['errors']['email'];
    }?>

    </div>

    <div class="form-group">

    <label for="exampleInputEmaill"> Address </label>

    <input type="text" name="address" value="<?= $user['address'] ?>" class="form-control" id="exampleInputEmail1">
    <br>
    <?php if(isset($_SESSION['errors']['address'])){
        echo $_SESSION['errors']['address'];
    }?>

    </div>

    <div class="form-check form-check-inline">

    <input class="form-check-input" type="radio" name="gender" id="inlineRadiol" value="0" 
        <?= $user['gender'] == 0 ? 'checked' : '' ?>
    >

    <label class="form-check-label" for="inlineRadiol" >Male</label>

    </div>

    <div class="form-check form-check-inline">

    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1" 
        <?= $user['gender'] == 1 ? 'checked' : '' ?>
    >

    <label class="form-check-label" for="inlineRadio2"> Female</label>

    </div>

    <br>

    <div class="form-group">

    <label for="exampleFormControlSelect1">Privliges</label>

    <select name="priv" class="form-control" id="exampleFormControlSelect1">

    <option value="0" 
    <?= $user['priv'] == 0 ? 'selected' : '' ?>
    >Owner</option>

    <option value="1" 
    <?= $user['priv'] == 1 ? 'selected' : '' ?>
    >Supervisar</option>

    <option value="2" 
    <?= $user['priv'] == 2 ? 'selected' : '' ?>
    >Admin</option>

    <option value="3" 
    <?= $user['priv'] == 3 ? 'selected' : '' ?>
    >User</option>

    </select>

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    </form>
