<?php

	function connectUser($login,$mdp,$conn)
	{
		try{
		// On prépare la requête
		$requete = $conn->prepare("SELECT * FROM utilisateur WHERE loginUtil = :login");
		// On lie les variables définies au-dessus aux paramètres de la requête préparée
		$requete->bindValue(':login',$login , PDO::PARAM_STR);
		//On exécute la requête
		$requete->execute();
		// On récupère le résultat
		$data = $requete->fetchAll();
		$isConnected=false;
		foreach ($data as $row) {
			if ($mdp==$row['mdpUtil']) $isConnected=true;
		}
		if ($isConnected) return true;
		else return false;
		}            
		// Si une erreur est capturée nous affichons le message d'erreur
		catch(PDOException $e){
			return false;
		}
	}
	function connectUser2($login,$mdp, $mdp2, $mail,$conn)
	{
		try{
		// On prépare la requête
		$requete = $conn->prepare("INSERT INTO utilisateur VALUES (null, :login, :mdp, :mail, NOW(), NOW())");
		// On lie les variables définies au-dessus aux paramètres de la requête préparée
		$requete->bindValue(':login',$login , PDO::PARAM_STR);
		$requete->bindValue(':mdp',$mdp , PDO::PARAM_STR);
		$requete->bindValue(':mail',$mail , PDO::PARAM_STR);
		//On exécute la requête
		$requete->execute();
		return true;
		// On récupère le résultat
		/*$isConnected=false;
		foreach ($data as $row) {
			if ($mdp==$row['mdpUtil']) $isConnected=true;
			}
		if ($isConnected) return true;
		else return false;*/
		}            
		// Si une erreur est capturée nous affichons le message d'erreur
		catch(PDOException $e){
			return false;
		}
	}
		
	
	
?>