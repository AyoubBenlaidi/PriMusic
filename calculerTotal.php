<?php session_start(); ?>
<?php
		include("./Query.php");
		$somme = 0;
		$nbFml16 = 0;
		$nbFml78 = 0;
		$somme16 = 0;
		$somme78 = 0;
		$reduc16 = 0;
		$reducPre = 0;
		$tarif = 0;
		$bdd = getDatabaseConnexion();
		$preinscription = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='preinscription'")->fetch();
		$deuxFormules = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='2 formules'")->fetch();
		$troisFormules = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='3 formules'")->fetch();
		$quatreFormules = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='4 formules'")->fetch();
		$tarifAdherent = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='Inscription adherent'")->fetch();
		$tarifFamille = $bdd->query("SELECT rdc_valeur FROM reductions WHERE rdc_nom='Inscription famille'")->fetch();
		$reponse = $bdd->query('SELECT fml_id,fml_nom,fml_soucieu, fml_autre,fml_num FROM formule');
		$queryFormule = databaseQuery("SELECT * FROM formule");
		
		$fml_commune = databaseQuery("SELECT fml_commune FROM famille WHERE fml_id = ".$_SESSION['fml_id']);
		$_SESSION['fml_commune'] = $fml_commune[0][0];
		
		$commune_soucieu = databaseQuery("SELECT cmn_id FROM commune WHERE cmn_nom = 'Soucieu en Jarrest'");
		$_SESSION['commune_soucieu'] = $commune_soucieu[0][0];
		
		
		if($_SESSION['fml_commune']==$_SESSION['commune_soucieu']){
			if($_SESSION['nb_adh']==1){
				for($i = 0, $size = count($queryFormule); $i < $size; $i++)
				{
					if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
						$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
					}
					if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
						$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
					}
				}
				if($nbFml16>1){
					$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$deuxFormules['rdc_valeur']/100 + $somme78;
				}else{
					$somme = $somme16 + $somme78;
				}

			}else if($_SESSION['nb_adh']==2){
				for($i = 0, $size = count($queryFormule); $i < $size; $i++)
				{
					if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
						$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
					}
					if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
						$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
					}
				}
				if($nbFml16==2){
					$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$deuxFormules['rdc_valeur']/100 + $somme78;
				}else if($nbFml16>2){
					$reduc16 = $somme16*$troisFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$troisFormules['rdc_valeur']/100 + $somme78;
				}else{
					$somme = $somme16 + $somme78;
				}
			}else if($_SESSION['nb_adh']>2){
				for($i = 0, $size = count($queryFormule); $i < $size; $i++)
				{
					if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
						$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
					}
					if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
						$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][2];
					}
				}
				if(($nbFml16==2)&&($nbFml78>0)){
					$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$deuxFormules['rdc_valeur']/100 + $somme78 ;
				}
				else if($nbFml16==3){
					$reduc16 = $somme16*$troisFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$troisFormules['rdc_valeur']/100 + $somme78 ;
				}else if($nbFml16>3){
					$reduc16 = $somme16*$quatreFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$quatreFormules['rdc_valeur']/100 + $somme78 ;
				}else{
					$somme = $somme16 + $somme78 ;
				}
			}
		}else{
			if($_SESSION['nb_adh']==1){
				for($i = 0, $size = count($queryFormule); $i < $size; $i++)
				{
					if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
						$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
					}
					if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
						$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
					}
				}
				if($nbFml16>1){
					$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
					$somme = $somme16- $somme16*$deuxFormules['rdc_valeur']/100 + $somme78;
				}else{
					$somme = $somme16 + $somme78 ;
				}

			}else if($_SESSION['nb_adh']==2){
				for($i = 0, $size = count($queryFormule); $i < $size; $i++)
				{
					if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
						$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
					}
					if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
						$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
					}
				}
				if($nbFml16==2){
					$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$deuxFormules['rdc_valeur']/100 + $somme78 ;
				}else if($nbFml16>2){
					$reduc16 = $somme16*$troisFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$troisFormules['rdc_valeur']/100 + $somme78;
				}else{
					$somme = $somme16 + $somme78 ;
				}
			}else if($_SESSION['nb_adh']>2){
				for($i = 0, $size = count($queryFormule); $i < $size; $i++)
				{
					if(($queryFormule[$i][4]<6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml16 = $nbFml16 + $_POST[$queryFormule[$i][4]];
						$somme16 = $somme16 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
					}
					if(($queryFormule[$i][4]>6)&&($_POST[$queryFormule[$i][4]]!=0)){
						$nbFml78 = $nbFml78 + $_POST[$queryFormule[$i][4]];
						$somme78 = $somme78 + $_POST[$queryFormule[$i][4]]*$queryFormule[$i][3];
					}
				}
				if(($nbFml16==2)&&($nbFml78>0)){
					$reduc16 = $somme16*$deuxFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$deuxFormules['rdc_valeur']/100 + $somme78 ;
				}
				else if($nbFml16==3){
					$reduc16 = $somme16*$troisFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$troisFormules['rdc_valeur']/100 + $somme78;
				}else if($nbFml16>3){
					$reduc16 = $somme16*$quatreFormules['rdc_valeur']/100;
					$somme = $somme16 - $somme16*$quatreFormules['rdc_valeur']/100 + $somme78;
				}else{
					$somme = $somme16 + $somme78;
				}
			}
		}
		$sommeFinale = number_format($somme, 2);

		if(isset($_POST['preinscription'])){
			$reducPre = number_format($somme*$preinscription['rdc_valeur']/100,2);
			$sommeFinale = $sommeFinale - $sommeFinale*$preinscription['rdc_valeur']/100;
		}

		if($_SESSION['nb_adh']==1){
			$sommeFinale = $sommeFinale + $tarifAdherent['rdc_valeur'];
			$tarif = $tarifAdherent['rdc_valeur'];
		}else{
			$sommeFinale = $sommeFinale + $tarifFamille['rdc_valeur'];
			$tarif = $tarifFamille['rdc_valeur'];
		}

		$total = $somme16 + $somme78 + $tarif - $reduc16 - $reducPre;
		
		echo "<h4>Total à payer : ".$total." €</h4>";
?>
