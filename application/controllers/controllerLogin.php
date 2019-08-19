<?php

class ControllerLogin extends Controller
{

	function actionIndex()
	{
		//$data["login_status"] = "";
		session_start();
		$this->model = new ModelLogin();

		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password =$_POST['password'];

			$info = $this->model->GetLogin($login, $password);

			$row = mysqli_fetch_array($info, MYSQLI_ASSOC);
				if(($login == $row["login"]) && ($password == $row["password"])){
					$role = $row["role_id"];
					$fun_delete = $row["delete_u"];
					$fun_create = $row["create_u"];
					$fun_read = $row["read_u"];
					$fun_edit = $row["edit_u"];
					$data["login_status"] = "access_granted";

					$_SESSION['admin'] = $password;//сохранение пароля логина роли и т.д
					$_SESSION['login'] = $login;
					$_SESSION['role'] = $role;

					$_SESSION['fun_delete'] = $fun_delete;
					$_SESSION['fun_create'] = $fun_create;
					$_SESSION['fun_read'] = $fun_read;
					$_SESSION['fun_edit'] = $fun_edit;

					header('Location:/user/');//header('Location:/admin/');
				}
				else{
					$data["login_status"] = "access_denied";
				}
		}
		else
		{
			$data["login_status"] = "";
		}
		$this->view->generate('loginView.php', 'templateView.php', $data);

	}
}
