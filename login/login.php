	<?php session_start(); ?>
	<?php
		include("../Query.php");
		$bdd = getDatabaseConnexion();

		$reponse = $bdd->query('SELECT * FROM users WHERE usr_name=\'' . $_POST['name'] .'\' AND usr_password=\'' . $_POST['password'] .'\'');
		$usr_type = 'nothing';
		while ($donnees = $reponse->fetch())
		{
			$usr_type = $donnees['usr_type'];
		}
		if($usr_type=='admin'){
			$_SESSION['user'] = $usr_type;
			echo "Vous vous êtes bien connecté !";
			header("refresh:1;url=../administration.php");
		}else if($usr_type=='membre'){
			$_SESSION['user'] = $usr_type;
			echo "Vous vous êtes bien connecté !";
			header("refresh:1;url=../formulaireFamille.php");
		}else{
			echo "Echec lors de la connexion !";
			header("refresh:1;url=../index.php");
		}

	?>
