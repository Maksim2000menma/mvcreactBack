<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Тест</title>
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />

		<script src="/js/react.development.js"></script>
    <script src="/js/react-dom.development.js"></script>
    <script src="/js/babel.min.js"></script>
    <script src="/js/script.jsx" type="text/babel"></script><!--text/babel - показываем что текст нужно интерпретировать-->


		<!-- <script src="/node_modules/antd/dist/antd.js" type="text/babel"></script>
		<link rel="stylesheet" type="text/css" href="/node_modules/antd/dist/antd.css" /> -->

	</head>
	<body>
		<div id="wrapper" class="container">
			<div class="row" style="padding:40px;">

				 <div class="col-md-5">
					<?php if($_SESSION['login'] == ''){?>
						<a class="in_coll" href="/registration">Регистрация</a>
						<a class="in_coll" href="/login">Авторизация</a>
					<?php } else { ?>
						<div style="display:inline-block;">
							<p class="in_coll" style="margin:0px;">Привет&nbsp;<b><?php echo $_SESSION['login'];?></b>&nbsp;,</p>
							<p class="in_coll" style="margin:0px;">не забудь свой пароль - "<?php echo $_SESSION['admin'];?>"</p>
							<p class="in_coll" style="margin:0px;">твоя роль - <b><?php
							switch ($_SESSION['role']) {
								case 1:
									echo 'Зарегистрированный пользователь';
									break;
								case 2:
										echo 'Модератор';
										break;
								case 3:
										echo 'Админ';
										break;
							}
							 ?></b></p>
						</div>
							<br>
							<a href="/user" style="color:green;">Панель управления</a>
							<a href="/logout">Выход</a>
					<?php }?>
				</div>

				<div  class="col-md-7" id="menu" style="text-align:right;">
					 <!-- <div class="in_row_menu">
						<a href="/" class="big_size">Главная</a>
					</div>

					<div class="in_row_menu">
						<a href="/services" class="big_size">Ознакомление</a>
					</div>

					<div class="in_row_menu">
						<a href="/list" class="big_size">Список</a>
					</div> -->
				</div>

		</div>
<br>
			<div class="row">
				<div style="padding: 20px 40px 0 40px;" class="col-md-12">
					<div id="content">
						<div class="box">
							<?php include 'application/views/'.$content_view; ?>
						</div>
					<br class="clearfix" />
					</div>
				<br class="clearfix" />
			</div>
		</div>


		<div id="footer">
			<hr>
			<p>Скромный подвал)</p>
		</div>

		</div>
	</body>
</html>
