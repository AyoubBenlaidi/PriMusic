<?php

	include("../Query.php");
    $bdd = getDatabaseConnexion();
    $enteredLogin=$_POST["login"];
    $oldPassword=databaseQuery("SELECT usr_password FROM users WHERE usr_name ='". $enteredLogin."'");
    $enteredOldPassword=$_POST["oldpassword"];
    $enteredNewPassword=$_POST["newpassword"];
    $enteredNewPasswordVerif=$_POST["newPasswordVerif"];
   
    
if( $enteredOldPassword == $oldPassword[0][0] ) {

    if($enteredNewPassword == $enteredNewPasswordVerif ){
	    $req = $bdd->query("UPDATE users SET usr_password = '".$enteredNewPassword."' WHERE usr_name ='". $enteredLogin."'" );
        if($req){
            echo "Mot de passe modifié ";
            header("refresh:1;url=../administration.php");
            }else{
            echo "Echec !";
            header("refresh:1;url=../administration.php");
              }

    } else{
    echo "Vous n'avez pas rentré le bon mot de passe de vérification !";
    header("refresh:1;url=../administration.php");
         }
    
    
        }else{
    echo "MAUVAIS MOT DE PASSE !";
    header("refresh:1;url=../administration.php");
}
?>
