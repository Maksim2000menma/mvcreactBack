<?php
 //header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET');

class ControllerList extends Controller
{

	function __construct()
	{
		// session_start();

		$this->model = new ModelList();//подключение модели
		$this->view = new View();
	}

	function actionIndex()
	{
		$data = $this->model->GetInfo();
		$this->view->generate('listView.php', 'templateView.php', $data);
	}


	function actionTest()
	{
		$data = $this->model->GetInfo();
		 //return json_decode(print_r($data));

		 //$rest = print_r($data->fetch_array(MYSQLI_ASSOC));
		 //return json_encode($rest);

		 $rows = array();
		 while($r = mysqli_fetch_assoc($data)) {
    	$rows[] = $r;
		 }
		 print_r(json_encode($rows));


		 // while ($row = $data->fetch_assoc()) {
			//  print_r(json_encode($row));
			//   //print_r($row);
			// }

		  //print_r($data);

	}



}
