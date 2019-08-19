<?php
// namespace application\lib;
// class Db{
// 	public function __constructor(){
// 		$config = require 'application/core/Db.php';
// 		debag($config);
// 	}
// }


class Db{
	public static function getConnection(){
		// Здесь мы просто сэмулируем реальные данные -> дальше будет из бд
		$root = $_SERVER['DOCUMENT_ROOT'];//получение гкд конрня сайта

		$paramsPath = $root. '/application/core/Db.php';
		$params = include($paramsPath);

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        // Задаем кодировку
        $db->exec("set names utf8");
        return $db;
	}
}
?>
