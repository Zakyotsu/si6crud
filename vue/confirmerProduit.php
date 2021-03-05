<?php 
	session_cache_limiter('private_no_expire');
	session_start();
	$choix = $_SESSION['choix'];
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <title>PROJET CRUD</title>
  </head>
  <body>
    <h1>Données produit à <?= ($choix == 'update') ? 'Modifier' : 'Supprimer'; ?></h1>
		<form action=<?php echo "../controleur/actionFinaleProduit.php" ?> method="post" >
			<fieldset>
					<?php
						foreach ($_SESSION['aproduit'] as $key => $value) {
						echo "<label for='$key'>$key</label>";
						echo "<input type='text' name='$key' id='$key' value ='$value' ";
						echo ($key == 'npro' or $choix != 'update') ? ' disabled >' : '>';
						echo '<br/>';
						}
					?>
			</fieldset>
	<br/>
	<input type="submit" value=<?= ($choix=='update') ? "Confirmer la modification" : "Confirmer la suppression"; ?> >		
	</form>
    <hr/>
    <input type="button" value="Retour à l'accueil" onClick="document.location.href='../index.html'" />
  </body>
</html>