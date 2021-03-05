<?php
/* Autorise la mise en cache par le navigateur (sans entête "Expire") */
session_cache_limiter('private_no_expire');
/* (Ré)Initialisation de la session et du tableau $_SESSION */
session_start();
$_SESSION = array();
/* On vérifie que l'information "choix" existe ET qu'elle n'est pas vide : */
if (isset($_POST['choix']) && !empty($_POST['choix'])) {
	/* si c'est bien le cas (existe ET non-vide à la fois), 
	 * on redirige vers la vue "choix" sauf en cas de Liste,
	 * où l'on redirige vers le contrôleur 
	 */
	$_SESSION['choix'] = $_POST['choix'];
	if ($_POST['choix']=='liste') {
		header("Location:listeClient.php");
	}		
	else    {	
		switch ($_SESSION['choix']) {
			case 'create':
				$_SESSION['message'] = 'Nouveau Produit';
				break;
			case 'read':				
				$_SESSION['message'] = 'Produit à afficher';
				break;
			case 'update':
				$_SESSION['message'] = 'Produit à mettre à jour';
				break;
			case 'delete':
				$_SESSION['message'] = 'Produit à supprimer';
				break;		
			}
		header("Location:../vue/saisieProduits.php");
	}
}
// sinon, on le redirige vers la page d'accueil : 
else {
	header("../index.html");
}
?>
