<!DOCTYPE html>
<html>
<head>
	<title>Tstowanie zdjęc</title>


	<style type="text/css">
		
	.zdjecia{
		position: relative;
		background-color: red;
		display: block;
	}

	.razem img{
		height: 200px;
		float: left;
		width: 22%;
		padding: 10px 10px;
		display: block;
	}

.razem{
	display: block;
	position: relative;
}
.razem a{
	position: relative;
	float: left;

}

.razem >a >img{
	width: 20px;
	height: 20px;
	position: absolute;
	z-index: 99;
	left: -45px;
	top: 5px;

}



	</style>
</head>
<body>
	<div class="zdjecia">
			<?php 
					require_once "panel_admina/config/polacz.php"; 
					connection(); 
					$wynik = mysql_query("SELECT * FROM zdjecia") 
					or die('Błąd zapytania');

				while($row = mysql_fetch_array($wynik)) { ?>
 
				<div class="razem">
					<img src="<?php echo $row['nazwa'] ?> " alt="">
					<a class="przycisk1" href="panel_admina/usun_zdjecia/usun.php?id=<?php echo $row['id']; ?>"><img src="img/x.png"></a>
					
				</div>
						<?php } 
		?>
	</div>

	<div style="clear: both;"></div>

</body>
</html>