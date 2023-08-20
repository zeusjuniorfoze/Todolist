<?php
	function verifier($email,$pass){
		require_once('conn.php');
		$u = array(
			$email = htmlspecialchars(trim( $_POST['email']))
			$pass = sha1(htmlspecialchars(trim($_POST['pass'])))
		);
		$sql = "SELECT * FROM user WHERE email = $email AND mot_de_pass = $pass";
		$req = $con->prepare($sql);
		$req->execute($u);
		$exist = $req->rowCount($sql);
		return $exist;
	}; 
?>