<?php

class ControllerStatic extends Controller
{

	function actionIndex()
	{
		session_start();

		$this->view->generate('staticView.php', 'templateView.php');
	}
}
