<?php

// подключаем файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';


require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор


error_reporting(E_ALL);

//function for normal display error..(debag)
function debag($str){
  echo "<pre>";
  var_dump ($str); //info about $str
  echo "</pre>";
  exit;
}
