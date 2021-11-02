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
if(isset($_POST['btn-cadastrar-clinic'])):
    $clinic_cnpj = clear($_POST['clinic_cnpj']);
    $clinic_name = clear($_POST['clinic_name']);
    $clinic_specialty = clear($_POST['clinic_specialty']);
    $clinic_image = clear($_POST['clinic_image']);
    $clinic_address_street = clear($_POST['clinic_address_street']);
    $clinic_address_number = clear($_POST['clinic_address_number']);
    $clinic_address_complementary = clear($_POST['clinic_address_complementary']);
    $clinic_address_district = clear($_POST['clinic_address_district']);
    $clinic_address_city = clear($_POST['clinic_address_city']);
    $clinic_address_state = clear($_POST['clinic_address_state']);
    $clinic_description = clear($_POST['clinic_description']);
    $clinic_contact = clear($_POST['clinic_contact']);
    $clinic_office_hours = clear($_POST['clinic_office_hours']);

    //entering the form information into the database
    $sql = "INSERT INTO `clinic` (`clinic_cnpj`, `clinic_name`, `clinic_specialty`, `clinic_image`, `clinic_address_street`, `clinic_address_number`, `clinic_address_complementary`, `clinic_address_district`, `clinic_address_city`, `clinic_address_state`, `clinic_description`, `clinic_contact`, `clinic_office_hours`) 
    VALUES ('$clinic_cnpj', '$clinic_name', '$clinic_specialty', '$clinic_image', '$clinic_address_street', '$clinic_address_number', '$clinic_address_complementary', '$clinic_address_district', '$clinic_address_city', '$clinic_address_state', '$clinic_description', '$clinic_contact', '$clinic_office_hours')";

    //routes
    if(mysqli_query($connect, $sql)):
        $_SESSION['message-clinic'] = "clínica cadastrada com sucesso!";
        header('Location: ../View/especialidades.php');
    else:
        $_SESSION['message-clinic'] = "erro ao cadastrar a clínica!";
        header('Location: ../View/especialidades.php');
    endif;
endif;
?>