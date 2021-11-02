<!-- connection php -->
<?php
//connection database
include_once '../Model/db-connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- icons awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- icons -->
    <link rel="icon" href="../Public/images/icon.png">
    <!-- css -->
    <link rel="stylesheet" href="../Public/css/login.css">
    <!-- title of page -->
    <title> Login </title>
</head>
<body>
    <!-- login block -->
    <div class="container">
        <!-- registration block -->
        <div class="content first-content">
            <!-- text block -->
            <div class="first-column">
                <h2 class="title title-primary"> Bem-vindo! </h2>
                    <p class="description description-primary"> Para se manter conectado conosco </p>
                    <p class="description description-primary"> faça o login com suas informações pessoais. </p>
                <button id="signin" class="btn btn-primary"> Entrar </button>
            </div>
            <!-- form block -->
            <div class="second-column">
                <!-- title -->
                <h2 class="title title-second"> Criar Conta </h2>
                <p class="description description-second"> Registre-se para uma melhor navegação </p>
                <!-- form -->
                <form class="form" method="POST" action="#" accept-charset="utf-8">
                    <!-- input username -->
                    <label class="label-input" for="input-username-register">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" id="input-username-register" placeholder="Nome" name="username-register" required>
                    </label>
                    <!-- input email -->
                    <label class="label-input" for="input-email-register">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" id="input-email-register" placeholder="E-mail" name="email-register" required>
                    </label>
                    <!-- input password -->
                    <label class="label-input" for="input-password-register">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" id="input-password-register" placeholder="Senha" name="password-register" required>
                    </label>
                    <button class="btn btn-second" type="submit" name="acao-register" value="ENVIAR"> Cadastre-se </button>        
                </form>
            </div>
        </div>
        <!-- entry block -->
        <div class="content second-content">
            <!-- text block -->
            <div class="first-column">
                <!-- title -->
                <h2 class="title title-primary"> Olá! </h2>
                <p class="description description-primary"> Insira seus dados pessoais para </p>
                <p class="description description-primary"> começar sua jornada conosco! </p>
                <button id="signup" class="btn btn-primary"> Cadastrar-se </button>
            </div>
            <!-- form block -->
            <div class="second-column">
                <h2 class="title title-second"> Acessar Conta </h2>
                <p class="description description-second"> Vem navegar no EiMed, acessa ai </p>
                <!-- form -->
                <form class="form" method="POST" action="../php-action/logar.php" accept-charset="utf-8">
                    <!-- input email -->
                    <label class="label-input" for="input-email">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" id="input-email" placeholder="E-mail" name="email" required>
                    </label>
                    <!-- input password -->
                    <label class="label-input" for="input-password">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" id="input-password" placeholder="Senha" name="password" required>
                    </label>
                    <button class="btn btn-second" type="submit" name="acao" value="ENVIAR"> Entrar </button>
                </form>
            </div>
        </div>
    </div>
    <!-- script -->
    <script src="../Public/scripts/login.js"></script>
</body>
</html>