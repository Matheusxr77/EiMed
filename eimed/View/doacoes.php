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
    <title> Doações </title>
</head>
<body>
    <!-- header -->
    <header>
        <!-- lateral menu -->
        <ul class="side-nav" id="menu-mobile">
            <li><a href="../index.php"> Home </a></li>
            <li><a href="../View/especialidades.php"> Especialidades </a></li>
            <li><a href="../View/emergencias.php"> Emergências </a></li>
            <li><a href="../View/doacoes.php"> Doações </a></li>
            <li><a href="../View/noticias.php"> Notícias </a></li>
            <li><a href="../View/sobre.php"> Sobre </a></li>
            <li><a href="../View/login.php"> Login </a></li>
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
                        <li><a href="../View/especialidades.php"> Especialidades </a></li>
                        <li><a href="../View/emergencias.php"> Emergências </a></li>
                        <li><a href="../View/doacoes.php"> Doações </a></li>
                        <li><a href="../View/noticias.php"> Notícias </a></li>
                        <li><a href="../View/sobre.php"> Sobre </a></li>
                        <li><a href="../View/login.php"> Login </a></li>
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
                <h2 class="white-text"> Saiba mais sobre os bastidores do website </h2>
                <p class="white-text light"> Na busca por um método fácil para a disseminação de informações das instituições para seus pacientes e seus clientes. </p>
                <!-- buttons -->
                <div class="row buttons">
                    <a href="#informations" class="btn btn-large blue"> Detalhes </a>
                    <a href="#donations" class="btn btn-large white black-text"> Locais </a>
                </div>
            </div>
        </div>
    </section>
    <!-- donations -->
    <section class="news block scrollspy" id="informations">
        <div class="row container banner">
            <!-- title -->
            <div class="col s12 center">
                <h2 class="light"> Buscador de Locais de Doação </h2>
                <p class="light"> O EiMed, na busca por manter seus internautas antenados em todos os locais de doação sobre o cunhu da saúde traz para vocês a oportunidade de usufruir informações pontuais que são de relevância para a comunidade, portanto, sinta-se a vontade para observar tudo e compartilhar com os amigos! </p>
            </div>
        </div>
        <div class="row container banner" id="donations">
            <!-- search bar -->
            <form action="" class="input-field col s12">
                <input name="query" type="text">
                <label for="query"> Digite o nome do local de doação </label>
                <button type="submit" class="btn"> Buscar Local </button>
            </form><br>
            <?php
            //select table donations
            $sql = "SELECT * FROM `donations`";
            $resultado = mysqli_query($connect, $sql);
            //looping
            if(mysqli_num_rows($resultado) > 0):
            ?>
            <?php
                if (!isset($_GET['query'])) {
            ?>
            <?php
            } else {
                //search keys
                $search = $connect->real_escape_string($_GET['query']);
                $sql_code = "SELECT * FROM `donations` WHERE `donations_name` LIKE '%$search%' OR `donations_type` LIKE '%$search%'";
                $sql_query = $connect->query($sql_code) or die("ERRO ao consultar! " . $connect->error); 
                
                if ($sql_query->num_rows == 0) {
            ?>
                <p class="light"> Nenhum resultado encontrado...</p>
            <?php
                } else {
                    while($dateDonations = $sql_query->fetch_assoc()) {
            ?>
                <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateDonations['donations_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateDonations['donations_name']; ?> </h3>
                            <h6 class="light center"> Tipo de Doação: <?php echo $dateDonations['donations_type']; ?> </h6><br>
                            <!-- button link with modal -->
                            <center><button href="#modal-donations<?php echo $dateDonations['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal custor content -->
                    <div class="modal" id="modal-donations<?php echo $dateDonations['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateDonations['donations_name']; ?> </strong></h3>
                            <div>
                                <div class="input-field col s6">
                                    <!-- image -->
                                    <img class="center" src="<?php echo $dateDonations['donations_image'];?>" width="250">
                                </div>
                                <div class="input-field col s6">
                                    <!-- content -->
                                    <p class="light"> Tipo de Doação: <?php echo $dateDonations['donations_type']; ?> </p>
                                    <p class="light"> Contato: <?php echo $dateDonations['donations_contact'];?> </p>
                                    <p class="light"> Horário de Atendimento: <?php echo $dateDonations['donations_office_hours'];?> </p>
                                </div>
                            </div><hr>
                            <div class="input-field col s12">
                                <!-- content -->
                                <p class="light"> Descrição: </p>
                                <p class="light"> <?php echo $dateDonations['donations_description'];?> </p><hr>
                                <p class="light"> Endereço: </p>
                                <p class="light"> Rua <?php echo $dateDonations['donations_address_street'];?>, N° <?php echo $dateDonations['donations_address_number'];?> </p>
                                <p class="light"> Complemento: <?php echo $dateDonations['donations_address_complementary'];?> </p>
                                <p class="light"> <?php echo $dateDonations['donations_address_district'];?>, <?php echo $dateDonations['donations_address_city'];?> - <?php echo $dateDonations['donations_address_state'];?> </p>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-doacao.php?id=<?php echo $dateDonations['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-donations<?php echo $dateDonations['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-donations<?php echo $dateDonations['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir esse médico? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-donations.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateDonations['id']; ?>">
                                <button type="submit" name="btn-deletar-donations" class="btn red"> Sim, deletar! </button>
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
        <!-- cards donations -->
        <div class="row container" id="donations">
            <!-- connect the donations screen with the database -->
            <?php
            //select table donations
            $sql = "SELECT * FROM `donations`";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado) > 0):
            //looping
            while($dateDonations = mysqli_fetch_array($resultado)):
            ?>
            <!-- articles donations-->
            <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateDonations['donations_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateDonations['donations_name']; ?> </h3>
                            <h6 class="light center"> Tipo de Doação: <?php echo $dateDonations['donations_type']; ?> </h6><br>
                            <!-- button link with modal -->
                            <center><button href="#modal-donations<?php echo $dateDonations['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal costor content -->
                    <div class="modal" id="modal-donations<?php echo $dateDonations['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateDonations['donations_name']; ?> </strong></h3>
                            <div>
                                <div class="input-field col s6">
                                    <!-- image -->
                                    <img class="center" src="<?php echo $dateDonations['donations_image'];?>" width="250">
                                </div>
                                <div class="input-field col s6">
                                    <!-- content -->
                                    <p class="light"> Tipo de Doação: <?php echo $dateDonations['donations_type']; ?> </p>
                                    <p class="light"> Contato: <?php echo $dateDonations['donations_contact'];?> </p>
                                    <p class="light"> Horário de Atendimento: <?php echo $dateDonations['donations_office_hours'];?> </p>
                                </div>
                            </div><hr>
                            <div class="input-field col s12">
                                <!-- content -->
                                <p class="light"> Descrição: </p>
                                <p class="light"> <?php echo $dateDonations['donations_description'];?> </p><hr>
                                <p class="light"> Endereço: </p>
                                <p class="light"> Rua <?php echo $dateDonations['donations_address_street'];?>, N° <?php echo $dateDonations['donations_address_number'];?> </p>
                                <p class="light"> Complemento: <?php echo $dateDonations['donations_address_complementary'];?> </p>
                                <p class="light"> <?php echo $dateDonations['donations_address_district'];?>, <?php echo $dateDonations['donations_address_city'];?> - <?php echo $dateDonations['donations_address_state'];?> </p>
                            </div>
                        </div>
                        <!-- modal button -->
                        <div class="modal-footer left">
                            <a href="./editar-doacao.php?id=<?php echo $dateDonations['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-donations<?php echo $dateDonations['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-donations<?php echo $dateDonations['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir esse médico? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-donations.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateDonations['id']; ?>">
                                <button type="submit" name="btn-deletar-donations" class="btn red"> Sim, deletar! </button>
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
            <!-- add donations -->
            <a href="./adicionar-doacao.php" class="btn right"> Adicionar Local </a>
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
</body>
</html>