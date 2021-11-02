<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//processing received data
if(isset($_POST['btn-editar-accident'])):
    $accident_name = mysqli_escape_string($connect, $_POST['accident_name']);
    $first_aid = mysqli_escape_string($connect, $_POST['first_aid']);
    $accident_image = mysqli_escape_string($connect, $_POST['accident_image']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    //changing form information in the database
    $sql = "UPDATE `accident` SET `accident_name` = '$accident_name', `first_aid` = '$first_aid', `accident_image` = '$accident_image' WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-accident'] = "atualizado com sucesso!";
        header('Location: ../View/emergencias.php');
    else:
        $_SESSION['message-accident'] = "erro ao atualizar!";
        header('Location: ../View/emergencias.php');
    endif;
endif;
?>