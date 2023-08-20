<?php
	require_once("conn.php"); 
		if (isset($_POST['login'])) { // si on insere le boutton login	
			if (!empty($_POST['email']) AND !empty($_POST['pass'])) { // si l'email et le mot de pass sont entree
				$nom="fozet";
				$email_admin="fozetj29@gmail.com";// on defini l'email de  notre admin par defaut
				$pass_admin="junior231";//on defini le mot de pass par defaut
				$email1=$_POST['email'];
				$pass1=$_POST['pass'];
				$erreu = "";
				$erre = "";
				if ($email1 == $email_admin AND $pass1 == $pass_admin) {
					$_SESSION['pass']=$pass1;
					$_SESSION['email']=$email1;
					header('location: admin.php');
				}else{
					$email = htmlspecialchars(trim( $_POST['email'])); // recupere l'email
					$pass = sha1(htmlspecialchars(trim($_POST['pass'])));// recupere le mot de pass
					$sql = $con->prepare("SELECT * FROM user WHERE email = ? AND mot_de_pass = ? ");// requete de verificatition des element entree par l'utulisateur

     				$sql->execute(array($email,$pass));// on stocker ses element dans un tableaux
     				if ($sql->rowCount()>0) {// on verifie si le tableau eest vide ou pas 
     					$_SESSION['email']=$email;
     					$_SESSION['pass']=$pass;
     					$_SESSION['tchat']=$email;
     					header('location: discussion.php');
     				}else{
     					$erreu ="Email Ou Mot De Pass Incoreccts !";
     					}
				}	
			}else{
			$erre = "veillez remplier tout les champs !";
			}
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			p{
				color: red;
				margin: 10px 0;
				text-align: center;
				background-color: white;
				border-radius: 10px;
			}
							</style>
		<link rel="stylesheet" type="text/css" href="cssm/code.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>connexion</title>
	</head>
	<body>
		<section>
			<div class="imgbox"></div>
				<div class="contentbox">
					<div class="formbox">
						<form  method="POST" action="">
							<h1><img src="img/3.png" width="100" height="100"></h1>
							
							<?php if (isset($erreu)) {?>
								<p class ='erreu'><?php echo "$erreu";?></p>
							<?php } ?>

							<?php if (isset($erre)) {?>
								<p class ='erreu'><?php echo "$erre";?></p>
							<?php } ?>

							<div class="imputbox">
								<label>Email</label>
								<input type="text" name="email" id="email"  placeholder="Nom@gmail.com"><br>
							</div>
							<div class="imputbox">
								<label>Password</label>
								<input type="Password" name="pass" id="pass" placeholder="Password"><br>
							</div>
							<div class="">
								<a class="a" href="passoublier.php">mot de pass oublier ?</a><br><br>
								<a href="inscription.php">cree un compte</a>
							</div>
							<div class="imputbox">
								<button type="submit" name="login">login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>