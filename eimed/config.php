<?php 
	session_start();
	$autoload = function($class){
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH', 'http://localhost/eimed/');
	define('HOST', 'localhost');
	define('DATABASE', 'eimed');
	define('USER', 'root');
	define('PASSWORD', 'suehtamxr77');

 ?>