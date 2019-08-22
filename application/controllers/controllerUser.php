<?php

class ControllerUser extends Controller
{
	function __construct()
	{
		//session_start();
		$this->model = new ModelUser();
		$this->view = new View();
	}

	function actionIndex(){
			$data = $this->model->GetInfo();
			 $rows = array();
			 while($r = mysqli_fetch_assoc($data)) {
	    	$rows[] = $r;
			 }
			 print_r(json_encode($rows));
	}

	function actionEdit(){
		$url = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://';//получение url ccskrb
		$url = $url . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		preg_match("/[^\/]+$/", $url, $matches);//получение последнего символа в url
		$last_word = $matches[0];

	  $inputData = file_get_contents('php://input');//получение данных из front-end
		$dataFront = json_decode($inputData, true);//формирование ассоциативного массива
		//print_r($dataFront['submitapp']);
				if(isset($dataFront['submitapp'])){
					$id = $dataFront['id'];
					$last_name = $dataFront['last_name'];
					$first_name = $dataFront['first_name'];
					$date_b = $dataFront['date_b'];
					$login = $dataFront['login'];
					$description = $dataFront['description'];
					$address = $dataFront['address'];
					$password = $dataFront['password'];
					$role_id = $dataFront['role_id'];
					$data = $this->model->UpdateInfo($id, $last_name, $first_name , $date_b, $login, $password, $description, $address, $role_id);
					print_r(json_encode($data));
				}
				else{
					$data = $this->model->GetInfoId($dataFront['id']);
					print_r(json_encode($data));
				}
	}

	function actionDelete(){
		$url = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://';//получение url ccskrb
		$url = $url . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		preg_match("/[^\/]+$/", $url, $matches);//получение последнего символа в url
		$last_word = $matches[0];
		$data = $this->model->DeleteInfo($last_word);
		print_r(json_encode($data));
	}

	function actionAllinfo(){
			$url = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://';//получение url ccskrb
			$url = $url . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			preg_match("/[^\/]+$/", $url, $matches);//получение последнего символа в url
			$last_word = $matches[0];

			$data = $this->model->GetInfoId($last_word);
			$rows = array();
			while($r = mysqli_fetch_assoc($data)) {
				$rows[] = $r;
			}
			print_r(json_encode($rows));
			//print_r(mysqli_fetch_assoc($data));

	}

	function actionCreate(){
			if ($_SESSION['fun_create'] == 1){
					if(isset($_POST['submitadd'])){
						$last_name = $_POST['last_name'];
						$first_name = $_POST['first_name'];
						$login = $_POST['login'];
						$password = $_POST['password'];
						$description = $_POST['description'];
						$address = $_POST['address'];
						$date_b = $_POST['date_b'];

						$this->model->CreateInfo($last_name, $first_name, $login, $password, $description, $address, $date_b);
						header('Location:/user/');
					}
					$this->view->generate('createView.php', 'templateView.php');
				}
				else {
						Route::ErrorPage404();
				}
}







}
