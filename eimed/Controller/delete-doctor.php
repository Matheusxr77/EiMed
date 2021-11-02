<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//receiving the data to delete
if(isset($_POST['btn-deletar-doctor'])):
    $id = mysqli_escape_string($connect, $_POST['id']);

    //selecting the desired information
    $sql = "DELETE FROM `doctor` WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-doctor'] = "deletado com sucesso!";
        header('Location: ../View/especialidades.php');
    else:
        $_SESSION['message-doctor'] = "erro ao deletar!";
        header('Location: ../View/especialidades.php');
    endif;
endif;
?>