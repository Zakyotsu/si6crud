<?php
session_cache_limiter('private_no_expire');
session_start();

require '../vue/header.php';

$table = $_SESSION['table'];

foreach ($_POST as $key => $value) {
	$_SESSION[$table][$key] = $value;
}
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle pour lire les données du client à modifier/supprimer dans la base
	include '../modele/modele'.ucfirst($_SESSION['table']).'.php';
	$_SESSION['a'.$table]=read($cnx);
	if ($_SESSION['a'.$table]) {
		// Appel de la vue pour modifier/supprimer et passer la main
		include '../vue/confirmer.php';
	} else {
		$_SESSION['reussi'] = false;
		$choix = "RECHERCHE";
		$_SESSION['exception'] = "Aucun client pour ce numéro";
		include '../vue/vueFinale.php';
	}
?>
