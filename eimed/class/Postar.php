<?php 
    class Postar{
        public static function enviar($categoria_id, $user, $titulo, $slug, $conteudo, $imagem){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.receitas` VALUES (null, ?, ?, ?, ? ,? ,?)");
            $sql->execute(array($categoria_id, $user, $titulo, $slug, $conteudo, $imagem));
            header("Location: ".INCLUDE_PATH);
        }
    }
?>