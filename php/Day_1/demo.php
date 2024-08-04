<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP INFO</title>
</head>
<body>
	<h1 style="text-align: center; font-family:sans-serif"><u>Day 1 tasks</u></h1>

<h2>First Task</h2>
	<!-- Fisrt task -->
	<?php
	phpinfo()
	?>


<hr>
<hr>

<h2>Second Task</h2>
	<!-- second task -->
	<?php
	define("WEBSITE_NAME", "MY WEBSITE");
	echo '<p style="font-size: 24px;"> Website name: '. WEBSITE_NAME . '</p>';
	?>

<hr>
<hr>

<h2>Third Task</h2>
	<!-- third task -->
	<?php
	$serverName = $_SERVER['SERVER_NAME'];
	echo '<p style="font-size: 24px;">Server Name: ' . $serverName . '</p>';

	$serverAddress = $_SERVER['SERVER_ADDR'];
	echo '<p style="font-size: 24px;">Server Address: ' . $serverAddress . '</p>';

	$serverPort = $_SERVER['SERVER_PORT'];
	echo '<p style="font-size: 24px;">Server Port: ' . $serverPort . '</p>';

	$fileName = $_SERVER['PHP_SELF'];
	echo '<p style="font-size: 24px;">Filename: ' . $fileName . '</p>';

	$fullPath = $_SERVER['SCRIPT_FILENAME'];
	echo '<p style="font-size: 24px;">Full Path: ' . $fullPath . '</p>';
	?>

<hr>
<hr>

<h2>Fourth Task</h2>
<!-- Fourth task -->
	<?php
	$age = 10;

	switch (true){
		case ($age < 5):
			echo '<p style="font-size: 24px;">Stay at home</p>';
			break;
		
		case ($age == 5):
			echo '<p style="font-size: 24px;">Go to kindergarten</p>';
			break;

		case ($age >= 6 && $age <= 12):
			$grade = $age - 6;
			echo '<p style="font-size: 24px;">Go to grade ' .  $grade . '</p>';
			break;
		
		default:
			echo 'You are an adult';
			break;
	}
	?>

</body>
</html>