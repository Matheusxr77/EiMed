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
if(isset($_POST['btn-cadastrar-hospital'])):
    $hospital_cnpj = clear($_POST['hospital_cnpj']);
    $hospital_name = clear($_POST['hospital_name']);
    $hospital_specialty = clear($_POST['hospital_specialty']);
    $hospital_image = clear($_POST['hospital_image']);
    $hospital_address_street = clear($_POST['hospital_address_street']);
    $hospital_address_number = clear($_POST['hospital_address_number']);
    $hospital_address_complementary = clear($_POST['hospital_address_complementary']);
    $hospital_address_district = clear($_POST['hospital_address_district']);
    $hospital_address_city = clear($_POST['hospital_address_city']);
    $hospital_address_state = clear($_POST['hospital_address_state']);
    $hospital_description = clear($_POST['hospital_description']);
    $hospital_contact = clear($_POST['hospital_contact']);
    $hospital_office_hours = clear($_POST['hospital_office_hours']);

    //entering the form information into the database
    $sql = "INSERT INTO `hospital` (`hospital_cnpj`, `hospital_name`, `hospital_specialty`, `hospital_image`, `hospital_address_street`, `hospital_address_number`, `hospital_address_complementary`, `hospital_address_district`, `hospital_address_city`, `hospital_address_state`, `hospital_description`, `hospital_contact`, `hospital_office_hours`) 
    VALUES ('$hospital_cnpj', '$hospital_name', '$hospital_specialty', '$hospital_image', '$hospital_address_street', '$hospital_address_number', '$hospital_address_complementary', '$hospital_address_district', '$hospital_address_city', '$hospital_address_state', '$hospital_description', '$hospital_contact', '$hospital_office_hours')";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-depositions'] = "feedback cadastrado com sucesso!";
        header('Location: ../View/especialidades.php');
    else:
        $_SESSION['message-depositions'] = "erro ao cadastrar o feedback!";
        header('Location: ../View/especialidades.php');
    endif;
endif;
?>