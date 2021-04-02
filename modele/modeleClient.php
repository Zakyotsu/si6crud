<?php
/*
 * Opérations sur la table clients de la base clicom
 * Définition de la table :
 * CREATE TABLE clients (
 * 		ncli char(10) NOT NULL,
 * 		nom char(32) NOT NULL,
 * 		adresse char(60) NOT NULL,
 * 		localite char(30) NOT NULL,
 * 		cat char(2) DEFAULT NULL,
 * 		compte decimal(9,2) NOT NULL,
 * 		PRIMARY KEY (ncli)) 
 */ 
 
// Pense-bête : $stmt->debugDumpParams(); pour débugger

function create($cnx)
{
	/*
	 * Requête préparée utilisant des marqueurs nommés (:ncli etc.)
	 * Ceci permet de typer les paramètres au plus près du type sql
	 */
	 try {
			$sql = "INSERT INTO clients VALUES (:ncli,:nom, :adresse, :localite, :cat, :compte)";
			$stmt = $pdo->prepare($sql);
			/*
			 *  bindValue lie les paramètres à une valeur en précisant le type.
			 *  on peut utiliser bindParam si plusieurs insertions sont prévues
			 */ 
			$stmt->bindValue(':ncli', $_SESSION['client']['ncli'],PDO::PARAM_STR); 
			$stmt->bindValue(':nom', $_SESSION['client']['nom'],PDO::PARAM_STR);
			$stmt->bindValue(':adresse', $_SESSION['client']['adresse'],PDO::PARAM_STR);
			$stmt->bindValue(':localite', $_SESSION['client']['localite'],PDO::PARAM_STR);
			$stmt->bindValue(':cat', $_SESSION['client']['cat'],PDO::PARAM_STR);
			// Valeur par défaut à la création de compte : 0
			$stmt->bindValue(':compte', '0',PDO::PARAM_STR);  
			// La requête préparée est alors exécutée
			$resultat = $stmt->execute();
			return $resultat;
	}
	catch(PDOException $e) {
		$_SESSION['exception'] = $e->getMessage()."\n";
		return FALSE;
	}
}

function read($cnx)
{
	try {
		$sql = "SELECT * FROM clients WHERE ncli= :ncli";
		$stmt = $cnx->prepare($sql);
		$stmt->bindValue(':ncli', $_SESSION['client']['ncli'],PDO::PARAM_STR); 
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

function update($cnx)
{
	try  {
		$sql = "UPDATE clients ".
					"SET nom=:nom,".
					"adresse=:adresse,". 
					"localite=:localite,". 
					"cat=:cat,".
					"compte=:compte ".
				"WHERE ncli=:ncli";
		$stmt = $cnx->prepare($sql);
		// la valeur n'est pas saisie car le champ est "disabled"
		$stmt->bindValue(':ncli', $_SESSION['client']['ncli'],PDO::PARAM_STR); 
		// Sont éventuellement modifiés 
		$stmt->bindValue(':nom', $_SESSION['client']['nom'],PDO::PARAM_STR); 
		$stmt->bindValue(':adresse', $_SESSION['client']['adresse'],PDO::PARAM_STR); 
		$stmt->bindValue(':localite', $_SESSION['client']['localite'],PDO::PARAM_STR); 
		$stmt->bindValue(':cat', $_SESSION['client']['cat'],PDO::PARAM_STR); 
		$stmt->bindValue(':compte', $_SESSION['client']['compte'],PDO::PARAM_STR);
		$resultat = $stmt->execute();
		return $resultat;
	}
	catch(PDOException $e) {
		$_SESSION['exception'] = $e->getMessage()."\n";
	}
}
function delete($cnx)
{
	try {
		$sql = "DELETE FROM clients WHERE ncli=:ncli";
		$stmt = $cnx->prepare($sql);
		$stmt->bindValue(':ncli', $_SESSION['client']['ncli'],PDO::PARAM_STR);
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
		$sql = "SELECT * FROM clients";
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