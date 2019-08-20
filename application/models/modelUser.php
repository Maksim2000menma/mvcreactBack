<?php

class ModelUser extends Model
{
	public static function GetInfo(){
		$connection = mysqli_connect("localhost", "root", "");
		$select_db = mysqli_select_db($connection,'appusers');
		mysqli_query($connection, "SET CHARACTER SET 'utf8'");

		$result=mysqli_query($connection, "SELECT * FROM userinfo;");
		return $result;
	}


	public static function GetInfoId($id){
		$connection = mysqli_connect("localhost", "root", "");
		$select_db = mysqli_select_db($connection,'appusers');
		mysqli_query($connection, "SET CHARACTER SET 'utf8'");

		$result=mysqli_query($connection, "SELECT * FROM userinfo WHERE id='$id';");
		return $result;
	}


	public static function UpdateInfo($id, $last_name, $first_name, $date_b, $login, $password, $role_id){
		$connection = mysqli_connect("localhost", "root", "");
		$select_db = mysqli_select_db($connection,'appusers');
		mysqli_query($connection, "SET CHARACTER SET 'utf8'");

		$result=mysqli_query($connection, "UPDATE userinfo SET first_name='$first_name', last_name='$last_name', date_b='$date_b', login='$login', password='$password', role_id='$role_id' WHERE id='$id';");
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


	public static function CreateInfo($last_name, $first_name, $login, $password, $description, $address, $date_b){
    $connection = mysqli_connect("localhost", "root", "");
    $select_db = mysqli_select_db($connection,'appusers');
    mysqli_query($connection, "SET CHARACTER SET 'utf8'");

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
