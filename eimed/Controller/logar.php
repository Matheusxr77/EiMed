<?php
session_start();

require_once '../Model/db-connect.php';
require_once 'user.php';

//validation of entered data
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
    //calling classes
    $criarUsuario = new User();
    
    //receive form data
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    //routes
    if($criarUsuario->login($email, $password) == true){
        if(isset($_SESSION['id'])){
            header("Location: index.php");
        }
        else {
            header("Location: ../View/login.php");
        }
    }
    else {
        header("Location: ../View/login.php");
    }
}
else {
    header("Location: ../View/login.php");
}
?>