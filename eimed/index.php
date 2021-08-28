<?php
include('.\config.php');
$btn_vef = isset($_SESSION['login']) ? $_SESSION['login'] : false;

?>

<html lang="en">

<head>
    <!-- menu -->
    <header>
    <!-- logo -->
    <div id="logo">
        <img src=".\images\logo.jpeg" alt="Logo - Monstros S.A."/>
    <!-- universal menu -->
    </div>
        <nav type="disc">
            <ul class="menu">
                <li><a href=".\pages\home.php"> Home </a></li>
                <li><a href=".\pages\especialidades.php"> Especialidades </a></li>
                <li><a href=".\pages\emergencias.php"> Emergências </a></li>
                <li><a href=".\pages\doacoes.php"> Disque Doação </a></li>
                <li><a href=".\pages\noticias.php"> Notícias </a></li>
                <li><a href=".\pages\informacoes.php"> Informações </a></li>
                <li><a href=".\pages\login.php"> Login </a></li>
            </ul>
        </nav>
    </header>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\css\doacoes.css">
    <link rel="stylesheet" href=".\css\emergencias.css">
    <link rel="stylesheet" href=".\css\especialidades.css">
    <link rel="stylesheet" href=".\css\home.css">
    <link rel="stylesheet" href=".\css\informacoes.css">
    <link rel="stylesheet" href=".\css\login.css">
    <link rel="stylesheet" href=".\css\noticias.css">
	<link rel="stylesheet" href=".\css\perfil_deletar.css">
	<link rel="stylesheet" href=".\css\perfil.css">
    <link rel="sortcut icon" href=".\images\temas_social.png" type="image/png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
<?php 

	$url = isset($_GET['url']) ? $_GET['url'] : 'main';
    echo($url);
    
    if (($url == 'main') || ($url == 'home'))  {
        include('pages\home.php');
    } elseif ($url == 'especialidades') {
        include('pages\especialidades.php');
    } elseif ($url == 'emergencias') {
        include('pages\emergencias.php');
    } elseif ($url == 'doacoes') {
        include('pages\doacoes.php');
    } elseif ($url == 'noticias') {
        include('pages\noticias.php');
    } elseif ($url == 'informacoes') {
        include('pages\informacoes.php');
    } elseif ($url == 'login') {
        include('pages\login.php');
    } else{
        include('pages\404.php');
    };
    
?>
	
	<!--RODAPÉ-->
    <footer>
        <div class="container">
            <ul>
                <!--APRESENTAÇÃO-->
                <li class="coluna tres" class="centro"><h2><strong> EiMed </strong></h2>
                    <p class="centro"> Um site pautado na temática da saúde com sede na instituição de ensino ETE - Ministro Fernando Lyra </p>
                <!--PARTE DOS CONTATOS-->
                </li>
                <li class="coluna tres"><h2><strong> Contato </strong></h2>
                    <a href="https://www.instagram.com/etecaruaruoficial/" target="_blank"><img src=".\images\icon_instagram.png" class="midias_sociais"></a>
                    <a href="https://www.facebook.com/etecaruaruoficial/" target="_blank"><img src=".\images\icon_facebook.png" class="midias_sociais"></a>
                    <a href="https://wa.me/5581984941102" target="_blank"><img src=".\images\icon_whatsapp.png" class="midias_sociais"></a>             <!--LOCALIZAÇÃO DA SEDE-->
                </li>
                <li class="coluna tres"><h2><strong> Endereço </strong></h2>
                    <p class="centro"> Rua Vereador João Avelino Sobrinho </p>
                    <p class="centro"> Bairro Cidade Alta, Caruaru - PE </p>
                </li>
            </ul>  
        </div>
    </footer>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	
</body>
</html>