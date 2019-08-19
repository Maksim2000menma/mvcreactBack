<?php

class ControllerRegistration extends Controller
{

	function __construct()
	{
		session_start();
		$this->model = new ModelRegistration();
		$this->view = new View();
	}

	function actionIndex()
	{
		//если нажата кнопка submit то отправить все в модель
		if(isset($_POST['submitadd'])){
			$last_name = $_POST['last_name'];
			$first_name = $_POST['first_name'];
			$login = $_POST['login'];
			$password = $_POST['password'];
			$description = $_POST['description'];
			$address = $_POST['address'];
			$date_b = $_POST['date_b'];

			$this->model->CreateUser($last_name, $first_name, $login, $password, $description, $address, $date_b);
			// header('Location:/list/');
			// var_dump($last_name, $first_name, $login, $password, $description, $address, $date_b);//вывод информации о переменной
		}

		// $this->view->generate('registrationView.php', 'templateView.php');
	}

	function actionTest(){
	// $this->view->generate('userView.php', 'templateView.php', $data);
	$dataJSON = file_get_contents('php://input');
	$json = json_decode($dataJSON, TRUE);
	foreach ($json as $key => $value){
	       file_put_contents('test.txt', PHP_EOL . "$key: $value\n", FILE_APPEND);
	   };
	   file_put_contents('test.txt', PHP_EOL . "------------------\n", FILE_APPEND);
	   file_put_contents('test.txt', PHP_EOL . "$json[last_name] \n", FILE_APPEND);
	   file_put_contents('test.txt', PHP_EOL . "------------------\n", FILE_APPEND);

		 $last_name = $json[last_name];
		 $first_name = $json[first_name];
		 $login = $json[login];
		 $password = $json[password];
		 $description = $json[description];
		 $address = $json[address];
		 $date_b = $json[date_b];

		 $this->model->CreateUser($last_name, $first_name, $login, $password, $description, $address, $date_b);


	}
}
