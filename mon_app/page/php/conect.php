<?php	
	require_once("../conn.php"); 
		if (isset($_POST['login'])) { // si on insere le boutton login	
			if (!empty($_POST['email']) AND !empty($_POST['pass'])) { // si l'email et le mot de pass sont entree

				$email = htmlspecialchars(trim( $_POST['email'])); // recupere l'email

				$pass = sha1(htmlspecialchars(trim($_POST['pass'])));// recupere le mot de pass

				$sql = $con->prepare("SELECT * FROM user WHERE email = ? AND mot_de_pass = ? ");// requete de verificatition des element entree par l'utulisateur

     			$sql->execute(array($email,$pass));// on stocker ses element dans un tableaux
     			if ($sql->rowCount()>0) {// on verifie si le tableau eest vide ou pas 
     				header('location: ../discussion.php');
     			}else{
     				echo "email ou mot des pass incorecct";
     				header('location: ../connexion.php');
     			}
		}else{
				echo "bbbb";
			}
	}
?>
