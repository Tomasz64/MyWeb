<?php
require('connect.php');
if (isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
	$result = mysqli_query($connection, $query);
if($result){
	$smsg = "Użytkownik stworzony, możesz się zalogować.";
}else{
	$fmsg ="Coś poszło nie tak :(";
	}
}
?>
<html>
  <head>
    <title>Rejerstracja użytkownika
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="POST">
        <?php if(isset($smsg)){ ?>
        <div class="alert alert-success" role="alert">
          <?php echo $smsg; ?> 
        </div>
        <?php } ?>
        <?php if(isset($fmsg)){ ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $fmsg; ?> 
        </div>
        <?php } ?>
        <h2 class="form-signin-heading">Utwórz nowe konto
        </h2>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@
          </span>
          <input type="text" name="username" class="form-control" placeholder="Nazwa użytkownika" required>
        </div>
        <label for="inputEmail" class="sr-only">Email address
        </label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Adres email" required autofocus>
        <label for="inputPassword" class="sr-only">Password
        </label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Hasło" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Zarejerstruj
        </button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Zaloguj
        </a>
      </form>
    </div>
  </body>
</html>
