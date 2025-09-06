<?php 

include_once $dbPath .  'db.php';

$recipe = getById('recipes', $_GET['id']);
?>
<h2>
  Recipe Details
</h2>
<table class="table" cstyle="width:80%" cellpadding="5" cellspacing="0" border="1">
  <thead>
		<tr bgcolor="lightgray">
			<th>Id</th>
			<th>Title</th>
			<th style="width:70%">Description</th>
			<th>kcal</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>

  <tr class="table__row">
    <td class="table__cell">
      <?= $recipe['id'] ?>   
    </td>
    <td class="table__cell">
      <?= $recipe['title'] ?>    
    </td>
    <td class="table__cell">
      <?= $recipe['description'] ?>    
    </td>
    <td class="table__cell">
      <?= $recipe['kcal'] ?>    
    </td>
    <td class="table__cell">
      <?= $recipe['created_at'] ?>    
    </td>
    <td class="table__cell">
      <?= $recipe['updated_at'] ?>    
    </td>

</tr>

</table>
<a href="?app=<?= $app ?>&view=update&id=<?= $recipe['id'] ?>">Update</a>
<a href="?app=<?= $app ?>&view=delete&id=<?= $recipe['id'] ?>">Delete</a>
