<?php 
include_once $dbPath . 'db.php';
$reviews = getAll('reviews');
?>

<h2>
  All Reviews
</h2>
<table cstyle="width:80%" cellpadding="5" cellspacing="0" border="1">
 <thead >
		<tr bgcolor="lightgray">
			<th>id</th>
			<th>name</th>
			<th style="width:70%">Review</th>
			<th>rate</th>
			<th>created</th>
			<th>updated</th>
      <th>action</th>
		</tr>
	</thead>
<?php foreach($reviews as $review): ?>
  <tr>
    <td>
      <a href="/?app=<?= $app ?>&view=show&id=<?= $review['id'] ?>"><?= $review['id'] ?> </a>     
    </td>
    <td>
      <?= $review['name'] ?>    
    </td>
    <td>
      <?= $review['review'] ?>    
    </td>
    <td>
      <?= $review['rate'] ?>    
    </td>
    <td>
      <?= $review['created_at'] ?>    
    </td>
    <td>
      <?= $review['updated_at'] ?>    
    </td>
    <td>
      <a href="/?app=reviews&view=delete&id=<?= $review['id'] ?>" onclick="return confirm('Are you sure u want to delete this review?');">Удалить</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<?php ?>
