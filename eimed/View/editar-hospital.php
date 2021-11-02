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
    <title> Editar Hospital </title>
</head>
<body>
    <?php
    //connection
    include_once '../Model/db-connect.php';

    //select
    if(isset($_GET['id'])):
        $id = mysqli_escape_string($connect, $_GET['id']);

        //selecting the desired information
        $sql = "SELECT * FROM hospital WHERE id = '$id'";
        $resultado = mysqli_query($connect, $sql);
        $dateHospital = mysqli_fetch_array($resultado);
    endif;
    ?>
    <div class="row">
        <div class="col s12 m6 push-m3">
            <!-- title -->
            <h3 class="light center"> Editar Hospital </h3>
            <form action="../Controller/update-hospital.php" method="post">
                <h6 class="light"> <strong> Dados Gerais </strong> </h6>
                <input type="hidden" name="id" value="<?php echo $dateHospital['id'];?>">
                <!-- input name -->
                <div class="input-field col s12">
                    <input type="text" name="hospital_name" value="<?php echo $dateHospital['hospital_name'];?>" id="hospital_name" required>
                    <label for="hospital_name"> Nome do Hospital </label>
                </div>
                <!-- input cnpj -->
                <div class="input-field col s12">
                    <input type="text" name="hospital_cnpj" value="<?php echo $dateHospital['hospital_cnpj'];?>" id="hospital_cnpj" required>
                    <label for="hospital_cnpj"> Número do CNPJ </label>
                </div>
                <!-- input specialty -->
                <div class="input-field col s12">
                    <input type="text" name="hospital_specialty" value="<?php echo $dateHospital['hospital_specialty'];?>" id="hospital_specialty" required>
                    <label for="hospital_specialty"> Especialidades do Hospital </label>
                </div>
                <!-- input image -->
                <div class="input-field col s12">
                    <input type="text" name="hospital_image" value="<?php echo $dateHospital['hospital_image'];?>" id="hospital_image" required>
                    <label for="hospital_image"> Link da Foto </label>
                </div>
                <h6 class="light"> <strong> Endereço </strong> </h6>
                <!-- input street -->
                <div class="input-field col s6">
                    <input type="text" name="hospital_address_street" value="<?php echo $dateHospital['hospital_address_street'];?>" id="hospital_address_street" required>
                    <label for="hospital_address_street"> Rua </label>
                </div>
                <!-- input number -->
                <div class="input-field col s2">
                    <input type="number" name="hospital_address_number" value="<?php echo $dateHospital['hospital_address_number'];?>" id="hospital_address_number">
                    <label for="hospital_address_number"> Número </label>
                </div>
                <!-- input complementary -->
                <div class="input-field col s4">
                    <input type="text" name="hospital_address_complementary" value="<?php echo $dateHospital['hospital_address_complementary'];?>" id="hospital_address_complementary" required>
                    <label for="hospital_address_complementary"> Complemento </label>
                </div>
                <!-- input district -->
                <div class="input-field col s4">
                    <input type="text" name="hospital_address_district" value="<?php echo $dateHospital['hospital_address_district'];?>" id="hospital_address_district" required>
                    <label for="hospital_address_district"> Bairro </label>
                </div>
                <!-- input city -->
                <div class="input-field col s4">
                    <input type="text" name="hospital_address_city" value="<?php echo $dateHospital['hospital_address_city'];?>" id="hospital_address_city" required>
                    <label for="hospital_address_city"> Cidade </label>
                </div>
                <!-- input state -->
                <div class="input-field col s4">
                    <input type="text" name="hospital_address_state" value="<?php echo $dateHospital['hospital_address_state'];?>" id="hospital_address_state" required>
                    <label for="hospital_address_state"> Estado </label>
                </div>
                <h6 class="light"> <strong> Informações Complementares </strong> </h6>
                <!-- input office hours -->
                <div class="input-field col s6">
                    <input type="text" name="hospital_office_hours" value="<?php echo $dateHospital['hospital_office_hours'];?>" id="hospital_office_hours" required>
                    <label for="hospital_office_hours"> Horário de Funcionamento </label>
                </div>
                <!-- input contact -->
                <div class="input-field col s6">
                    <input type="text" name="hospital_contact" value="<?php echo $dateHospital['hospital_contact'];?>" id="hospital_contact" required>
                    <label for="hospital_contact"> Contato </label>
                </div>
                <!-- input description -->
                <div class="input-field col s12">
                    <input type="text" name="hospital_description" value="<?php echo $dateHospital['hospital_description'];?>" id="hospital_description" required>
                    <label for="hospital_description"> Descrição do Local </label>
                </div>
                <!-- buttons -->
                <button type="submit" name="btn-editar-hospital" class="btn right"> Atualizar </button>
                <a href="./especialidades.php" class="btn green right"> Lista de Hospitais </a>
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