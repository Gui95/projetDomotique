$(function () {
	
	console.log(dateTotimeStamp("20/06/2015"));
	console.log(timeStampToDate("1274392800"));
	
	function dateTotimeStamp(maDate)
	{
		maDate = maDate + ''
		maDate = maDate.split("/");
		var nouvelleDate = maDate[1] + "-" + maDate[0] + "-" + maDate[2];
		var date = new Date(nouvelleDate);
		var timeStampDate = (date.getTime())/1000;
		return timeStampDate;
	}
	
	function timeStampToDate(timestamp)
	{
		var date = new Date(timestamp*1000);
		return date;
	}
	
	
	
});
