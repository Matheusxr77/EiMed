<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//processing received data
if(isset($_POST['btn-editar-donations'])):
    $donations_name = mysqli_escape_string($connect, $_POST['donations_name']);
    $donations_type = mysqli_escape_string($connect, $_POST['donations_type']);
    $donations_image = mysqli_escape_string($connect, $_POST['donations_image']);
    $donations_address_street = mysqli_escape_string($connect, $_POST['donations_address_street']);
    $donations_address_number = mysqli_escape_string($connect, $_POST['donations_address_number']);
    $donations_address_complementary = mysqli_escape_string($connect, $_POST['donations_address_complementary']);
    $donations_address_district = mysqli_escape_string($connect, $_POST['donations_address_district']);
    $donations_address_city = mysqli_escape_string($connect, $_POST['donations_address_city']);
    $donations_address_state = mysqli_escape_string($connect, $_POST['donations_address_state']);
    $donations_description = mysqli_escape_string($connect, $_POST['donations_description']);
    $donations_contact = mysqli_escape_string($connect, $_POST['donations_contact']);
    $donations_office_hours = mysqli_escape_string($connect, $_POST['donations_office_hours']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    //changing form information in the database
    $sql = "UPDATE `donations` SET `donations_name` = '$donations_name', `donations_type` = '$donations_type', `donations_image` = '$donations_image', `donations_address_street` = '$donations_address_street', `donations_address_number` = '$donations_address_number', `donations_address_complementary` = '$donations_address_complementary', `donations_address_district` = '$donations_address_district', `donations_address_city` = '$donations_address_city', `donations_address_state` = '$donations_address_state', `donations_description` = '$donations_description', `donations_contact` = '$donations_contact', `donations_office_hours` = '$donations_office_hours' WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-donations'] = "atualizado com sucesso!";
        header('Location: ../View/doacoes.php');
    else:
        $_SESSION['message-donations'] = "erro ao atualizar!";
        header('Location: ../View/doacoes.php');
    endif;
endif;
?>