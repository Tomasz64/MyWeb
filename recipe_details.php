<?php
require('connect.php');
session_start();
if (isset($_SESSION['username'])){
	$username = $_SESSION['username'];
}else{
	header('Location: login.php');
}
?>
<html>
  <head>
	<title>Szczegoly przepisu</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

<?php
$id = $_GET['id'];
$rs = mysqli_query($connection, "SELECT * FROM cookbook WHERE id = $id");

echo '<table class="table table-striped table-bordered table-hover">'; 
echo "<tr><th>Autor</th><th>Nazwa przepisu</th><th>Składniki</th><th>Sposob przygotowania</tr></th>"; 
while($row = mysqli_fetch_array($rs))
{
  echo "<tr><td>"; 
  echo $row['recipeauthor'];
  echo "</td><td>";   
  echo $row['recipename'];
  echo "</td><td>";    
  echo $row['ingredients'];
  echo "</td><td>";
  echo $row['recipesteps'];
  echo "</td></tr>";   
}
echo "</table>"; 
mysqli_close($connection);
?>

<a class="btn btn-lg btn-primary btn-block" href="browse.php">Powrót do Przeglądania</a>
<a class="btn btn-lg btn-primary btn-block" href="main.php">Powrót do menu</a>
  </body>
</html>
