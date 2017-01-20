<?php
session_start();

if (isset($_SESSION['username'])){
$username = $_SESSION['username'];

}else{
	header('Location: login.php');
} ?>

<html>

<head>
    <title>Menu Glowne
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
</head>

<body>
<h2>
<?php
	echo "Witaj " . $username . " " . 'wybierz któryś z przycisków poniżej aby przejść dalej'; 
?>
</h2>
<a class="btn btn-lg btn-primary btn-block" href="add.php">Dodaj Nowy Przepis</a>
<a class="btn btn-lg btn-primary btn-block" href="browse.php">Przeglądaj przepisy</a>
<a class="btn btn-lg btn-primary btn-block" href="logout.php">Wyloguj się</a>
</body>
</html>
