<?php
	require_once('conn.php');
		if (isset($_POST['login'])) {	
			if (isset($_POST['email']) && !empty($_POST['email'])) {
		 		$email=htmlspecialchars(trim( $_POST['email']));
		 		$erreu="";
		 		$erre="";
				$sql = $con->prepare("SELECT * FROM user WHERE email = ?");// requete de verificatition des element entree par l'utulisateur
     			$sql->execute(array($email));// on stocker ses element dans un tableaux
       			if ($sql->rowCount()>0) {
     				header('location: listercompt.php');
     			}else{
     				$erreu="Votre Compte N'existe Pas Réessayer !";
     			}
     		
			}else{
				$erre = "Veillez Entrée Votre Email !";
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		p {
			color: red;
			margin: 10px 0;
			text-align: center;
		}
	</style>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="cssm/pass.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RECUPERATION</title>
</head>
<body>
	<div>
		<nav class="cc-nav navbar navbar-daK">
  			<div class="container-fluid">
<!-- image du logo -->
    			<a class="navbar-brand text-uppercase py-1 mx-3" href="home.php">
      				<img src="img/logo.PNG" alt="" width="100" height="100" class="d-inline-block align-text-top">
    			</a>
<!-- liste des element du  menue -->
    			<h1 class="fw-bolder">J.MAIL APLICATION</h1>
				<ul class="navbar-nav ms-auto mb-2lg-0">
					<li><a href="inscription.php" class="nav-lik">S'INSCRIRE</a></li>
					<li><a href="connexion.php" class="nav-lik">SE CONNECTER</a></li>
				</ul> 
 			</div>
		</nav>
	</div>
	<div>
		<section>
			<form action="" method="POST">
				<h2>RETOUVER VOTRE COMPTE </h2>
				<fieldset class="b">
					<label form="pass">Veillez entrer votre email du compte pour rechercher votre compte</label><br>
					<input type="text" name="email" id="email">
				</fieldset><br>
					<?php if (isset($erreu)) {?>
						<p class ='erreu' ><?php echo "$erreu";?></p>	
					<?php } ?>

					<?php if (isset($erre)) {?>
						<p class ='erreu'><?php echo "$erre";?></p>
					<?php } ?>

				<div>
				<a href="connexion.php" class="lien" >Annuler</a>
				<button type="submit" class="lien" name="login">Rechercher</button>
				</div>
			</form>
		</section>
	</div>
</body>
</html>