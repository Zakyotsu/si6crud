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

	if ($_POST['choix'] == 'liste') {
		header("Location:liste.php");
	} else {	
		switch ($_SESSION['choix']) {
			case 'create':
				$_SESSION['message'] = 'Nouveau Client';
				break;
			case 'read':				
				$_SESSION['message'] = 'Client à afficher';
				break;
			case 'update':
				$_SESSION['message'] = 'Client à mettre à jour';
				break;
			case 'delete':
				$_SESSION['message'] = 'Client à supprimer';
				break;		
			}
		header("Location:../vue/saisieClient.php");
	}
}
// sinon, on le redirige vers la page d'accueil : 
else {
	header("../index.php");
}
?>
