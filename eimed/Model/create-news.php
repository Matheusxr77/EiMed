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
if(isset($_POST['btn-cadastrar-news'])):
    $newsname = clear($_POST['newsname']);
    $caption = clear($_POST['caption']);
    $datePublication = clear($_POST['datePublication']);
    $author = clear($_POST['author']);
    $placeOccurrence = clear($_POST['placeOccurrence']);
    $newsImage = clear($_POST['newsImage']);
    $content = clear($_POST['content']);
    $source = clear($_POST['source']);

    //entering the form information into the database
    $sql = "INSERT INTO `news` (`newsname`, `caption`, `datePublication`, `author`, `placeOccurrence`, `newsImage`, `content`, `source`) 
    VALUES ('$newsname', '$caption', '$datePublication', '$author', '$placeOccurrence', '$newsImage', '$content', '$source')";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-depositions'] = "feedback cadastrado com sucesso!";
        header('Location: ../View/noticias.php');
    else:
        $_SESSION['message-depositions'] = "erro ao cadastrar o feedback!";
        header('Location: ../View/noticias.php');
    endif;
endif;
?>