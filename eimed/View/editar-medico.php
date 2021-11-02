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
    <title> Editar Médico </title>
</head>
<body>
    <?php
    //connection
    include_once '../Model/db-connect.php';

    //select
    if(isset($_GET['id'])):
        $id = mysqli_escape_string($connect, $_GET['id']);

        //selecting the desired information
        $sql = "SELECT * FROM doctor WHERE id = '$id'";
        $resultado = mysqli_query($connect, $sql);
        $dateDoctor = mysqli_fetch_array($resultado);
    endif;
    ?>
    <div class="row">
        <div class="col s12 m6 push-m3">
            <!-- title -->
            <h3 class="light center"> Editar Médico </h3>
            <form action="../Controller/update-doctor.php" method="post">
                <h6 class="light"> <strong> Dados do Profissional </strong> </h6>
                <input type="hidden" name="id" value="<?php echo $dateDoctor['id'];?>">
                <!-- input name -->
                <div class="input-field col s12">
                    <input type="text" name="doctor_name" value="<?php echo $dateDoctor['doctor_name'];?>" id="doctor_name" required>
                    <label for="doctor_name"> Nome do Médico </label>
                </div>
                <!-- input crm -->
                <div class="input-field col s6">
                    <input type="number" name="crm" value="<?php echo $dateDoctor['crm'];?>" id="crm" required>
                    <label for="crm"> Número do CRM </label>
                </div>
                <!-- input rqe -->
                <div class="input-field col s6">
                    <input type="number" name="rqe" value="<?php echo $dateDoctor['rqe'];?>" id="rqe" required>
                    <label for="rqe"> Número do RQE  </label>
                </div>
                <!-- input specialty -->
                <div class="input-field col s12">
                    <input type="text" name="specialty" value="<?php echo $dateDoctor['specialty'];?>" id="specialty" required>
                    <label for="specialty"> Especialidades </label>
                </div>
                <!-- input image -->
                <div class="input-field col s12">
                    <input type="text" name="doctor_image" value="<?php echo $dateDoctor['doctor_image'];?>" id="doctor_image" required>
                    <label for="doctor_image"> Link da Foto </label>
                </div>
                <h6 class="light"> <strong> Endereço </strong> </h6>
                <!-- input street -->
                <div class="input-field col s6">
                    <input type="text" name="doctor_address_street" value="<?php echo $dateDoctor['doctor_address_street'];?>" id="doctor_address_street" required>
                    <label for="doctor_address_street"> Rua </label>
                </div>
                <!-- input number -->
                <div class="input-field col s2">
                    <input type="number" name="doctor_address_number" value="<?php echo $dateDoctor['doctor_address_number'];?>" id="doctor_address_number">
                    <label for="doctor_address_number"> Número </label>
                </div>
                <!-- input complementary -->
                <div class="input-field col s4">
                    <input type="text" name="doctor_address_complementary" value="<?php echo $dateDoctor['doctor_address_complementary'];?>" id="doctor_address_complementary" required>
                    <label for="doctor_address_complementary"> Complemento </label>
                </div>
                <!-- input district -->
                <div class="input-field col s4">
                    <input type="text" name="doctor_address_district" value="<?php echo $dateDoctor['doctor_address_district'];?>" id="doctor_address_district" required>
                    <label for="doctor_address_district"> Bairro </label>
                </div>
                <!-- input city -->
                <div class="input-field col s4">
                    <input type="text" name="doctor_address_city" value="<?php echo $dateDoctor['doctor_address_city'];?>" id="doctor_address_city" required>
                    <label for="doctor_address_city"> Cidade </label>
                </div>
                <!-- input state -->
                <div class="input-field col s4">
                    <input type="text" name="doctor_address_state" value="<?php echo $dateDoctor['doctor_address_state'];?>" id="doctor_address_state" required>
                    <label for="doctor_address_state"> Estado </label>
                </div>
                <h6 class="light"> <strong> Informações Complementares </strong> </h6>
                <!-- input contact -->
                <div class="input-field col s12">
                    <input type="text" name="doctor_contact" value="<?php echo $dateDoctor['doctor_contact'];?>" id="doctor_contact" required>
                    <label for="doctor_contact"> Contato </label>
                </div>
                <!-- input description -->
                <div class="input-field col s12">
                    <input type="text" name="doctor_description" value="<?php echo $dateDoctor['doctor_description'];?>" id="doctor_description" required>
                    <label for="doctor_description"> Descrição Profissional </label>
                </div>
                <!-- buttons -->
                <button type="submit" name="btn-editar-doctor" class="btn right"> Atualizar </button>
                <a href="./especialidades.php" class="btn green right"> Lista de Médicos </a>
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