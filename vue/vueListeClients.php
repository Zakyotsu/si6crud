<?php require 'header.php'; ?>
    <h1>Liste des clients</h1>
	<?php  foreach ($result as $client) {
				echo '<hr/>';
				foreach ($client as $key => $value) {
					echo "<pre> $key : $value </pre>";
				}
			}
	?>
    <hr/>
  </body>
</html>
