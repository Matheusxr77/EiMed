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
    <title> Emergências </title>
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
                <h2 class="white-text"> Prepare-se, saiba prestar os primeiros socorros. </h2>
                <p class="white-text light"> Na busca por disseminar informações, o EiMed trouxe para você a oportinidade de aprender um pouco de algumas doenças e como atendê-las. </p>
                <!-- buttons -->
                <div class="row buttons">
                    <a href="#emergency" class="btn btn-large blue"> Detelhes </a>
                    <a href="#illness" class="btn btn-large white black-text"> Emergências </a>
                </div>
            </div>
        </div>
    </section>
    <!-- spacialty -->
    <section class="news block scrollspy" id="emergency">
        <div class="row container banner">
            <!-- title -->
            <div class="col s12 center">
                <!-- title -->
                <h2 class="light"> Buscador de Emergências </h2>
                <p class="light"> O EiMed, na busca por manter seus internautas antenados em todas as informações sobre o cunhu da saúde traz para vocês a oportunidade de usufruir do conhecimento sobre doenças e acidentes que são de relevância para a comunidade, portanto, sinta-se a vontade para observar tudo e compartilhar com os amigos! </p>
                <p class="light"> Clique no que deseja pesquisar. </p>
                <!-- buttons -->
                <div class="row buttons">
                    <a href="#accident" class="btn btn-large"> Acidentes </a><br><br>
                    <a href="#illness" class="btn btn-large"> Doenças </a>
                </div>
            </div>
        </div>
    </section>
    <!-- search illness -->
    <section class="news block scrollspy" id="illness">
        <!-- title -->
        <h2 class="light center"> Buscador de Doenças </h2>
        <div class="row container banner">
            <!-- search bar -->
            <form action="" class="input-field col s12">
                <input name="query" type="text">
                <label for="query"> Digite o nome da doença </label>
                <button type="submit" class="btn"> Buscar Doença </button>
            </form><br>
            <?php
            //select table illness
            $sql = "SELECT * FROM `illness`";
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
                $sql_code = "SELECT * FROM `illness` WHERE `illness_name` LIKE '%$search%'";
                $sql_query = $connect->query($sql_code) or die("ERRO ao consultar! " . $connect->error); 
                
                if ($sql_query->num_rows == 0) {
            ?>
                <p class="light"> Nenhum resultado encontrado...</p>
            <?php
                } else {
                    while($dateIllness = $sql_query->fetch_assoc()) {
            ?>
                <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateIllness['illness_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateIllness['illness_name']; ?> </h3>
                            <!-- button link with modal -->
                            <center><button href="#modal-illness<?php echo $dateIllness['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal illness content -->
                    <div class="modal" id="modal-illness<?php echo $dateIllness['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateIllness['illness_name']; ?> </strong></h3>
                            <div>
                                <!-- image -->
                                <div class="input-field col s6">
                                    <img class="center" src="<?php echo $dateIllness['illness_image'];?>" width="250">
                                </div>
                                <!-- resumo -->
                                <div class="input-field col s6">
                                    <p class="light"> Resumo: <?php echo $dateIllness['illness_resume']; ?> </p>
                                </div>
                            </div><hr>
                            <!-- content -->
                            <div class="input-field col s12">
                                <p class="light"> Sintomas: </p>
                                <p class="light"> <?php echo $dateIllness['symptoms'];?> </p><hr>
                                <p class="light"> Causas: </p>
                                <p class="light"> <?php echo $dateIllness['causes'];?> </p>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-doenca.php?id=<?php echo $dateIllness['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-illness<?php echo $dateIllness['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-illness<?php echo $dateIllness['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir essa doença? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-illness.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateIllness['id']; ?>">
                                <button type="submit" name="btn-deletar-illness" class="btn red"> Sim, deletar! </button>
                                <a href="#!" class="modal-action modal-close waves-effect waves btn-flat"> Cancelar </a>
                            </form>
                        </div>
                    </div>
                </div>
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
        <!-- cards illness -->
        <div class="row container" id="specialty">
            <!-- connect the illness screen with the database -->
            <?php
            //select table illness
            $sql = "SELECT * FROM `illness`";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado) > 0):
            //looping
            while($dateIllness = mysqli_fetch_array($resultado)):
            ?>
            <!-- articles illness-->
            <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateIllness['illness_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateIllness['illness_name']; ?> </h3>
                            <!-- button link with modal -->
                            <center><button href="#modal-illness<?php echo $dateIllness['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal illness content -->
                    <div class="modal" id="modal-illness<?php echo $dateIllness['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateIllness['illness_name']; ?> </strong></h3>
                            <div>
                                <!-- image -->
                                <div class="input-field col s6">
                                    <img class="center" src="<?php echo $dateIllness['illness_image'];?>" width="250">
                                </div>
                                <!-- content -->
                                <div class="input-field col s6">
                                    <p class="light"> Resumo: <?php echo $dateIllness['illness_resume']; ?> </p>
                                </div>
                            </div><hr>
                            <!-- content -->
                            <div class="input-field col s12">
                                <p class="light"> Sintomas: </p>
                                <p class="light"> <?php echo $dateIllness['symptoms'];?> </p><hr>
                                <p class="light"> Causas: </p>
                                <p class="light"> <?php echo $dateIllness['causes'];?> </p>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-doenca.php?id=<?php echo $dateIllness['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-illness<?php echo $dateIllness['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-illness<?php echo $dateIllness['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir essa doença? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-illness.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateIllness['id']; ?>">
                                <button type="submit" name="btn-deletar-illness" class="btn red"> Sim, deletar! </button>
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
        </div>
        <div class="row container">
            <!-- add illness -->
            <a href="./adicionar-doenca.php" class="btn right"> Adicionar Doença </a>
        </div>
    <section>
    <!-- search accident -->
    <section class="news block scrollspy" id="accident">
        <!-- title -->
        <h2 class="light center"> Buscador de Acidentes </h2>
        <div class="row container banner">
            <!-- search bar -->
            <form action="" class="input-field col s12">
                <input name="query" type="text">
                <label for="query"> Digite o nome do acidente </label>
                <button type="submit" class="btn"> Buscar Acidente </button>
            </form><br>
            <?php
            //select table accident
            $sql = "SELECT * FROM `accident`";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado) > 0):
            //looping
            ?>
            <?php
                if (!isset($_GET['query'])) {
            ?>
            <?php
            } else {
                //search key
                $search = $connect->real_escape_string($_GET['query']);
                $sql_code = "SELECT * FROM `accident` WHERE `accident_name` LIKE '%$search%'";
                $sql_query = $connect->query($sql_code) or die("ERRO ao consultar! " . $connect->error); 
                
                if ($sql_query->num_rows == 0) {
            ?>
                <p class="light"> Nenhum resultado encontrado...</p>
            <?php
                } else {
                    while($dateAccident = $sql_query->fetch_assoc()) {
            ?>
            <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateAccident['accident_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateAccident['accident_name']; ?> </h3>
                            <!-- button link with modal -->
                            <center><button href="#modal-accident<?php echo $dateAccident['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal illness content -->
                    <div class="modal" id="modal-accident<?php echo $dateAccident['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateAccident['accident_name']; ?> </strong></h3>
                            <div>
                                <!-- image -->
                                <div class="input-field col s12">
                                    <img class="center" src="<?php echo $dateAccident['accident_image'];?>" width="250">
                                </div>
                                <!-- content -->
                                <div class="input-field col s12">
                                    <p class="light"> Primeiros-socorros: </p>
                                    <p class="light"> <?php echo $dateAccident['first_aid'];?> </p>
                                </div>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-acidente.php?id=<?php echo $dateAccident['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-accident<?php echo $dateAccident['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-accident<?php echo $dateAccident['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir esse acidente? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-accident.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateAccident['id']; ?>">
                                <button type="submit" name="btn-deletar-accident" class="btn red"> Sim, deletar! </button>
                                <a href="#!" class="modal-action modal-close waves-effect waves btn-flat"> Cancelar </a>
                            </form>
                        </div>
                    </div>
                </div>
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
        <!-- cards accident -->
        <div class="row container" id="specialty">
            <!-- connect the accident screen with the database -->
            <?php
            //select table accident
            $sql = "SELECT * FROM `accident`";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado) > 0):
            //looping
            while($dateAccident = mysqli_fetch_array($resultado)):
            ?>
            <!-- articles accident-->
            <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateAccident['accident_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateAccident['accident_name']; ?> </h3>
                            <!-- button link with modal -->
                            <center><button href="#modal-accident<?php echo $dateAccident['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal accident content -->
                    <div class="modal" id="modal-accident<?php echo $dateAccident['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateAccident['accident_name']; ?> </strong></h3>
                            <div>
                                <!-- image -->
                                <div class="input-field col s12">
                                    <img class="center" src="<?php echo $dateAccident['accident_image'];?>" width="250">
                                </div>
                                <!-- content -->
                                <div class="input-field col s12">
                                    <p class="light"> Primeiros-socorros: </p>
                                    <p class="light"> <?php echo $dateAccident['first_aid'];?> </p>
                                </div>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-acidente.php?id=<?php echo $dateAccident['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-accident<?php echo $dateAccident['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-accident<?php echo $dateAccident['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir esse acidente? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-accident.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateAccident['id']; ?>">
                                <button type="submit" name="btn-deletar-accident" class="btn red"> Sim, deletar! </button>
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
        </div>
        <div class="row container">
            <!-- add accident-->
            <a href="./adicionar-acidente.php" class="btn right"> Adicionar Acidente </a>
        </div>
    </section>
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
</body>
</html>