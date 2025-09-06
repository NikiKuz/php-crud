<?php 
include_once $dbPath .  'db.php';
$users = getAll('users');
?>

<h2>
  All Users
</h2>
<table cstyle="width:80%" cellpadding="5" cellspacing="0" border="1">
 <thead >
		<tr bgcolor="lightgray">
			<th>Id</th>
			<th>username</th>			
			<th>age</th>
			<th>Created</th>			
		</tr>
	</thead>
<?php foreach($users as $user): ?>
  <tr>
    <td>
      <a href="/?app=<?= $app ?>&view=show&id=<?= $user['id'] ?>"><?= $user['id'] ?> </a>     
    </td>
    <td>
      <?= $user['username'] ?>    
    </td>
    <td>
      <?= $user['age'] ?>    
    </td>
    <td>
      <?= $user['created_at'] ?>    
    </td>    
</tr>
<?php endforeach; ?>
</table>
<?php ?>