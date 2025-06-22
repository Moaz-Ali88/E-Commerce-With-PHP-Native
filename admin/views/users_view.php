<a class="btn btn-primary" href="?action=add">Add User</a>
<br><br>
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
            <th>username</th>
            <th>email</th>
            <th>address</th>
            <th>gender</th>
            <th>privliges</th>
            <th>controls</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $read = "SELECT * FROM users";
        $query = $conn->query($read);
        foreach ($query as $user):
        ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['address'] ?></td>
                <td><?= $user['gender'] == 0 ? "Male" : "Female"?></td>
                <td><?php if($user['priv'] == 0){
                  echo "Owner";
                }elseif($user['priv'] == 1){
                  echo "Supervisar";
                }elseif($user['priv'] == 2){
                  echo "Admin";
                }elseif($user['priv'] == 3){
                  echo "User";
                }  ?>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="?action=edit&id=<?= $user['id'] ?>">Edit</a>

                    <?php  $current_user_id = $_SESSION['login_id'];?>

                    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#e<?= $user['id'] ?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="e<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php if($user['id'] == $current_user_id){
                  echo "You Can't Delete Your Account " , $user['username'] ;
                }else{
            ?>

        Are you sure you want to delete <span class="text-danger font-weight-bold"><?= $user['username'] ?></span><?php }?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <?php
              if($user['id'] != $current_user_id){
        ?>

        <a class="btn btn-danger btn-sm" href="functions/users/delete.php?id=<?= $user['id'] ?>">Confirm</a>
      </div>
    </div>
  </div>
</div>
    <?php }else{
      echo "Can't Delete Yours";
    }

    ?>
                </td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>