<?php
//Liste entière de la base produits.
function liste($pdo) {
	try {
		$sql = "SELECT * FROM produit";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$donnee = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $donnee;
	} catch(PDOException $e) {
		$_SESSION['exception'] = $e->getMessage()."\n";
		return false;
	}
}
