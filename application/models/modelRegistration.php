<?php
include($_SERVER['DOCUMENT_ROOT'] . "/application/core/Db.php");

class ModelRegistration extends Model
{
	public static function CreateUser($last_name, $first_name, $login, $password, $description, $address, $date_b){
		$connection = OpenCon();

    			//$last_name = $_POST['last_name'];

    			$query = "INSERT INTO userinfo (last_name, first_name, login, password, description, address, date_b) VALUES ('$last_name', '$first_name', '$login', '$password', '$description', '$address', '$date_b')";
    			$result = mysqli_query($connection, $query);

    			if($result){
    				$smsg="Добавление прошло успешно";
    			echo $smsg;
    		}
    		else {
    			$fsmsg="Ошибка";
    		}

	}

}
