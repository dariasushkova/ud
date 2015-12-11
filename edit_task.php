<?php 
error_reporting(E_ERROR);
session_start();
include("/server/connectMysql.php");
include("/server/function.php");
mysql_query("SET NAMES 'utf8'");
$group_id = $_GET["id"];
			echo "$group_id ";
		
			$sql = "SELECT *  FROM subjects,tasks ";
		
			if ($group_id ){
				$sql .= " WHERE subjects.id= $group_id and tasks.subject_id=$group_id ";
			}
			$result_set = mysql_query($sql);
			$result = mysql_fetch_array($result_set);
					
		

			?>

<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Просмотр занятия</title>
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
					<li><a href="anketa.php"><div>Анкета</div></a></li>
					<li><?php if (isset($_SESSION['name'])): ?> <p>Здравствуйте, <?=$_SESSION['name']?><br>
					<a href="admin_panel.php"  >Панель</a>
					<a href="clear.php"  >Выйти</a>
					
					<?php endif; ?></li>
			
				</ul>
			</nav>
		</div>
		
				
		     <div id="content">
			  <h1Редактирование занятия</h1>
			 <!-- Форма группы-->
				<div id="view_task">
					<a onclick="$('#name').slideToggle('slow');" href="javascript://">Свернуть/Развернуть занятие</a>				
				<form class="form-horizontal" name="upSubject" method="post" action="">
					
					<div  id="name" class="NavFrame">
						<?php 
						$result_set = mysql_query($sql);

						echo "<input name=\"name\" style=\"width:74%;background-color:white;display:inline-block;padding:4px\"; value=".$result["name"].">";	

						echo "<input name=\"days\"  style=\"width:14%;background-color:white;display:inline-block;margin-left:2%;padding:4px\"; type=\"date\";  value=".$result["days"].">";	
						
						echo "<textarea name=\"description\" style=\"width:90%;background-color:#FDF5E6;min-height:70px;resize:none\">" .$result["description"]."</textarea>";
							while ($result = mysql_fetch_array($result_set)){
				
						
						echo "<input name=\"task_name\" style=\"width:74%;background-color:white;display:inline-block;margin-top:1%;padding:4px\"; value=".$result["task_name"].">";	
						echo "<input name=\"task_weight\" style=\"width:14%;background-color:white;display:inline-block;margin-top:1%;;margin-left:2%;padding:4px\";value=".$result["task_weight"].">";	
						echo "<textarea name=\"task_description\" style=\"width:90%;background-color:#FDF5E6;margin-top:1%;height:auto;min-height:50px;resize:none\">".$result["task_description"]."</textarea>";	
						
						}
						?>
						
					
						
					</div>
				
					<table id="table_edit" border="2px" class="table table-striped table-bordered table-hover" >
					  <tr>
					  <tr>
							<td ><label>Список группы</label></td>
							<td style="width:20px;font:15px verdana"><label>Посещение</label><br></td>
							<td style="width:20px"><label>1</label><br></td>
							<td style="width:15px"><label>2</label><br></td>
							<td style="width:15px"><label>3</label><br></td>
						</tr>
						<tr>
							<td><label>Петров Егор</label></td>
							<td><input type="checkbox" ><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
						</tr>
						<tr>
							<td><label>Егоров Петр</label></td>
							<td><input name="first_name" type="checkbox" ><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
						</tr>
						<tr>
							<td><label>Левый чел</label></td>
						<td><input name="first_name" type="checkbox" ><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
						</tr>
						<tr>
							<td><label>Левыdsfsdfgsfgй чел</label></td>
						<td><input name="first_name" type="checkbox" ><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
						</tr>
						<tr>
							<td><label>Левый чел</label></td>
						<td><input name="first_name" type="checkbox" ><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
							<td><input name="first_name" type="text" value="<?=$first_name?>"><br></td>
						</tr>
						</tr>
					</table>	
							
					<!-- возвращаемся обратно в admin_list_group_raiting с имзиенениями-->
					<input class="button_red" type="submit" style="width:150px" name="upSubject" value="Сохранить изменения" >
				
					
				</form>
				<?php
						
							$group_id = $_GET["id"];
							if ( isset ($_POST['upSubject']) ){
								upSubject($group_id);
							}
						?>
		</div>
		</div>
	<div id="footer">Copyright © 1999 – 2015 Институт математики и компьютерных наук.<br> Дальневосточный Федеральный Университет
		</div>
</body>
</html>