<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<head>
		<title>
			Your TODO list !
		</title>
		<style>
			*{
				font-family: Georgia;
			}
			input{
				width:20em;
				height:2em;
			}
			#form{
				background-color: #F5F5DC; 
			}
			#signup
			{
				position: absolute;
				top: 150px;
				left: 200px;
				width: 150px;
    			border: 3px solid red;
    			border-radius: 25px;	
			}
			table{
				 table-layout=fixed;
				 width: 310px;
			}
			table td{
				word-wrap: break-word;
			}
			fieldset legend{
				font-weight: bold;
			}
			#header{
				text-align: center;
				background-color: orange;
				padding: 7px;
				border-radius : 25px;  
			}
		</style>
	</head>
	<body align="center">
		<div id="header">
			<h1>Your TODO List</h1>
		</div>
		<hr/>
		<div id="signup">
			New to this app? <a href="signup.php">Signup</a>
		</div>
		<div id="form">
			<form method="post" action="tdlist.php">
				<fieldset>
					<legend style="font-size:20px;"> Who are you? </legend>
					<table align="center" cellpadding="3">
					<tr>
						<td> Username: </td>
						<td> <input type="text" name="nick"> </td>
					</tr>
					<tr>
						<td> Password: </td>
						<td> <input type="password" name="userpass"> </td>
					</tr>
	                <tr>
	                	<td>Are you human? If so, enter the code shown in the box:</td>
	                	<td> <img src="cap.php"> <input type="text" name="captcha"></td>
	                </tr>
	                <tr>
	                	<td><input type="submit" value="Login"/></td>
	                	<td><input type="reset" value="Reset"/></td>
	                </tr>
					</table>
				</fieldset>
			</form>
		</div>
	</body>
</html>