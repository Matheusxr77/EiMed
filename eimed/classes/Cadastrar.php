<?php 
	class Cadastrar{
		public $array = [];

		public static function cadastro($user, $email, $password){
			try {
				function valida_email($email){
					return filter_var($email, FILTER_VALIDATE_EMAIL);
				}
				if ($user == '') {
					echo ("<div style='width: 100%; z-index: 998; padding: 4px 2%; text-align: center; background: #b50e22; color: white; font-size: 15px;'>Usuário não pode ser vazio!</div>");
				} else if ($email == ' ') {
					echo ("<div style='width: 100%; z-index: 999; padding: 4px 2%; text-align: center; background: #b50e22; color: white; font-size: 15px;'>Senha não pode ser vazia!</div>");
				} else if (valida_email($email) == false) {
					echo ("<div style='width: 100%; z-index: 999; padding: 4px 2%; text-align: center; background: #b50e22; color: white; font-size: 15px;'>Por favor coloque um email válido!</div>");
				} else if ($password == ' ') {
					echo ("<div style='width: 100%; z-index: 999; padding: 4px 2%; text-align: center; background: #b50e22; color: white; font-size: 15px;'>Senha não pode ser vazia!</div>");
				}else{
					$sql = MySql::conectar()->prepare("SELECT * FROM `usuario` WHERE Nome = ? or Email = ? ");
					$sql->execute(array($user, $email));
					if($sql->rowCount() > 0){
						echo ("<div style='width: 100%; z-index: 999; padding: 4px 2%; text-align: center; background: #b50e22; color: white; font-size: 15px;'class='box-erro'>Usuário ou email já registrado!</div>");
						die(json_encode($array['erro'] = 'false'));
					}else{
						$sql = MySql::conectar()->prepare("INSERT INTO `usuario` VALUES (null, ?, ?, ?, ?) ");
						$sql->execute(array($user, $email, "0", $password));
						
					}
				}
			} catch (Exception $e) {
				echo("<div style='width: 100%; padding: 4px 2%; text-align: center; background: #b50e22; color: white; font-size: 15px;'class='box-erro'>". $e ."</div>");
			}
		}
	}
?>