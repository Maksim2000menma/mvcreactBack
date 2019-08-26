<?php

class ControllerRegistration extends Controller
{

	function __construct()
	{
		//session_start();
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
		}
	}

	function actionTest(){
	// $this->view->generate('userView.php', 'templateView.php', $data);
		$dataJSON = file_get_contents('php://input');
		$json = json_decode($dataJSON, TRUE);
		 $last_name = $json[last_name];
		 $first_name = $json[first_name];
		 $login = $json[login];
		 $password = $json[password];
		 $description = $json[description];
		 $address = $json[address];
		 $date_b = $json[date_b];
		 $this->model->CreateUser($last_name, $first_name, $login, $password, $description, $address, $date_b);
	 }


	function actionLogAfter(){
		$dataJSON = file_get_contents('php://input');
		$json = json_decode($dataJSON, TRUE);
		$login = $json[login];
		$password = $json[password];
		if($login && $password){
			$info = $this->model->GetLogin($login, $password);
			$row = mysqli_fetch_array($info, MYSQLI_ASSOC);

			if(($login == $row["login"]) && ($password == $row["password"])){
				$role = $row["role_id"];
				$fun_delete = $row["delete_u"];
				$fun_create = $row["create_u"];
				$fun_read = $row["read_u"];
				$fun_edit = $row["edit_u"];
				$login = $row["login"];
				$array = [$role, $fun_delete, $fun_create, $fun_read, $fun_edit, $login];
				print_r(json_encode($array));
			}
			else{
				$error = "error login!!! not data login and password";
				print_r(json_encode($error));
			}
		}
	}




	}
