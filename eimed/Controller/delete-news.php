<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//receiving the data to delete
if(isset($_POST['btn-deletar-news'])):
    $id = mysqli_escape_string($connect, $_POST['id']);

    //selecting the desired information
    $sql = "DELETE FROM `news` WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-news'] = "deletado com sucesso!";
        header('Location: ../View/noticias.php');
    else:
        $_SESSION['message-news'] = "erro ao deletar!";
        header('Location: ../View/noticias.php');
    endif;
endif;
?>