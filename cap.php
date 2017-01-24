<?php
	session_start();
	header("Content-Type: image/jpeg");
	$md5 = md5(rand(0,9999)); //md5 gives hash of a string.
	$pass = substr($md5,10,5);
	$_SESSION['cappass'] = $pass;
	//echo $pass;
	$image = ImageCreatetruecolor(100,20);
	$black = imagecolorallocate($image, 0,0,0);
	$white = imagecolorallocate($image,255,255,255);
	imagefontheight(15);
	imagefontwidth(15);
	imagestring($image,5,30,3,$pass,$white);
	imageline($image, 5, 1, 50, 20, $white);
	imageline($image, 60, 1, 96, 20, $white);
	return imagejpeg($image);
?>