<?php

class ControllerLogin extends Controller
{

	function __construct()
	{
		//session_start();
		$this->model = new ModelLogin();
		//$this->view = new View();
	}

	function actionIndex(){
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
