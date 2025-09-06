<?php 

include_once $dbPath .  'db.php';

$review = getById('reviews', $_GET['id']);

?>
<h2>
  Review Details
</h2>
<table class="table" cstyle="width:80%" cellpadding="5" cellspacing="0" border="1">
  <thead>
		<tr bgcolor="lightgray">
			<th>Id</th>
			<th>Name</th>
			<th style="width:70%">Rewiew</th>
			<th>Rate</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>

  <tr class="table__row">
    <td class="table__cell">
      <?= $review['id'] ?>   
    </td>
    <td class="table__cell">
      <?= $review['name'] ?>    
    </td>
    <td class="table__cell">
      <?= $review['review'] ?>    
    </td>
    <td class="table__cell">
      <?= $review['rate'] ?>    
    </td>
    <td class="table__cell">
      <?= $review['created_at'] ?>    
    </td>
    <td class="table__cell">
      <?= $review['updated_at'] ?>    
    </td>

</tr>

</table>
<a href="?app=<?= $app ?>&view=update&id=<?= $review['id'] ?>">Update</a>
<a href="?app=<?= $app ?>&view=delete&id=<?= $review['id'] ?>">Delete</a>
