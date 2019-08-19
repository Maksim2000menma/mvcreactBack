<?php

class ControllerMain extends Controller
{

	function actionIndex()
	{
		if(!isset($_SESSION))
    {
			session_start();
		}

		$this->view->generate('mainView.php', 'templateView.php');
	}
}
