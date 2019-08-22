<?php

class ModelUser extends Model
{
	public static function GetInfo(){
		$connection = mysqli_connect("localhost", "root", "");
		$select_db = mysqli_select_db($connection,'appusers');
		mysqli_query($connection, "SET CHARACTER SET 'utf8'");
		$query = "SELECT userinfo.id, userinfo.last_name, userinfo.first_name, userinfo.login, userinfo.password, role.role_name FROM userinfo
		INNER JOIN role ON userinfo.role_id = role.id ORDER BY userinfo.id;";

		$result=mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
		return $result;
	}


	public static function GetInfoId($id){
		$connection = mysqli_connect("localhost", "root", "");
		$select_db = mysqli_select_db($connection,'appusers');
		mysqli_query($connection, "SET CHARACTER SET 'utf8'");
		$query = "SELECT * FROM userinfo WHERE id='$id';";

		$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
		return $result;
	}


	public static function UpdateInfo($id, $last_name, $first_name, $date_b, $login, $password, $description, $address, $role_id){
		$connection = mysqli_connect("localhost", "root", "");
		$select_db = mysqli_select_db($connection,'appusers');
		mysqli_query($connection, "SET CHARACTER SET 'utf8'");
		$query = "UPDATE userinfo SET first_name='$first_name', last_name='$last_name', date_b='$date_b', login='$login', password='$password', description='$description',address='$address', role_id='$role_id' WHERE id='$id';";

		$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
		return $result;
	}


	public static function DeleteInfo($id){
		$connection = mysqli_connect("localhost", "root", "");
    $select_db = mysqli_select_db($connection,'appusers');
    mysqli_query($connection, "SET CHARACTER SET 'utf8'");
		$query ="DELETE FROM userinfo WHERE id = '$id'";

		$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
		return $result;
	}


	public static function CreateInfo($last_name, $first_name, $login, $password, $description, $address, $date_b, $role_id){
    $connection = mysqli_connect("localhost", "root", "");
    $select_db = mysqli_select_db($connection,'appusers');
    mysqli_query($connection, "SET CHARACTER SET 'utf8'");

    			$query = "INSERT INTO userinfo (last_name, first_name, login, password, description, address, date_b, role_id) VALUES ('$last_name', '$first_name', '$login', '$password', '$description', '$address', '$date_b', '$role_id')";
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
