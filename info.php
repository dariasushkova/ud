<?php
error_reporting(E_ERROR);
session_start();
include("/server/connectMysql.php");
include("/server/function.php");
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
					<li class="menu_holder"><a ><div>Информация</div></a>
						<div>
							<ul>
								<li><a href="info.php">О мастер-классах</a></li>
								<li><a href="prep_list.php">Список преподавателей</a></li>
							</ul>
						</div>
					</li>
					<li ><a href="list_group.php"><div>Учебная часть</div></a></li>
					<li><a href="anketa.php"><div>Анкета</div></a></li>
					<li><?php if (isset($_SESSION['name'])): ?> <p>Здравствуйте, <?=$_SESSION['name']?><br>
					<a href="admin_panel.php"  >Панель</a>
					<a href="clear.php"  >Выйти</a>
					
					<?php endif; ?></li>
				
				</ul>
			</nav>
		</div>
		
		<div id="main">
		    <div id="content">
				<form id="info">
				<p style="text-indent: 20px;"align="justify">Набор учащихся 7-11 классов производится по результатам летней школы, школьных олимпиад различного уровня, а также по рекомендациям школьных преподавателей после собеседования. При поступлении на курсы происходит проверка уровня подготовки потенциального участника, после чего его определяют в одну из трех ступеней:</p>
<table id="info_table"  class="table table-hover">
<tr>
	<tr>
		<th>Подготовительная</th>
		<td><p style="text-indent: 20px;"align="justify">Данная ступень является обязательной. В группу попадают неподготовленные участники, не имеющие никакой начальной базы по программированию. На протяжение всего курса ребята изучают простейшие команды на языках Basic Pascal и С++, проходят типы переменных, основные понятия программирования и прочее, необходимое для дальнейшей работы. Практические занятия в основном имеют форму решения задач олимпиадного типа в системе проверки заданий CATS. Полностью закончив данный курс, участники проходят тестирование, после чего руководитель принимает решение о переводе участников в следующую ступень.
		</p></td>
	</tr>

	<tr>
		<th>Начальная</th>
		<td><p style="text-indent: 20px;"align="justify">
		Данный курс включает изучение следующих разделов:
		<li>язык (ветвления, циклы, работа с файлами, среды разработки);</li>
		<li>функции, рекурсия;</li>
		<li>перебор; </li>
		<li>сортировка, поиск, кучи (сортировки обменом, пузырьком, вставками, быстрая сортировка, сортировка слиянием, куча, сортировка с помощью кучи, бинарный поиск);</li>
		<li>геометрические алгоритмы (точки, прямые, отрезки, их взаимное расположение, многоугольники и связанные с ними задачи);</li>
		<li>комбинаторика (основные понятия, генерация комбинаторных объектов);</li>
		<li>структуры данных, динамическая память, записи (связные списки, деревья, их реализация в статически выделенной памяти);</li>
		<li>жадные алгоритмы;</li>
		<li>динамическое программирование;</li>
		<li>графы (основные понятия, представление графа в памяти, обход в глубину, обход в ширину, связные компоненты)</li>
		</p>
		</td>
	</tr>
	<tr>
		<th>Высшая</th>
		<td><p style="text-indent: 20px;"align="justify">На данной ступени обучаются уже состоявшиеся программисты, прошедшие предыдущие две ступени подготовки. Учебная программа состоит из сложных задач, составленных либо преподавательским составом кафедры, либо заимствованных из различных олимпиад и чемпионатов по программированию. Обучающиеся в этой ступени студенты участвуют в олимпиадах высшего уровня (всероссийские, международные). 
		</p></td>
	</tr>
</tr>
</table>
<p style="text-indent: 20px;" align="justify">
Помимо мастер-классов по программированию и летней школы в Дальневосточном Федеральном университете существует малая академия юных программистов, предназначенная для школьников. Набор учащихся 7-11 классов производится по желанию учащихся, а также по рекомендациям школьных преподавателей после собеседования. В отличие от мастер-класса, при обучении делается упор на основные понятия программирования, не требующие значительной предварительной подготовки. В качестве базового языка используется Python. Практические занятия в основном имеют форму разработки интерактивных программ.
</p>
<p style="text-indent: 20px;" align="justify">
	Расписание занятий<br>

Занятия проводятся:<br>

в начальной и высшей ступени: по субботам, с 15:00 до 18:00,<br>
в подготовительной ступени: по субботам, с 15:00 до 18:00,<br>
Корпус D, ауд. 733, 733а, 734, 734а.
</p>
							</form>
			</div>	
		</div>
		
		<div id="footer">Copyright © 1999 – 2015 Институт математики и компьютерных наук.<br> Дальневосточный Федеральный Университет
		</div>
	</div>
</body>
</html>