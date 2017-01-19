<?php
require('connect.php');
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
            $fmsg ="Coœ posz³o nie tak :(";
		}
	}
}else{
	header('Location: login.php');
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
	<p>Nazwa Przepisu:
      <input type="text" name="recipename">
	</p>
	<p>Skladniki:
      <input type="text" name="ingredients"> 
	</p>
	<p>Sposob przygotowania:
      <input type="text" name="recipesteps"> 
	</p>
      <input type="submit" value="Zapisz">	
    </form>
	<p><a href='main.php'>Powrot do Menu</a></p>
  </body>
</html>
