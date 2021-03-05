<?php
session_cache_limiter('private_no_expire');
session_start();
// Les champs de saisie du formulaire produits sont placés dans $_SESSION
foreach($_POST as $cle => $valeur) {
	$_SESSION['produit'][$cle] = $valeur;
}
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle pour la modification d'un produit dans la base
include '../modele/modeleProduit.php';
// Remarque : le nom de la fonction est variable !
$_SESSION['reussi']=$_SESSION['choix']($cnx); 
// Appel de la vue pour confirmer le succès de l'action
if ($_SESSION['choix']=='update') {
	$choix = 'MISE À JOUR';
}
elseif ($_SESSION['choix']=='delete') {
	$choix = 'SUPPRESSION';
	$_SESSION['produit'] = $_SESSION['aproduit'];
}
elseif ($_SESSION['choix']=='create') {
	$choix = 'CRÉATION';
}
include '../vue/vueFinaleProduit.php';
// Fermeture de la base
$cnx = null;
?>
