<?php
function create($cnx) {
	 try {
			$sql = "INSERT INTO produit VALUES (:npro, :libelle, :prix, :qstock)";
			$stmt = $pdo->prepare($sql);

			$stmt->bindValue(':npro', $_SESSION['produit']['npro'],PDO::PARAM_STR); 
			$stmt->bindValue(':libelle', $_SESSION['produit']['libelle'],PDO::PARAM_STR);
			$stmt->bindValue(':prix', $_SESSION['produit']['prix'],PDO::PARAM_STR);
			$stmt->bindValue(':qstock', $_SESSION['produit']['qstock'],PDO::PARAM_STR);
			
			$resultat = $stmt->execute();
			return $resultat;
	}
	catch(PDOException $e) {
		$_SESSION['exception'] = $e->getMessage()."\n";
		return FALSE;
	}
}

function read($cnx) {
	try {
		$sql = "SELECT * FROM produit WHERE npro= :npro";
		$stmt = $cnx->prepare($sql);
		$stmt->bindValue(':npro', $_SESSION['produit']['npro'],PDO::PARAM_STR); 
		$stmt->execute();
		$donnee = $stmt->fetch(PDO::FETCH_ASSOC);
		/* Remarque : $donnee peut être false
		 * si la clé n'est pas dans la table
		 */
		
		return $donnee; 
	}
	catch(PDOException $e) {
		$_SESSION['exception'] = $e->getMessage()."\n";
	}
}

function update($cnx) {
	try  {
		$sql = "UPDATE produit ".
					"SET npro=:npro,".
					"libelle=:libelle,". 
					"prix=:prix,". 
					"qstock=:qstock,".
				"WHERE npro=:npro";
		$stmt = $cnx->prepare($sql);
		// la valeur n'est pas saisie car le champ est "disabled"
		$stmt->bindValue(':npro', $_SESSION['produit']['ncli'],PDO::PARAM_STR); 
		// Sont éventuellement modifiés 
		$stmt->bindValue(':libelle', $_SESSION['produit']['libelle'],PDO::PARAM_STR); 
		$stmt->bindValue(':prix', $_SESSION['produit']['prix'],PDO::PARAM_STR); 
		$stmt->bindValue(':qstock', $_SESSION['produit']['qstock'],PDO::PARAM_STR); 

		$resultat = $stmt->execute();
		return $resultat;
	}
	catch(PDOException $e) {
		$_SESSION['exception'] = $e->getMessage()."\n";
	}
}

function delete($cnx) {
	try {
		$sql = "DELETE FROM produit WHERE npro=:npro";
		$stmt = $cnx->prepare($sql);
		$stmt->bindValue(':npro', $_SESSION['produit']['npro'],PDO::PARAM_STR);
		$resultat = $stmt->execute();
		return $resultat;
	}
	catch(PDOException $e) {
		$_SESSION['exception'] = $e->getMessage()."\n";
	}
}

//Liste entière de la base produits.
function liste($cnx) {
	try {
		$sql = "SELECT * FROM produit";
		$stmt = $cnx->prepare($sql);
		$stmt->execute();
		$donnee = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $donnee;
	} catch(PDOException $e) {
		$_SESSION['exception'] = $e->getMessage()."\n";
		return false;
	}
}
?>