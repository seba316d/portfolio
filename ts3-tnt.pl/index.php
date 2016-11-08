<!DOCTYPE html>
<html>
<?php
$ts3_ip = '127.0.0.1';
$ts3_queryport = 10011;
$ts3_port = 9987;
require("lib/ts3admin.class.php");
$tsAdmin = new ts3admin($ts3_ip, $ts3_queryport);
?>  
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/responsive.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Darmowy TeamSpeak 3 </title>
	<meta name="Robots" content="index, fallow">
	<meta name="keywords" content="Darmowy TeamSpeak3, kanały teamspeak3, tillnexttime, ts3, komunikator, teamspeak3, tnt, ts3-tnt.pl, ">
	<link href="https://fonts.googleapis.com/css?family=Lobster&subset=latin-ext" rel="stylesheet">
</head>
<body>
	
<script src="script/jquery-3.1.1.min.js"></script>
	
<script>
	$(document).ready(function(){
	$("#wyslij").click(function(event){
		var name = $("#name").val();//zapisywanie pole #name do zmiennej
		var email = $("#email").val();
		var message = $("#message").val();
		var view = ("Wypełnij wszystkie pola ! ");
		$(".col-half-form").html(view + "<br>");
		
	});
</script>

<script>
	
$(document).ready(function(){
  $('.menu-open, .menu-hide').click(function(){
    $('.menu').toggleClass('show');  
  });//open click
});//document ready end

</script>

	<script>

	$(document).ready(function() {
	var NavY = $('.bg').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('.bg').addClass('sticky');
	} else {
		$('.bg').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});
	
</script>


	<div class="parallax1">
		
		<div class="bg" id="bg">
			<div class="logo">
				<h1><span class="logcolor">ts3-</span>tnt.pl</h1>
			</div>

			<div class=" menu-text menu-open">
					<a>Menu</a>
				</div>
			<div class="menu">
			
				<div class="menu-text menu-hide">
					<a>Zamknij</a>
				</div>
				<div class="menu-text">
					<a href="#"> Strona Główna</a>
				</div>
				<div class="menu-text">
					<a href="#status">Status</a>
				</div>
				<div class="menu-text">
					<a href="#about-us">O nas</a>
				</div>
				<div class="menu-text">
					<a href="#admin">Administracja</a>
				</div>
				<div class="menu-text">
					<a href="#">Wikipedia</a>
				</div>
				<div class="menu-text">
					<a href="http://teamspeak.com/downloads">Pobierz</a>
				</div>
				<div class="menu-text">
					<a href="#contact">Kontakt</a>
				</div>
				</div>

				<div style="clear: both;"></div>
				<div style="overflow: auto;"></div>
				</div>
			
			
			<div class="container">
			<div class="baner-text">

				<h2>TeamSpeak3</h2>
				<span>Darmowy serwer dla graczy</span>
						<div class="connect"> 
							<a href="ts3server://ts3-tnt.pl">Połącz</a>
						</div>
			</div>
		</div>
	</div>

	<div class="status" id="status">
				<div class="container">

					<div class="col-half"> 
						<img src="img/ts3.png" alt="zjęcie teamspeak">
					</div>
					<div class="col-half col-half-text">

					<?php
				if($tsAdmin->getElement('success', $tsAdmin->connect()))
				{
					#wybierz serwer
					$tsAdmin->selectServer($ts3_port);
					
					#pobierz informacje o serwerze
					$serwerin = $tsAdmin->serverInfo();
					$online = $serwerin['data']['virtualserver_clientsonline'];
					$max_slot = $serwerin['data']['virtualserver_maxclients'];
					$kanaly = $serwerin['data']['virtualserver_channelsonline'];
					$polaczen_do_serwera = $serwerin['data']['virtualserver_client_connections'];
					$ping= $serwerin['data']['virtualserver_total_ping'];
					$ping2=substr($ping, 0, strpos($ping, "."));
					$nazwa = $serwerin['data']['virtualserver_status'];				
					echo '		


						<h3>Statystyki Serwera</h3>
						<p>Adres IP: <a href="ts3server://ts3-tnt.pl" class="status-color">ts3-tnt.pl</a><br>
						Status Serwera: <b class="status-link">'.$nazwa.'</b> <br>
						Użytkowników Online: <b class="status-color">'.$online.' </b> <br>
						Liczba slotów: <b class="status-color">'.$max_slot.' </b> <br>
						Średni Ping: <b class="status-color">'.$ping2.'</b> <br>
						Utworzonych kanałów: <b class="status-color">'.$kanaly.'</b><br>
						Połączeń do serwera: <b class="status-color">'.$polaczen_do_serwera.'</b><br>
						'.$serwerin["virtualserver_version"].'
						</p>

						';
				}else{
					echo '<h1>Brak danych. Przepraszamy.</h1>';
				}
		?>
					</div>

						<div style="clear: both;"></div>
						
				</div>
			</div>


	<div class="parallax2"></div>
		<div class="about-us" id="about-us">
			<div class="container">

				<div class="col-half col-half-text"> 
					<h3>O nas</h3>
					<p>
					Jesteśmy małym, ale z dużym doświadczeniem darmowym serwerem głosowym. <br> Jesteśmy z wami już od 2012 roku i nieustannie dążymy do polepszenia oferowanych przez nas usług. Nasz sukces opiera się na precyzji oraz pasji. W każdym przypadku użytkownik jest zawsze w cetrum naszych działań. 
					</p>
				</div>

				<div class="col-half col-half-img">
					<img src="img/ts3.png" alt="zjęcie teamspeak">
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
	
	<div class="parallax3"></div>
		<div class="admin" id="admin">
			<div class="container">

				<div class="col-one-third-text">
					<p> Administracja Serwera </p>
				</div>
				<div class="border"></div>

				<div class="col-one-third"> 
					<img src="img/ts3-ico.png" alt="Twarz ze słuchawką">
					<h4 id="cot-text-w">Właściciel</h4>
					<h3 id="cot-text1">Frodo</h3>
					<div class="border-cot"></div>
					<p>Zajmuje się serwerem od strony technicznej.<br>
					Prowadzi Serwer od 2012 roku<br>
					</p>
				</div>

				<div class="col-one-third">

					<img src="img/ts3-ico.png">
					<h4 id="cot-text-r">ROOT</h4>
					<h3 id="cot-text1">Nazgorg</h3>
					<div class="border-cot"></div>
					<p>Zajmuje się serwerem od strony technicznej oraz użytkownika.
					Jest Administratorem od 2012 roku<br>
					Bardzo spokojny i opanowany gość, <br>jeżeli masz problem z konfiguracją klienta ts3 napisz do niego. <p>
				</div>

				<div class="col-one-third">
					<img src="img/ts3-ico.png">
					<h4 id="cot-text-h">Head Admin</h4>
					<h3 id="cot-text1">Radek</h3>
					<div class="border-cot"></div>

					<p>Jest to burak, który wjebał się na admina.<br>
					Jest głównym zadaniem jest banowanie ludzi oraz wkurwianie właściciela</p>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>

	<div class="parallax4"></div>
		<div class="contact" id="contact">

			<div class="container">

				<div class="col-half col-half-img"> 
				<img src="img/ts3-ico-1.png" alt="Zdjęcie słuchawek">
				<p class="contact-center">Masz problem ? <br>
				Wejdź na TeamSpeak3 lub napisz do nas.</p>
				</div>

				<div class="col-half col-half-form">
						<h3 class="contact-text">Formularz Kontaktowy</h3>
						<form method="POST" action="lib/kontakt.php">
						<div class="form-group long1">
						<input type="text" placeholder="Nick z TS" name="name" id="name" required="required"><br>
						 </div>
						 <div class="form-group long2">
							<input type="email" placeholder="Email" name="email" id="email" required="required"><br>
						 </div>
						<textarea name="message" placeholder="Napisz Wiadomość" required="required"></textarea><br>
						<button onclick="myFunction()" type="submit" class="button button-dark" id="wyslij">Prześlij</button>
						</form>
				</div>
				<div style="clear: both;"></div>

			</div>
		</div>

	<div class="footer">

			<div class="container">

				<p>Projekt wykonany przez ts3-tnt.pl. &copy Wszelkie prawa zastrzeżone</p>

			</div>
	</div>


</body>
</html>