<?php 
$choix = $_SESSION['choix'];
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <title>PROJET CRUD</title>
  </head>
  <body>
    <h1>Données <?php $tableString ?> à <?= ($choix == 'update') ? 'Modifier' : 'Supprimer'; ?></h1>
		<form action=<?php echo "../controleur/actionFinale.php" ?> method="post" >
			<fieldset>
					<?php
						if($table == 'client') {
							foreach ($_SESSION['aclient'] as $key => $value) {
								echo "<label for='$key'>$key</label>";
								echo "<input type='text' name='$key' id='$key' value ='$value' ";
								echo ($key == 'ncli' or $choix != 'update') ? ' disabled >' : '>';
								echo '<br/>';
							}
						} else if($table == 'produit') {
							foreach ($_SESSION['aproduit'] as $key => $value) {
								echo "<label for='$key'>$key</label>";
								echo "<input type='text' name='$key' id='$key' value ='$value' ";
								echo ($key == 'npro' or $choix != 'update') ? ' disabled >' : '>';
								echo '<br/>';
							}
						}
					?>
			</fieldset>
	<br/>
	<input type="submit" value=<?= ($choix=='update') ? "Confirmer la modification" : "Confirmer la suppression"; ?> >		
	</form>
    <hr/>
    <input type="button" value="Retour à l'accueil" onClick="document.location.href='../index.php'" />
  </body>
</html>
