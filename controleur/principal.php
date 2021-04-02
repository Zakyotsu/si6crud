<?php
/* Autorise la mise en cache par le navigateur (sans entête "Expire") */
session_cache_limiter('private_no_expire');
/* (Ré)Initialisation de la session et du tableau $_SESSION */
session_start();
$_SESSION = array();

//$table si produit ou client, $choix pour le choix du CRUD
if (isset($_GET['table']) && isset($_POST['choix'])) {

	$_SESSION['table'] = $_GET['table'];
	$_SESSION['choix'] = $_POST['choix'];
	$tableString = ucfirst($_SESSION['table']);

	if ($_POST['choix'] == 'liste') {
		header("Location:liste.php");
	} else {	
		switch ($_SESSION['choix']) {
			case 'create':
				$_SESSION['message'] = 'Nouveau '.$tableString;
				break;
			case 'read':				
				$_SESSION['message'] = $tableString.' à afficher';
				break;
			case 'update':
				$_SESSION['message'] = $tableString.' à mettre à jour';
				break;
			case 'delete':
				$_SESSION['message'] = $tableString.' à supprimer';
				break;		
			}
			if($_SESSION['table'] == 'client') {
				header("Location:../vue/saisieClient.php");
			} else if($_SESSION['table'] == 'produit') {
				header("Location:../vue/saisieProduit.php");
			}
	}
}
// sinon, on le redirige vers la page d'accueil : 
else {
	header("../index.php");
}
?>
