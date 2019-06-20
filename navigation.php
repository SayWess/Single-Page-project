<?php 
	
	if(isset($_SESSION['username'])) {
		$LogOuAdmin = "espaceadmin.php";
	} else {
		$LogOuAdmin = "login.php";
  }
  
  $pageActive = strstr(substr(strrchr($_SERVER["REQUEST_URI"], "/"), 1), "." ,true);
	
?>



<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php" onclick="PlayButtonSound()">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?= ($pageActive === 'clan') ? 'active' : '' ?>" href="clan.php" onclick="PlayButtonSound()">Clan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($pageActive === 'reglement') ? 'active' : '' ?>" href="reglement.php" onclick="PlayButtonSound()">Règlement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($pageActive === 'login' || $pageActive === 'espaceadmin') ? 'active' : '' ?>" href="<?= $LogOuAdmin ?>" onclick="PlayButtonSound()">Espace Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($pageActive === 'oldWarriors') ? 'active' : '' ?>" href="oldWarriors.php" onclick="PlayButtonSound()">Les disparus</a>
      </li>
    </ul>
	</div> 
	
	<?php if($LogOuAdmin === "espaceadmin.php") {	?>
		
		<li class="nav-item">
			<a class='navbar-brand' href='logout.php' onclick="PlayButtonSound()">Se déconnecter</a>
		</li>

	<?php } ?>

		<li class="nav-item">
			<a class='navbar-brand' href='parametre.php' onclick="PlayButtonSound()"><img class="parametre" src="image/parametre.png" alt="Paramètres"></a>
		</li>
</nav> 



