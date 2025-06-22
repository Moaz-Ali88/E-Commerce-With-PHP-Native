<?php 
    session_start();
    $privilege = $_SESSION['priv'] ?? 3;

if ($privilege === 2 || $privilege === 3) {
	$_SESSION['error'] = '<div class="alert alert-danger">Access Denied, Entry Authorized Only For The Owner And Supervisar.</div>';
	header("Location: index.php");
	exit();
}
    $current = "category";
    include "includes/header.php";
    include "includes/sidebar.php";

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">categories</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">categories</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                
            </div>
        </div>
	</div>	<!--/.main-->



    <?php 
    require_once "functions/connect.php";
    $seleCategory = "SELECT * FROM categories";
    $query = $conn -> query($seleCategory);
    ?>
<div class="container">
    <div class="row">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <?php foreach($query as $category) { ?>
            <div class="col-md-4"> 
                <div class="card" style="margin: 20px; background:white; text-align: center; padding:10px;">
                    <div class="card-body">
                        <h1 class="card-title"><?= $category['name'] ?></h1> 
                        <br>
                        <br>
                        <a href="products.php?category_id=<?= $category['id'] ?>" class="btn btn-primary">view all</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
<?php include "includes/footer.php";?>