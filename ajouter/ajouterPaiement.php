<?php session_start(); ?>
<?php
		include("../Query.php");
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
		
		echo "<pre>";
		print_r($queryFormule);
		echo "</pre>";
		
		
		if($_SESSION['fml_commune']==$_SESSION['commune_soucieu']){
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
		if(count($_POST['check_list'])>1){
			$decimal = $somme - intval($somme);

			echo 'Vous avez choisi de payer en ',count($_POST['check_list']),'mois <br/>';

			for($one = 0 ; $one<count($_POST['check_list'])-1 ; $one++){
				echo $_POST['check_list'][$one],' : ',variant_int($sommeFinale / count($_POST['check_list'])),' € <br/>';
			}
			echo $_POST['check_list'][count($_POST['check_list'])-1],' : ',number_format(($sommeFinale % count($_POST['check_list']))+variant_int($sommeFinale / count($_POST['check_list']))+$decimal,2),' € <br/>';
		}
		$arrayFormule = array();
		for($i = 0, $size = count($queryFormule); $i < $size; $i++) {
				array_push($arrayFormule, $_POST[$queryFormule[$i][4]]);
		}

		$paiementArray = array($somme16, $reduc16, $somme78, $reducPre, $tarif, $sommeFinale, $decimal);
		
		$totPay = $paiementArray[0] + $paiementArray[2] + $paiementArray[4] - $paiementArray[1] - $paiementArray[3] - $_POST['cheque'] - $_POST['liquide'] ;
		$decimal = $totPay - intval($totPay);
		
		$array_mois = array("Septembre" => 0,
							"Octobre" => 0,
							"Novembre" => 0,
							"Décembre" => 0,
							"Janvier" => 0,
							"Février" => 0,
							"Mars" => 0,
							"Avril" => 0,
							"Mai" => 0,
							"Juin" => 0
							);
		foreach($_POST['check_list'] as $nb => $mois){
			if($nb == count($_POST['check_list'])-1){
				$array_mois[$mois] = ($totPay % count($_POST['check_list']))+floor($totPay / count($_POST['check_list']))+$decimal;
			}
			else{
				$array_mois[$mois] = floor($totPay / count($_POST['check_list']));
			}
		}
		
		$pcv = 0;
		$pl = 0;
		if(isset($_POST['cheque']) and $_POST['cheque'] != ""){
			$pcv = $_POST['cheque'];
		}
		if(isset($_POST['liquide']) and $_POST['liquide'] != ""){
			$pl = $_POST['liquide'];
		}
		
		$paiement_exists = databaseQuery("SELECT count(*) FROM paiement WHERE pay_fml = ".$_SESSION['fml_id']);
		
		$query = "INSERT INTO paiement (pay_fml,pay_septembre,pay_octobre,pay_novembre,pay_decembre,pay_janvier,pay_fevrier,pay_mars,pay_avril,pay_mai,pay_juin,pay_total,pay_cv,pay_liquide)
				VALUES (:pay_fml,:pay_septembre,:pay_octobre,:pay_novembre,:pay_decembre,:pay_janvier,:pay_fevrier,:pay_mars,:pay_avril,:pay_mai,:pay_juin,:pay_total,:pay_cv,:pay_liquide)";
				
		$params = array("pay_fml"=>$_SESSION['fml_id'],
						"pay_septembre"=>$array_mois["Septembre"],
						"pay_octobre"=>$array_mois["Octobre"],
						"pay_novembre"=>$array_mois["Novembre"],
						"pay_decembre"=>$array_mois["Décembre"],
						"pay_janvier"=>$array_mois["Janvier"],
						"pay_fevrier"=>$array_mois["Février"],
						"pay_mars"=>$array_mois["Mars"],
						"pay_avril"=>$array_mois["Avril"],
						"pay_mai"=>$array_mois["Mai"],
						"pay_juin"=>$array_mois["Juin"],
						"pay_total"=>$paiementArray[0] + $paiementArray[2] + $paiementArray[4] - $paiementArray[1] - $paiementArray[3],
						"pay_cv"=>$pcv,
						"pay_liquide"=>$pl);
						
		if($paiement_exists[0][0] > 0){
			$query = "UPDATE paiement SET pay_septembre=:pay_septembre,pay_octobre=:pay_octobre,pay_novembre=:pay_novembre,pay_decembre=:pay_decembre,pay_janvier=:pay_janvier,
						pay_fevrier=:pay_fevrier,pay_mars=:pay_mars,pay_avril=:pay_avril,pay_mai=:pay_mai,pay_juin=:pay_juin,pay_total=:pay_total,pay_cv=:pay_cv,pay_liquide=:pay_liquide
						WHERE pay_fml=:pay_fml";
		}
		
		echo "<pre>";
		print_r($params);
		echo "<pre>";
		
		databaseQueryWrite($query,$params);
		
		$_SESSION['fml_array'] = $arrayFormule;
		include("../fiche_famillePDF.php");

?>
