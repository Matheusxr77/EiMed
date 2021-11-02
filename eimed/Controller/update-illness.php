<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//processing received data
if(isset($_POST['btn-editar-illness'])):
    $illness_name = mysqli_escape_string($connect, $_POST['illness_name']);
    $illness_resume = mysqli_escape_string($connect, $_POST['illness_resume']);
    $symptoms = mysqli_escape_string($connect, $_POST['symptoms']);
    $causes = mysqli_escape_string($connect, $_POST['causes']);
    $illness_image = mysqli_escape_string($connect, $_POST['illness_image']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    //changing form information in the database
    $sql = "UPDATE `illness` SET `illness_name` = '$illness_name', `illness_resume` = '$illness_resume', `symptoms` = '$symptoms', `causes` = '$causes', `illness_image` = '$illness_image' WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-illness'] = "atualizado com sucesso!";
        header('Location: ../View/emergencias.php');
    else:
        $_SESSION['message-illness'] = "erro ao atualizar!";
        header('Location: ../View/emergencias.php');
    endif;
endif;
?>