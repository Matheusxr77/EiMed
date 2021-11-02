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
if(isset($_POST['btn-cadastrar-accident'])):
    $accident_name = clear($_POST['accident_name']);
    $first_aid = clear($_POST['first_aid']);
    $accident_image = clear($_POST['accident_image']);
    $causes = clear($_POST['causes']);
    $illness_image = clear($_POST['illness_image']);

    //entering the form information into the database
    $sql = "INSERT INTO `accident` (`accident_name`, `first_aid`, `accident_image`) 
    VALUES ('$accident_name', '$first_aid', '$accident_image')";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-accident'] = "acidente cadastrado com sucesso!";
        header('Location: ../View/emergencias.php');
    else:
        $_SESSION['message-accident'] = "erro ao cadastrar o acidente!";
        header('Location: ../View/emergencias.php');
    endif;
endif;
?>