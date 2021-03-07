<?php require 'header.php'; ?>

		<h2>Liste des <?php echo $_SESSION['table'] ?>s</h2>

		<?php
			foreach ($result as $item) {
				echo '<hr/>';
				foreach ($item as $key => $value) {
					echo "<pre> $key : $value </pre>";
				}
			}
		?>

    <hr/>
  </body>
</html>
