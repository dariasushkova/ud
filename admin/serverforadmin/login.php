<?php
session_start();
	$login = $_POST['login'];
	$pass = $_POST['pass'];

		$server = "mysql.hostinger.ru";
	$user = "u535459501_daria";
	$passer = "dusennka";
	$db = "u535459501_ud";
	
	mysql_connect($server,$user,$passer) or die("�� �����");
	mysql_select_db($db) or die("�� ����� ����");

	$query = mysql_query("SELECT * FROM users WHERE name='$login'");
	$user_data = mysql_fetch_array($query);


	if ($user_data['pass'] == $pass){
		$chek = true;
		$_SESSION['name']=$login;
		echo "<li><a href=\"..\main.php\">���! ��� ���������� ���! ����� � ����</a></li>";
		
	}
	else{
		echo ("�������� ������");
	}
?>


			