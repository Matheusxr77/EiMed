<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//receiving the data to delete
if(isset($_POST['btn-deletar-hospital'])):
    $id = mysqli_escape_string($connect, $_POST['id']);

    //selecting the desired information
    $sql = "DELETE FROM `hospital` WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-hospital'] = "deletado com sucesso!";
        header('Location: ../View/especialidades.php');
    else:
        $_SESSION['message-hospital'] = "erro ao deletar!";
        header('Location: ../View/especialidades.php');
    endif;
endif;
?>