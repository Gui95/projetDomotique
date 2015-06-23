<?php
/**
 * Fonction moyennne
 * prend en parametre un array 'data' de type "timestamp" => valeur
 * renvoie la moyenne
 **/

//function moyenneTemp($data, $dateFin) {
	
	/* POUR TEST
	$data = array(
			1417962686.2894 => 21.5,
			1417964069.2357 => 22.67,
			1417964129.2357 => 23);
	*/
	//$dateFin = '2014-12-07 17:55:49'; POUR TEST
	$TimestampFin = strtotime($dateFin);
	$timestampSum = 0;
	$tempSum = 0;
	$ecoulement = 0;
	$count = 0;
	$buffer = 0;
	//echo '<p>';
	
	array_reverse($data, true);
	foreach($data as $timeStamp => $valeur)
	{
		
		if ($count == 0)
		{
			$ecoulement = $TimestampFin - $timeStamp;
		//	echo $TimestampFin . " - " . $timeStamp . " = " . $ecoulement . '</br>';
		}
		else {
			$ecoulement = $buffer - $timeStamp;
			
		}
		
		//echo $valeur;
		$timestampSum = $timestampSum + $ecoulement;
		$tempSum = $tempSum + ($valeur*$ecoulement);
		$buffer = $timeStamp;
		$count = $count + 1;
	}
	

	$moyenne = $tempSum / $timestampSum;
	//echo $moyenne;
	return $moyenne;
	
}

/**
 * Attend un array. renvoie la moyenne normale, sans tenir compte du temps.
 **/
function moyenne($data) {
	$somme = array_sum($data);
	$count = array_count_values($data);
	
	$moyenne = $somme/$count;
	
	return $moyenne;
}

?>