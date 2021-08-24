<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\perfil_deletar.css">
    <title>Perfil!</title>
</head>
<?php
if (isset($_POST['logout-acao'])) {
    Logout::sair();
}

?>

<body>
    <script src="..\scripts\jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="..\scripts\perfil_btn.js" type="text/javascript" charset="utf-8"></script>
    <div>
        <button class="btn-home" id='btn-perfil-home'>Home!</button>
    </div>
    <?php
    $receitas_light = MySql::conectar()->prepare("SELECT * FROM `tb_admin.receitas` WHERE autor = ?");
    $receitas_light->execute(array($_SESSION['user']));
    $receitas_light = $receitas_light->fetchAll();
    foreach ($receitas_light as $key => $value) {
        $id = $value['id']
    ?>

        <section class="local-receita">
            <table>
                <tr>
                    <td><img style="width: 90px; height: 90px;" src="uploads\<?php echo $value['imagem'] ?>">
                        <button class="btn_rcp" id="<?php echo $value['slug']; ?>"><?php echo $value['titulo']; ?></button>
                        <form method="post">
                            <button class="deletar-class" type="submit" name="<?php echo $id; ?>-acao-deletar">DELETAR!</button>
                        </form>
                    </td>
                </tr>
            </table>
        </section>

        <?php

        $slug = $value['slug'];
        $imagem = $value['imagem'];
        echo "<script type='text/javascript'>;
        $(function() {
            $(`#$slug`).click(function() {
                $('#gambiarra-de-guilherme-'+`$slug`).fadeIn();
            });
            $('#gambiarra-btn-'+`$slug`).click(function(){
                 $('#gambiarra-de-guilherme-'+`$slug`).fadeOut();
            });
        });
      
        </script>";
        ?>
        <div class="gambiarra-guilherme" id="gambiarra-de-guilherme-<?php echo $value['slug']; ?>">
            <h1><?php echo $value['titulo']; ?></h1>
            <h3>Autor: <?php echo $value['autor']; ?></h3>
            <h5>Conteúdo: </h5>
            <p><?php echo $value['conteudo']; ?></p>
            <button class="gambiarra-guilherme-btn" id="gambiarra-btn-<?php echo $value['slug']; ?>">FECHAR!</button>
        </div>
    <?php
        if (isset($_POST["$id-acao-deletar"])) {
            Controle::deletar($id);
        }
    } ?>
</body>
</html>