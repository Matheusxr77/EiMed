<?php 
	session_start();
	$autoload = function($class){
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH', 'http://localhost/EiMed/eimed/main');
	define('HOST', 'localhost');
	define('DATABASE', 'eimed');
	define('USER', 'root');
	define('PASSWORD', '');

 ?>