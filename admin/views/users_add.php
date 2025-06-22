<form method="post" action="functions/users/insert.php">

<div class="form-group">
<label for="exampleInput Email1">username</label>
<input type="text" name="username" value="" class="form-control" id="exampleInputEmail1">
<br>
    <?php if(isset($_SESSION['errors']['username'])){
        echo $_SESSION['errors']['username'];
    }?>
</div>

<div class="form-group">
<label for="exampleInputEmail1">password</label>
<input type="password" name="password" class="form-control" id="exampleInputEmail1">
<br>
    <?php if(isset($_SESSION['errors']['password'])){
        echo $_SESSION['errors']['password'];
    }?>
</div>

<div class="form-group">
<label for="exampleInputEmail1"> Email </label>
<input type="email" name="email" value="" class="form-control" id="exampleInputEmail">
<br>
    <?php if(isset($_SESSION['errors']['email'])){
        echo $_SESSION['errors']['email'];
    }?>
</div>

<div class="form-group">
<label for="exampleInputEmaill"> Address </label>
<input type="text" name="address" value="" class="form-control" id="exampleInputEmail1">
<br>
    <?php if(isset($_SESSION['errors']['address'])){
        echo $_SESSION['errors']['address'];
    }?>
</div>

<br>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="gender" id="inlineRadiol" value="0">
<label class="form-check-label" for="inlineRadiol" >Male</label>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1">
<label class="form-check-label" for="inlineRadio2"> Female</label>
</div>

<br>

<div class="form-group">
<label for="exampleFormControlSelect1">Privliges</label>
<select name="priv" class="form-control" id="exampleFormControlSelect1">
<option value="0" >Owner</option>
<option value="1" >Supervisar</option>
<option value="2" >Admin</option>
<option value="3" >User</option>
</select>
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
<?php unset($_SESSION['errors']);?>
