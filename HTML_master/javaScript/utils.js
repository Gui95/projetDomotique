$(function () {
	
	var timeStamptest = 1433109600
	console.log(dateTotimeStamp("06-20-2015"));
	console.log(timeStampToDate(timeStamptest));
	var timeStampDay = timeStampIdenticday(timeStamptest)
	console.log(timeStampDay);
	console.log(timeStampToDate(timeStampDay));
	
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
	
	function getXMLHttpRequest() 
	{
		var xhr = null;
		
		if (window.XMLHttpRequest || window.ActiveXObject) 
		{
			if (window.ActiveXObject) 
			{
				try 
				{
					xhr = new ActiveXObject("Msxml2.XMLHTTP");
				} 
				catch(e) 
				{
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
				}
			} 
			else 
			{
				xhr = new XMLHttpRequest(); 
			}
		} 
		else 
		{
			alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
			return null;
		}
	
		return xhr;
	}
	
	//A terminer par rapport au formulaire
	$('#valider').mousedown(function()
	{
		var xhr = getXMLHttpRequest();
		if($('#other-date').is(':checked'))
		{
			var datedebut = encodeURIComponent($('#date_debut').val());
			var datefin = encodeURIComponent(($('#date_fin').val()));
			console.log(dateTotimeStamp(datedebut));
			console.log(dateTotimeStamp(datefin));
		}
		if($('#per-year').is(':checked'))
		{
			var date = $('#date_annee').val();
			console.log(date);
			var dateannee = "01-" + "01-" + date;
			console.log(dateTotimeStamp(dateannee));
		}
	
		xhr.open("GET", "handlingData.php?date_debut" + datedebut + "&date_fin=" + datefin, true);
		xhr.send(null);
		
	});
	
	
	
});
