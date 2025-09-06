<?php 

include_once $dbPath .  'db.php';

if(!empty($_POST)){
  $name = $_POST['name'];
  $review = $_POST['review'];
  $rate = $_POST['rate'];
  $id = create('reviews', [
    'name' => $name,
    'review' => $review,
    'rate' => $rate
  ]);
  if($id){
    echo 'Review created';
    header("Location: /?app=$app&view=list");
  }
  else{
    echo 'Error';
  }
}
?>
<h2>
  Create Review
</h2>

<form action="" class="form" method="post">
  
  <div class="form__field">
    <label for="name" class="form__label">
      Name:
    </label>
    <input type="text" id="name" name="name" class="form__input">
  </div>
  <div class="form__field">
    <label for="review" class="form__label">
      Review:
    </label>
    <textarea id="review" name="review" rows="10" cols="70"> </textarea>
  </div>
  <div class="form__field">
    <label for="rate" class="form__label">
     rate:
    </label>
    <input type="number" id="rate" name="rate" class="form__input">
  </div>
  <button type="submit">Send</button>
</form>
