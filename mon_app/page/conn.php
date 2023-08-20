<?php
	session_start();
	$con = new PDO('mysql:host=localhost;dbname=tchat;charset=utf8', 'root', 
	'');

	function islogged(){
		if (isset($_SESSION['tchat'])) {
			$logged = 1;
		}else{
			$logged = 0;
		}
		return $logged;
	}
?>