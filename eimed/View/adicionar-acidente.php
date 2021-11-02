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
    <title> Adicionar Acidente </title>
</head>
<body>
    <!-- register new news -->
    <div class="row">
        <div class="col s12 m6 push-m3">
            <!-- title -->
            <h3 class="light center"> Adicionar Acidente </h3>
            <form action="../Model/create-accident.php" method="post">
                <!-- input name -->
                <div class="input-field col s12">
                    <input type="text" name="accident_name" id="accident_name" required>
                    <label for="accident_name"> Nome do Acidente </label>
                </div>
                <!-- input first aid -->
                <div class="input-field col s12">
                    <input type="text" name="first_aid" id="first_aid" required>
                    <label for="first_aid"> Formas de Primeiros-socorros </label>
                </div>
                <!-- input image -->
                <div class="input-field col s12">
                    <input type="text" name="accident_image" id="accident_image" require>
                    <label for="accident_image"> Link da Imagem </label>
                </div>
                <!-- buttons -->
                <button type="submit" name="btn-cadastrar-accident" class="btn right"> Cadastrar </button>
                <a href="./emergencias.php" class="btn green right"> Lista de Acidentes </a>
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