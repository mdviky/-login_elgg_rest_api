<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="date.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	$("#sub").click(function() {
		
		var id = $('#email_id').val();
		var pass = $('#pass_word').val();
		
		$.ajax({
			type       : "POST",
			url        : "http://elgg.amusedcloud.com/services/api/rest/json/?",						
			data       : {method:'auth.gettoken',username : id, password : pass},
			dataType   : 'json',
			success    : function(response) {
			
				var auth_token = response.result;
				sessionStorage.setItem("auth",auth_token);
				window.location = '../login_with_elgg/index.php';
			
			}
		});
	});
});
</script>
</head>
<body>
<form method="post">
<table border="0" align="center">
<tr>
<td>Email:</td>
<td><input id="email_id" type="text" name="email" /></td>
</tr>
<tr>
<td>Password:</td>
<td><input id="pass_word" type="password" name="password" /></td>
</tr>
<tr>
<td><input id="sub" type="button" name="submit" value="Login" /></td>
</tr>
</table>
</form>
</body>
</html>
