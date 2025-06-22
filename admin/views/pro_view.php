<?php 

require_once "functions/connect.php";

$start = 0 ;
$rows_per_page = 4 ;
$record = "SELECT * FROM products";
$rec_query = $conn->query($record);
$nr_of_rows = $rec_query->num_rows;
$pages = ceil($nr_of_rows / $rows_per_page);
if(isset($_GET['page-nr'])){
  $page = $_GET['page-nr'] - 1 ;
  $start = $page * $rows_per_page;

}

$categoryId = isset($_GET['category_id']) ? $_GET['category_id'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($categoryId) {
    $select_product = "SELECT * FROM products WHERE cat_id = '$categoryId' LIMIT $start, $rows_per_page";
}elseif($search){
    $select_product = "SELECT * FROM products WHERE name LIKE '%$search%'";
}else {
    $select_product = "SELECT * FROM products LIMIT $start, $rows_per_page";
}

$query = $conn->query($select_product);
?>

<a class="btn btn-primary" href="?action=add">Add product</a>

<br>
<br>
<form method="GET" action="">
  <input type="text" name="search" value="" class="form-control" placeholder="search">
  <br>
  <button type="submit" class="btn btn-primary">Search</button>
  <br>
</form>
<br>
<?php
  if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset($_SESSION['status']);
  }
?>
<form method="POST" action="functions/products/delete_select.php">
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>sale</th>
            <th>stock</th>
            <th>image</th>
            <th>category</th>
            <th>controls</th>
            <th>select</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($query as $product):
        ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['sale'] ?></td>
                <td><?= $product['stock'] ?></td>
                <td>
                <?php 
                    $id = $product['id'];
                    $select_img = "SELECT * FROM images WHERE pro_id = '$id' ";
                    $img = $conn -> query($select_img);
                    $images = explode(',', $product["img"]); 
                    foreach ($images as $image) { ?>
                    <img style="width: 60px; height: 60px;"
                    class="rounded-circle" src="images/<?= $image?> " alt="no image">
                <?php
              }?>
                </td>
                <td><?php
                    $cat_id = $product['cat_id'];
                    $readCat = "SELECT name FROM categories WHERE id = $cat_id";
                    $queryCat = $conn->query($readCat);
                    $category = $queryCat->fetch_assoc();
                    echo $category['name'];
                    ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="?action=edit&id=<?= $product['id'] ?>">Edit</a>
                    

                    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#e<?= $product['id'] ?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="e<?= $product['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        are you sure you want to delete <span class="text-danger font-weight-bold"><?= $product['name'] ?></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger btn-sm" href="functions/products/delete.php?id=<?= $product['id'] ?>">Confirm</a>
      </div>
    </div>
  </div>
</div>
                </td>
                <td>Select to delete <input type="checkbox" name="product_ids[]" value="<?= $product['id']?>"></td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>
<div>
				<?php  
					if(isset($_SESSION['error'])) {
						echo $_SESSION['error'] ;
						unset($_SESSION['error']);
					}
				?>
			</div>
    <button class="btn btn-danger" type="submit" name="delete_selected" onclick="return confirm('Are you sure you want to delete this items?')">Delete Selected items</button>
</form>
<br>

<div class="page-info">
  <?php 
  if(!isset($_GET['page-nr'])){
    $page = 1 ;
  }else{
    $page = $_GET['page-nr'];
  }?>
  showing <?php echo $page?> of <?php echo $pages?> pages
</div>
<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="?page-nr=1">First</a>
    </li>

    <?php for($counter = 1; $counter <= $pages; $counter++){ ?>
    <li class="page-item " aria-current="page">
      <a class="page-link" href="?page-nr=<?= $counter?>"><?= $counter?></a>
    </li>
        <?php } ?>
        
    <li class="page-item">
      <a class="page-link" href="?page-nr=<?php echo $pages ?>">Last</a>
    </li>
  </ul>
</nav>
