<?php 
include_once $dbPath .  'db.php';
$recipes = getAll('recipes');
?>

<h2>
  All Recipes
</h2>
<table cstyle="width:80%" cellpadding="5" cellspacing="0" border="1">
 <thead >
		<tr bgcolor="lightgray">
			<th>id</th>
			<th>title</th>
			<th style="width:70%">Description</th>
			<th>kcal</th>
			<th>created</th>
			<th>updated</th>
      <th>action</th>
		</tr>
	</thead>
<?php foreach($recipes as $recipe): ?>
  <tr>
    <td>
      <a href="/?app=<?= $app ?>&view=show&id=<?= $recipe['id'] ?>"><?= $recipe['id'] ?> </a>     
    </td>
    <td>
      <?= $recipe['title'] ?>    
    </td>
    <td>
      <?= $recipe['description'] ?>    
    </td>
    <td>
      <?= $recipe['kcal'] ?>    
    </td>
    <td>
      <?= $recipe['created_at'] ?>    
    </td>
    <td>
      <?= $recipe['updated_at'] ?>    
    </td>
    <td>
      <a href="/?app=recipes&view=delete&id=<?= $recipe['id'] ?>" onclick="return confirm('Are you sure u want to delete this recipe?');">Удалить</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<?php; ?>
