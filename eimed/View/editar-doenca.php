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
    <title> Editar Doença </title>
</head>
<body>
    <?php
    //connection
    include_once '../Model/db-connect.php';

    //select
    if(isset($_GET['id'])):
        $id = mysqli_escape_string($connect, $_GET['id']);

        //selecting the desired information
        $sql = "SELECT * FROM illness WHERE id = '$id'";
        $resultado = mysqli_query($connect, $sql);
        $dateIllness = mysqli_fetch_array($resultado);
    endif;
    ?>
    <div class="row">
        <div class="col s12 m6 push-m3">
            <!-- title -->
            <h3 class="light center"> Editar Doença </h3>
            <form action="../Controller/update-illness.php" method="post">
                <input type="hidden" name="id" value="<?php echo $dateIllness['id'];?>">
                <!-- input name -->
                <div class="input-field col s12">
                    <input type="text" name="illness_name" value="<?php echo $dateIllness['illness_name'];?>" id="illness_name" required>
                    <label for="illness_name"> Nome da Doença </label>
                </div>
                <!-- input resume -->
                <div class="input-field col s12">
                    <input type="text" name="illness_resume" value="<?php echo $dateIllness['illness_resume'];?>" id="illness_resume" required>
                    <label for="illness_resume"> De quê se trata a doença? </label>
                </div>
                <!-- input symptoms -->
                <div class="input-field col s12">
                    <input type="text" name="symptoms" value="<?php echo $dateIllness['symptoms'];?>" id="symptoms" required>
                    <label for="symptoms"> Sintomas </label>
                </div>
                <!-- input causes -->
                <div class="input-field col s12">
                    <input type="text" name="causes" value="<?php echo $dateIllness['causes'];?>" id="causes" required>
                    <label for="causes"> Causas </label>
                </div>
                <!-- input image -->
                <div class="input-field col s12">
                    <input type="text" name="illness_image" value="<?php echo $dateIllness['illness_image'];?>" id="illness_image" require>
                    <label for="illness_image"> Link da Imagem </label>
                </div>
                <!-- buttons -->
                <button type="submit" name="btn-editar-illness" class="btn right"> Atualizar </button>
                <a href="./emergencias.php" class="btn green right"> Lista de Doenças </a>
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