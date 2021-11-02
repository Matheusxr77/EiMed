<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//processing received data
if(isset($_POST['btn-editar-doctor'])):
    $doctor_name = mysqli_escape_string($connect, $_POST['doctor_name']);
    $crm = mysqli_escape_string($connect, $_POST['crm']);
    $rqe = mysqli_escape_string($connect, $_POST['rqe']);
    $specialty = mysqli_escape_string($connect, $_POST['specialty']);
    $doctor_image = mysqli_escape_string($connect, $_POST['doctor_image']);
    $doctor_address_street = mysqli_escape_string($connect, $_POST['doctor_address_street']);
    $doctor_address_number = mysqli_escape_string($connect, $_POST['doctor_address_number']);
    $doctor_address_complementary = mysqli_escape_string($connect, $_POST['doctor_address_complementary']);
    $doctor_address_district = mysqli_escape_string($connect, $_POST['doctor_address_district']);
    $doctor_address_city = mysqli_escape_string($connect, $_POST['doctor_address_city']);
    $doctor_address_state = mysqli_escape_string($connect, $_POST['doctor_address_state']);
    $doctor_contact = mysqli_escape_string($connect, $_POST['doctor_contact']);
    $doctor_description = mysqli_escape_string($connect, $_POST['doctor_description']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    //changing form information in the database
    $sql = "UPDATE `doctor` SET `doctor_name` = '$doctor_name', `crm` = '$crm', `rqe` = '$rqe', `specialty` = '$specialty', `doctor_image` = '$doctor_image', `doctor_address_street` = '$doctor_address_street', `doctor_address_number` = '$doctor_address_number', `doctor_address_complementary` = '$doctor_address_complementary', `doctor_address_district` = '$doctor_address_district', `doctor_address_city` = '$doctor_address_city', `doctor_address_state` = '$doctor_address_state', `doctor_contact` = '$doctor_contact', `doctor_description` = '$doctor_description' WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-news'] = "atualizado com sucesso!";
        header('Location: ../View/especialidades.php');
    else:
        $_SESSION['message-news'] = "erro ao atualizar!";
        header('Location: ../View/especialidades.php');
    endif;
endif;
?>