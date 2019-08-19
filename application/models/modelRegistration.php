<?php

class ModelRegistration extends Model
{
	public static function CreateUser($last_name, $first_name, $login, $password, $description, $address, $date_b){

    $connection = mysqli_connect("localhost", "root", "");
    $select_db = mysqli_select_db($connection,'appusers');
    mysqli_query($connection, "SET CHARACTER SET 'utf8'");

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
