<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//receiving the data to delete
if(isset($_POST['btn-deletar-donations'])):
    $id = mysqli_escape_string($connect, $_POST['id']);

    //selecting the desired information
    $sql = "DELETE FROM `donations` WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-donations'] = "deletado com sucesso!";
        header('Location: ../View/doacoes.php');
    else:
        $_SESSION['message-donations'] = "erro ao deletar!";
        header('Location: ../View/doacoes.php');
    endif;
endif;
?>