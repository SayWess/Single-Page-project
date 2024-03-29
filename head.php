<?php 

if(!isset($_SESSION)) {
	session_start();
}

	date_default_timezone_set("Europe/Paris");

	$cookie = [
            'Music' => 'Clash_Royale',
            'Langue' => 'Francais',
            'Son' => 'Button_Click_1',
            'isSonOn' => true,
            'isMusicPaused' => false,
            'Theme' => 'Light',
        ];

if(isset($_COOKIE['metius-settings'])) {
        $cookie = json_decode($_COOKIE['metius-settings'], true);
} else {
        setcookie('metius-settings', json_encode($cookie), time() + (365 * 86400 * 30), "/");
}

	$cssFile = strstr(substr(strrchr($_SERVER["SCRIPT_NAME"], "/"), 1), "." ,true);
	$Theme = $cookie['Theme'];

?>
<!DOCTYPE html>

<html lang="fr">
<head>

<script>
	
	function setCookie(cname,cvalue,exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires=" + d.toGMTString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}


	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	
	function updateCookie(key, value) {
		var settings = JSON.parse(getCookie('metius-settings'));
		settings[key] = value;
		setCookie('metius-settings', JSON.stringify(settings), 365);                    
	}
	
	function getSettings(parameter) {
		var settings = getCookie('metius-settings');
		settings = settings ? JSON.parse(settings) : {
			Music: 'Clash_Royale',
			Langue: 'Francais',
			Son: 'Button_Click_1',
			isSonOn: true,
			isMusicPaused: false,
			Theme: 'Light',
		};
		return parameter ? settings[parameter] : settings;
	}
	
</script>


  <title>Métius Paraiges</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!--   <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
  <script type="text/javascript" src="Javascript/sounds.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">                                                                           <!--  Utilisation Boostrap et W3.css  -->

  <link rel="stylesheet" type="text/css" href="<?= $cssFile ?>.css">
  <link rel="stylesheet" type="text/css" href="CSS/<?= $cssFile ?>/<?= $Theme ?>.css">

  <link rel="stylesheet" href="CSS/TemplatePage/Navigation.css" type="text/css">
	<link rel="stylesheet" href="CSS/TemplatePage/Footer.css" type="text/css">
  <link rel="stylesheet" href='https://fonts.googleapis.com/icon?family=Material+Icons' type="text/css">
  <link rel="icon" href="image/Icone/ClanIcon.png" type="image/png">
	<?php if ( $cssFile === "clan" ) { echo "<script src='Javascript/SortFunction.js'></script>"; } ?>


  
</head> 

<body onload="PlayMusic();" id="Body">

<img id="Header" class="Header__Image--Mobile" src="image/Icone/BanniereMobile.png">
<img id="Header" class="Header__Image--TabEtOrdi" src="image/Icone/GreenHeaderGold.png">
