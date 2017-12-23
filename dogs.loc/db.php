<?php
      require_once 'libs/rb.php'; //конектим красный боб 
      require_once 'setting.php'; //конектим конфиг
   R::setup( 'mysql:host='.$config['db']['server'].';dbname='.$config['db']['name'],$config['db']['username'],$config['db']['password']);
   session_start();
//Если авторизация в MYSQL удалась не выводим ничего. Иначе объявляем краш
@mysqli_query($connection,"SET NAMES 'utf8';");
@mysqli_query($connection,"SET CHARACTER SET 'utf8';");
@mysqli_query($connection,"SET SESSION collation_connection = 'utf8_general_ci';");
?>