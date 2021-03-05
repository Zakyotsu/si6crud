<?php
session_cache_limiter('private_no_expire');
session_start();
foreach ($_POST as $key => $value) {
	$_SESSION['produit'][$key] = $value;
}
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle pour la création d'un produit dans la base
include '../modele/modeleProduit.php';
$donnee= read($cnx);
if (!$donnee) {
	$_SESSION['reussi'] = false;
	if (!$_SESSION['exception'])
		$_SESSION['exception'] = "Aucun produit pour pour ce numéro";
}
else {
	$_SESSION['reussi'] = true;
		foreach ($donnee as $cle => $valeur) {
		$_SESSION['produit'][$cle]=$valeur;
	}
}
$choix = "LECTURE";
include '../vue/vueFinaleProduit.php';
// Fermeture de la base
$cnx = null;
?>
