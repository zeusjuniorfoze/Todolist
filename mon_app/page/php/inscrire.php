<?php
	require_once("../conn.php"); 
		$nom = htmlspecialchars(trim($_POST['nom']));
		$prenom = htmlspecialchars(trim( $_POST['prenom']));
		$email = htmlspecialchars(trim( $_POST['email']));
		$pass = sha1(htmlspecialchars(trim($_POST['pass'])));
		$sql = "INSERT INTO user (nom,prenom,email,mot_de_pass) 
		VALUES ('$nom', '$prenom', '$email', '$pass')";
		if ($con->exec($sql) === 1)
			header("location: ../connexion.php");
?>