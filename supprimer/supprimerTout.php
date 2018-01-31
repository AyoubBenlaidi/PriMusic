<?php

	include("../Query.php");
    $bdd = getDatabaseConnexion();
    $password=databaseQuery('SELECT usr_password FROM users WHERE usr_name = \'admin\'');
    $enteredpassword=$_POST["password"];

if( $enteredpassword == $password[0][0] ) {

	$req = $bdd->query("DELETE FROM adherent ; ");
    $req2 = $bdd->query("DELETE FROM famille ;");
    
	if($req && $req2 ){
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
