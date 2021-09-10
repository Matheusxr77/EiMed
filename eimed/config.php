<?php 
	session_start();
	$autoload = function($class){
		include('class/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH', 'http://localhost/EiMed/eimed/');
	define('HOST', 'localhost');
	define('DATABASE', 'eimed');
	define('USER', 'adabduser');
	define('PASSWORD', 'hightechsinuca1337');
 ?>