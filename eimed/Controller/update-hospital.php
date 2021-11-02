<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//processing received data
if(isset($_POST['btn-editar-hospital'])):
    $hospital_cnpj = mysqli_escape_string($connect, $_POST['hospital_cnpj']);
    $hospital_name = mysqli_escape_string($connect, $_POST['hospital_name']);
    $hospital_specialty = mysqli_escape_string($connect, $_POST['hospital_specialty']);
    $hospital_image = mysqli_escape_string($connect, $_POST['hospital_image']);
    $hospital_address_street = mysqli_escape_string($connect, $_POST['hospital_address_street']);
    $hospital_address_number = mysqli_escape_string($connect, $_POST['hospital_address_number']);
    $hospital_address_complementary = mysqli_escape_string($connect, $_POST['hospital_address_complementary']);
    $hospital_address_district = mysqli_escape_string($connect, $_POST['hospital_address_district']);
    $hospital_address_city = mysqli_escape_string($connect, $_POST['hospital_address_city']);
    $hospital_address_state = mysqli_escape_string($connect, $_POST['hospital_address_state']);
    $hospital_description = mysqli_escape_string($connect, $_POST['hospital_description']);
    $hospital_contact = mysqli_escape_string($connect, $_POST['hospital_contact']);
    $hospital_office_hours = mysqli_escape_string($connect, $_POST['hospital_office_hours']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    //changing form information in the database
    $sql = "UPDATE `hospital` SET `hospital_cnpj` = '$hospital_cnpj', `hospital_name` = '$hospital_name', `hospital_specialty` = '$hospital_specialty', `hospital_image` = '$hospital_image', `hospital_address_street` = '$hospital_address_street', `hospital_address_number` = '$hospital_address_number', `hospital_address_complementary` = '$hospital_address_complementary', `hospital_address_district` = '$hospital_address_district', `hospital_address_city` = '$hospital_address_city', `hospital_address_state` = '$hospital_address_state', `hospital_description` = '$hospital_description', `hospital_contact` = '$hospital_contact', `hospital_office_hours` = '$hospital_office_hours' WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-hospital'] = "atualizado com sucesso!";
        header('Location: ../View/especialidades.php');
    else:
        $_SESSION['message-hospital'] = "erro ao atualizar!";
        header('Location: ../View/especialidades.php');
    endif;
endif;
?>