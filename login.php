﻿<?php
session_start();
 require('resources/connect.php');

if (isset($_POST['username']) and isset($_POST['password'])){

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);


if ($count == 1){
$_SESSION['username'] = $username;
}else{

$fmsg = "Zła nazwa lub hasło użytkownika";
}
}

if (isset($_SESSION['username'])){
$username = $_SESSION['username'];

header('Location: php/main.php');
function getRemoteIPAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];

    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $_SERVER['REMOTE_ADDR'];
}
$ip = getRemoteIPAddress();
$query1 = "INSERT INTO `login` (ipaddr) VALUES ('$ip')";
$result1 = mysqli_query($connection, $query1);
 
}else{
	//header('Location: login.php');



?>
<html>

<head>
    <title>Przepisy Kulinarne</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>


    <div class="container">
        <form class="form-signin" method="POST">
            <?php if(isset($fmsg)){ ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $fmsg; ?> </div>
            <?php } ?>
			<h1><center>Przepisy Kulinarne Wszib</center></h1>
           <h3><center>Zaloguj się aby przeglądać bazę danych przepisów, lub stwórz nowe konto.</center></h3>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">@</span>
                <input type="text" name="username" class="form-control" placeholder="Nazwa użytkownika" required>
            </div>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Hasło" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
            <a class="btn btn-lg btn-primary btn-block" href="php/register.php">Zarejestruj</a>
        </form>
    </div>
</body>

</html>
<?php } ?>
