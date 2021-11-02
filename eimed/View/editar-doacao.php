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
    <title> Editar Local de Doação </title>
</head>
<body>
    <?php
    //connection
    include_once '../Model/db-connect.php';

    //select
    if(isset($_GET['id'])):
        $id = mysqli_escape_string($connect, $_GET['id']);

        //selecting the desired information
        $sql = "SELECT * FROM donations WHERE id = '$id'";
        $resultado = mysqli_query($connect, $sql);
        $dateDonations = mysqli_fetch_array($resultado);
    endif;
    ?>
    <div class="row">
        <div class="col s12 m6 push-m3">
            <!-- title     -->
            <h3 class="light center"> Editar Local de Doação </h3>
            <form action="../Controller/update-donations.php" method="post">
                <h6 class="light"> <strong> Dados Gerais </strong> </h6>
                <input type="hidden" name="id" value="<?php echo $dateDonations['id'];?>">
                <!-- input name -->
                <div class="input-field col s12">
                    <input type="text" name="donations_name" value="<?php echo $dateDonations['donations_name'];?>" id="donations_name" required>
                    <label for="donations_name"> Nome da Local de Doação </label>
                </div>
                <!-- input type -->
                <div class="input-field col s12">
                    <input type="text" name="donations_type" value="<?php echo $dateDonations['donations_type'];?>" id="donations_type" required>
                    <label for="donations_type"> Tipo de Doação </label>
                </div>
                <!-- input image -->
                <div class="input-field col s12">
                    <input type="text" name="donations_image" value="<?php echo $dateDonations['donations_image'];?>" id="donations_image" required>
                    <label for="donations_image"> Link da Foto </label>
                </div>
                <h6 class="light"> <strong> Endereço </strong> </h6>
                <!-- input street -->
                <div class="input-field col s6">
                    <input type="text" name="donations_address_street" value="<?php echo $dateDonations['donations_address_street'];?>" id="donations_address_street" required>
                    <label for="donations_address_street"> Rua </label>
                </div>
                <!-- input number -->
                <div class="input-field col s2">
                    <input type="number" name="donations_address_number" value="<?php echo $dateDonations['donations_address_number'];?>" id="donations_address_number">
                    <label for="donations_address_number"> Número </label>
                </div>
                <!-- input complementary -->
                <div class="input-field col s4">
                    <input type="text" name="donations_address_complementary" value="<?php echo $dateDonations['donations_address_complementary'];?>" id="donations_address_complementary" required>
                    <label for="donations_address_complementary"> Complemento </label>
                </div>
                <!-- input district -->
                <div class="input-field col s4">
                    <input type="text" name="donations_address_district" value="<?php echo $dateDonations['donations_address_district'];?>" id="donations_address_district" required>
                    <label for="donations_address_district"> Bairro </label>
                </div>
                <!-- input city -->
                <div class="input-field col s4">
                    <input type="text" name="donations_address_city" value="<?php echo $dateDonations['donations_address_city'];?>" id="donations_address_city" required>
                    <label for="donations_address_city"> Cidade </label>
                </div>
                <!-- input state -->
                <div class="input-field col s4">
                    <input type="text" name="donations_address_state" value="<?php echo $dateDonations['donations_address_state'];?>" id="donations_address_state" required>
                    <label for="donations_address_state"> Estado </label>
                </div>
                <h6 class="light"> <strong> Informações Complementares </strong> </h6>
                <!-- input office hours -->
                <div class="input-field col s6">
                    <input type="text" name="donations_office_hours" value="<?php echo $dateDonations['donations_office_hours'];?>" id="donations_office_hours" required>
                    <label for="donations_office_hours"> Horário de Funcionamento </label>
                </div>
                <!-- input contact -->
                <div class="input-field col s6">
                    <input type="text" name="donations_contact" value="<?php echo $dateDonations['donations_contact'];?>" id="donations_contact" required>
                    <label for="donations_contact"> Contato </label>
                </div>
                <!-- input description -->
                <div class="input-field col s12">
                    <input type="text" name="donations_description" value="<?php echo $dateDonations['donations_description'];?>" id="donations_description" required>
                    <label for="donations_description"> Descrição do Local </label>
                </div>
                <!-- buttons -->
                <button type="submit" name="btn-editar-donations" class="btn right"> Atualizar </button>
                <a href="./doacoes.php" class="btn green right"> Lista de Locais de Doação </a>
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