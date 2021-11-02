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
    <link rel="stylesheet" href="../Public/css/especialidades.css">
    <!-- title of page -->
    <title> Especialidades </title>
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
                <h2 class="white-text"> Procurando especialidades? </h2>
                <p class="white-text light"> Aqui você encontra as mais diversas especialidades nas mais variadadas localidades em alguns cliques! </p>
                <!-- buttons -->
                <div class="row buttons">
                    <a href="#informations" class="btn btn-large blue"> Detalhes </a>
                    <a href="#doctor" class="btn btn-large white black-text"> Buscador </a>
                </div>
            </div>
        </div>
    </section>
    <!-- spacialty -->
    <section class="specialty block scrollspy" id="informations">
        <div class="row container banner">
            <!-- title -->
            <div class="col s12 center">
                <!-- title -->
                <h2 class="light"> Buscador de Especialidades </h2>
                <p class="light"> O EiMed, na busca por manter seus internautas antenados em todas as notícias sobre o cunhu da saúde traz para vocês a oportunidade de usufruir da informção de locais e de profissionais que atendem em determinadas áreas da madicina que são de relevância para a comunidade, portanto, sinta-se a vontade para observar tudo e compartilhar com os amigos! </p>
                <p class="light"> Clique no formato que deseja pesquisar. </p>
                <!-- buttons -->
                <div class="row buttons">
                    <a href="#doctor" class="btn btn-large"> Médicos Especializados </a><br><br>
                    <a href="#hospital" class="btn btn-large"> Hospitais Especializados </a><br><br>
                    <a href="#clinic" class="btn btn-large"> Clínicas Especializadas </a>
                </div>
            </div>
        </div>
    </section>
    <!-- search doctor -->
    <section class="specialty block scrollspy" id="doctor">
        <!-- title -->
        <h2 class="light"> Buscador de Médicos </h2>
        <div class="row container banner">
            <!-- search bar -->
            <form action="" class="input-field col s12">
                <input name="query" type="text">
                <label for="query"> Digite o nome do médico ou da especialidade </label>
                <button type="submit" class="btn"> Buscar Médico </button>
            </form><br>
            <?php
            //select table doctor
            $sql = "SELECT * FROM `doctor`";
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
                $sql_code = "SELECT * FROM `doctor` WHERE `doctor_name` LIKE '%$search%' OR `crm` LIKE '%$search%' OR `rqe` LIKE '%$search%' OR `specialty` LIKE '%$search%'";
                $sql_query = $connect->query($sql_code) or die("ERRO ao consultar! " . $connect->error);

                if ($sql_query->num_rows == 0) {
            ?>
                <p class="light"> Nenhum resultado encontrado...</p>
            <?php
                } else {
                    while($dateDoctor = $sql_query->fetch_assoc()) {
            ?>
                <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateDoctor['doctor_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateDoctor['doctor_name']; ?> </h3>
                            <h6 class="light center"> Especialidade em <?php echo $dateDoctor['specialty']; ?> </h6><br>
                            <!-- button link with modal -->
                            <center><button href="#modal-doctor<?php echo $dateDoctor['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal custor content -->
                    <div class="modal" id="modal-doctor<?php echo $dateDoctor['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateDoctor['doctor_name']; ?> </strong></h3>
                            <div>
                                <!-- title -->
                                <div class="input-field col s6">
                                    <img class="center" src="<?php echo $dateDoctor['doctor_image'];?>" width="250">
                                </div>
                                <!-- content -->
                                <div class="input-field col s6">
                                    <p class="light"> Especialidade: <?php echo $dateDoctor['specialty']; ?> </p>
                                    <p class="light"> Número de CRM: <?php echo $dateDoctor['crm'];?> </p>
                                    <p class="light"> Número de RQE: <?php echo $dateDoctor['rqe'];?> </p>
                                    <p class="light"> Contato: <?php echo $dateDoctor['doctor_contact'];?> </p>
                                </div>
                            </div><hr>
                            <!-- content -->
                            <div class="input-field col s12">
                                <p class="light"> Descrição: </p>
                                <p class="light"> <?php echo $dateDoctor['doctor_description'];?> </p><hr>
                                <p class="light"> Endereço: </p>
                                <p class="light"> Rua <?php echo $dateDoctor['doctor_address_street'];?>, N° <?php echo $dateDoctor['doctor_address_number'];?> </p>
                                <p class="light"> Complemento: <?php echo $dateDoctor['doctor_address_complementary'];?> </p>
                                <p class="light"> <?php echo $dateDoctor['doctor_address_district'];?>, <?php echo $dateDoctor['doctor_address_city'];?> - <?php echo $dateDoctor['doctor_address_state'];?> </p>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-medico.php?id=<?php echo $dateDoctor['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-doctor<?php echo $dateDoctor['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-doctor<?php echo $dateDoctor['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir esse médico? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-doctor.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateDoctor['id']; ?>">
                                <button type="submit" name="btn-deletar-doctor" class="btn red"> Sim, deletar! </button>
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
        <!-- cards doctor -->
        <div class="row container" id="specialty">
            <!-- connect the specialty screen with the database -->
            <?php
            //select table doctor
            $sql = "SELECT * FROM `doctor`";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado) > 0):
            //looping
            while($dateDoctor = mysqli_fetch_array($resultado)):
            ?>
            <!-- articles doctor-->
            <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateDoctor['doctor_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateDoctor['doctor_name']; ?> </h3>
                            <h6 class="light center"> Especialidade em <?php echo $dateDoctor['specialty']; ?> </h6><br>
                            <!-- button link with modal -->
                            <center><button href="#modal-doctor<?php echo $dateDoctor['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal specialty content -->
                    <div class="modal" id="modal-doctor<?php echo $dateDoctor['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateDoctor['doctor_name']; ?> </strong></h3>
                            <div>
                                <!-- image -->
                                <div class="input-field col s6">
                                    <img class="center" src="<?php echo $dateDoctor['doctor_image'];?>" width="250">
                                </div>
                                <!-- content -->
                                <div class="input-field col s6">
                                    <p class="light"> Especialidade: <?php echo $dateDoctor['specialty']; ?> </p>
                                    <p class="light"> Número de CRM: <?php echo $dateDoctor['crm'];?> </p>
                                    <p class="light"> Número de RQE: <?php echo $dateDoctor['rqe'];?> </p>
                                    <p class="light"> Contato: <?php echo $dateDoctor['doctor_contact'];?> </p>
                                </div>
                            </div><hr>
                            <!-- content -->
                            <div class="input-field col s12">
                                <p class="light"> Descrição: </p>
                                <p class="light"> <?php echo $dateDoctor['doctor_description'];?> </p><hr>
                                <p class="light"> Endereço: </p>
                                <p class="light"> Rua <?php echo $dateDoctor['doctor_address_street'];?>, N° <?php echo $dateDoctor['doctor_address_number'];?> </p>
                                <p class="light"> Complemento: <?php echo $dateDoctor['doctor_address_complementary'];?> </p>
                                <p class="light"> <?php echo $dateDoctor['doctor_address_district'];?>, <?php echo $dateDoctor['doctor_address_city'];?> - <?php echo $dateDoctor['doctor_address_state'];?> </p>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-medico.php?id=<?php echo $dateDoctor['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-doctor<?php echo $dateDoctor['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-doctor<?php echo $dateDoctor['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir esse médico? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-doctor.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateDoctor['id']; ?>">
                                <button type="submit" name="btn-deletar-doctor" class="btn red"> Sim, deletar! </button>
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
            <!-- add doctor-->
            <a href="./adicionar-medico.php" class="btn right"> Adicionar Médico </a>
        </div>
    <section>
    <!-- search hospital -->
    <section class="specialty block scrollspy" id="hospital">
        <!-- title -->
        <h2 class="light"> Buscador de Hospitais </h2>
        <div class="row container banner">
            <!-- search bar -->
            <form action="" class="input-field col s12">
                <input name="query" type="text">
                <label for="query"> Digite o nome do hospital ou da especialidade </label>
                <button type="submit" class="btn"> Buscar Hospital </button>
            </form><br>
            <?php
            //select table hospital
            $sql = "SELECT * FROM `hospital`";
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
                $sql_code = "SELECT * FROM `hospital` WHERE `hospital_name` LIKE '%$search%' OR `hospital_specialty` LIKE '%$search%' OR `hospital_cnpj` LIKE '%$search%'";
                $sql_query = $connect->query($sql_code) or die("ERRO ao consultar! " . $connect->error);

                if ($sql_query->num_rows == 0) {
            ?>
                <p class="light"> Nenhum resultado encontrado...</p>
            <?php
                } else {
                    while($dateHospital = $sql_query->fetch_assoc()) {
            ?>
                <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateHospital['hospital_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateHospital['hospital_name']; ?> </h3>
                            <h6 class="light center"> Especialidade(s): <?php echo $dateHospital['hospital_specialty']; ?> </h6><br>
                            <!-- button link with modal -->
                            <center><button href="#modal-hospital<?php echo $dateHospital['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal hospital content -->
                    <div class="modal" id="modal-hospital<?php echo $dateHospital['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateHospital['hospital_name']; ?> </strong></h3>
                            <div>
                                <!-- title -->
                                <div class="input-field col s6">
                                    <img class="center" src="<?php echo $dateHospital['hospital_image'];?>" width="250">
                                </div>
                                <!-- content -->
                                <div class="input-field col s6">
                                    <p class="light"> Especialidade(s): <?php echo $dateHospital['hospital_specialty']; ?> </p>
                                    <p class="light"> Número do CNPJ: <?php echo $dateHospital['hospital_cnpj'];?> </p>
                                    <p class="light"> Horário de Funcionamento: <?php echo $dateHospital['hospital_office_hours'];?> </p>
                                    <p class="light"> Contato: <?php echo $dateHospital['hospital_contact'];?> </p>
                                </div>
                            </div><hr>
                            <!-- content -->
                            <div class="input-field col s12">
                                <p class="light"> Descrição: </p>
                                <p class="light"> <?php echo $dateHospital['hospital_description'];?> </p><hr>
                                <p class="light"> Endereço: </p>
                                <p class="light"> Rua <?php echo $dateHospital['hospital_address_street'];?>, N° <?php echo $dateHospital['hospital_address_number'];?> </p>
                                <p class="light"> Complemento: <?php echo $dateHospital['hospital_address_complementary'];?> </p>
                                <p class="light"> <?php echo $dateHospital['hospital_address_district'];?>, <?php echo $dateHospital['hospital_address_city'];?> - <?php echo $dateHospital['hospital_address_state'];?> </p>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-hospital.php?id=<?php echo $dateHospital['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-hospital<?php echo $dateHospital['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-hospital<?php echo $dateHospital['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir esse hospital? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-hospital.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateHospital['id']; ?>">
                                <button type="submit" name="btn-deletar-hospital" class="btn red"> Sim, deletar! </button>
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
        <!-- cards hospital -->
        <div class="row container" id="specialty">
            <!-- connect the hospital screen with the database -->
            <?php
            //select table hospital
            $sql = "SELECT * FROM `hospital`";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado) > 0):
            //looping
            while($dateHospital = mysqli_fetch_array($resultado)):
            ?>
            <!-- articles hospital-->
            <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateHospital['hospital_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateHospital['hospital_name']; ?> </h3>
                            <h6 class="light center"> Especialidade(s): <?php echo $dateHospital['hospital_specialty']; ?> </h6><br>
                            <!-- button link with modal -->
                            <center><button href="#modal-hospital<?php echo $dateHospital['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal hospital content -->
                    <div class="modal" id="modal-hospital<?php echo $dateHospital['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateHospital['hospital_name']; ?> </strong></h3>
                            <div>
                                <!-- image -->
                                <div class="input-field col s6">
                                    <img class="center" src="<?php echo $dateHospital['hospital_image'];?>" width="250">
                                </div>
                                <!-- content -->
                                <div class="input-field col s6">
                                    <p class="light"> Especialidade(s): <?php echo $dateHospital['hospital_specialty']; ?> </p>
                                    <p class="light"> Número do CNPJ: <?php echo $dateHospital['hospital_cnpj'];?> </p>
                                    <p class="light"> Horário de Funcionamento: <?php echo $dateHospital['hospital_office_hours'];?> </p>
                                    <p class="light"> Contato: <?php echo $dateHospital['hospital_contact'];?> </p>
                                </div>
                            </div><hr>
                            <!-- content -->
                            <div class="input-field col s12">
                                <p class="light"> Descrição: </p>
                                <p class="light"> <?php echo $dateHospital['hospital_description'];?> </p><hr>
                                <p class="light"> Endereço: </p>
                                <p class="light"> Rua <?php echo $dateHospital['hospital_address_street'];?>, N° <?php echo $dateHospital['hospital_address_number'];?> </p>
                                <p class="light"> Complemento: <?php echo $dateHospital['hospital_address_complementary'];?> </p>
                                <p class="light"> <?php echo $dateHospital['hospital_address_district'];?>, <?php echo $dateHospital['hospital_address_city'];?> - <?php echo $dateHospital['hospital_address_state'];?> </p>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-hospital.php?id=<?php echo $dateHospital['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-hospital<?php echo $dateHospital['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-hospital<?php echo $dateHospital['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir esse hospital? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-hospital.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateHospital['id']; ?>">
                                <button type="submit" name="btn-deletar-hospital" class="btn red"> Sim, deletar! </button>
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
            <!-- add hospital -->
            <a href="./adicionar-hospital.php" class="btn right"> Adicionar Hospital </a>
        </div>
    </section>
    <!-- search clinic -->
    <section class="specialty block scrollspy" id="clinic">
        <!-- title -->
        <h2 class="light"> Buscador de Clínicas </h2>
        <div class="row container banner">
            <!-- search bar -->
            <form action="" class="input-field col s12">
                <input name="query" type="text">
                <label for="query"> Digite o nome da clínica ou da especialidade </label>
                <button type="submit" class="btn"> Buscar Clínica </button>
            </form><br>
            <?php
            //select table clinic
            $sql = "SELECT * FROM `clinic`";
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
                $sql_code = "SELECT * FROM `clinic` WHERE `clinic_name` LIKE '%$search%' OR `clinic_specialty` LIKE '%$search%' OR `clinic_cnpj` LIKE '%$search%'";
                $sql_query = $connect->query($sql_code) or die("ERRO ao consultar! " . $connect->error);

                if ($sql_query->num_rows == 0) {
            ?>
                <p class="light"> Nenhum resultado encontrado...</p>
            <?php
                } else {
                    while($dateClinic = $sql_query->fetch_assoc()) {
            ?>
                <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateClinic['clinic_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateClinic['clinic_name']; ?> </h3>
                            <h6 class="light center"> Especialidade(s): <?php echo $dateClinic['clinic_specialty']; ?> </h6><br>
                            <!-- button link with modal -->
                            <center><button href="#modal-clinic<?php echo $dateClinic['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal clinic content -->
                    <div class="modal" id="modal-clinic<?php echo $dateClinic['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateClinic['clinic_name']; ?> </strong></h3>
                            <div>
                                <!-- title -->
                                <div class="input-field col s6">
                                    <img class="center" src="<?php echo $dateClinic['clinic_image'];?>" width="250">
                                </div>
                                <!-- content -->
                                <div class="input-field col s6">
                                    <p class="light"> Especialidade(s): <?php echo $dateClinic['clinic_specialty']; ?> </p>
                                    <p class="light"> Número do CNPJ: <?php echo $dateClinic['clinic_cnpj'];?> </p>
                                    <p class="light"> Horário de Funcionamento: <?php echo $dateClinic['clinic_office_hours'];?> </p>
                                    <p class="light"> Contato: <?php echo $dateClinic['clinic_contact'];?> </p>
                                </div>
                            </div><hr>
                            <!-- content -->
                            <div class="input-field col s12">
                                <p class="light"> Descrição: </p>
                                <p class="light"> <?php echo $dateClinic['clinic_description'];?> </p><hr>
                                <p class="light"> Endereço: </p>
                                <p class="light"> Rua <?php echo $dateClinic['clinic_address_street'];?>, N° <?php echo $dateClinic['clinic_address_number'];?> </p>
                                <p class="light"> Complemento: <?php echo $dateClinic['clinic_address_complementary'];?> </p>
                                <p class="light"> <?php echo $dateClinic['clinic_address_district'];?>, <?php echo $dateClinic['clinic_address_city'];?> - <?php echo $dateClinic['clinic_address_state'];?> </p>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-clinic.php?id=<?php echo $dateClinic['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-clinic<?php echo $dateClinic['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-clinic<?php echo $dateClinic['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir essa clínica? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-clinic.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateClinic['id']; ?>">
                                <button type="submit" name="btn-deletar-clinic" class="btn red"> Sim, deletar! </button>
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
        <!-- cards clinic -->
        <div class="row container" id="specialty">
            <!-- connect the clinic screen with the database -->
            <?php
            //select table clinic
            $sql = "SELECT * FROM `clinic`";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado) > 0):
            //looping
            while($dateClinic = mysqli_fetch_array($resultado)):
            ?>
            <!-- articles clinic -->
            <article class="col s12 l6">
                <!-- card horizontal -->
                <div class="card horizontal">
                    <!-- card image -->
                    <div class="card-image card-image-horizontal">
                        <img src="<?php echo $dateClinic['clinic_image'];?>" width="250" height="250">
                    </div>
                    <!-- card content -->
                    <div class="card-stacked">
                        <div class="card-content">
                            <!-- title -->
                            <h3 class="card-title light center"> <?php echo $dateClinic['clinic_name']; ?> </h3>
                            <h6 class="light center"> Especialidade(s): <?php echo $dateClinic['clinic_specialty']; ?> </h6><br>
                            <!-- button link with modal -->
                            <center><button href="#modal-clinic<?php echo $dateClinic['id']; ?>" class="btn blue modal-trigger"> Visualizar </button></center>
                        </div>
                    </div>
                    <!-- modal clinic content -->
                    <div class="modal" id="modal-clinic<?php echo $dateClinic['id']; ?>">
                        <!-- content -->
                        <div class="modal-content">
                            <!-- title -->
                            <h3 class="card-title light center"><strong> <?php echo $dateClinic['clinic_name']; ?> </strong></h3>
                            <div>
                                <!-- title -->
                                <div class="input-field col s6">
                                    <img class="center" src="<?php echo $dateClinic['clinic_image'];?>" width="250">
                                </div>
                                <!-- content -->
                                <div class="input-field col s6">
                                    <p class="light"> Especialidade(s): <?php echo $dateClinic['clinic_specialty']; ?> </p>
                                    <p class="light"> Número do CNPJ: <?php echo $dateClinic['clinic_cnpj'];?> </p>
                                    <p class="light"> Horário de Funcionamento: <?php echo $dateClinic['clinic_office_hours'];?> </p>
                                    <p class="light"> Contato: <?php echo $dateClinic['clinic_contact'];?> </p>
                                </div>
                            </div><hr>
                            <!-- content -->
                            <div class="input-field col s12">
                                <p class="light"> Descrição: </p>
                                <p class="light"> <?php echo $dateClinic['clinic_description'];?> </p><hr>
                                <p class="light"> Endereço: </p>
                                <p class="light"> Rua <?php echo $dateClinic['clinic_address_street'];?>, N° <?php echo $dateClinic['clinic_address_number'];?> </p>
                                <p class="light"> Complemento: <?php echo $dateClinic['clinic_address_complementary'];?> </p>
                                <p class="light"> <?php echo $dateClinic['clinic_address_district'];?>, <?php echo $dateClinic['clinic_address_city'];?> - <?php echo $dateClinic['clinic_address_state'];?> </p>
                            </div>
                        </div>
                        <!-- modal buttons -->
                        <div class="modal-footer left">
                            <a href="./editar-clinic.php?id=<?php echo $dateClinic['id']; ?>" class="btn orange"><i class="material-icons"> edit </i></a>
                            <a href="#modal-delete-clinic<?php echo $dateClinic['id']; ?>" class="btn red modal-trigger"><i class="material-icons"> delete </i></a>
                            <a class="btn modal-action modal-close"> Sair </a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="modal" id="modal-delete-clinic<?php echo $dateClinic['id']; ?>">
                        <!-- modal warning -->
                        <div class="modal-content">
                            <h3 class="light center"> Atenção! </h3>
                            <p class="light center"> Tem certeza que deseja excluir essa clínica? </p>
                        </div>
                        <!-- modal delete message -->
                        <div class="modal-footer">
                            <form action="../Controller/delete-clinic.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $dateClinic['id']; ?>">
                                <button type="submit" name="btn-deletar-clinic" class="btn red"> Sim, deletar! </button>
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
            <!-- add clinic -->
            <a href="./adicionar-clinica.php" class="btn right"> Adicionar Clínica </a>
        </div>
    </section>
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