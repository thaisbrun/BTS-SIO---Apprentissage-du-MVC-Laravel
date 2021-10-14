<?php

include "phpTools.php";

//verification des paramètres
if (!verifParam("loginUtil","POST") || !verifParam("mdpUtil","POST"))
{	
	//pas de param tu dégages Pirate !
	echo 'Veuillez saisir des informations de connexion';
	exit();
}
else// sinon on écrit une erreur
{	
	$login=$_POST["loginUtil"];
	$mdp=$_POST["mdpUtil"];
	
	// partie données
	Require "BDDConnexion.php";
	Require "BDDRequete.php";
	
	// partie Affichage
	if (connectUser($login,$mdp,$conn))
	{
		// Tout va bien message de bienvenue
		require "index.html";
		exit();
	}
	else
	{	
		// l'utilisateur n'existe pas ou la saisie est incorrect
		$errorConnexion=true; 
		echo 'Les informations de connexion sont incorrectes. <br> Veuillez vous inscrire ou retenter de vous connecter. <br><br>';
		$url="Inscription.html";
		$url2="Connexion.html";
		$texteInscription = "S'inscrire";
		$texteConnexion = "Se connecter";
		echo '<a href="' .$url.'">'.$texteInscription.'</a>';
		echo ' ou ';
		echo '<a href="' .$url2.'">'.$texteConnexion.'</a>';
	}
	//Fermeture de la connexion
	$conn=null;
}


?>