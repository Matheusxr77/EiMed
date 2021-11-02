<!-- connection php -->
<?php
//connection database
include_once '../Model/db-connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- icons awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <!-- icons -->
    <link rel="icon" href="../Public/images/icon.png">
    <!-- css -->
    <link rel="stylesheet" href="../Public/css/materialize.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/media.css">
    <link rel="stylesheet" href="../Public/css/noticias.css">
    <!-- title of page -->
    <title> Notícias </title>
</head>
<body>
    <!-- header -->
    <header>
        <!-- lateral menu -->
        <ul class="side-nav" id="menu-mobile">
            <li><a href="../index.php"> Home </a></li>
            <li><a href="./especialidades.php"> Especialidades </a></li>
            <li><a href="./emergencias.php"> Emergências </a></li>
            <li><a href="./doacoes.php"> Doações </a></li>
            <li><a href="./noticias.php"> Notícias </a></li>
            <li><a href="./sobre.php"> Sobre </a></li>
            <li><a href="./login.php"> Login </a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="navbar z-depth-0">
                <div class="nav-wrapper container">
                    <!-- search engines -->
                    <h1 class="logo-text"> EiMed - Seu local de busca por saúde </h1>
                    <a href="../Public/images/logo.png"><img class="logo-img" src="../Public/images/logo.png" alt="Logo - EiMed"></a>
                    <!-- menu -->
                    <ul class="right light hide-on-med-and-down buttons">
                        <li><a href="../index.php"> Home </a></li>
                        <li><a href="./especialidades.php"> Especialidades </a></li>
                        <li><a href="./emergencias.php"> Emergências </a></li>
                        <li><a href="./doacoes.php"> Doações </a></li>
                        <li><a href="./noticias.php"> Notícias </a></li>
                        <li><a href="./sobre.php"> Sobre </a></li>
                        <li><a href="./login.php"> Login </a></li>
                    </ul>
                    <a href="#" data-activates="menu-mobile" class="button-collapse right"><i class="material-icons"> menu </i></a>
                </div>
            </nav>
        </div>
    </header>
    <!-- about -->
    <section class="about block">
        <div class="row container banner">
            <div class="col s12 center">
                <!-- title -->
                <h2 class="white-text"> EiMed também é informação! </h2>
                <p class="white-text light"> Sempre mantendo você, internauta, por dentro de tudo. </p>
                <!-- button -->
                <div class="row buttons">
                    <a href="#news" class="btn btn-large white black-text"> Notícias </a>
                </div>
            </div>
        </div>
    </section>
    <!-- news -->
    <section class="news block scrollspy" id="news">
        <div class="row container banner">
            <!-- title -->
            <div class="col s12 center">
                <h2 class="light"> Notícias </h2>
                <p class="light"> O EiMed, na busca por manter seus internautas antenados em todas as notícias sobre o cunhu da saúde traz para vocês a oportunidade de usufruir de algumas notícias pontuais que são de relevância para a comunidade, portanto, sinta-se a vontade para observar tudo e compartilhar com os amigos! </p>
            </div>
            <!-- search bar -->
            <form action="" class="input-field col s12">
                <input name="query" type="text">
                <label for="query"> Digite o nome da notícia que deseja pesquisar </label>
                <button type="submit" class="btn"> Buscar Notícia </button>
            </form><br>
            <?php
            //select table news
            $sql = "SELECT * FROM `news`";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado) > 0):
            //looping
            ?>
            <?php
                if (!isset($_GET['query'])) {
            ?>
            <?php
            } else {
                //search keys
                $search = $connect->real_escape_string($_GET['query']);
                $sql_code = "SELECT * FROM `news` WHERE `newsname` LIKE '%$search%' OR `caption` LIKE '%$search%' OR `source` LIKE '%$search%'";
                $sql_query = $connect->query($sql_code) or die("ERRO ao consultar! " . $connect->error); 
                
                if ($sql_query->num_rows == 0) {
            ?>
                <p class="light"> Nenhum resultado encontrado...</p>
            <?php
                } else {
                    while($dateNews = $sql_query->fetch_assoc()) {
            ?>
                <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateNews['newsImage'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateNews['newsname']; ?> </h3>
                            <h6 class="light center"> <?php echo $dateNews['caption']; ?> </h6><br>
                            <!-- button link with modal -->
                            <center><button href="#modal<?php echo $dateNews['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal news content -->
                    <div class="modal" id="modal<?php echo $dateNews['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateNews['newsname']; ?> </strong></h3>
                            <h5 class="light center"> <?php echo $dateNews['caption']; ?> </h5><br>
                            <!-- content -->
                            <p class="light"> Local da Ocorrência: <?php echo $dateNews['placeOccurrence'];?> </p>
                            <!-- footer -->
                            <p class="light"> <?php echo $dateNews['content'];?> </p><br>
                            <p class="light right"> Data de Publicação: <?php echo $dateNews['datePublication'];?><br>
                            Autor: <?php echo $dateNews['author'];?><br>
                            Fonte: <?php echo $dateNews['source'];?></p>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-noticia.php?id=<?php echo $dateNews['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete<?php echo $dateNews['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete<?php echo $dateNews['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h6> Atenção! </h6>
                            <p> Tem certeza que deseja excluir essa notícia? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-news.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateNews['id']; ?>">
                                <button type="submit" name="btn-deletar-news" class="btn red"> Sim, deletar! </button>
                                <a href="#!" class="modal-action modal-close waves-effect waves btn-flat"> Cancelar </a>
                            </form>
                        </div>
                    </div>
                </div>
                <p class="light"> Caso queira visualizar todas as notícias: </p>
            </article>
            <?php
                    }
                }
            ?>
            <?php
            } 
            ?>
            <?php
                else:
            ?>
            <!-- extreme error -->
            <div>
                <h1><strong> OCORREU UM ERRO GRAVÍSSIMO!!!! </strong></h1>
            </div>
            <?php
                endif;
            ?>
        </div>
        <!-- cards news -->
        <div class="row container">
            <!-- connect the news screen with the database -->
            <?php
            //select table news
            $sql = "SELECT * FROM `news`";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado) > 0):
            //looping
            while($dateNews = mysqli_fetch_array($resultado)):
            ?>
            <!-- articles news-->
            <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateNews['newsImage'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateNews['newsname']; ?> </h3>
                            <h6 class="light center"> <?php echo $dateNews['caption']; ?> </h6><br>
                            <!-- button link with modal -->
                            <center><button href="#modal<?php echo $dateNews['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal news content -->
                    <div class="modal" id="modal<?php echo $dateNews['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateNews['newsname']; ?> </strong></h3>
                            <h5 class="light center"> <?php echo $dateNews['caption']; ?> </h5><br>
                            <!-- content -->
                            <p class="light"> Local da Ocorrência: <?php echo $dateNews['placeOccurrence'];?> </p>
                            <!-- footer -->
                            <p class="light"> <?php echo $dateNews['content'];?> </p><br>
                            <p class="light right"> Data de Publicação: <?php echo $dateNews['datePublication'];?><br>
                            Autor: <?php echo $dateNews['author'];?><br>
                            Fonte: <?php echo $dateNews['source'];?></p>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-noticia.php?id=<?php echo $dateNews['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete<?php echo $dateNews['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete<?php echo $dateNews['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h6> Atenção! </h6>
                            <p> Tem certeza que deseja excluir essa notícia? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-news.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateNews['id']; ?>">
                                <button type="submit" name="btn-deletar-news" class="btn red"> Sim, deletar! </button>
                                <a href="#!" class="modal-action modal-close waves-effect waves btn-flat"> Cancelar </a>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
            <?php
                //end looping
                endwhile;
                else:
            ?>
            <!-- extreme error -->
            <div>
                <h1><strong> OCORREU UM ERRO GRAVÍSSIMO!!!! </strong></h1>
            </div>
            <?php
                endif;
            ?>
            <br><br><br>
        </div>
        <div class="row container">
            <!-- add news -->
            <a href="./adicionar-noticia.php" class="btn right"> Adicionar Notícia </a>
        </div>
    <section>
    <!-- footer -->
    <footer class="footer blue scrollspy">
        <div class="container center">
            <!-- icons -->
            <div class="icons">
                <a href="https://www.facebook.com/etecaruaruoficial/" target="blank" class="btn-floating"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;
                <a href="https://wa.me/5581984941102" target="bank" class="btn-floating"><i class="fa fa-whatsapp"></i></a>&nbsp;&nbsp;
                <a href="https://www.instagram.com/eimedofc/" target="blank" class="btn-floating"><i class="fa fa-instagram"></i></a>&nbsp;&nbsp;
                <a href="https://github.com/Matheusxr77/EiMed" target="blank" class="btn-floating"><i class="fa fa-github"></i></a>&nbsp;&nbsp;
                <a href="https://twitter.com/eimed" target="blank" class="btn-floating"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </footer>
    <!-- scripts -->
    <script src="../Public/scripts/jquery_3.3.1.js"></script>
    <script src="../Public/scripts/materialize.js"></script>
    <script src="../Public/scripts/inicializacao.js"></script>
    <script>
        //message
        M.AutoInit();
    </script>
</body>
</html>