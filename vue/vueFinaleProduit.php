<?php
	if ($_SESSION['reussi']) {
					$message = ($choix == 'LECTURE') ? "RÉSULTAT" : "$choix RÉUSSIE";
					$sortie = "Produit : \n";
					foreach ($_SESSION['produit'] as $cle => $valeur) {
						$sortie .= "<pre>$cle : $valeur</pre>";
					}
	}
	else {
					$message = "ECHEC DE LA $choix";
					$sortie = "Message système : ".$_SESSION['exception'];
	}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <title>PROJET CRUD</title>
  </head>
  <body>
    <h1><?php echo $message; ?></h1>
    <?php echo $sortie; ?>
    <hr/>
    <input type="button" value="Retour à l'accueil" onClick="document.location.href='../index.html'" />
  </body>
</html>
