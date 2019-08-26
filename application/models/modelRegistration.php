<?php
include($_SERVER['DOCUMENT_ROOT'] . "/application/core/Db.php");

class ModelRegistration extends Model
{

	public static function CreateUser($last_name, $first_name, $login, $password, $description, $address, $date_b){
		$connection = OpenCon();
		$query = "INSERT INTO userinfo (last_name, first_name, login, password, description, address, date_b)
		VALUES ('$last_name', '$first_name', '$login', '$password', '$description', '$address', '$date_b')";
    $result = mysqli_query($connection, $query);
    if($result){
    	$smsg="Добавление прошло успешно";
    	echo $smsg;
    }
    else {
    	$fsmsg="Ошибка";
    }
	}
	
	public static function GetLogin($login, $password){
    $connection = OpenCon();
    //выборка необходимых данных и связывание таблиц
    $query = "SELECT  userinfo.first_name, userinfo.date_b, userinfo.login, userinfo.password, userinfo.description, userinfo.address, userinfo.role_id,
    fun_permission.delete_u, fun_permission.create_u, fun_permission.read_u, fun_permission.edit_u  FROM userinfo
    INNER JOIN role ON userinfo.role_id = role.id
    INNER JOIN permission ON role.id = permission.id_role
    INNER JOIN fun_permission ON permission.id = fun_permission.permission_id
    WHERE (login = '$login') AND (password = '$password')";
    $result=mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    return $result;
  }


}
