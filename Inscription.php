<?php

include "phpTools.php";

//verification des paramètres
if (!verifParam("loginUtil","POST") || !verifParam("mdpUtil","POST") || !verifParam("mdpUtil2","POST") || !verifParam("mailUtil","POST"))
{	
	//pas de param tu dégages Pirate !
	echo "Veuillez saisir des informations d'inscription";
	exit();
}
else// sinon on écrit une erreur
{	
	$login=$_POST["loginUtil"];
	$mdp=$_POST["mdpUtil"];
    $mdp2=$_POST["mdpUtil2"];
	$mail=$_POST["mailUtil"];
	// partie données
	Require "BDDConnexion.php";
	Require "BDDRequete.php";
	
	// partie Affichage
	if ($mdp === $mdp2){
	if (connectUser2($login,$mdp, $mdp2, $mail,$conn))
	{
		// Tout va bien message de bienvenue
		require "index.html";
		exit();
	}
	else
	{	
		// la saisie est incorrect
		$errorConnexion=true; 
		echo "Les informations d'inscription sont incorrectes.";
		$url="Inscription.html";
		$texteInscription = "S'inscrire";
		echo '<a href="' .$url.'">'.$texteInscription.'</a>';
	}
}else {
		echo "Les deux mots de passe ne sont pas identiques. Veuillez réessayer. ";
	}
	//Fermeture de la connexion
	$conn=null;
}