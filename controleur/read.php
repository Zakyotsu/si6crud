<?php
session_cache_limiter('private_no_expire');
session_start();

$table = $_SESSION['table'];

foreach ($_POST as $key => $value) {
	$_SESSION[$table][$key] = $value;
}
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle pour la création d'un client dans la base
include '../modele/modele'.ucfirst($_SESSION['table']).'.php';
$donnee= read($cnx);
if (!$donnee) {
	$_SESSION['reussi'] = false;
	if (!$_SESSION['exception'])
		$_SESSION['exception'] = "Aucun ".$table." pour pour ce numéro";
}
else {
	$_SESSION['reussi'] = true;
		foreach ($donnee as $cle => $valeur) {
		$_SESSION[$table][$cle]=$valeur;
	}
}
$choix = "LECTURE";
include '../vue/vueFinale.php';
// Fermeture de la base
$cnx = null;
?>
