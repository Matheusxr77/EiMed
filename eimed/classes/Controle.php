<?php 
    class Controle{
        public static function imagemValida($imagem)
        {
            if (
                $imagem['type'] == 'image/jpeg' ||
                $imagem['type'] == 'imagem/jpg' ||
                $imagem['type'] == 'imagem/png'
            ) {

                $tamanho = intval($imagem['size'] / 1024);
                if ($tamanho < 300)
                    return true;
                else
                    return false;
            } else {
                return false;
            }
        }

        public static function uploadFile($file)
        {
            $formatoArquivo = explode('.', $file['name']);
            $imagemNome = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
            if (move_uploaded_file($file['tmp_name'],'./uploads/' . $imagemNome))
            return $imagemNome;
            else
                return false;
        }

        public static function generateSlug($str){
            $str = mb_strtolower($str);
            $str = preg_replace('/(â|á|ã)/', 'a', $str);
            $str = preg_replace('/(ê|é)/', 'e', $str);
            $str = preg_replace('/(í|Í)/', 'i', $str);
            $str = preg_replace('/(ú)/', 'u', $str);
            $str = preg_replace('/(ó|ô|õ|Ô)/', 'o', $str);
            $str = preg_replace('/(_|\/|!|\?|#)/', '', $str);
            $str = preg_replace('/( )/', '-', $str);
            $str = preg_replace('/ç/', 'c', $str);
            $str = preg_replace('/(-[-]{1,})/', '-', $str);
            $str = preg_replace('/(,)/', '-', $str);
            $str = strtolower($str);
            return $str;
        }

        public static function deletar($id){
            $sql = MySql::conectar()->prepare("DELETE FROM `tb_admin.receitas` WHERE id=?");
            $sql->execute(array($id));
            header("Location: ".INCLUDE_PATH. "perfil_postagens");
        }       
    }
?>