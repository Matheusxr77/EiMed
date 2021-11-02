<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//receiving the data to delete
if(isset($_POST['btn-deletar-accident'])):
    $id = mysqli_escape_string($connect, $_POST['id']);

    //selecting the desired information
    $sql = "DELETE FROM `accident` WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-illness'] = "deletado com sucesso!";
        header('Location: ../View/emergencias.php');
    else:
        $_SESSION['message-illness'] = "erro ao deletar!";
        header('Location: ../View/emergencias.php');
    endif;
endif;
?>