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
    <title> Editar Notícias </title>
</head>
<body>
    <?php
    //connection
    include_once '../Model/db-connect.php';

    //select
    if(isset($_GET['id'])):
        $id = mysqli_escape_string($connect, $_GET['id']);

        //selecting the desired information
        $sql = "SELECT * FROM news WHERE id = '$id'";
        $resultado = mysqli_query($connect, $sql);
        $dateNews = mysqli_fetch_array($resultado);
    endif;
    ?>
    <div class="row">
        <div class="col s12 m6 push-m3">
            <!-- title     -->
            <h3 class="light center"> Editar Cliente </h3>
            <form action="../Controller/update-news.php" method="post">
                <input type="hidden" name="id" value="<?php echo $dateNews['id'];?>">
                <!-- input name -->
                <div class="input-field col s12">
                    <input type="text" name="newsname" value="<?php echo $dateNews['newsname'];?>" id="newsname" required>
                    <label for="newsname"> Título da Notícia </label>
                </div>
                <!-- input caption -->
                <div class="input-field col s12">
                    <input type="text" name="caption" value="<?php echo $dateNews['caption'];?>" id="caption" required>
                    <label for="caption"> Subtítulo </label>
                </div>
                <!-- input place occurrence -->
                <div class="input-field col s12">
                    <input type="text" name="placeOccurrence" value="<?php echo $dateNews['placeOccurrence'];?>" id="placeOccurrence" required>
                    <label for="placeOccurrence"> Local da Ocorrência </label>
                </div>
                <!-- input content -->
                <div class="input-field col s12">
                    <input type="text" name="content" value="<?php echo $dateNews['content'];?>" id="content" required>
                    <label for="content"> Conteúdo </label>
                </div>
                <!-- input date publication -->
                <div class="input-field col s5">
                    <input type="date" name="datePublication" value="<?php echo $dateNews['datePublication'];?>" id="datePublication" required>
                    <label for="datePublication"> Data de Publicação </label>
                </div>
                <!-- input author -->
                <div class="input-field col s7">
                    <input type="text" name="author" value="<?php echo $dateNews['author'];?>" id="author" required>
                    <label for="author"> Autor </label>
                </div>
                <!-- input source -->
                <div class="input-field col s12">
                    <input type="text" name="source" value="<?php echo $dateNews['source'];?>" id="source" required>
                    <label for="source"> Fonte </label>
                </div>
                <!-- input image -->
                <div class="input-field col s12">
                    <input type="text" name="newsImage" value="<?php echo $dateNews['newsImage'];?>" id="newsImage" require>
                    <label for="newsImage"> Link da Imagem </label>
                </div>
                <!-- buttons -->
                <button type="submit" name="btn-editar-news" class="btn right"> Atualizar </button>
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