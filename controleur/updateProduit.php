<?php
session_cache_limiter('private_no_expire');
session_start();
foreach ($_POST as $key => $value) {
	$_SESSION['produit'][$key] = $value;
}
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle pour lire les données du client à modifier/supprimer dans la base
include '../modele/modeleProduit.php';
$_SESSION['aproduit']=read($cnx);
if ($_SESSION['aproduit']) {
	// Appel de la vue pour modifier/supprimer et passer la main
	include '../vue/confirmerProduit.php';
}
else {
	// Erreur de saisie de ncli
	$_SESSION['reussi'] = false;
	$choix = "RECHERCHE";
	$_SESSION['exception'] = "Aucun produit pour ce numéro";
	include '../vue/vueFinale/Produit.php';
}
?>
