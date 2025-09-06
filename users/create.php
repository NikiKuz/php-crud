<?php 

include_once $dbPath .  'db.php';;

if(!empty($_POST)){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $age = $_POST['age'];
  $id = create('users', [
    'username' => $username,
    'password' => $password,
    'age' => $age
  ]);
  if($id){
    echo 'User created';
  }
  else{
    echo 'Error';
  }
}
?>
<h2>
  Create User
</h2>

<form action="" class="form" method="post">
  <div class="form__field">
    <label for="username" class="form__label">
      Username:
    </label>
    <input type="text" id="username" name="username" class="form__input">
  </div>
  <div class="form__field">
    <label for="password" class="form__label">
      Password:
    </label>
    <input type="password" id="password" name="password" class="form__input">
  </div>
  <div class="form__field">
    <label for="age" class="form__label">
      Age:
    </label>
    <input type="number" id="age" name="age" class="form__input">
  </div>
  <button type="submit">Send</button>
</form>
