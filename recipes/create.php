<?php 

include_once $dbPath .  'db.php';

if(!empty($_POST)){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $kcal = $_POST['kcal'];
  $id = create('recipes', [
    'title' => $title,
    'description' => $description,
    'kcal' => $kcal
  ]);
  if($id){
    header("Location: /?app=$app&view=list");
    exit;
  }
  else{
    echo 'Error';
  }
}
?>
<h2>
  Create Recipe
</h2>

<form action="" class="form" method="post">
  
  <div class="form__field">
    <label for="title" class="form__label">
      Ttle:
    </label>
    <input type="text" id="title" name="title" class="form__input">
  </div>
  <div class="form__field">
    <label for="description" class="form__label">
      Description:
    </label>
    <textarea id="description" name="description" rows="10" cols="70"> </textarea>
  </div>
  <div class="form__field">
    <label for="kcal" class="form__label">
      Calories:
    </label>
    <input type="number" id="kcal" name="kcal" class="form__input">
  </div>
  <button type="submit">Create Recipe</button>
</form>
