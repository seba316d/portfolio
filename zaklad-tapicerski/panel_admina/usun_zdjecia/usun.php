<?php 
				session_start();
				require_once "../config/polacz.php"; 
				connection();
				$zmienna = $_GET['id'];
				$zapytanie = 'SELECT nazwa_zd FROM zdjecia WHERE id ='.$zmienna;

				$wynikk = mysql_query($zapytanie)
				or die('Bład zapytania');

				$wiersz = mysql_fetch_array( $wynikk );

  					echo $wiersz['nazwa_zd'];

  				$wynik = mysql_query("DELETE FROM zdjecia WHERE id ='".$_GET['id']."'") 
				or die('Blad zapytania');
				
				unlink("../../zdjecia/".$wiersz['nazwa_zd']);
				header('Location: ../../text.php');
				
?>


