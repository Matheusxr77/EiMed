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
    <title> Adicionar Notícia </title>
</head>
<body>
    <!-- register new news -->
    <div class="row">
        <div class="col s12 m6 push-m3">
            <!-- title -->
            <h3 class="light center"> Adicionar Notícia </h3>
            <form action="../Model/create-news.php" method="post">
                <!-- input title -->
                <div class="input-field col s12">
                    <input type="text" name="newsname" id="newsname" required>
                    <label for="newsname"> Título da Notícia </label>
                </div>
                <!-- input caption -->
                <div class="input-field col s12">
                    <input type="text" name="caption" id="caption" required>
                    <label for="caption"> Subtítulo </label>
                </div>
                <!-- input place occurrence -->
                <div class="input-field col s12">
                    <input type="text" name="placeOccurrence" id="placeOccurrence" required>
                    <label for="placeOccurrence"> Local da Ocorrência  </label>
                </div>
                <!-- input content -->
                <div class="input-field col s12">
                    <input type="text" name="content" id="content" required>
                    <label for="content"> Conteúdo </label>
                </div>
                <!-- input date publication -->
                <div class="input-field col s5">
                    <input type="date" name="datePublication" id="datePublication" required>
                    <label for="datePublication"> Data de Publicação da Notícia </label>
                </div>
                <!-- input author -->
                <div class="input-field col s7">
                    <input type="text" name="author" id="author" required>
                    <label for="author"> Autor </label>
                </div>
                <!-- input source -->
                <div class="input-field col s12">
                    <input type="text" name="source" id="source" required>
                    <label for="source"> Fonte </label>
                </div>
                <!-- input image -->
                <div class="input-field col s12">
                    <input type="text" name="newsImage" id="newsImage" require>
                    <label for="newsImage"> Link da Imagem </label>
                </div>
                <!-- buttons -->
                <button type="submit" name="btn-cadastrar-news" class="btn right"> Cadastrar </button>
                <a href="./noticias.php" class="btn green right"> Lista de Notícias </a>
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