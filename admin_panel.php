<?php
error_reporting(E_ERROR);
session_start();
include("/server/connectMysql.php");
mysql_query("SET NAMES 'utf8'");

?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Whitesquare</title>
	<link rel="stylesheet" href="css/styles.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
	<link href="/css/bootstrap.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="/js/jquery.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<!--[if lt IE 9]><script type="text/javascript" src="/js/jquery.js"></script>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->


	<link rel="stylesheet" type="text/css" href="css/style1.css" />
	<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="js/jquery.easing.js"></script>
	<script language="javascript" type="text/javascript" src="js/script.js"></script>
	
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
					<li><a href="list_group.php" ><div>Учебная часть</div></a>
						
					
					</li>
					<li><a href="anketa.php"><div>Анкета</div></a></li>
					<li class="menu_holder"><?php if (isset($_SESSION['name'])): ?> <p>Здравствуйте, <?=$_SESSION['name']?><br>
					<a href="admin_panel.php"  >Панель</a>
					<a href="clear.php"  >Выйти</a>
					
					<?php endif; ?></li>
					
					<?/*php
					switch ($_SESSION['usertype_id']){
						case 2:
							echo ("вы учитель!!! ");
							echo ($_SESSION['usertype_id']);
							echo ("<input class=\"button_green\" type=\"submit\" style=\"width:200px\" value=\"Создать группу\"/");
							break;
					}*/
					?>
				</ul>
			</nav>
		</div>
		
		<div id="main">
		<h1>Панель администратора</h1>
		    <div id="content">
			<div id="admin_zayavki">
			<h3>Заявки на обучение</h3>
			<table class="table table-striped table-bordered table-hover"  style="margin: 0 auto;" width="50%">
				<tr>
				<th>ФИО</th>
				<th>Школа</th>
				<th>Класс</th>
				<!--<th>Почта</th>
				<th>Телефон</th>
				
				<th>Статус</th>-->
				<th>Удалить</th>
				<th>Определить в группу</th>
				</tr>
							<?php
							
							$result_set = mysql_query("SELECT * FROM students WHERE `active` = '0' ");
							
								$name_school = mysql_query("SELECT name FROM schools WHERE `id`= '$school_id'");
								$ns = mysql_fetch_array($name_school);
							while ($result = mysql_fetch_array($result_set)) {
								
								$school_id = $result["school_id"];
								$name_school = mysql_query("SELECT name FROM schools WHERE `id`= '$school_id'");
								$ns = mysql_fetch_array($name_school);
								echo "<tr><form method=\"POST\">";
								echo "<td>".$result["fio"]."</td>";
							
								echo   "<td>".$ns["name"]."</td>";
								echo   "<td>".$result["grade"]."</td>";
								//echo   "<td>".$result["email"]."</td>";
								//echo   "<td>".$result["phone"]."</td>";
								
								//echo   "<td>".$result["active"]."</td>";
								echo "<td><input  type=\"submit\" method=\"post\" name=\"del\" value= \"удалить\" /></td></form>";
								
								echo "<td><form class=\"form-horizontal\" method=\"post\" >";
								echo "<select name=\"groups_id\" size=\"1\">";
								//через селект вытаскиваем названия группы используя айдишник, а так же фильтруем,
								//тоесть выводим только не закрытые группы со значением ноль.
										$groups_id = mysql_query("SELECT * FROM groups WHERE `closed` = '0' ");
											while ($group = mysql_fetch_array($groups_id)) {
												echo "<option select value =".$group["id"].">".$group['name']."";
												
												 
												}
								
								echo "</select><input  name=\"action\" type=\"submit\" style=\"width:auto\" value=\"ok\" /></td>";
								
								//echo "<td><input class=\"button_green\" name=\"action\" type=\"submit\" style=\"width:auto\" value=".$result["id"]." /></form></td>";
								
								echo "</tr>";
							}
							?>
							
							</table>
									<?php
							
							if( isset( $_POST['action'] ) ){
								$idishnikGroup = $_POST['groups_id'];
								$idishnikStudent = $_POST['action'];
								action($idishnikGroup,$idishnikStudent);
							}	
							if( isset( $_POST['del'] ) )
								{
									//$id = $result["id"];
									$delete = mysql_query ("DELETE FROM `students` WHERE `id` = ".$_POST["del"]);
								}
								
							?>
						</div>
						<div id="addUser" >
						<h3>Добавление нового пользователя</h3>
					<form  name="adduser" method="post" action="" >
						<table>
							<p>name
							<input type="text" autocomplete="off" name="name"/></p>
							
						
						
							<p>lastname
							<input type="text" autocomplete="off" name="lastname"/></p>
							
						
						
							<p>Pass
							<input type="password" autocomplete="off" name="pass"/>
							</p>
						
							<p>E-mail
							<input type="text" autocomplete="off" name="email"/>
							</p>
						
							
						
							
							Тип
							
								<select name="usertypeList" size="1">
									<?php
									//через селект вытаскиваем тип по айди
										$usertype_id = mysql_query("SELECT * FROM usertypes ");
										while ($result = mysql_fetch_array($usertype_id)) {
											echo "<option select value =".$result["id"].">".$result['type']."";	
										}
									?>
								</select>
							
						
						
						
							<input type="submit" name="adduser" value="adduser" />
							<?php
							if (isset($_POST["adduser"])){
								
								//$success = adduser($_POST["login"], $_POST["pass"], $_POST["email"],$_POST["nametype"]);
								//echo "вящарыщуаощшуфыао";
								$name = $_POST['name'];
								$lastname = $_POST['lastname'];
								$login = $name." ".$lastname;
								echo ($login);
								$pass = $_POST['pass'];
								$email = $_POST['email'];
								$usertypeList = $_POST['usertypeList'];
								$sql = mysql_query("INSERT INTO `users` (`name`, `pass` , `email` ,	`usertype_id`) VALUES ('$login', '$pass', '$email', '$usertypeList') ");
								echo mysql_error();
								//Вызываем окно с затенённым фоном, для того чтобы пользователь нажал на 
								echo "<div id = \"parent_div\">
										  <div id = \"div\">
											<p>Вы успешно добавили нового пользователя</p>
											<a href=\"main.php\">Перейти</a>
										  </div>
										</div>";
							}
							
								
							
						?>
						</table>
						</div>
						</form>
								
									
						</div>
						
                        
                    </td>                
                </tr>
                <tr>
                    <td class="bottom" colspan="3">©any</td>
                </tr>
            </tbody></table>
			
			
			</div>
		
				
			</div>	
		
		</div>
		
		<div id="footer">Copyright © 1999 – 2015 Институт математики и компьютерных наук.<br> Дальневосточный Федеральный Университет<br>
		<?php if (empty($_SESSION['name'])): ?> <a href="admin/index.php">Войти</a><?php endif; ?>				
		</div>
	</div>
</body>
</html>