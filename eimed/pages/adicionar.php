<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\css\adicionar.css">
    <title> POSTAR </title>
</head>

<body>

    <section class="adicionar-box">
        <form method="post" enctype="multipart/form-data">
            <div class="select">
                <label class="label-categoria"> Selecione um categoria: </label>
                <?php
                if (isset($_POST['acao-adicionar'])) {
                    $capa = $_FILES['capa'];
                    $categoria_selec_id = $_POST['categoria_id'];
                    $user = $_SESSION['user'];
                    $titulo = $_POST['titulo'];
                    $conteudo = $_POST['conteudo'];
                    $vef = MySql::conectar()->prepare("SELECT * FROM `tb_admin.receitas` WHERE titulo = ?");
                    $vef->execute(array($titulo));
                    $q = $vef->rowCount();
                    if ($_POST['titulo'] == '' || $_POST['conteudo'] == '') {
                        echo "NÂO PODE SER VAZIO";
                    } elseif ($capa['tmp_name'] == '') {
                        echo "SELECIONE A IMAGEM";
                    } else {
                        if (Controle::imagemValida($capa)) {
                            $slug = Controle::generateSlug($titulo);
                            $capa = Controle::uploadFile($capa);
                            Postar::enviar($categoria_selec_id, $user, $titulo, $slug, $conteudo, $capa);
                        }
                        if ($q != 0) {
                            echo "JÁ EXISTE ESSE TITULO!";
                        } else {
                            echo "SELECIONE UMA IMGEM VALIDA!!";
                        }
                    }
                }
                ?>

                <select name="categoria_id">
                    <?php
                    $categorias = MySql::conectar()->prepare("SELECT * FROM `tb_admin.categorias`");
                    $categorias->execute();
                    $categorias = $categorias->fetchAll();
                    foreach ($categorias as $key => $value) {
                    ?>
                        <option <?php if ($value['id_categoria'] == @$_POST['categoria_id']) echo 'selected'; ?> value="<?php echo $value['id_categoria'] ?>"><?php echo $value['categoria']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <label class="label-titulo"> Digite o título: </label>
            <div>

                <input type="text" name="titulo" placeholder="Titulo..." required>
            </div>
            <label class="label-conteudo"> Digite o conteúdo: </label>
            <div>
                <textarea name="conteudo" placeholder="Conteudo..." required></textarea>
            </div>
            <label class="label-imagem"> Selecione a imagem: </label>
            <div class="imagem-div">
                <input type="file" name="capa" />
            </div>
            <div>
                <input type="submit" value="Postar!" name="acao-adicionar">
            </div>
            <div>
                <button class="btn-voltar" id="btn-topo"> Home! </button>
            </div>
            <div class="clear"></div>
    </section>
    </form>
    <script src="script\jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="script\btn_voltar_1.js"></script>
</body>
</html>