<?php
session_cache_limiter('private_no_expire');
session_start();
// Les champs de saisie du formulaire clients sont placés dans $_SESSION
foreach($_POST as $cle => $valeur) {
	$_SESSION['client'][$cle] = $valeur;
}
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle pour la modification d'un client dans la base
include '../modele/modeleClient.php';
// Remarque : le nom de la fonction est variable !
$_SESSION['reussi']=$_SESSION['choix']($cnx); 
// Appel de la vue pour confirmer le succès de l'action
if ($_SESSION['choix']=='update') {
	$choix = 'MISE À JOUR';
}
elseif ($_SESSION['choix']=='delete') {
	$choix = 'SUPPRESSION';
	$_SESSION['client'] = $_SESSION['aclient'];
}
elseif ($_SESSION['choix']=='create') {
	$choix = 'CRÉATION';
}
include '../vue/vueFinaleClient.php';
// Fermeture de la base
$cnx = null;
?>
