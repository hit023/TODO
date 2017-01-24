<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<head>
		<title>
			Welcome, new user!
		</title>
		<style>
			#small{
				font-size: 10px;
			}
			#form{
				background-color: #F5F5DC; 	
			}
			table{
				table-layout: fixed;
				width: 310px;
			}
			table, tr, td{
				word-wrap: break-word;
				border: 1px solid black;
			}
			input{
				width: 100%;
				box-sizing: border-box;
			}
			fieldset legend{
				font-weight: bold;
			}
			#signupbutton{
				position: absolute;
				top: 150px;
				left: 900px;			
			}
			#reset{
				position: absolute;
				top: 100px;
				left: 900px;				
			}
			#todo{
				position: absolute;
				left: 150px;
			}
		</style>
	</head>
	<body align="center" style="font-family: Georgia;">
		<div id="todo">
			<h1>TODO List</h1>
			<h3>(Powered by PHP!)</h3>
		</div>
		<!--<div id="reset">
			<input type="reset" value="Clear"/>
		</div>
		<div id="signupbutton">
			<input type="button" onclick="location.href='tdlist.php?new=1';" value="Sign-up"/>
		</div>-->
		<div id="form">
			<form action="tdlist.php?new=1" method="post">
				<fieldset>
					<legend>Sign-up</legend>
					<table align="center" cellpadding="3">
						<tr>
							<td>Name: </td>
							<td><input type="text" name="username"></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><input type="password" name="userpass"></td>
						</tr>	
						<tr>
							<td>Username<span id="small">  (Will be used for login)</span></td>
							<td><input type="text" name="nick"></td>
						</tr>
						<tr>
		                	<td>Are you human? If so, enter the code shown in the box:</td>
		                	<td> <img src="cap.php"> <input type="text" name="captcha"></td>
	                	</tr>
	                	<tr>
	                		<td><input type="submit" value="Sign-up"></td>
	                		<td><input type="reset" value="Clear"></td>
	                	</tr>
					</table>
				</fieldset>
			</form>
		</div>
	</body>
</html>