<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//processing received data
if(isset($_POST['btn-editar-news'])):
    $newsname = mysqli_escape_string($connect, $_POST['newsname']);
    $caption = mysqli_escape_string($connect, $_POST['caption']);
    $datePublication = mysqli_escape_string($connect, $_POST['datePublication']);
    $author = mysqli_escape_string($connect, $_POST['author']);
    $placeOccurrence = mysqli_escape_string($connect, $_POST['placeOccurrence']);
    $newsImage = mysqli_escape_string($connect, $_POST['newsImage']);
    $content = mysqli_escape_string($connect, $_POST['content']);
    $source = mysqli_escape_string($connect, $_POST['source']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    //changing form information in the database
    $sql = "UPDATE `news` SET `newsname` = '$newsname', `caption` = '$caption', `datePublication` = '$datePublication', `author` = '$author', `placeOccurrence` = '$placeOccurrence', `newsImage` = '$newsImage', `content` = '$content', `source` = '$source' WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-news'] = "atualizado com sucesso!";
        header('Location: ../View/noticias.php');
    else:
        $_SESSION['message-news'] = "erro ao atualizar!";
        header('Location: ../View/noticias.php');
    endif;
endif;
?>