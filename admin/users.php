<?php  
	session_start();
	$privilege = $_SESSION['priv'] ?? 3;

if ($privilege === 2 || $privilege === 3) {
	$_SESSION['error'] = '<div class="alert alert-danger">Access Denied, Entry Authorized Only For The Owner And Supervisar.</div>';
	header("Location: index.php");
	exit();
}
	include "includes/header.php";
	include "includes/sidebar.php";

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Users</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Users</h1>
			</div>
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-12">
				<?php  
				
				if (!isset($_GET['action'])) {
					include "views/users_view.php";
				} elseif($_GET['action'] == 'add') {
					include "views/users_add.php";
				} elseif($_GET['action'] == 'edit') {
					include "views/users_edit.php";
				}
				
				?>	
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->
	

<?php  

	include "includes/footer.php";

?>