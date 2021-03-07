<?php
session_cache_limiter('private_no_expire');
session_start();
foreach ($_POST as $key => $value) {
	$_SESSION['client'][$key] = $value;
}
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle pour la création d'un client dans la base
include '../modele/modeleClient.php';
$donnee= read($cnx);
if (!$donnee) {
	$_SESSION['reussi'] = false;
	if (!$_SESSION['exception'])
		$_SESSION['exception'] = "Aucun client pour pour ce numéro";
}
else {
	$_SESSION['reussi'] = true;
		foreach ($donnee as $cle => $valeur) {
		$_SESSION['client'][$cle]=$valeur;
	}
}
$choix = "LECTURE";
include '../vue/vueFinaleClient.php';
// Fermeture de la base
$cnx = null;
?>
