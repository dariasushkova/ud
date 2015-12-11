<?
		$server = "mysql.hostinger.ru";
	$user = "u535459501_daria";
	$passer = "dusennka";
	$db = "u535459501_ud";
	
	mysql_connect($server,$user,$passer) or die("всё пипец");
	mysql_select_db($db) or die("не пашет база");
	?>