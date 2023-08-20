<?php

  ?>
<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			/* pour le style des erreur*/
			p {
				color: red;
				margin: 10px 0;
				text-align: center;
			}
			.l{
				text-decoration: none;
				color: white;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="cssm/code.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>INSCRIPTION</title>
	</head>
	<body>
		<section>
			<div class="imgbox"></div>
				<div class="contentbox">
					<div class="formbox">
						<form id="ins" method="POST" action="php/inscrire.php">
							<h1><img src="img/3.png" width="100" height="100"></h1><!-- image sur le formulaire -->
							<?php if (isset($erreu)) {?><!-- pour affichier les erreur-->
								<p class ='erreu' ><?php echo "$erreu";?></p>	
							<?php } ?>

							<?php if (isset($erre)) {?>
								<p class ='erreu'><?php echo "$erre";?></p>
							<?php } ?>

							<div class="imputbox">
								<label>Nom</label>
								<input type="text" name="nom" id="nom" placeholder="fozet" required="required"><br>
							</div>
							<div class="imputbox">
								<label>Prenom</label>
								<input type="text" name="prenom" id="prenom" placeholder="junior" required="required"><br>
							</div>
							<div class="imputbox">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" placeholder="fozetj29@gmail.com" required="required">
							</div>
							<div>
								<label for="pass">Mot de pass</label>
								<input type="Password" name="pass" id="pass" required="required">
							</div>
							<div class="imputbox">
								<button type="submit" name="login">login</button><br>
								<a href="home.php" class="l">Annuler</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>

