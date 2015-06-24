<?php
function intervalle_moyenne(date1, date2, capteur) {

	//recuperer données pour capteur entre date1 et date2
	//faire en sorte que date2 > date1

	
	/* $date1 = "2015-06-24";    VALEURS DE TEST
	$date2 = "2015-08-25"; */
/* 	
	$strDate1 = $date1->format('Y-m-d H:i:s');
	$strDate2 = $date2->format('Y-m-d H:i:s');
	 */
	
	$d_date1 = date_parse($date1);
	$d_date2 = date_parse($date2);
	
	$day = 0;
	$week = 0;
	$month = 0;
	
	//echo $d_date2["month"]. " " . $d_date1["month"] . '</br>';
	
	
	if(intval($d_date1["year"]) != intval($d_date2["year"])) // si difference au dela d'un an
		$month = 1;
		
	else if (intval($d_date2["month"]) - intval($d_date1["month"]) >= 4 ){ //si différence au dela de 4 mois
		$week = 1;
		}

	else if (intval($d_date2["month"]) <> intval($d_date1["month"]) ) //si différence au dela de 1 mois
		$week = 1;
	else if(intval($d_date2["day"]) - intval($d_date1["day"]) >= 21)
		$day = 2;
	else
		$day = 1;

	
	$listeResume = array();

	
	array_push($listeResume, $date1);
	$i = $date1;
	while(strtotime($i) <= strtotime($date2)) {
		
/*
		$date1->modify(' + ' . $month . 'month');
		$date1->modify(' + ' . $week . 'week');
		$date1->modify(' + ' . $day . 'day');
		*/
		//echo $date1 . ' + ' . $month . 'month' . ' + ' . $week . 'week' . ' + ' . $day . 'day' . '</br>';
		$date1 = date('Y-m-d', strtotime($date1 . ' + ' . $month . 'month'));
		$date1 = date('Y-m-d', strtotime($date1 . ' + ' . $week . 'week'));
		$date1 = date('Y-m-d', strtotime($date1 . ' + ' . $day . 'day'));
		//echo $date1 . '</br>';
		array_push($listeResume, $date1);
		$i = $date1;
	}
	array_pop($listeResume);
	//echo print_r($listeResume);
}
?>