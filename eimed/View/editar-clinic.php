<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- icons -->
    <link rel="icon" href="../Public/images/icon.png">
    <!-- css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title> Editar Clínica </title>
</head>
<body>
    <?php
    //connection
    include_once '../Model/db-connect.php';

    //select
    if(isset($_GET['id'])):
        $id = mysqli_escape_string($connect, $_GET['id']);

        //selecting the desired information
        $sql = "SELECT * FROM clinic WHERE id = '$id'";
        $resultado = mysqli_query($connect, $sql);
        $dateClinic = mysqli_fetch_array($resultado);
    endif;
    ?>
    <div class="row">
        <div class="col s12 m6 push-m3">
            <!-- title -->
            <h3 class="light center"> Editar Clínica </h3>
            <form action="../Controller/update-clinic.php" method="post">
                <h6 class="light"> <strong> Dados Gerais </strong> </h6>
                <input type="hidden" name="id" value="<?php echo $dateClinic['id'];?>">
                <!-- input name -->
                <div class="input-field col s12">
                    <input type="text" name="clinic_name" value="<?php echo $dateClinic['clinic_name'];?>" id="clinic_name" required>
                    <label for="clinic_name"> Nome da Clínica </label>
                </div>
                <!-- input cnpj -->
                <div class="input-field col s12">
                    <input type="text" name="clinic_cnpj" value="<?php echo $dateClinic['clinic_cnpj'];?>" id="clinic_cnpj" required>
                    <label for="clinic_cnpj"> Número do CNPJ </label>
                </div>
                <!-- input specialty -->
                <div class="input-field col s12">
                    <input type="text" name="clinic_specialty" value="<?php echo $dateClinic['clinic_specialty'];?>" id="clinic_specialty" required>
                    <label for="clinic_specialty"> Especialidades da Clínica </label>
                </div>
                <!-- input image -->
                <div class="input-field col s12">
                    <input type="text" name="clinic_image" value="<?php echo $dateClinic['clinic_image'];?>" id="clinic_image" required>
                    <label for="clinic_image"> Link da Foto </label>
                </div>
                <h6 class="light"> <strong> Endereço </strong> </h6>
                <!-- input street -->
                <div class="input-field col s6">
                    <input type="text" name="clinic_address_street" value="<?php echo $dateClinic['clinic_address_street'];?>" id="clinic_address_street" required>
                    <label for="clinic_address_street"> Rua </label>
                </div>
                <!-- input number -->
                <div class="input-field col s2">
                    <input type="number" name="clinic_address_number" value="<?php echo $dateClinic['clinic_address_number'];?>" id="clinic_address_number">
                    <label for="clinic_address_number"> Número </label>
                </div>
                <!-- input complementary -->
                <div class="input-field col s4">
                    <input type="text" name="clinic_address_complementary" value="<?php echo $dateClinic['clinic_address_complementary'];?>" id="clinic_address_complementary" required>
                    <label for="clinic_address_complementary"> Complemento </label>
                </div>
                <!-- input district -->
                <div class="input-field col s4">
                    <input type="text" name="clinic_address_district" value="<?php echo $dateClinic['clinic_address_district'];?>" id="clinic_address_district" required>
                    <label for="clinic_address_district"> Bairro </label>
                </div>
                <!-- input city -->
                <div class="input-field col s4">
                    <input type="text" name="clinic_address_city" value="<?php echo $dateClinic['clinic_address_city'];?>" id="clinic_address_city" required>
                    <label for="clinic_address_city"> Cidade </label>
                </div>
                <!-- input state -->
                <div class="input-field col s4">
                    <input type="text" name="clinic_address_state" value="<?php echo $dateClinic['clinic_address_state'];?>" id="clinic_address_state" required>
                    <label for="clinic_address_state"> Estado </label>
                </div>
                <h6 class="light"> <strong> Informações Complementares </strong> </h6>
                <!-- input office hours -->
                <div class="input-field col s6">
                    <input type="text" name="clinic_office_hours" value="<?php echo $dateClinic['clinic_office_hours'];?>" id="clinic_office_hours" required>
                    <label for="clinic_office_hours"> Horário de Funcionamento </label>
                </div>
                <!-- input contact -->
                <div class="input-field col s6">
                    <input type="text" name="clinic_contact" value="<?php echo $dateClinic['clinic_contact'];?>" id="clinic_contact" required>
                    <label for="clinic_contact"> Contato </label>
                </div>
                <!-- input description -->
                <div class="input-field col s12">
                    <input type="text" name="clinic_description" value="<?php echo $dateClinic['clinic_description'];?>" id="clinic_description" required>
                    <label for="clinic_description"> Descrição do Local </label>
                </div>
                <!-- buttons -->
                <button type="submit" name="btn-editar-clinic" class="btn right"> Atualizar </button>
                <a href="./especialidades.php" class="btn green right"> Lista de Clínicas </a>
            </form>
        </div>
    </div>
    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        //message
        M.AutoInit();
    </script>
</body>
</html>