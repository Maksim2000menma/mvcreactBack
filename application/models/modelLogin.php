<?php

class ModelLogin extends Model
{

  public static function GetLogin($login, $password){
    $connection = mysqli_connect("localhost", "root", "");
    $select_db = mysqli_select_db($connection,'appusers');
    mysqli_query($connection, "SET CHARACTER SET 'utf8'");

    //$result=mysqli_query($connection, "SELECT * FROM userinfo WHERE (login = '$login') AND (password = '$password')");
//выборка необходимых данных и связывание таблиц
    $result=mysqli_query($connection,
      "SELECT  userinfo.first_name, userinfo.date_b, userinfo.login, userinfo.password, userinfo.description, userinfo.address, userinfo.role_id,
      fun_permission.delete_u, fun_permission.create_u, fun_permission.read_u, fun_permission.edit_u  FROM userinfo
      INNER JOIN role ON userinfo.role_id = role.id
      INNER JOIN permission ON role.id = permission.id_role
      INNER JOIN fun_permission ON permission.id = fun_permission.permission_id
      WHERE (login = '$login') AND (password = '$password')");


    return $result;
  }

}
