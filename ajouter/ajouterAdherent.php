<?php session_start(); ?>
<?php
		if ($_POST['adh_sexe'] === '')
                    {
                        $_POST['adh_sexe'] = NULL;
                    }
		if ($_POST['adh_instr1'] === '')
                    {
                        $_POST['adh_instr1'] = NULL;
                    }
		if ($_POST['adh_instr2'] === '')
                    {
                        $_POST['adh_instr2'] = NULL;
                    }
		if ($_POST['adh_prof1'] === '')
                    {
                        $_POST['adh_prof1'] = NULL;
                    }
		if ($_POST['adh_prof2'] === '')
                    {
                        $_POST['adh_prof2'] = NULL;
                    }
		if ($_POST['adh_atelier1'] === '')
                    {
                        $_POST['adh_atelier1'] = NULL;
                    }
		if ($_POST['adh_atelier2'] === '')
                    {
                        $_POST['adh_atelier2'] = NULL;
                    }
		if ($_POST['adh_formation'] === '')
                    {
                        $_POST['adh_formation'] = NULL;
                    }
		$date = implode('-', array_reverse(explode('/', $_POST['adh_age'])));
		$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8', 'root', '');
		$req = $bdd->prepare('INSERT INTO adherent(adh_fml, adh_nom, adh_prenom, adh_age, adh_instr1, adh_prof1, adh_instr2, adh_prof2, adh_atelier1, adh_atelier2, adh_formation, adh_classe, adh_seul, adh_sexe)
		VALUES(:adh_fml, :adh_nom, :adh_prenom, :adh_age, :adh_instr1, :adh_prof1, :adh_instr2, :adh_prof2, :adh_atelier1, :adh_atelier2, :adh_formation, :adh_classe, :adh_seul, :adh_sexe)');
		$rep=$req->execute(array(
		'adh_fml' => $_POST['adh_fml'],
		'adh_nom' => $_POST['adh_nom'],
		'adh_prenom' => $_POST['adh_prenom'],
		'adh_age' => $date,
		'adh_instr1' => $_POST['adh_instr1'],
		'adh_prof1' => $_POST['adh_prof1'],
		'adh_instr2' => $_POST['adh_instr2'],
		'adh_prof2' => $_POST['adh_prof2'],
		'adh_atelier1' => $_POST['adh_atelier1'],
		'adh_atelier2' => $_POST['adh_atelier2'],
		'adh_formation' => $_POST['adh_formation'],
		'adh_classe' => $_POST['adh_classe'],
		'adh_seul' => $_POST['adh_seul'],
		'adh_sexe' => $_POST['adh_sexe']
		));
		$reponse = $bdd->query('SELECT adh_id FROM adherent WHERE adh_fml=\'' . $_POST['adh_fml'] .'\' AND adh_prenom=\'' . $_POST['adh_prenom'] .'\' AND adh_age=\'' . $date .'\'');
		$adh_id;
		while ($donnees = $reponse->fetch())
			{
				$adh_id = $donnees['adh_id'];
			}
		$_SESSION['nb_adh'] = $_SESSION['nb_adh'] +1;

					if($rep){
				echo "Adherent n°".$adh_id." ajouté dans la base de données !";

				if(isset($_POST['revenir'])){
					header("refresh:1;url=/retrouverAdherentsFamille.php");
				}
				else if (isset($_POST['continue'])) {
					header("refresh:1;url=/formulaireAdherent.php");
				} else if (isset($_POST['finish'])) {
					header("refresh:1;url=/formulairePaiement.php");
				}
			}else{
				echo "Echec !";
				header("refresh:1;url=/formulaireFamille.php");
			}

?>
