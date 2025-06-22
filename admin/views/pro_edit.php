<?php  

  $id = $_GET['id'];

   // include "functions/connect.php";

  $read = "SELECT * FROM products WHERE id = $id";

  $query = $conn -> query($read);

  $product = $query -> fetch_assoc();

?>


<form method="post" action="functions/products/update.php" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $product['id'] ?>">
  <div class="form-group">
    <label for="name">name</label>
    <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control" id="name">
    <br>
    <?php if(isset($_SESSION['errors']['name'])){
      echo $_SESSION['errors']['name'];
    }?>
  </div>

  <div class="form-group">
    <label for="price">price</label>
    <input type="number" name="price" value="<?= $product['price'] ?>" class="form-control" id="price" >
    <br>
    <?php if(isset($_SESSION['errors']['price'])){
      echo $_SESSION['errors']['price'];
    }?>
  </div>
  
  <div class="form-group">
    <label for="sale">sale</label>
    <input type="number" name="sale" value="<?= $product['sale'] ?>" class="form-control" id="sale" >
    <br>
    <?php if(isset($_SESSION['errors']['sale'])){
      echo $_SESSION['errors']['sale'];
    }?>
  </div>

  <div class="form-group">
    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?= $product['stock'] ?>" class="form-control" id="stock" >
    <br>
    <?php if(isset($_SESSION['errors']['stock'])){
      echo $_SESSION['errors']['stock'];
    }?>
  </div>

  <div class="form-group">
    <label for="img">img</label>
    <input type="file" name="img[]" value="" class="form-control" id="img" multiple>
    <input type="hidden" name="old_img" value="<?= $product['img'] ?>" class="form-control" id="img" disabled>
    <?php  
      $images = explode(',', $product["img"]); 
          foreach ($images as $image) { ?>
            <img style="width: 60px; height: 60px;"class="rounded-circle" src="images/<?= $image?> " alt="no image">
    <?php  }?>
    <br>
    <?php if(isset($_SESSION['errors']['img'])){
      echo $_SESSION['errors']['img'];
    }?>
  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect1">Categories</label>
    <select name="cat" class="form-control" id="exampleFormControlSelect1">
    <?php  
        $readCat = "SELECT * FROM categories";
        $queryCat = $conn->query($readCat);
        foreach($queryCat as $category):
    ?>
      <option
        value="<?= $category['id'] ?>"
        <?=  $category['id'] == $product['cat_id'] ? 'selected' : ''?> 
      >
        <?= $category['name'] ?>
        </option>
    <?php  endforeach;  ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php unset($_SESSION['errors']);?>