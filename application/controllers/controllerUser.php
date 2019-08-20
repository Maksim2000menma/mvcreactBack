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
		//if ($_SESSION['fun_edit'] == 1){
		$url = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://';//получение url ccskrb
		$url = $url . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		preg_match("/[^\/]+$/", $url, $matches);//получение последнего символа в url
		$last_word = $matches[0];

		if(isset($_POST['submitapp'])){
			$id = $_POST['id'];
			$last_name = $_POST['last_name'];
			$first_name = $_POST['first_name'];
			$date_b = $_POST['date_b'];
			$login = $_POST['login'];
			$password = $_POST['password'];
			$role_id = $_POST['role_id'];

			$this->model->UpdateInfo($id, $last_name, $first_name , $date_b, $login, $password, $role_id);
			//header('Location:/user/');
			//$this->view->generate('editView.php', 'templateView.php');
		}
		else{
			$data = $this->model->GetInfoId($last_word);
			//$this->view->generate('editView.php', 'templateView.php',$data);
		}
	//}
	//else {
	//		Route::ErrorPage404();
	//}
	}

	function actionDelete(){
		$url = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://';//получение url ccskrb
		$url = $url . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		preg_match("/[^\/]+$/", $url, $matches);//получение последнего символа в url
		$last_word = $matches[0];

		$data = $this->model->DeleteInfo($last_word);
		//header('Location:/user/');
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
