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
	}

	function actionCreate(){
			$dataJSON = file_get_contents('php://input');
			$json = json_decode($dataJSON, TRUE);

			 $last_name = $json[last_name];
			 $first_name = $json[first_name];
			 $login = $json[login];
			 $password = $json[password];
			 $description = $json[description];
			 $address = $json[address];
			 $date_b = $json[date_b];
			 $role_id = $json[role_id];

			 $this->model->CreateInfo($last_name, $first_name, $login, $password, $description, $address, $date_b, $role_id);
		}

}
