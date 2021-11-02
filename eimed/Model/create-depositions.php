<?php
//session
session_start();

//connection
require_once './db-connect.php';

//clear
function clear($input) {
    global $connect;
    //sql
    $var = mysqli_escape_string($connect, $input);
    //xss
    $var = htmlspecialchars($var);
    return $var;
}

//processing received data
if(isset($_POST['btn-cadastrar-depositions'])):
    $depositionsName = clear($_POST['depositionsName']);
    $depositionsEmail = clear($_POST['depositionsEmail']);
    $depositionsSubject = clear($_POST['depositionsSubject']);
    $depositionsMessage = clear($_POST['depositionsMessage']);

    //entering the form information into the database  
    $sql = "INSERT INTO `depositions` (`depositionsName`, `depositionsEmail`, `depositionsSubject`, `depositionsMessage`) 
    VALUES ('$depositionsName', '$depositionsEmail', '$depositionsSubject', '$depositionsMessage')";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-depositions'] = "feedback cadastrado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['message-depositions'] = "erro ao cadastrar o feedback!";
        header('Location: ../index.php');
    endif;
endif;
?>