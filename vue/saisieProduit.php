<?php
	require 'header.php';

	session_cache_limiter('private_no_expire');
	session_start();
		/* Récupération de l'action à traiter 
		 * dans $_SESSION['choix']
		 * et du message à afficher
		 * dans $_SESSION['message']
		 */
		switch ($_SESSION['choix']) {
			case 'create' : $action = '../controleur/actionFinale.php'; break;
			case 'read'   : $action = '../controleur/read.php'; break;
			case 'update' : $action = '../controleur/update.php'; break;
			case 'delete' : $action = '../controleur/update.php'; break;
		};
		$message = $_SESSION['message'];
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <title>PROJET CRUD - <?php echo $message; ?> </title>
  </head>
  <body>
		<h1><?= $message; ?></h1>
		<form action=<?= $action ?> method="post">
			<label for="npro">Numéro produit :</label>
			<input type="text" id="npro" name="npro" required >
			<br/>
			<?php if ($_SESSION['choix'] == 'create') { 
			echo <<< FORMULAIRE
			<label for="libelle">Libellé :</label>
			<input type="text" id="libelle" name="libelle"><br/>
			<label for="prix">Prix :</label>
			<input type="text" id="prix" name="prix"><br/>
			<label for="qstock">Quantité en stock :</label>
			<input type="text" id="qstock" name="qstock"><br/>
			FORMULAIRE;
		}
			?>

		<input type="submit" value="Valider"> 
		<hr/>
		<input type="button" value="Retour à l'accueil" onClick="document.location.href='../index.php'" />
	</form>
  </body>
</html>
