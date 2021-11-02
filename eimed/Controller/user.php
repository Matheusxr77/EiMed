<?php
class User {
    public function login($email, $password){
        //receive global variable
        global $pdo; 
        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("password", MD5($password));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();

            $_SESSION['iduser'] = $dado['id'];

            return true;
        }
        else {
            return false;
        }
    }
}
?>