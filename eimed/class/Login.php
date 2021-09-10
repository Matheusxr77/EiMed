<?php 
	class Login{
		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}

		public static function logar($email, $password){
			$sql = MySql::conectar()->prepare("SELECT * FROM `user` WHERE email = ? AND password = ?");
			$sql->execute(array($email, $password));
			if($sql->rowCount() == 1){
				//Logado com sucesso!
				$_SESSION['login'] = true;
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				header("Location: ".INCLUDE_PATH);
				die();
			}else{
				//Falha no login
				echo("<div style='width: 100%; padding: 4px 2%; text-align: center; background: #b50e22; color: white; font-size: 15px;'class='box-erro'>Usuário ou senha inválido!</div>");
			}
		}	
	}
?>