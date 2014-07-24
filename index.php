<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="date.js"></script>
<script type="text/javascript">
var today = new Date(); var dd = today.getDate(); var mm = today.getMonth()+1; //January is 0! var yyyy = today.getFullYear(); if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} var today = dd+'/'+mm+'/'+yyyy; document.getElementById("DATE").value = today;

$(document).ready(function() {
	$.ajax({
		type : "GET",
		url:"http://elgg.amusedcloud.com/services/api/rest/json/",
		data:"method=wire.get_posts&context=mine&limit=",
		dataType:"json",
		success:function(data) {			
			for (var i=0;i<5;i++) {				
			  var element="";
			  $("#ajaxDiv").append("<div>Name: <b>"+data.result[i].owner.name+"</b></div>");
			  $("#ajaxDiv").append("<div>Description: "+data.result[i].description+"</div>");
			  $("#ajaxDiv").append("<div>Time: "+data.result[i].time_created+"</div>");
			}
		}
	});
	$("#logout").click( function() {
		//var ki = sessionStorage.ki(0);
		//sessionStorage.removeItem(ki);
		sessionStorage.clear();
		window.location = '../login_with_elgg/login.php';
	});	
	
});
</script>
</head>
<body>
<div id='ajaxDiv'><b>Wire Posts:</b></div>
<a id="logout" href="javascript:void(0);">Logout</a>
</body>
</html>
