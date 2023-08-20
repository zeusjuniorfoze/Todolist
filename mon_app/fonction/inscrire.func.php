<?php
	require_once('../page/conn.php');
function email_taken($email){
	
	$e = array('email'=> $email);
	$sql = "SELECT * FROM users WHERE email = :email";
	$req = $con->prepare($sql);
	$req->execute($e);
	$free = $req->rowCount($sql);
	return $free;
} 
 ?>
 