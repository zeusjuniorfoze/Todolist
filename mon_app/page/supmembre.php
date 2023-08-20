<?php
session_start();
	require_once('conn.php');
	if (isset($_GET['id']) AND !empty($_GET['id'])) {
		$id=$_GET['id'];
		$sql1=$con->prepare('SELECT * FROM user WHERE id=?');
		$sql1->execute(array($id));
		if ($sql1->rowCount()>0) {
			$sql2=$con->prepare('DELETE FROM user WHERE id=?');
			$sql2->execute(array($id));
			header('location: admin.php');
		}else{
			echo"aucun membre n'a ete trouver";
		}
	}else{
		echo "id non recuperer";
	}
  ?>