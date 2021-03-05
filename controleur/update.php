<?php
session_cache_limiter('private_no_expire');
session_start();
foreach ($_POST as $key => $value) {
	$_SESSION['client'][$key] = $value;
}
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle pour lire les données du client à modifier/supprimer dans la base
include '../modele/modeleClient.php';
$_SESSION['aclient']=read($cnx);
if ($_SESSION['aclient']) {
	// Appel de la vue pour modifier/supprimer et passer la main
	include '../vue/confirmer.php';
}
else {
	// Erreur de saisie de ncli
	$_SESSION['reussi'] = false;
	$choix = "RECHERCHE";
	$_SESSION['exception'] = "Aucun client pour ce numéro";
	include '../vue/vueFinale.php';
}
?>
