﻿<?php
require('../resources/connect.php');
session_start();


if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		
		if (isset($_GET['recipename']) && isset($_GET['ingredients']) && isset($_GET['recipesteps'])){
		
		$recipename =  $_GET['recipename'];
		$ingredients = $_GET['ingredients'];
		$recipesteps = $_GET['recipesteps'];
			
		$query = "INSERT INTO `cookbook` (recipeauthor, recipename, ingredients, recipesteps) VALUES ('$username', '$recipename', '$ingredients', '$recipesteps')";
        $result = mysqli_query($connection, $query);
		
        if($result){
            $smsg = "Przepis dodany.";
        }else{
            $fmsg ="Cos poszlo nie tak :(";
		}
	}
}else{
	header('Location: ../login.php');
}
?>

<html>
  <head>
    <title>DODAWANIE PRZEPISOW
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
  </head>
  <body>
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
    <form action="" method="GET">
	<p>	
	<label for="recipename">Nazwa Przepisu</label>
	<input type="text" class="form-control" id="recipename" name= recipename required>
	</p>	
	<p>	
	<label for="ingredients">Składniki</label>
	<input type="text" class="form-control" id="ingredients" name= ingredients required>
	</p>
	<p>	
	<label for="recipesteps">Kroki do wykonania</label>
	<textarea class ="form-control" rows="3" id="recipesteps" name= recipesteps required ></textarea>
	</p>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Zapisz</button>	
    </form>
	<a class="btn btn-lg btn-primary btn-block" href="main.php">Powrót do menu</a>
  </body>
</html>
