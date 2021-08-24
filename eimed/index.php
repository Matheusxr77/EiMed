<?php
include('..\pages\config.php');
$btn_vef = isset($_SESSION['login']) ? $_SESSION['login'] : false;

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\doacoes.css">
    <link rel="stylesheet" href="..\css\emergencias.css">
    <link rel="stylesheet" href="..\css\especialidades.css">
    <link rel="stylesheet" href="..\css\home.css">
    <link rel="stylesheet" href="..\css\informacoes.css">
    <link rel="stylesheet" href="..\css\login.css">
	<link rel="stylesheet" href="..\css\main.css">
    <link rel="stylesheet" href="..\css\noticias.css">
	<link rel="stylesheet" href="..\css\perfil_deletar.css">
	<link rel="stylesheet" href="..\css\perfil.css">
	<link rel="stylesheet" href="..\css\style.css">
    <link rel="sortcut icon" href="..\imagens\temas_social.png" type="image/png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
<?php 
    include('..\pages\config.php');
    $btn_vef = isset($_SESSION['logado']) ? true : false;

    
	$url = isset($_GET['url']) ? $_GET['url'] : 'main';
	if ($url == 'login') {
		include('..\pages\login.php');
	} elseif ($url == 'adicionar') {
		include('..\pages\adicionar.php');
	} elseif ($url == 'perfil') {
		include('..\pages\perfil.php');
	} elseif($url == 'perfil_postagens'){
		include('..\pages\perfil_postagens.php');
	}elseif (file_exists('pages/' . $url . '.php')) {
?>
		<section class="center">
			<header>
				<div class='logotipo'>
					<img src="./imagens/hsmini.png">
				</div>
				<div class="clear"></div>
				<div class="right">
					<?php
					if ($btn_vef == false) {
					?>
						<button id="btn-login-main" class="login"> Login </button>
					<?php
					} else {
					?>
						<button id="btn-perfil-main" class="login"> Perfil </button>
					<?php
					}
					?>
				</div>
				<div class="clear"></div>
				<div class='espaco'></div>
			</header><!-- /header -->
		</section>
		<!--center-->
	<?php
		include('pages/' . $url . '.php');
	} else {
		include('..\pages\404.php');
	}
	?>
	<!--botão de adicionar-->
	<?php if ($btn_vef == true and file_exists('pages/' . $url . '.php') == true){ ?>
		<button style="background: green; border-radius: 50%; width: 90px; height: 90px; right: 25px; position: fixed; bottom: 25px; opacity: 0.8;" id="btn-adicionar" class="btn-adicionar-classe">Postar!</button>
	<?php }?>
	</section>
    <script src="..\scripts\login.js" type="text/javascript" charset="utf-8"></script>
    <script src="..\scripts\jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="..\scripts\constants.js" type="text/javascript" charset="utf-8"></script>
	<script src="..\scripts\index_buttons.js" type="text/javascript" charset="utf-8"></script>
	<script src="..\scripts\adicionar.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>