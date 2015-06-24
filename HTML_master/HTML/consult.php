<!DOCTYPE html>
<html>
	<head>
		<title>Domotique</title>
		<meta charset="utf-8" />  
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Mr+De+Haviland' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
		<script type="text/javascript" src="javaScript/domotique.js" ></script> 
		<script type="text/javascript" src="javaScript/utils.js" ></script> 
	</head>
	<body>
				<!-- HEADER -->
		<div id="header">
			<div class="titre">
				<a href="home.html">Domotique</a>
			</div>
			<div class="menu">
				<ul>
					<li><a href="Home.html">Accueil</a></li>
					<li><a href="consult.html">Données </a></li>
				</ul>
			</div>
		</div>
		<!-- FIN HEADER -->
		
		
		<!-- CONTENT -->
		<div id="content2">
			
			<div id="form-graph">
					<form method="POST" action="handlindData.php">
						<fieldset id="form-date">
							<legend>Choix de la période</legend>
								<div class="radiobutton1">
									<input id="per-year" 	type="radio" name="date" value="Par-année" checked /> Par année</br>
									<dd><input id="date_annee" type="number" min="2010" max="2020" /></dd>
								</div> <!-- fin de la div radiobutton1 -->
								
								<div class="radiobutton2">
									<input id="other-date"  type="radio" name="date" value="Autre-période" /> Autre période
										<dd>Du <input id="date_debut" type="date" min="2010-01-01" max="2020-12-31" /> Au <input id="date_fin" type="date" min="2010-01-01" max="2020-12-31" /></dd>
								</div><!-- fin de la div radiobutton2 -->
						</fieldset>

						<fieldset id="form-sensor">
							<legend>Choix du/des capteurs</legend>
								<label for="choix_capteur">Capteur :</label>
									<dd><div style="overflow:scroll;height:77px;width:300px;"> 
										 <input type="checkbox" name="chk" id="c1"/> 
											<label for="c1">Capteur 1</label><br /> 
										 <input type="checkbox" name="chk" id="c2"/> 
											<label for="c2">Capteur 2</label><br /> 
										 <input type="checkbox" name="chk" id="c3"/> 
											<label for="c3">Capteur 3</label><br /> 
										 <input type="checkbox" name="chk" id="c4"/> 
											<label for="c4">Capteur 4</label><br /> 
										 <input type="checkbox" name="chk" id="c5"/> 
											<label for="c5">Capteur 5</label><br /> 
									</div></dd>
								
								<label for="choix_piece">Pièce :</label>
									<dd><div style="overflow:scroll;height:77px;width:300px;"> 
										 <input type="checkbox" name="chk" id="c1"/> 
											<label for="c1">Chambre enfant</label><br /> 
										 <input type="checkbox" name="chk" id="c2"/> 
											<label for="c2">Chambre parents</label><br /> 
										 <input type="checkbox" name="chk" id="c3"/> 
											<label for="c3">Cuisine </label><br /> 
										 <input type="checkbox" name="chk" id="c4"/> 
											<label for="c4">Salon</label><br /> 
										 <input type="checkbox" name="chk" id="c5"/> 
											<label for="c5">Salle de bain</label><br /> 
									</div></dd>
						</fieldset>
					</form>
					<div id="soumission"><input id="valider" type="button" name="lien1" value="Valider"></div>
				</div> <!-- fin de la div form-sensor -->
<script type="text/javascript">
	$(function () {
	
	var timeStamptest = 1433109600
	console.log(dateTotimeStamp("06-20-2015"));
	console.log(timeStampToDate(timeStamptest));
	var timeStampDay = timeStampIdenticday(timeStamptest)
	console.log(timeStampDay);
	console.log(timeStampToDate(timeStampDay));
	
	function moistoString(mois)
	{
		var stringmois;
		if(mois==01)
			stringmois = "Janvier";
		if(mois==02)
			stringmois = "Fevrier";
		if(mois==03)
			stringmois = "Mars";
		if(mois==04)
			stringmois = "Avril	";
		if(mois==05)
			stringmois = "Mai";
		if(mois==06)
			stringmois = "Juin";
		if(mois==7)
			stringmois = "Juillet";
		if(mois==8)
			stringmois = "Aout";
		if(mois==9)
			stringmois = "Septembre";
		if(mois==10)
			stringmois = "Octobre";
		if(mois==11)
			stringmois = "Novembre";
		if(mois==12)
			stringmois = "Decembre";
		return stringmois;
	}
	
	function dateTotimeStamp(maDate)
	{
		maDate = maDate + ''
		maDate = maDate.split("-");
		var nouvelleDate = maDate[0] + "-" + maDate[1] + "-" + maDate[2];
		var date = new Date(nouvelleDate);
		var timeStampDate = (date.getTime())/1000;
		return timeStampDate;
	}
	
	function timeStampToDate(timestamp)
	{
		var date = new Date(timestamp*1000);
		return date;
	}
	
	function timeStampIdenticday(timestamp)
	{
		var nouveautimeStamp = timestamp + 86399;
		return nouveautimeStamp;
	}
	var array = new Array();	
	var temp = new Array();
	$('#valider').mousedown(function()
	{
		if($('#other-date').is(':checked'))
		{
			var datedebut = $('#date_debut').val();
			var datefin = $('#date_fin').val();
			console.log(datedebut);
			console.log((datefin));
		}
		if($('#per-year').is(':checked'))
		{
			var date = $('#date_annee').val();
			console.log(date);
			var dateannee = "01-" + "01-" + date;
			console.log(dateTotimeStamp(dateannee));
		}
		var dated = datedebut.split("-");
		var datef = datefin.split("-");
		var moisd = dated[1];
		var jourd = dated[2];
		var and = dated[0]
		var moisf = datef[1];
		var jourf = datef[2];
		var anf = datef[0]
		var moisdiff = moisf - moisd;
		var andiff = anf - and;

		if(moisdiff == 0)
		{
			var jouractuelle = jourd;
			while(jouractuelle <= jourf)
			{
				array.push(jouractuelle + "/" + moisd);
				jouractuelle++;
			}
		}
		console.log(moisdiff);
		console.log(andiff);
		if(moisdiff>0 && andiff<1)
		{
			var moisactuel = moisd;
			while(moisactuel <= moisf)
			{
				array.push(moistoString(moisactuel));
				moisactuel++;
			}
		}
		temp=[12,25,32];
		console.log(array);
		chartOptions.xAxis.categories=array;
		chartOptions.series[2].data=temp;
		chart1 = new Highcharts.Chart(chartOptions);
		array = new Array();

	});
	
	// Affiche les champs à remplir en fonction de l'option cochée
	$('#per-year').click(function()
	{
		$(this).parent().parent().children('.radiobutton2').children('dd').hide();
		$(this).parent().children().show();
	});
	
	// Affiche les champs à remplir en fonction de l'option cochée
	$('#other-date').click(function()
	{
		$(this).parent().parent().children('.radiobutton1').children('dd').hide();
		$(this).parent().children().show();
		$(this).parent().children('dd').css('paddingLeft', '200px');
	});
	
    chartOptions = {
        chart: {
			renderTo: 'container',
            zoomType: 'xy'
        },
        title: {
            text: 'Résumé Domotique'
        },
        subtitle: {
            text: 'Sur une période de temps donnée'
        },
        xAxis: [{
            categories: array,
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}°C',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            title: {
                text: 'Temperature',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            opposite: true

        }, { // Secondary yAxis
            gridLineWidth: 0,
			//max:1,         
			//min:0,       
			//tickInterval: 1, 
            title: {
                text: 'Etat des capteurs',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value}',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }

        }, { // Tertiary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Compteur',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 10,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: [{
            name: 'Etat des capteurs',
            type: 'column',
            yAxis: 1,
            data: [],
            tooltip: {
                valueSuffix: ' '
            }

        }, {
            name: 'Compteur',
            type: 'spline',
            yAxis: 2,
            data: [],
            marker: {
                enabled: false
            },
            dashStyle: 'shortdot',
            tooltip: {
                valueSuffix: ' '
            }

        }, {
            name: 'Temperature',
            type: 'spline',
            data: temp,
            tooltip: {
                valueSuffix: ' °C'
            }
        }]
    }
	chart1 = new Highcharts.Chart(chartOptions);
});
</script>
			<div id="graph">

				<div id="container" style="min-width: 800px; height: 400px; margin: 0 auto"></div>
			</div> <!-- fin de la div graph -->
			
			

		</div> <!-- FIN CONTENT -->
		<!-- FIN FOOTER -->
  	</body>
  
</html>
