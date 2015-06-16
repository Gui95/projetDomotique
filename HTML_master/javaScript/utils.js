$(function () {
	
	function timeStamp(var maDate)
	{
		maDate = maDate.split("/");
		var nouvelleDate = maDate[1] + "," + maDate[0] + "," + maDate[2];
		var timeStampDate = nouvelleDate.getTime();
		return timeStampDate;
	}
});
