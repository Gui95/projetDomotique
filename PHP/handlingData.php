<?php

$conn = pg_pconnect("host=localhost port=5432 dbname=domotique");
if (!$conn) {
  echo "Une erreur s'est produite lors de la connexion � la base.\n";
  exit;
}

$result = pg_query($conn, call proc(($_GET["dateDebut"], $_GET["dateFin"]);
if (!$result) {
  echo "Une erreur s'est produite lors de l'ex�cution de la proc�dure stock�e.\n";
  exit;
}

while ($row = pg_fetch_row($result)) {

	//cr�er 3 var (un pour chaque type), les impl�menter avec une ligne d'html en + (diplay invisible)
	//cr�er les fonctions de moyennes
  echo "Auteur: $row[0]  E-mail: $row[1]";
  echo "<br />\n";
}

?>