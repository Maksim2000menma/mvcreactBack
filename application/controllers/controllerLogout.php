<?php

class ControllerLogout extends Controller{

  function actionIndex()
	{
		session_start();
		session_destroy();//удаление всех данных из сессии при выходе
		header('Location:/main/');
	}
}
