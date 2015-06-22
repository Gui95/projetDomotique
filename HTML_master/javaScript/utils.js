$(function () {
	
	console.log(dateTotimeStamp("06-20-2015"));
	console.log(timeStampToDate("1434499200"));
	
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
	//A terminer par rapport au formulaire
	$('#valider').mousedown(function()
	{
		if($('#other-date').is(':checked'))
		{
			var datedebut = $('#date_debut').val();
			var datefin = $('#date_fin').val();
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
		if($(''))
	});
	
	
	
});
