<?php
//include 'Db.php';
include($_SERVER['DOCUMENT_ROOT'] . "/application/core/Db.php");
class ModelList extends Model
{

	public static function GetInfo(){

		$connection = OpenCon();

		$result=mysqli_query($connection, "SELECT * FROM userinfo;");
		//$row=mysqli_fetch_array($result);

		return $result;
	}

}
