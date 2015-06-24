<?php
//TEST timeStampToDate
	//Cas 1 : timestamp est une valeur numérique -> timeStampToDate renvoie la date correspondante
	$test = 45;
	$res = timeStampToDate($test);
	echo "TimeStampToDate, cas 1 = " + $res;
	
	//Cas 2 : timestamp n'est pas une valeur numérique -> timeStampToDate renvoie false
	$test = "valeurPourTest";
	$res = timeStampToDate($test);
	echo "TimeStampToDate, cas 2 = " + $res;
	
//TEST timeStampIdenticDay
	//Cas 1 : timestamp est une valeur numérique -> timeStampIdenticDay renvoie la date correspondante + 23h59m59s
	$test = 45;
	$res = timeStampIdenticDay($test);
	echo "TimeStampIdenticDay, cas 1 = " + $res;
	
	//Cas 2 : timestamp n'est pas une valeur numérique -> timeStampIdenticDay renvoie une erreur
	$test = "valeurPourTest";
	$res = timeStampIdenticDay($test);
	echo "TimeStampToDate, cas 2 = " + $res;
	
//TEST intervalle_moyenne
	//Cas 1 : date1 ou date2 n'est pas une date
	$date1 = "2584";
	$date2 = "65984";
	$res = intervalle_moyenne($date1, $date2, 5);
	print_r($res);
	
	//Cas 2 : date1 > date2
	$date1 = "2015-08-25";
	$date2 = "2015-06-24";
	$res = intervalle_moyenne($date1, $date2, 5);
	print_r($res);
	
	//Cas 3 : date1 < date2 ; capteur ok
	$date2 = "2015-08-25";
	$date1 = "2015-06-24";
	$res = intervalle_moyenne($date1, $date2, 5);
	print_r($res);
	
	
?>