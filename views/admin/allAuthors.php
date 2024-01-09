<?php 


include(__DIR__ .'../../includes/header.php');
?>

<div class="fresh-table full-color-orange">
  

  <table id="fresh-table" class="table">
    <thead>
      <th data-field="id">ID</th>
      <th data-field="name">First Name</th>
      <th data-field="Last name">Last Name</th>
      <th data-field="Email">Email</th>
      <th data-field="Role">Role</th>
      <th data-field="Phone" data-formatter="operateFormatter" data-events="operateEvents">Action</th>
      
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
      <tr>
        <td><?php echo $user['id']?></td>
        <td><?php echo $user['firstName']?></td>
        <td><?php echo $user['lastName']?></td>
        <td><?php echo $user['email']?></td>
        <td><?php echo $user['role']?></td>
       
        <!-- <td><button  class="btn btn-default"><a href="edit.php?id=">Edit</a></button></td>-->
        <td><a class="btn btn-link text-dark px-3 mb-0" href="delete?id=<?= $user['id']?>"><i class="fa-regular fa-trash">Delete</i></a></td>
        <!-- <td><button  class="btn btn-default"><a href="../dashboard/delete.php?id="><lord-icon
    src="https://cdn.lordicon.com/skkahier.json"
    trigger="hover"
    style="width:30px;height:30px">
</lord-ico></a></button></td> -->
  </div>
      </tr>
      
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
