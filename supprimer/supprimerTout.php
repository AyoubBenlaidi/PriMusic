<?php

	include("../Query.php");
    $bdd = getDatabaseConnexion();
    $password=databaseQuery('SELECT usr_password FROM users WHERE usr_name = \'admin\'');
    $enteredpassword=$_POST["password"];

if( $enteredpassword == $password[0][0] ) {

	$req1 = $bdd->query("DELETE FROM paiement ; ");
	$req2 = $bdd->query("DELETE FROM adherent ; ");
    $req3 = $bdd->query("DELETE FROM famille ;");
    
	if($req1 && $req2 && $req3 ){
		echo "Tout a été supprimé";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
    }
}
else{
    echo "MAUVAIS MOT DE PASSE !";
    header("refresh:1;url=../administration.php");
}
?>
