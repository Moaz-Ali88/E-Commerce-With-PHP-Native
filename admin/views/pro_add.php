<form method="POST" action="functions/products/insert.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">name</label>
    <input type="text" name="name" value="" class="form-control" id="name">
    <br>
    <?php if(isset($_SESSION['errors']['name'])){
      echo $_SESSION['errors']['name'];
    }?>
  </div>

  <div class="form-group">
    <label for="price">price</label>
    <input type="number" name="price" value="" class="form-control" id="price" >
    <br>
    <?php if(isset($_SESSION['errors']['price'])){
      echo $_SESSION['errors']['price'];
    }?>
  </div>
  
  <div class="form-group">
    <label for="sale">sale</label>
    <input type="number" name="sale" value="" class="form-control" id="sale" >
    <br>
    <?php if(isset($_SESSION['errors']['sale'])){
      echo $_SESSION['errors']['sale'];
    }?>
  </div>

  <div class="form-group">
    <label for="stock">Stock</label>
    <input type="number" name="stock" value="" class="form-control" id="stock" >
    <br>
    <?php if(isset($_SESSION['errors']['stock'])){
      echo $_SESSION['errors']['stock'];
    }?>
  </div>

  <div class="form-group">
    <label for="img">img</label>
    <input type="file" name="img[]" value="" class="form-control" id="img" multiple>
    <br>
    <?php if(isset($_SESSION['errors']['img'])){
      echo $_SESSION['errors']['img'];
    }?>
  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect1">Categories</label>
    <select name="cat" class="form-control" id="exampleFormControlSelect1">
    <?php  
        include "functions/connect.php";
        $readCat = "SELECT * FROM categories";
        $queryCat = $conn->query($readCat);
        foreach($queryCat as $category):
    ?>
      <option value="<?= $category['id'] ?>" ><?= $category['name'] ?></option>
    <?php  endforeach;  ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php unset($_SESSION['errors']);?>
