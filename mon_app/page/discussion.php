<?php
	require_once('conn.php');
	if (!$_SESSION['email']) {
		header('location: connexion.php');
	}
	$req = $con->prepare("SELECT * FROM user");
	$req->execute();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="cssm/discussion.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DISCUSSION</title>
	</head>
	<body>
		<nav class="cc-nav navbar navbar-daK">
  			<div class="container-fluid">
<!-- image du logo -->
    			<a class="navbar-brand text-uppercase py-1 mx-3" href="home.php">
      				<img src="img/logo.PNG" alt="" width="100" height="100" class="d-inline-block align-text-top">
    			</a>
<!-- liste des element du  menue -->
    			<h1 class="fw-bolder">J.MAIL APLICATION</h1>
				<ul class="navbar-nav ms-auto mb-2lg-0">
					<li><a href="#" class="nav-lik">PARAMETRES</a>
						<ul class="sous">
							<li><a href="deconnexion.php" class="nav-lik">MODIFICATION</a></li>
							<li><a href="deconnexion.php" class="nav-lik">DECONNEXION</a></li>
						</ul>
					</li>
				</ul> 
 			</div>
		</nav>
<!-- lister les utulisateeur dans la base de donnee-->
		<?php while ($a=$req->fetch()) { ?>
		<div class="membre">
			<strong><img src="img/icone.png" width="48" height="50"><?php echo $a['nom'];?></strong><br>
			<span>          <?php echo $a['email'];?></span><br>
			<a class="selecte" href="tchat.php?nom=<?php echo $a['nom'];?>"><img src="img/d.png" width="48" height="50"></a><br>
		</div>
			<?php } ?>   
	</body>
</html>