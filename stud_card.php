<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Список групп</title>
	<link rel="stylesheet" href="css/styles.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
	<link href="/css/bootstrap.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="/js/jquery.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<!--[if lt IE 9]><script type="text/javascript" src="/js/jquery.js"></script>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<div id="wrapper">
		<div id="header">
			<h1>Мастер классы по программированию</h1>
		</div>
		
		<div id="menu">
			<nav role="navigation">
				<ul>
					<li><a href="index.php"><div>Главная</div></a></li>
					<li><a><div>Информация</div></a>
						<div>
							<ul>
								<li><a href="info.php">О мастер-классах</a></li>
								<li><a href="prep_list.php">Список преподавателей</a></li>
							</ul>
						</div>
					</li>
					<li class="menu_holder"><a href="list_group.php"><div>Учебная часть</div></a></li>
					<li><a href="anketa.php"><div>Подать заявку</div></a></li>
					<li><?php if (isset($_SESSION['name'])): ?> <p>Здравствуйте, <?=$_SESSION['name']?><br>
					<a href="admin_panel.php"  >Панель</a>
					<a href="clear.php"  >Выйти</a>
					
					<?php endif; ?></li>
				
				</ul>
			</nav>
		</div>
			 
		<div id="content">
		<h1>Личная карточка студента</h1>
			<div id="ud_card">	
				<div id="">
					<form class="form-horizontal" method="post" action="">
				<table  class="table table-striped table-bordered table-hover">
						  <tr>
							<tr>
								<td><label>Фамилия</label></td>
								<td><label><?php print $last_name;?> Киргозанов</label></td>
							</tr>
							<tr>
								<td><label>Имя</label></td>
								<td><label><?php print $first_name;?>Кирдос Рамир Алы Байда</label></td>
							</tr>
							<tr>
								<td><label>Отчество </label></td>
								<td><label><?php print $patronymic;?>Карвалолович</label></td>
							</tr><tr>
								<td><label>Учебная группа </label></td>
								<td><label><?php print $patronymic;?>Высшая ступень 2015</label></td>
							</tr>
							<tr>
								<td><label>Школа</label></td>
								<td><label><?php print $school;?>Гимназия №1</label></td>
							</tr>
							<tr>
								<td><label>Класс</label></td>
								<td><label><?php print $class_sc;?>11</label></td>
							</tr>
							<tr>
								<td><label>Электронная почта</label></td>
								<td><label><?php print $mail;?>example@gmail.com</label></td>
							</tr>

				</table>	
		
		<input class="button_green" type="submit" style="width:200px" value="Отправить уведомление"/> 
		<input class="button_green" type="submit" style="width:200px" value="Изменить данные"/> 
		<input class="button_green" type="submit" style="width:200px" value="Перевести в другую группу"/> 						
		</div>				
				
		</form>
			</div>
		</div>
		
		<div id="footer">Copyright © 1999 – 2015 Институт математики и компьютерных наук.<br> Дальневосточный Федеральный Университет
		</div>
		
	</div>
</body>
</html>