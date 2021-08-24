<?php 
    class Logout{
        public static $array = [];
        public static function sair(){
            session_destroy();
            header("Location: ". INCLUDE_PATH);
        }
    }
?>