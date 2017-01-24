<!DOCTYPE html>
<html>
	<head>
		<title>
			Add events here!
		</title>	
		<style>
			#nav{
				position:absolute;
				left:900px;
				top:10px;
				font-size:17px;
				font-weight: bold;
			}
			ul li{
				word-spacing: 10px;
				display: inline;
				list-style-type: none;
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<h2>Welcome <?php echo $_POST['nick']; ?>,</h2>
		<div id="nav">
			<ul>
				<li id = "logout"> Logout </li>
				<li id = "Settings"> Settings </li>
			</ul>
		</div>
		<form id="formid" method="post" action="">
			<fieldset>
				<legend> Add your event </legend>
				<table>
					<tr>
						<td> Date of the event: </td>
						<td><input type="date" name="date" id="dateid"/></td>
						<td>Time of the event: </td>
						<td><input type="time" name="time"/></td>
					</tr>
					<tr>
						<td> Event Description: </td>
						<td><textarea name="details">Enter the event details here</textarea></td>
						<td><input type="submit" id="saveid" name="submitted" value="Save"/></td>
					</tr>
				</table>
			</fieldset>
		</form>
		<script>
			var logout=document.getElementById('logout').addEventListener("click",fun);
			function fun()
			{
				var t=confirm("Logging out!");
				if(t)
				{
					window.location="index.php";
				}
			}
			document.getElementById('saveid').disabled = !cansubmit;
			var submit = document.getElementById('saveid').addEventListener("click",fun2);
			function fun2()
			{
				confirm("date:");
				<?php
					$date = $_POST['date'];
					$time = $_POST['time'];
					$det = $_POST['details'];
					if(isset($_POST['submitted']))
					{
						$query = "insert into `$nick` values(str_to_date(`$date`,`%d-%m-%y`),`$time`,`$det`)";
						$result = mysql_query($query,$db) or die(mysql_error($db));
					}
				?>
			}
		</script>
	</body>
</html>