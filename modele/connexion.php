<?php
	$dsn='mysql:host=localhost;dbname=clicom;charset=utf8';
	$user='root';
	$password='';
	try {
		$cnx = new PDO($dsn,$user,$password);
		// Par défaut PDO désactive la simulation des requêtes préparées
		$cnx ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		// Pour générer des erreurs fatales en cas de problème
		$cnx ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		echo 'Une erreur est survenue '.$e->getMessage().'<br/>';
		die();
	}


?>

