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
if(isset($_POST['btn-cadastrar-illness'])):
    $illness_name = clear($_POST['illness_name']);
    $illness_resume = clear($_POST['illness_resume']);
    $symptoms = clear($_POST['symptoms']);
    $causes = clear($_POST['causes']);
    $illness_image = clear($_POST['illness_image']);

    //entering the form information into the database
    $sql = "INSERT INTO `illness` (`illness_name`, `illness_resume`, `symptoms`, `causes`, `illness_image`) 
    VALUES ('$illness_name', '$illness_resume', '$symptoms', '$causes', '$illness_image')";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-depositions'] = "feedback cadastrado com sucesso!";
        header('Location: ../View/emergencias.php');
    else:
        $_SESSION['message-depositions'] = "erro ao cadastrar o feedback!";
        header('Location: ../View/emergencias.php');
    endif;
endif;
?>