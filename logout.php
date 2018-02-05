	<?php session_start(); ?>
	<?php
			$_SESSION['user'] = 'nothing';
			echo "Déconnexion réussie !";
			header("refresh:1;url=/index.php");
	?>
