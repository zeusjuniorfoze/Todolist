<?php
	require_once('../conn.php');
	include('affiche.php');
	// on verifie si la session de pass est bien activer
	if(!$_SESSION['user']){
		header('location: ../connexion.php');
	}
// on verifie si le nom est bien entree et recuperer
	if (isset($_GET['email']) AND !empty($_GET['email'])) {
		$email=$_GET['email'];
		$e=$_SESSION['user'];
	}
	if (isset($_POST['login'])) {
		if (!empty($_POST['message'])) {
			$message =htmlspecialchars($_POST['message']);
			$sql = $con->prepare(" INSERT INTO message ( email1,email2,contenu) 
			VALUES(?,?,?)");
			$sql->execute(array($e,$email,$message));	
		}
	}
// fonction pour afficher les messages
	function charge(){
		global $con,$e,$email;
		$requet=$con->prepare("SELECT * FROM `message` WHERE email1= ? AND email2= ? OR email1=? AND email2=?");
		$requet->execute(array($e,$email,$email,$e));
	  while ($row=$requet->fetch()){
		$class= $e == $row['email1'] ? 'sender': 'receiver';
    ?> 
    <div class="message <?php  echo $class; ?>">
    	<div class="span-<?php  echo $class; ?>" id="mes">
    		<div>
    			<?php  echo $row['contenu']; ?>
    		</div><br>
    		<div>
    			<?php  echo $row['date']; ?>
    		</div>
    	</div>
    </div>
	<?php	
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">	
	.message{
		padding: 3px;
	}
	.receiver{
		width: 100%;
		display: flex;
		flex-flow: row nowrap;
		justify-content: flex-start;
	}
	.span-receiver{
	display: inline-block;
	padding: 10px ;
	max-width: 400px;
	background-color: #687d8b;
	color: white;
	border-radius: 15px;
	}
	.sender{
	width: 100%;
	display: flex;
	flex-flow: row nowrap;
	justify-content: flex-end;
	}
	.span-sender{
	display: inline-block;
	padding: 10px ;
	max-width: 400px;
	background-color: #2195F2;
	color: white;
	border-radius: 15px;
	}

	</style>
	<script type="text/javascript">
			$().ready(function() {
			$("#dynamic").load("http://url/to/the/dynamic/data");
			});
	</script>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../cssm/tchat.css">
	<title>TCHAT</title>
</head>
<body>
	<div class="nav-global">
<!-- bouton retour -->
		<div class="nav-top">
			<a href="discussion.php"><img src="../img/retour.png" width="100" height="70"></a>
		</div>
<!-- on affiche le nom de l'utulisateur choisir -->
		<div class="utulisateur">
			<strong><p><?php echo $email;?></p></strong>
		</div>
<!-- lien pour faire u appel audio et video -->
		<div class="logo-call">
			<a href="#"><img src="../img/audio.png" width="100" height="70"></a>
		</div><br>
		<div class="logo-calle">
			<a href="#"> <img src="../img/video.png" width="99" height="70"></a>
		</div>
<!-- zone de l' affichage des message-->
		<?php charge();?>
<!-- zone d'ecriture du message -->
		<form class="tchat" method="POST">
			<div class="contener">
				<div class="group">
					<textarea name="message" id="message" rows="2" class="area" placeholder="votre message" ></textarea>
				</div>
<!-- bouton envoyer -->
				<div class="bouton">
					<button type="submit" id="send" class="send" name="login"><img src="../img/en.png" width="45"	 height="45">
					</button>
				</div>
			</div>
		</form>
	</body>
</html>