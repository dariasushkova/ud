<?php
error_reporting(E_ERROR);
session_start();
include("/server/connectMysql.php");
include("/server/function.php");
mysql_query("SET NAMES 'utf8'");
$group_id = $_GET["id"];
			echo "$group_id";
			$sql = "SELECT students_groups.student_id ,students_groups.group_id, students.fio as namestudent , teachers.fio as teachfio, groups.name as namegroup, subjects.id as id_subject FROM students_groups 
										JOIN groups ON (groups.id=students_groups.group_id)
										JOIN teachers ON (teachers.id=groups.teacher_id)
										JOIN subjects ON (subjects.group_id=groups.id)
										JOIN students ON (students.id=students_groups.student_id)";
										
			if ($group_id){
				$sql .= " WHERE students_groups.group_id= $group_id";
			}
			$result_set = mysql_query($sql);
			$result = mysql_fetch_array($result_set);
			
				

?>

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
					<li><a ><div>Информация</div></a>
						<div>
							<ul>
								<li><a href="#">О мастер-классах</a></li>
								<li><a href="prep_list.php"> Список преподавателей</a></li>
								<li><a href="#">Расписание</a></li>
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
			 <h1>Рейтинг <?php echo $result["namegroup"];  ?></h1> <!-- БЕРЕМ ИЗ БАЗЫ-->
	<div id="content">
			<div id="view_task">	
				<div id="">
					
						<p> <?php echo $result["teachfio"];?> 
							<!--switch ($_SESSION['usertype_id']){
								case 1:
					//ЭТА КНОПКА 'сменить препода' ТОЛЬКО ДЛЯ АДМИНА
						echo ("<input class=\"button_green\" type=\"submit\" style=\"width:100px\" value=\"Сменить\">");
						echo ("<input class=\"button_red\" type=\"submit\" style=\"width:200px;float:right\"  value=\"Добавить новое занятие\" onClick=\"location.href=\'prep_add_task.php?id=".$group_id = $_GET["id"]."\">");	
						break;
						case 2:
						echo ("<input class=\"button_red\" type=\"submit\" style=\"width:200px;float:right\"  value=\"Добавить новое занятие\" onClick=\"location.href=\'prep_add_task.php?id=".$group_id = $_GET["id"]."\">");	
						break;
						}
						?>
				<!-- только для админа и препода--><input class="button_red" type="submit" style="width:200px;float:right" onClick="location.href='prep_add_task.php?id=<?php
																																													$group_id = $_GET["id"];
																																													echo "$group_id";?> '"  value="Добавить новое занятие"/><br></p>
				
				</div>
					<form class="form-horizontal" method="post" action="">		

				<table id="admin_table_list_group" border="2px" class="table table-striped table-bordered table-hover">
			
				
						<td width="200px" rowspan="2">ФИО</td>
						
					<!--<tr ><th colspan="4">Сентябрь</th>
						<th colspan="5">Октябрь</th>
						<th colspan="4">Ноябрь</th>
						<th colspan="4">Декабрь</th>
					</tr>-->
					<tr>
						<?php
																				
						while ($result = mysql_fetch_array($result_set)) {
					
						 echo "<td style=\"width:15px\"><a href=\"view_task.php?id=".$result["id_subject"]."\">".$result["id_subject"]."</a></td>";
						}
						 
						 ?>
						
					</tr>
					<tr>
					<!-- Сентябрь-->
						<?php
							$group_id = $_GET["id"];
							
							$sql = "SELECT students_groups.student_id ,students_groups.group_id, students.fio as namestudent , groups.name as namegroup FROM students_groups 
														JOIN groups ON (groups.id=students_groups.group_id)
														JOIN students ON (students.id=students_groups.student_id)";
							if ($group_id){
								$sql .= " WHERE students_groups.group_id= $group_id";
							}
							$result_set = mysql_query($sql);
							while ($result = mysql_fetch_array($result_set)) {
								echo "<tr><form method=\"POST\">";
							
								echo   "<td>".$result["namestudent"]."</td>";
								
								echo "</tr> </form>";
							}
						
							?>
					
					</tr>
			
				</table>	
					<input class="button_green" type="submit" style="width:220px" value="Отправить уведомление группе"/>	
					<input class="button_green"  type="button" style="width:200px" onClick="location.href='perem_stud.php?id=<?php $group_id = $_GET["id"]; echo $group_id ?>'" value="Переместить группу"/><a href="perem_stud.php?id='<?php $result["group_id"]?>'"></a>
					<!-- <input class="button_red" type="submit" style="width:200px" value="Расформировать группу"/> -->
					</form>
			</div>
		</div>
		
		<div id="footer">Copyright © 1999 – 2015 Институт математики и компьютерных наук.<br> Дальневосточный Федеральный Университет
		</div>
		
	</div>
</body>
</html>