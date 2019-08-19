<?php

class Controller404 extends Controller
{

	function actionIndex()
	{
		session_start();

		$this->view->generate('404View.php', 'templateView.php');
	}

}
