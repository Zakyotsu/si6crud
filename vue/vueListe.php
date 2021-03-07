<?php require 'header.php'; ?>

		<h2>Liste des <?php echo $_SESSION['table'] ?>s</h2>

		<table>
			<!-- Définition des noms de colonnes -->
			<tr>
				<?php foreach($result[0] as $key => $value) { ?>
					<th><?php echo $key ?></th>
				<?php } ?>
			</tr>

			<!-- Peuplement du tableau -->
			<?php foreach($result as $item) { ?>
				<tr>
					<?php foreach ($item as $key => $value) { ?>
						<td><?php echo $value; ?></td>
					<?php } ?>
				</tr>
			<?php } ?>
        </table>
		<br>
    <hr>
  </body>
</html>
