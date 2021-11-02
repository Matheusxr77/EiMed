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
if(isset($_POST['btn-cadastrar-doctor'])):
    $doctor_name = clear($_POST['doctor_name']);
    $crm = clear($_POST['crm']);
    $rqe = clear($_POST['rqe']);
    $specialty = clear($_POST['specialty']);
    $doctor_image = clear($_POST['doctor_image']);
    $doctor_address_street = clear($_POST['doctor_address_street']);
    $doctor_address_number = clear($_POST['doctor_address_number']);
    $doctor_address_complementary = clear($_POST['doctor_address_complementary']);
    $doctor_address_district = clear($_POST['doctor_address_district']);
    $doctor_address_city = clear($_POST['doctor_address_city']);
    $doctor_address_state = clear($_POST['doctor_address_state']);
    $doctor_contact = clear($_POST['doctor_contact']);
    $doctor_description = clear($_POST['doctor_description']);

    //entering the form information into the database
    $sql = "INSERT INTO `doctor` (`doctor_name`, `crm`, `rqe`, `specialty`, `doctor_image`, `doctor_address_street`, `doctor_address_number`, `doctor_address_complementary`, `doctor_address_district`, `doctor_address_city`, `doctor_address_state`, `doctor_contact`, `doctor_description`) 
    VALUES ('$doctor_name', '$crm', '$rqe', '$specialty', '$doctor_image', '$doctor_address_street', '$doctor_address_number', '$doctor_address_complementary', '$doctor_address_district', '$doctor_address_city', '$doctor_address_state', '$doctor_contact', '$doctor_description')";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-doctor'] = "médico cadastrado com sucesso!";
        header('Location: ../View/especialidades.php');
    else:
        $_SESSION['message-doctor'] = "erro ao cadastrar o médico!";
        header('Location: ../View/especialidades.php');
    endif;
endif;
?>