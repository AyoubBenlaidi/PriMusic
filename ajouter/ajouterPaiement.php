<?php session_start(); ?>
<?php
		include("/../Query.php");
		$somme = 0;
		$nbFml16 = 0;
		$nbFml78 = 0;
		$somme16 = 0;
		$somme78 = 0;
		$reduc16 = 0;
		$reducPre = 0;
		$tarif = 0;
		$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8', 'root', '');
		$preinscription = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='preinscription'")->fetch();
		$deuxFormules = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='2 formules'")->fetch();
		$troisFormules = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='3 formules'")->fetch();
		$quatreFormules = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='4 formules'")->fetch();
		$tarifAdherent = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='Inscription adherent'")->fetch();
		$tarifFamille = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='Inscription famille'")->fetch();
		$reponse = $bdd->query('SELECT fml_id,fml_nom,fml_soucieu, fml_autre,fml_num FROM formule');
		$queryFormule = databaseQuery("SELECT * FROM formule");

		if($_SESSION['fml_commune']==1){
			echo 'Tarif Soucieu <br/> _________ <br/>';
			if($_SESSION['nb_adh']==1){
				echo 'Tarif pour une personne seule : '.$tarifAdherent['rdc_valeur'].' € <br/> _________ <br/>';
			for($i = 0, $size = count($queryFormule); $i < $size; $i++)
			{
				if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
					$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
				}
				if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
					$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
				}
			}
			if($nbFml16>1){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$deuxFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$deuxFormules['rdc_valeur']/100 + $somme78;
			}else{
				echo 'Somme = ',$somme16,' + ',$somme78,' <br/>';
				$somme = $somme16 + $somme78;
			}

		}else if($_SESSION['nb_adh']==2){
			echo 'Tarif pour une famille : '.$tarifFamille['rdc_valeur'].' € <br/> _________ <br/>';
			for($i = 0, $size = count($queryFormule); $i < $size; $i++)
			{
				if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
					$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
				}
				if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
					$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
				}
			}
			if($nbFml16==2){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$deuxFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$deuxFormules['rdc_valeur']/100 + $somme78;
			}else if($nbFml16>2){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$troisFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$troisFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$troisFormules['rdc_valeur']/100 + $somme78;
			}else{
				echo 'Somme = ',$somme16,' + ',$somme78;
				$somme = $somme16 + $somme78;
			}
		}else if($_SESSION['nb_adh']>2){
			echo 'Tarif pour une famille : '.$tarifFamille['rdc_valeur'].' € <br/> _________ <br/>';
			for($i = 0, $size = count($queryFormule); $i < $size; $i++)
			{
				if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
					$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
				}
				if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
					$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
				}
			}
			if(($nbFml16==2)&&($nbFml78>0)){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$deuxFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$deuxFormules['rdc_valeur']/100 + $somme78 ;
			}
			else if($nbFml16==3){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$troisFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$troisFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$troisFormules['rdc_valeur']/100 + $somme78 ;
			}else if($nbFml16>3){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$quatreFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$quatreFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$quatreFormules['rdc_valeur']/100 + $somme78 ;
			}else{
				echo 'Somme = ',$somme16,' + ',$somme78,' <br/>';
				$somme = $somme16 + $somme78 ;
			}
		}
		}else{
			echo 'Tarif Autre <br/>';
			if($_SESSION['nb_adh']==1){
				echo 'Tarif pour une personne seule : '.$tarifAdherent['rdc_valeur'].' € <br/> _________ <br/>';
			for($i = 0, $size = count($queryFormule); $i < $size; $i++)
			{
				if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
					$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
				}
				if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
					$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
				}
			}
			if($nbFml16>1){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$deuxFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
				$somme = $somme16- $somme16*$deuxFormules['rdc_valeur']/100 + $somme78;
			}else{
				echo 'Somme = ',$somme16,' + ',$somme78,' <br/>';
				$somme = $somme16 + $somme78 ;
			}

		}else if($_SESSION['nb_adh']==2){
			echo 'Tarif pour une famille : '.$tarifFamille['rdc_valeur'].' € <br/> _________ <br/>';
			for($i = 0, $size = count($queryFormule); $i < $size; $i++)
			{
				if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
					$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
				}
				if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
					$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
				}
			}
			if($nbFml16==2){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$deuxFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$deuxFormules['rdc_valeur']/100 + $somme78 ;
			}else if($nbFml16>2){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$troisFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$troisFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$troisFormules['rdc_valeur']/100 + $somme78;
			}else{
				echo 'Somme = ',$somme16,' + ',$somme78,' <br/>';
				$somme = $somme16 + $somme78 ;
			}
		}else if($_SESSION['nb_adh']>2){
			echo 'Tarif pour une famille : '.$tarifFamille['rdc_valeur'].' € <br/> _________ <br/>';
			for($i = 0, $size = count($queryFormule); $i < $size; $i++)
			{
				if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
					$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
				}
				if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
					echo $_POST[$queryFormule[$i][4]],' x Formule ',$queryFormule[$i][4],' = ',$_POST[$queryFormule[$i][4]]*$queryFormule[$i][2],' € <br/>';
					$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
					$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
				}
			}
			if(($nbFml16==2)&&($nbFml78>0)){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$deuxFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$deuxFormules['rdc_valeur']/100 + $somme78 ;
			}
			else if($nbFml16==3){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$troisFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$troisFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$troisFormules['rdc_valeur']/100 + $somme78;
			}else if($nbFml16>3){
				echo 'Somme = ',$somme16,' - (',$somme16,' x '.$quatreFormules['rdc_valeur'].'%) + ',$somme78,' <br/>';
				$reduc16 = $somme16*$quatreFormules['rdc_valeur']/100;
				$somme = $somme16 - $somme16*$quatreFormules['rdc_valeur']/100 + $somme78;
			}else{
				echo 'Somme = ',$somme16,' + ',$somme78,' <br/>';
				$somme = $somme16 + $somme78;
			}
		}
	}
		$sommeFinale = number_format($somme, 2);

		if(isset($_POST['preinscription'])){
			echo '<br/> _________ <br/><br/>';
			echo 'Tarif Reduction de '.$preinscription['rdc_valeur'].'% pour préinscription <br/> _________ <br/>';
			$reducPre = number_format($somme*$preinscription['rdc_valeur']/100,2);
			$sommeFinale = $sommeFinale - $sommeFinale*$preinscription['rdc_valeur']/100;
		}else{
			echo '<br/> _________ <br/><br/>';
		}

		if($_SESSION['nb_adh']==1){
			$sommeFinale = $sommeFinale + $tarifAdherent['rdc_valeur'];
			$tarif = $tarifAdherent['rdc_valeur'];
		}else{
			$sommeFinale = $sommeFinale + $tarifFamille['rdc_valeur'];
			$tarif = $tarifFamille['rdc_valeur'];
		}

		$_SESSION['preinscription'] = isset($_POST['preinscription']);
		$_SESSION['somme'] = $sommeFinale;

		$sommeFinale = $sommeFinale - $_POST['cheque'] - $_POST['liquide'];
		$sommeFinale = number_format($sommeFinale, 2);

		$decimal = 0;
		if($_POST['nb_mois']>1){
			$decimal = $somme - intval($somme);

		echo 'Vous avez choisi de payer en ',$_POST['nb_mois'],'mois <br/>';

		if(!empty($_POST['check_list'])) {
			if(count($_POST['check_list'])==$_POST['nb_mois']){
				for($one = 0 ; $one<$_POST['nb_mois']-1 ; $one++){
					echo $_POST['check_list'][$one],' : ',variant_int($sommeFinale / $_POST['nb_mois']),' € <br/>';
				}
				echo $_POST['check_list'][$_POST['nb_mois']-1],' : ',number_format(($sommeFinale % $_POST['nb_mois'])+variant_int($sommeFinale / $_POST['nb_mois'])+$decimal,2),' € <br/>';
			}

		}
	}
		$arrayFormule = array();
		for($i = 0, $size = count($queryFormule); $i < $size; $i++) {
				array_push($arrayFormule, $_POST[$queryFormule[$i][4]]);
		}

		$_SESSION['fml_array'] = $arrayFormule;
		include("/../fiche_famillePDF.php");

?>
