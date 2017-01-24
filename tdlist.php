<html>
<head>
	<title>Welcome!</title>
	<style>
		table{
			font-size:30px; 
			border-spacing:10px;
			border:1px solid black;
		}	
		td{
			padding:4px; 
			word-wrap:break-word;
		}
	</style>
</head>
<body>
<?php
	session_start();
	//print_r($_POST);	
	if($_SESSION['cappass'] != $_POST['captcha'])
	{
		die("You are a bot! Get out of here.");
	}
	else
	{
		$db = mysql_connect('localhost','root','password') or die("Unable to connect database. Check your connection parameters");
		$query = 'create database if not exists todo';
		mysql_query($query,$db) or die(mysql_error($db));
		mysql_select_db('todo',$db) or die(mysql_error($db));

		$query = 'create table if not exists users(
			id 			int 			not null 	auto_increment, 
			username 	varchar(20) 	not null 	unique,
			nick 		varchar(20)     not null    unique,
			userpass 	varchar(32)		not null,
			PRIMARY KEY (id)
		)';
		mysql_query($query,$db) or die(mysql_error($db));
		if(isset($_POST['username']))
		{
			$username = mysql_real_escape_string($_POST['username']);
		}
		$nick = mysql_real_escape_string($_POST['nick']);
		$userpass = mysql_real_escape_string($_POST['userpass']);
		if(isset($_GET['new']))
		{
			//echo "reacheddkn";
			$d = "select * from users where username = '$username'";
			$result = mysql_query($d,$db) or die(mysql_error($db));
			$row = mysql_num_rows($result);
			//echo "reacheddkn";
			if($row == 1){
				echo "<h3> Please register again with a new username, it has already been taken! </h3>";
			}
			else
			{
				
				//echo "reacheddkn";
				$query = "insert into users(username,nick,userpass) values('$username','$nick',md5('$userpass'))";
				
				mysql_query($query,$db) or die(mysql_error($db));
				$str = $_POST['nick'];
				$create = "create table if not exists ".$str."(
					 date 			date 		not null 	default curdate(),
					 time 			time 		not null 	default curtime(),
					 description 	varchar(100) 	 
				)";
				mysql_query($create,$db) or die(mysql_error($db));
				echo "<h2>Table created</h2><br/>";
				echo "<h2>There, obviously aren't any records!</h2>";
				include("add.php");
			}
		}
		else
		{
			$d = "select * from users where nick = '$nick'";
			$result = mysql_query($d,$db) or die(mysql_error($db));
			$row = mysql_num_rows($result);
			if($row == 0)
			{
				echo '<h3>No match found. Re-enter your credentials.</h3>';
			}
			else
			{
				$query = "select * from $nick";
				$result = mysql_query($query,$db) or die(mysql_error($db));
				if(mysql_num_rows($result)==0)
				{
					echo "<h2> No upcoming events! Take a nap. </h2>";
				}
				else
				{
					echo "<table  align=\"center\">";
					echo "<th>Date</th><th>Time</th><th>Event Details</th>";
					while($row = mysql_fetch_assoc($result))
					{
						extract($row);
						echo "<tr> <td>$date</td> <td>$time</td> <td>$description</td> </tr>";	
					}
					echo "</table>";
				}
				include("add.php");
			}
		}
	}
?>
</body>
</html>