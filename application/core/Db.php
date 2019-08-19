<?php

class dbconnect{

  public function connect(){
    $connection = mysqli_connect("localhost", "root", "");
    $select_db = mysqli_select_db($connection,'appusers');
    mysqli_query($connection, "SET CHARACTER SET 'utf8'");

    return $connection;


}


}

?>
