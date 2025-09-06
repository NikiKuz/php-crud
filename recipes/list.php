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
			<th>Id</th>
			<th>Title</th>
			<th style="width:70%">Description</th>
			<th>kcal</th>
			<th>Created</th>
			<th>Updated</th>
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
</tr>
<?php endforeach; ?>
</table>
<?php; ?>