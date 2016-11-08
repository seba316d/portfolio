<?php
	
	session_start();

	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: ../index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA0Compatibile" content="IE=edge,chrome=1"/>
	<link rel="stylesheet" href="../style/logowanie.css">
		<title>Logowanie</title>
</head>
<body>

<section class="container"> 
<div class="logowanie">
<h1 class="tytul">Panel Logowania</h1>
<form action="zaloguj.php" method="post">
	
	<label form="name">Login</label><br>
	<input type="text" name="login"> <br>
	<label form="name">Hasło</label><br>
	<input type="password" name="haslo"> <br>
	<button type="submit" class="button button-dark" >Zaloguj</button>

</form>

<?php
	if(isset($_SESSION['blad']))
	echo $_SESSION['blad'];
?>
</div>
</section>

</body>
</html>