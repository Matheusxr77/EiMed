<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\perfil.css">
    <title> Perfil </title>
</head>
<?php
if (isset($_POST['logout-acao'])) {
    Logout::sair();
}

$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.receitas` WHERE autor = ?");
$sql->execute(array($_SESSION['user']));
$sql = $sql->rowCount();

?>

<body>
    <section class="descricao">
        
        <h1> Usuário: <?php echo $_SESSION['user']; ?></h1>
                
        <div>
            <h1><?php echo $sql; ?></h1>
            <h4><a href="perfil_postagens"> Total de postagens! </a></h4>
        </div>

        <form method="post">
            <input id="btn-perfil-logout" name="logout-acao" type="submit" value="Logout!">
        </form>
        <div>
            <button class="btn-voltar" id='btn-perfil-home'> Home! </button>
        </div>
    </section>    
    
</body>
<script src=".\scripts\jquery.js" type="text/javascript" charset="utf-8"></script>
<script src=".\scripts\perfil_btn.js" type="text/javascript" charset="utf-8"></script>
</html>