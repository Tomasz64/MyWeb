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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Przeglad przepisow</title>
  </head>
  <body>
<table class="table table-striped table-bordered table-hover"> 
<tr><th>Przepisy</th></tr>
<?php
$strSQL = "SELECT * FROM cookbook";
$rs = mysqli_query($connection, $strSQL);

while($row = mysqli_fetch_array($rs)) {
$id = $row['id'];
$recipename = $row['recipename']; 
	{
		echo "<tr><td>"; 
		echo ('<a href="recipe_details.php?id=' . $id . '">' . $recipename . '</a>');
		echo "</td></tr>";     
	}
}
mysqli_close($connection);
?>
</table>
<p><a href='main.php'>Powrot do menu</a></p>
  </body>
</html>
