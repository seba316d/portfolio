﻿<?php
$p_pojemnosc=$_FILES['plik']['size'];//pojemnosc pliku
$p_typ=$_FILES['plik']['type']; // typ pliku
$p_nazwa=$_FILES['plik']['name']; // nazwa pliku
$p_smiec=$_FILES['plik']['tmp_name']; // chwilowa nazwa pliku

//wycinamy rozszerzenie z pobieranego pliku
$p_roz= array_pop(explode(".", $p_nazwa));

/* odbieramy dane z pola ukrytego i zaokrąglamy je do 3 miejsca 
             po przecinku/dzielimy przez 1204*1024 by było w MB*/
$max_size=round(($_POST['max_file_size']/1048576),3)."MB";


//zaokrąglamy "round" do 2 miejsc po przecinku i przeliczamy rozmiar pliku na MB
$poj_MB=round(($p_pojemnosc/1048576),2).'MB'; 

//kodujemy nasz plik metodą MD5 i dodajemy date i godzinę oraz rozszerzenie pliku
$p_nazwa_zm=($p_nazwa);
$folder="../../zdjecia/";

//---Kolorki HTML---
$k_cze="<font color=#ff0000>";
$f_koniec="</font>";
$k_nieb="<font color=#0000ff>";

if ($p_pojemnosc <= 0)
  {
    echo ("Plik jest pusty nie mogę go przesłać <b>".$k_cze.$p_nazwa." ".$poj_MB.$f_koniec."</b><br />");
    echo "<a href=index.php>Wracaj ...</a>";
    exit;
  }

if ($poj_MB > $max_size)
  {
    echo("Plik jest za duży maksymalnie można wysłać <b>".$k_cze.$max_size.$f_koniec."</b>"." .Plik wysyłany ma rozmiar <b><i>".$k_nieb.$poj_MB.$f_koniec."</b></i><br />");
    echo "<a href=index.php>Wracaj ...";
    exit;
  }

if (file_exists($folder.$p_nazwa_zm))
  {
    echo ("Plik o takiej nazwie jest już na serwerku <b><i>".$p_nazwa_zm."</b></i><br />");
    echo "<a href=index.php>Wracaj ...";
    exit;
  }
  else {
        if(!@move_uploaded_file($p_smiec, $folder.$p_nazwa_zm))
          exit('Nie mozna zachowac pliku. Prawdopodobnie nie ma folderu lub nie można w nim zapisać');

        echo "Przeslanie udało się - <b>".$k_nieb.$p_nazwa."</b>"." ".$poj_MB."<br />";
        $path_file= $folder.$p_nazwa_zm;
        $conn = mysql_connect('localhost', 'root', '') or die('Error connecting to mysql');
        mysql_select_db('zaklad_tapicerski');
        $zapytanie=mysql_query("insert into zdjecia values(NULL,'$p_pojemnosc','$path_file','$p_typ','$p_nazwa_zm')");
        echo "<a href=index.php>Wracaj ...";
}
?>