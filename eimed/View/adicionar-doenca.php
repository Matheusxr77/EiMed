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
    <title> Adicionar Doença </title>
</head>
<body>
    <!-- register new news -->
    <div class="row">
        <div class="col s12 m6 push-m3">
            <!-- title -->
            <h3 class="light center"> Adicionar Doença </h3>
            <form action="../Model/create-illness.php" method="post">
                <!-- input name -->
                <div class="input-field col s12">
                    <input type="text" name="illness_name" id="illness_name" required>
                    <label for="illness_name"> Nome da Doença </label>
                </div>
                <!-- input resume -->
                <div class="input-field col s12">
                    <input type="text" name="illness_resume" id="illness_resume" required>
                    <label for="illness_resume"> De quê se trata a doença? </label>
                </div>
                <!-- input symptoms -->
                <div class="input-field col s12">
                    <input type="text" name="symptoms" id="symptoms" required>
                    <label for="symptoms"> Sintomas </label>
                </div>
                <!-- input causes -->
                <div class="input-field col s12">
                    <input type="text" name="causes" id="causes" required>
                    <label for="causes"> Causas </label>
                </div>
                <!-- input image -->
                <div class="input-field col s12">
                    <input type="text" name="illness_image" id="illness_image" require>
                    <label for="illness_image"> Link da Imagem </label>
                </div>
                <!-- buttons -->
                <button type="submit" name="btn-cadastrar-illness" class="btn right"> Cadastrar </button>
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