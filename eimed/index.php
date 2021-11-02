<!-- connection php -->
<?php
//connection database
include_once 'Model/db-connect.php';
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
    <link rel="icon" href="Public/images/icon.png">
    <!-- css -->
    <link rel="stylesheet" href="Public/css/materialize.css">
    <link rel="stylesheet" href="Public/css/header.css">
    <link rel="stylesheet" href="Public/css/footer.css">
    <link rel="stylesheet" href="Public/css/media.css">
    <link rel="stylesheet" href="Public/css/home.css">
    <!-- title of page -->
    <title> EiMed </title>
</head>
<body>
    <!-- header -->
    <header>
        <!-- lateral menu -->
        <ul class="side-nav" id="menu-mobile">
            <li><a href="index.php"> Home </a></li>
            <li><a href="View/especialidades.php"> Especialidades </a></li>
            <li><a href="View/emergencias.php"> Emergências </a></li>
            <li><a href="View/doacoes.php"> Doações </a></li>
            <li><a href="View/noticias.php"> Notícias </a></li>
            <li><a href="View/sobre.php"> Sobre </a></li>
            <li><a href="View/login.php"> Login </a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="navbar z-depth-0">
                <div class="nav-wrapper container">
                    <!-- search engines -->
                    <h1 class="logo-text"> EiMed - Seu local de busca por saúde </h1>
                    <a href="Public/images/logo.png"><img class="logo-img" src="Public/images/logo.png" alt="Logo - EiMed"></a>
                    <!-- menu -->
                    <ul class="right light hide-on-med-and-down buttons">
                        <li><a href="index.php"> Home </a></li>
                        <li><a href="View/especialidades.php"> Especialidades </a></li>
                        <li><a href="View/emergencias.php"> Emergências </a></li>
                        <li><a href="View/doacoes.php"> Doações </a></li>
                        <li><a href="View/noticias.php"> Notícias </a></li>
                        <li><a href="View/sobre.php"> Sobre </a></li>
                        <li><a href="View/login.php"> Login </a></li>
                    </ul>
                    <a href="#" data-activates="menu-mobile" class="button-collapse right"><i class="material-icons"> menu </i></a>
                </div>
            </nav>
        </div>
    </header>
    <!-- home -->
    <section class="home block scrollspy">
        <div class="row container banner">
            <!-- opening presentation -->
            <div class="col s12 center">
                <h2 class="white-text"> O melhor na busca por atendimentos médicos! </h2>
                <p class="white-text light"> Um novo conceito em disseminação de informações no ramo da saúde está disponível para a sociedade por meio dessa plataforma. </p>
                <!-- buttons -->
                <div class="row buttons">
                    <a href="#about" class="btn btn-large blue"> Sobre nós </a>
                    <a href="#contact" class="btn btn-large white black-text"> Contato </a>
                </div>
            </div>
        </div>
    </section>
    <!-- about -->
    <section class="about block scrollspy" id="about">
        <div class="row container banner">
            <!-- title -->
            <div class="col s12 center">
                <h2 class="light"> EiMed? </h2>
            </div>
            <!-- text -->
            <div class="col s12 l6">
                <p class="light"> O EiMed chegou à Caruaru trazendo um novo conceito em disseminação de informações das instituições de medicina assim como de notícias, de locais de doação e muito mais. </p>
                <p class="light"> Um ambiente virtual amplo com uma identidade visual única e com telas intuitivas de fácil compreensão e navegação em um só lugar.</p>
                <p class="light"> Sempre em busca da sua satisfação! </p>
            </div>
            <!-- carousel-->
            <div class="col s12 l6">
                <div class="carousel carousel-slider" data-indicators="true">
                    <a href="#" class="carousel-item"><img alt="Imagem Institucional" src="Public/images/banner-01.png"></a>
                    <a href="#" class="carousel-item"><img alt="Imagem Institucional" src="Public/images/banner-02.png"></a>
                    <a href="#" class="carousel-item"><img alt="Imagem Institucional" src="Public/images/banner-03.png"></a>
                    <a href="#" class="carousel-item"><img alt="Imagem Institucional" src="Public/images/banner-04.png"></a>
                    <a href="#" class="carousel-item"><img alt="Imagem Institucional" src="Public/images/banner-05.png"></a>
                    <a href="#" class="carousel-item"><img alt="Imagem Institucional" src="Public/images/banner-06.png"></a>
                </div>
            </div>
        </div>
        <div class="row blue mission">
            <div class="container">
                <!-- mission -->
                <article class="item col s12 m4 center">
                    <span class="icon"><i class="material-icons medium">directions_run</i></span>
                    <h4 class="light"> Missão </h3>
                    <p class="light"> Promover a melhor acessibilidade web aos usuários na navegação e no acesso à informação de instituições médicas. </p>
                </article>
                <!-- vision -->
                <article class="item col s12 m4 center">
                    <span class="icon"><i class="material-icons medium">visibility</i></span>
                    <h4 class="light"> Visão </h3>
                    <p class="light"> Tornar-se uma referência digital, buscando a excelência dos serviços prestados, além de promover o acesso ao guia médico local. </p>
                </article>
                <!-- values -->
                <article class="item col s12 m4 center">
                    <span class="icon"><i class="material-icons medium">grade</i></span>
                    <h4 class="light"> Valores </h3>
                    <p class="light"> • Agir com ética frente usuários e colaboradores. </p>
                    <p class="light"> • Tornar a acessibilidade o mais simples possível. </p>
                    <p class="light"> • Priorizar a qualidade e excelência dos serviços. </p>
                </article>
            </div>
        </div>
    </section>
    <!-- services -->
    <section class="services block scrollspy">
        <div class="row container">
            <!-- description -->
            <div class="col s12 center">
                <h2 class="light"> Serviços </h2>
                <p class="light"> A plataforma foi planejada, arquitetada e projetada sob medida para promover uma melhor acessibilidade e atender as principais demandas dos usuários. A plataforma dispõe de uma equipe de suporte qualificada e com experiência no mercado, prezando sempre pela satisfação do usuário </p>
            </div>
        </div>
        <!-- cards -->
        <div class="row container">
            <!-- search -->
            <article class="col s12 m6 l3">
                <div class="card">
                    <!-- image -->
                    <div class="card-image">
                        <img src="Public/images/search.png" alt="Busca por Especialidades Médicas" class="materialboxed">
                        <a href="#search-modal" class="btn btn-floating halfway-fab blue modal-trigger"><i class="material-icons">more_horiz</i></a>
                    </div>
                    <!-- content -->
                    <div class="card-content">
                        <h3 class="card-title"> Localizador </h3>
                        <p class="light"> Auxilia na busca por locais e por pessoas que tenham especialização em áreas específicas no ramo da medicina e que estão cadastradas no banco de dados ... </p>
                    </div>
                </div>
            </article>
            <!-- modal search -->
            <div class="modal" id="search-modal">
                <!-- content -->
                <div class="modal-content">
                    <h5 class="light center"> Localizador instituições com especialidades específicas </h5>
                    <p class="light black-text"> Nesse localizador será possível pesquisar uma especialidade específica e obter como resultado diversos hospitais, clínicas e profissionais que são ou têm vínculo com daquela determinada área, basta seguir os seguintes passos: </p>
                    <ol class="collection">
                        <li class="collection-item"> Entrar na página "Especialidades" que está presente no canto superior direito da sua tela. </li>
                        <li class="collection-item"> Clicar na barra de busca, procurar a especialidade escolhida e clicar em enter. </li>
                        <li class="collection-item"> A partir dos resultados observar aquele que mais lhe agradou. </li>
                        <li class="collection-item"> Não esqueça de olhar as informações presentes do médico, clínica ou hospital que você escolheu! </li>
                        <li class="collection-item"> Compartilhe o site com seus amigos para disseminar informação. </li>
                        <li class="collection-item"> Criticar e/ou elogios mande para nosso e-mail. </li>
                    </ol>
                    <p class="light black-text"> Viu? É bem prático o manuseio, vai lá! </p>
                </div>
                <!-- footer -->
                <div class="modal-footer">
                    <a class="btn modal-action modal-close"> Sair </a>
                </div>
            </div>
            <!-- donations -->
            <article class="col s12 m6 l3">
                <div class="card">
                    <!-- image -->
                    <div class="card-image">
                        <img src="Public/images/donations.png" alt="Busca por Locais de Doação" class="materialboxed">
                        <a href="#donations-modal" class="btn btn-floating halfway-fab blue modal-trigger"><i class="material-icons">more_horiz</i></a>
                    </div>
                    <!-- content -->
                    <div class="card-content">
                        <h3 class="card-title"> Locais de Doação </h3>
                        <p class="light"> Auxilia na busca por instituições que tenham o intuito de promover e incentivar o movimento de doação de órgãos para ajudar outros indivíduos que necessitam ... </p>
                    </div>
                </div>
            </article>
            <!-- modal donations -->
            <div class="modal" id="donations-modal">
                <!-- content -->
                <div class="modal-content">
                    <h5 class="light center"> Localizador instituições de Doação específicas </h5>
                    <p class="light black-text"> Nesse localizador será possível pesquisar uma instituição de doação e obter como resultado diversos hospitais e clínicas que são ou têm vínculo com daquela determinada área, basta seguir os seguintes passos: </p>
                    <ol class="collection">
                        <li class="collection-item"> Entrar na página "Doações" que está presente no canto superior direito da sua tela. </li>
                        <li class="collection-item"> Clicar na barra de busca, procurar o nome do local escolhido e clicar em enter. </li>
                        <li class="collection-item"> A partir dos resultados observar aquele que mais lhe agradou. </li>
                        <li class="collection-item"> Não esqueça de olhar as informações presentes do local que você escolheu! </li>
                        <li class="collection-item"> Compartilhe o site com seus amigos para disseminar informação. </li>
                        <li class="collection-item"> Criticar e/ou elogios mande para nosso e-mail. </li>
                    </ol>
                    <p class="light black-text"> Viu? É bem prático o manuseio, vai lá! </p>
                </div>
                <!-- footer -->
                <div class="modal-footer">
                    <a class="btn modal-action modal-close"> Sair </a>
                </div>
            </div>
            <!-- emergencies -->
            <article class="col s12 m6 l3">
                <div class="card">
                    <!-- image -->
                    <div class="card-image">
                        <img src="Public/images/emergencies.png" alt="Busca por Especialidades Médicas" class="materialboxed">
                        <a href="#emergencies-modal" class="btn btn-floating halfway-fab blue modal-trigger"><i class="material-icons">more_horiz</i></a>
                    </div>
                    <!-- content -->
                    <div class="card-content">
                        <h3 class="card-title"> Emergências </h3>
                        <p class="light"> Caso desejar conhecer e/ou se preparar para ocasiões de caráter emergencial essa aba estará pronta para informar sobre como agir para prestar socorros ... </p>
                    </div>
                </div>
            </article>
            <!-- modal emergencies -->
            <div class="modal" id="emergencies-modal">
                <!-- content -->
                <div class="modal-content">
                    <h5 class="light center"> Localizador informações de emergência </h5>
                    <p class="light black-text"> Nesse localizador será possível pesquisar uma doença e/ou um acidente e obter como resultado diversos hospitais e clínicas que são ou têm vínculo com daquela determinada área, basta seguir os seguintes passos: </p>
                    <ol class="collection">
                        <li class="collection-item"> Entrar na página "Emergências" que está presente no canto superior direito da sua tela. </li>
                        <li class="collection-item"> Clicar na barra de busca, procurar o nome do acidente/doença escolhida e clicar em enter. </li>
                        <li class="collection-item"> A partir dos resultados observar aquele que mais lhe agradou. </li>
                        <li class="collection-item"> Não esqueça de olhar as informações presentes! </li>
                        <li class="collection-item"> Compartilhe o site com seus amigos para disseminar informação. </li>
                        <li class="collection-item"> Criticar e/ou elogios mande para nosso e-mail. </li>
                    </ol>
                    <p class="light black-text"> Viu? É bem prático o manuseio, vai lá! </p>
                </div>
                <!-- footer -->
                <div class="modal-footer">
                    <a class="btn modal-action modal-close"> Sair </a>
                </div>
            </div>
            <!-- news -->
            <article class="col s12 m6 l3">
                <div class="card">
                    <!-- image -->
                    <div class="card-image">
                        <img src="Public/images/news.png" alt="Notícias Médicas" class="materialboxed">
                        <a href="#news-modal" class="btn btn-floating halfway-fab blue modal-trigger"><i class="material-icons">more_horiz</i></a>
                    </div>
                    <!-- content -->
                    <div class="card-content">
                        <h3 class="card-title"> Notícias Médicas </h3>
                        <p class="light"> O ramo da medicina avança constantemente e sempre serão postadas as principais notícias sobre as mais diversas áreas que abrangem a medicina de cunho moderno ... </p>
                    </div>
                </div>
            </article>
            <!-- modal news -->
            <div class="modal" id="news-modal">
                <!-- content -->
                <div class="modal-content">
                    <h5 class="light center"> Notícias </h5>
                    <p class="light black-text"> Nesse localizador será possível pesquisar notícias, basta seguir os seguintes passos: </p>
                    <ol class="collection">
                        <li class="collection-item"> Entrar na página "Notícias" que está presente no canto superior direito da sua tela. </li>
                        <li class="collection-item"> Clicar na barra de busca, procurar o nome da notícias escolhida e clicar em enter. </li>
                        <li class="collection-item"> A partir dos resultados observar aquela que mais lhe agradou. </li>
                        <li class="collection-item"> Não esqueça de olhar as informações presentes! </li>
                        <li class="collection-item"> Compartilhe o site com seus amigos para disseminar informação. </li>
                        <li class="collection-item"> Criticar e/ou elogios mande para nosso e-mail. </li>
                    </ol>
                    <p class="light black-text"> Viu? É bem prático o manuseio, vai lá! </p>
                </div>
                <!-- footer -->
                <div class="modal-footer">
                    <a class="btn modal-action modal-close"> Sair </a>
                </div>
            </div>
        </div>
    </section>
    <!-- assessments -->
    <div class="assessments block blue scrollspy">
        <div class="row container">
            <!-- title -->
            <div class="col s12 center">
                <h2 class="light"> Depoimentos </h2>
            </div>
            <!-- first assessments -->
            <div class="col s12 m4 center">
                <img src="Public/images/assessment-1.jpg" class="circle" alt="Depoimento de Cliente"/>
                <h5> Jubiscleiton Tavares </h5>
                    <p class="light"> Conheci o EiMed por indicação de um amigo. Não era meu estilo ficar indo de clínica em clínica buscar informações e, em muitas vezes, não ter nenhum retorno, mas aqui tive uma experiência totalmente inovadora e posso fazer a busca sem sair de casa, incrível!</p>
                    <!-- note -->
                    <p class="stars">
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                    </p>
            </div>
            <!-- second assessments -->
            <div class="col s12 m4 center">
                <img src="Public/images/assessment-2.jpg" class="circle responsive-img" alt="Depoimento de Cliente"/>
                <h5> Tomas Smith </h5>
                    <p class="light"> Tenho muita preocupação com meus amigos, sempre tomo muito cuidado com eles e tento protegê-los ao máximo. Certo dia ocorreu um acidente e graças aos conhecimentos que aprendi no EiMed eu pude socorrer meu amigo e salvar sua vida, gratidão! </p>
                    <!-- note -->
                    <p class="stars">
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                    </p>
            </div>
            <!-- third assessments -->
            <div class="col s12 m4 center cliente_depo">
                <img src="Public/images/assessment-3.jpg" class="circle responsive-img" alt="Depoimento de Cliente"/>
                <h5> Ada Lovelace </h5>
                    <p class="light"> Sou estudante de biomedicina, sempre tive que procurar em diversos sites para obter dados que fossem relevantes para meus estudos, mas quase nunca achava e muitas vezes eram fake news. Quando descobri o EiMed vi um universo de notícias veridicas que somam na minha carreira! </p>
                    <!-- note -->
                    <p class="stars">
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                        <span class="icon"><i class="material-icons"> star </i></span>
                    </p>
            </div>
        </div>
    </div>
    <!-- contact -->
    <section class="contact block scrollspy" id="contact">
        <div class="row container">
            <div class="col s12 center">
                <div class="dark-text">
                    <h2> Fale Conosco </h2>
                    <p class="light">
                        Dúvidas, elogios, sugestões ou critícas, sua opinião é muito importante para nós!!
                    </p>
                </div>
                <div class="form dark-text center">
                    <center>
                        <form action="Model/create-depositions.php" method="POST">
                            <div class="input-field col s12">
                                <input type="text" name="depositionsName" id="depositionsName" required>
                                <label for="depositionsName"> Nome </label>
                            </div>
                            <div class="input-field col s12">
                                <input type="email" name="depositionsEmail" id="depositionsEmail" required>
                                <label for="depositionsEmail"> E-mail </label>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="depositionsSubject" id="depositionsSubject" required>
                                <label for="depositionsSubject"> Assunto </label>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="depositionsMessage" id="depositionsMessage" class="materialize-textarea" required></textarea>
                                <label for="depositionsMessage"> Mensagem </label>
                            </div>
                            <button class="btn blue" name="btn-cadastrar-depositions" type="submit"> Enviar </button>
                        </form>
                    </center>
                </div>
            </div>
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
    <script src="Public/scripts/jquery_3.3.1.js"></script>
    <script src="Public/scripts/materialize.js"></script>
    <script src="Public/scripts/inicializacao.js"></script>
</body>
</html>