<?php
	require_once('conn.php');
// on verifie si la session de pass est bien activer
	if(!$_SESSION['pass']){
		header('location: connexion.php');
	}
// on verifie si le nom est bien entree et recuperer
	if (isset($_GET['nom']) AND !empty($_GET['nom'])) {
		$nom=$_GET['nom'];
// requete pour la rechere de l'utulisateur en fonction du nom recuperer
		$requete =$con->prepare("SELECT * FROM user WHERE nom = ?");
		$requete->execute(array($nom));
		if ($requete->rowCount() > 0) {
			$info=$requete->fetch();
			$n=$info['nom'];
		}
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		
	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="cssm/tchat.css">
	<title>TCHAT</title>
</head>
<body>
	<div class="nav-global">
<!-- bouton retour -->
		<div class="nav-top">
			<a href="discussion.php"><img src="img/retour.png" width="100" height="70"></a>
		</div>
<!-- on affiche le nom de l'utulisateur choisir -->
		<div class="utulisateur">
			<strong><p><?php echo $n; ?></p></strong>
		</div>
<!-- lien pour faire u appel audio et video -->
		<div class="logo-call">
			<a href="#"><img src="img/audio.png" width="100" height="70"></a>
		</div><br>
		<div class="logo-calle">
			<a href="#"> <img src="img/video.png" width="99" height="70"></a>
		</div>
<!-- zone de l' affichage des message -->
		<div class="message-box">
			<div class=" message message-membre"><strong><p><?php echo $_SESSION['tchat'];?></p></strong>
				Durant la période du 23 mai au 20 juillet 2023, a eu lieux notre stage clinique qui c’est dérouler au centre médical pk13 où nous avons Fait connaissance d’un ensembles d’équipement de nature diverses ainsi observé et apprécier les conditions de travail. En outre, ce stage nous a permis de mettre à la disposition du centre les connaissances théorique et pratique acquise à l’école et leurs améliorer, notamment :la prise des paramètre (TA, PLS, diurèse, poids) 
			</div>
			<div class=" message message-user"><strong><p><?php echo $n; ?></p></strong>
				alimentations etc… par contre, des difficultés sur l’établissements des soins du malade. Ainsi nous pouvons dire que 82% des objectif ont été atteint ce qui nous a permis de vous soumettre ce travaille sous le thème << rapports du stage cliniques effectué au centre médical pk13 : cas de la prise en charge des personnes âgée souffrant de l’incontinence urinaire >> 
				Mots-clés : stage cliniques, centre, rapport de stages, incontinence t=urinaires  
			</div>
			<div class=" message message-membre">
				Durant la période du 23 mai au 20 juillet 2023, a eu lieux notre stage clinique qui c’est dérouler au centre médical pk13 où nous avons Fait connaissance d’un ensembles d’équipement de nature diverses ainsi observé et apprécier les conditions de travail. En outre, ce stage nous a permis de mettre à la disposition du centre les connaissances théorique et pratique acquise à l’école et leurs améliorer, notamment :la prise des paramètre (TA, PLS, diurèse, poids) 
			</div>
			<div class=" message message-membre">
				Durant la période du 23 mai au 20 juillet 2023, a eu lieux notre stage clinique qui c’est dérouler au centre médical pk13 où nous avons Fait connaissance d’un ensembles d’équipement de nature diverses ainsi observé et apprécier les conditions de travail. En outre, ce stage nous a permis de mettre à la disposition du centre les connaissances théorique et pratique acquise à l’école et leurs améliorer, notamment :la prise des paramètre (TA, PLS, diurèse, poids) 
			</div>
			<div class=" message message-user">
				alimentations etc… par contre, des difficultés sur l’établissements des soins du malade. Ainsi nous pouvons dire que 82% des objectif ont été atteint ce qui nous a permis de vous soumettre ce travaille sous le thème << rapports du stage cliniques effectué au centre médical pk13 : cas de la prise en charge des personnes âgée souffrant de l’incontinence urinaire >> 
				Mots-clés : stage cliniques, centre, rapport de stages, incontinence t=urinaires  
			</div>
			<div class=" message message-user">
				alimentations etc… par contre, des difficultés sur l’établissements des soins du malade. Ainsi nous pouvons dire que 82% des objectif ont été atteint ce qui nous a permis de vous soumettre ce travaille sous le thème << rapports du stage cliniques effectué au centre médical pk13 : cas de la prise en charge des personnes âgée souffrant de l’incontinence urinaire >> 
				Mots-clés : stage cliniques, centre, rapport de stages, incontinence t=urinaires  
			</div>
		</div>
<!-- zone d'ecriture du message -->
		<form class="tchat">
			<div class="contener">
				<div class="group">
					<textarea name="message" id="message" rows="2" class="area" placeholder="votre message" ></textarea>
				</div>
<!-- bouton envoyer -->
				<div class="bouton">
					<button type="submit" id="send" class="send"><img src="img/en.png" width="45"	 height="45">
					</button>
				</div>
			</div>
		</form>
</body>
</html>