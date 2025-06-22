<?php  
  session_start();
	include "includes/header.php";
	include "includes/sidebar.php";

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Messages</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Messages</h1>
			</div>
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-12">
			<br>
      <?php
  if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset($_SESSION['status']);
  }
?>
<br>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>phone</th>
            <th>email</th>
            <th>message</th>
            <th>controls</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $read = "SELECT * FROM messages";
        $query = $conn->query($read);
        foreach ($query as $message):
        ?>
            <tr>
                <td><?= $message['id'] ?></td>
                <td><?= $message['name'] ?></td>
                <td><?= $message['phone'] ?></td>
                <td><?= $message['email'] ?></td>
				<td><?= $message['messages'] ?></td>
                <td>
                    
				
                    

                    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#e<?= $message['id'] ?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="e<?= $message['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        are you sure you want to delete <span class="text-danger font-weight-bold"><?= $message['name'] ?></span> message
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger btn-sm" href="functions/messages/delete.php?id=<?= $message['id'] ?>">Confirm</a>
      </div>
    </div>
  </div>
</div>
                </td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->

<?php  

	include "includes/footer.php";

?>