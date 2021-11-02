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
if(isset($_POST['btn-cadastrar-donations'])):
    $donations_name = clear($_POST['donations_name']);
    $donations_type = clear($_POST['donations_type']);
    $donations_image = clear($_POST['donations_image']);
    $donations_address_street = clear($_POST['donations_address_street']);
    $donations_address_number = clear($_POST['donations_address_number']);
    $donations_address_complementary = clear($_POST['donations_address_complementary']);
    $donations_address_district = clear($_POST['donations_address_district']);
    $donations_address_city = clear($_POST['donations_address_city']);
    $donations_address_state = clear($_POST['donations_address_state']);
    $donations_description = clear($_POST['donations_description']);
    $donations_contact = clear($_POST['donations_contact']);
    $donations_office_hours = clear($_POST['donations_office_hours']);

    //entering the form information into the database
    $sql = "INSERT INTO `donations` (`donations_name`, `donations_type`, `donations_image`, `donations_address_street`, `donations_address_number`, `donations_address_complementary`, `donations_address_district`, `donations_address_city`, `donations_address_state`, `donations_description`, `donations_contact`, `donations_office_hours`) 
    VALUES ('$donations_name', '$donations_type', '$donations_image', '$donations_address_street', '$donations_address_number', '$donations_address_complementary', '$donations_address_district', '$donations_address_city', '$donations_address_state', '$donations_description', '$donations_contact', '$donations_office_hours')";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-depositions'] = "feedback cadastrado com sucesso!";
        header('Location: ../View/doacoes.php');
    else:
        $_SESSION['message-depositions'] = "erro ao cadastrar o feedback!";
        header('Location: ../View/doacoes.php');
    endif;
endif;
?>