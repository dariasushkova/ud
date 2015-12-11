<?php
session_start();

		$server = "mysql.hostinger.ru";
	$user = "u535459501_daria";
	$passer = "dusennka";
	$db = "u535459501_ud";
	
	mysql_connect($server,$user,$passer) or die("всё пипец");
	mysql_select_db($db) or die("не пашет база");
$login = $_POST['login'];
$pass = $_POST['pass'];

$query = mysql_query("SELECT * FROM users WHERE name='$login'");

$user_data = mysql_fetch_array($query);

switch ($user_data['usertype_id']){
	case 1:
		if ($user_data['pass'] == $pass){
			$chek = true;
			$_SESSION['name']=$login;
			$_SESSION['usertype_id'] = $user_data['usertype_id'];
			echo "<li><a href=\"..\index.php\">ВЫ АДМИН</a></li>";
			
		}
		else{
			echo ("неверный пароль");
		}
	break;
	case 2:
			if ($user_data['pass'] == $pass){
			$chek = true;
			$_SESSION['name']=$login;
			$_SESSION['usertype_id'] = $user_data['usertype_id'];
			echo "<li><a href=\"..\index.php\">ВЫ УЧИТЕЛЬ</a></li>";
		}
		else{
			echo ("неверный пароль");
		}
	break;
	case 3:
				if ($user_data['pass'] == $pass){
			$chek = true;
			$_SESSION['name']=$login;
			$_SESSION['usertype_id'] = $user_data['usertype_id'];
			echo "<li><a href=\"..\index.php\">ВЫ СТУДЕНТ</a></li>";
		}
		else{
			echo ("неверный пароль");
		}
	break;
	}




?>