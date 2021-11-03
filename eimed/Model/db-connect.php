<?php
session_start();

//connection
$servername = 'localhost';
$username = 'root';
$password = 'root';
$db_name = 'eimed';

//connection global variable
$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, "utf8");

//connection erro
if(mysqli_connect_error()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;
?>
