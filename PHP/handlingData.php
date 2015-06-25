<?php

	/*Variables
	*	Ici $res servira (aussi) à renvoyer les erreurs au js du code
	*	1 : erreur lors de la connexion à la base
	*	2 : erreur lors de l'exécution de la query
	*/
	$res = null;
	$checkboxesVal = "";
	$conn = pg_pconnect("host=192.168.1.50 port=5432 dbname=domotique");
	
	//vérification de la connexion
	if (!$conn) {
	  $res = 1;
	  exit;
	}
	//conditions pour lancer le traitement des données
	$condition = (isset($_POST['date_debut']) && isset($_POST['date_fin'])) || (isset($_POST['mon_identifiant_de_checkbox']));

	if($condition){
		
		//1 On charge les params boxes checked
		foreach($_POST['mon_identifiant_de_checkbox'] as $valeur){
			if($checkboxesVal == "")
				$checkboxesVal = $checkboxesVal . $valeur;
			else
				$checkboxesVal = $checkboxesVal . ', ' . $valeur;
		}
		
		$result = pg_query($conn, call proc(($_GET["dateDebut"], $_GET["dateFin"], $checkboxesVal);
		if (!$result) {
		  $res = 2;
		  exit;
		}

		$res = "{ ";
		while ($row = pg_fetch_row($result)) {

		  $res = $res . " timestamp = ". $row[0] .",  id_capteur =". $row[1];
		}
	}

	//partie de HUUUUUUUUUUUUUUUUUUUUUUUUUUUUUSCH
	function timeStampToDate($timestamp)
	{
		$date = date('d/m/Y', $timestamp);
		return $date;
	}
	
	function timeStampIdenticDay($timestamp)
	{
		$nouveautimeStamp = $timestamp + 86399;
		return $nouveautimeStamp;
	}
	
	$date = new DateTime("18-05-2015");
	echo date_timestamp_get($date);
	echo timeStampToDate(1431900000);
	echo timeStampIdenticDay(1431900000);

?>
