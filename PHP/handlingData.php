<?php

$conn = pg_pconnect("host=localhost port=5432 dbname=domotique");
if (!$conn) {
  echo "Une erreur s'est produite lors de la connexion à la base.\n";
  exit;
}

$result = pg_query($conn, call proc(($_GET["dateDebut"], $_GET["dateFin"]);
if (!$result) {
  echo "Une erreur s'est produite lors de l'exécution de la procédure stockée.\n";
  exit;
}

while ($row = pg_fetch_row($result)) {

	//créer 3 var (un pour chaque type), les implémenter avec une ligne d'html en + (diplay invisible)
	//créer les fonctions de moyennes
  echo "Auteur: $row[0]  E-mail: $row[1]";
  echo "<br />\n";
}

	
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
