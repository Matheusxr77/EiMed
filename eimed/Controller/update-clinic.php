<?php
//session
session_start();

//connection
require_once '../Model/db-connect.php';

//processing received data
if(isset($_POST['btn-editar-clinic'])):
    $clinic_cnpj = mysqli_escape_string($connect, $_POST['clinic_cnpj']);
    $clinic_name = mysqli_escape_string($connect, $_POST['clinic_name']);
    $clinic_specialty = mysqli_escape_string($connect, $_POST['clinic_specialty']);
    $clinic_image = mysqli_escape_string($connect, $_POST['clinic_image']);
    $clinic_address_street = mysqli_escape_string($connect, $_POST['clinic_address_street']);
    $clinic_address_number = mysqli_escape_string($connect, $_POST['clinic_address_number']);
    $clinic_address_complementary = mysqli_escape_string($connect, $_POST['clinic_address_complementary']);
    $clinic_address_district = mysqli_escape_string($connect, $_POST['clinic_address_district']);
    $clinic_address_city = mysqli_escape_string($connect, $_POST['clinic_address_city']);
    $clinic_address_state = mysqli_escape_string($connect, $_POST['clinic_address_state']);
    $clinic_description = mysqli_escape_string($connect, $_POST['clinic_description']);
    $clinic_contact = mysqli_escape_string($connect, $_POST['clinic_contact']);
    $clinic_office_hours = mysqli_escape_string($connect, $_POST['clinic_office_hours']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    //changing form information in the database
    $sql = "UPDATE `clinic` SET `clinic_cnpj` = '$clinic_cnpj', `clinic_name` = '$clinic_name', `clinic_specialty` = '$clinic_specialty', `clinic_image` = '$clinic_image', `clinic_address_street` = '$clinic_address_street', `clinic_address_number` = '$clinic_address_number', `clinic_address_complementary` = '$clinic_address_complementary', `clinic_address_district` = '$clinic_address_district', `clinic_address_city` = '$clinic_address_city', `clinic_address_state` = '$clinic_address_state', `clinic_description` = '$clinic_description', `clinic_contact` = '$clinic_contact', `clinic_office_hours` = '$clinic_office_hours' WHERE `id` = '$id'";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-clinic'] = "atualizado com sucesso!";
        header('Location: ../View/especialidades.php');
    else:
        $_SESSION['message-clinic'] = "erro ao atualizar!";
        header('Location: ../View/especialidades.php');
    endif;
endif;
?>