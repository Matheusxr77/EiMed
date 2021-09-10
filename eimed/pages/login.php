<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login </title>
    <link rel="stylesheet" href="..\css\login.css">
    <link rel="sortcut icon" href="..\images\temas_social.png" type="image/png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
    <!-- container -->
    <div class="container">
        <?php
        if (isset($_POST['acao'])) {
            Login::logar($_POST['email'], $_POST['password']);
        }
        if (isset($_POST['acao-register'])) {
            $username = $_POST['username-register'];
            $email = $_POST['email-register'];
            $password = $_POST['password-register'];

            Cadastrar::cadastro($username, $email, $password);
        }
        ?>
        <!-- first content -->
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary"> Bem-vindo! </h2>
                    <p class="description description-primary"> Para se manter conectado conosco </p>
                    <p class="description description-primary"> por favor faça o login com suas informações pessoais. </p>
                <button id="signin" class="btn btn-primary"> Entrar </button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second"> Criar Conta </h2>
                <!-- social media -->
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>        
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div>
                <p class="description description-second"> ou use seu e-mail para registro: </p>
                <!-- second column -->
                <form class="form" method="POST" accept-charset="utf-8">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Nome" name="username-register" required>
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="E-mail" name="email-register" required>
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="password-register" required>
                    </label>
                    <input class="btn btn-second" type="submit" name="acao-register" value="ENVIAR">      
                </form>
            </div>
        </div>
        <!-- second-content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary"> Olá! </h2>
                    <p class="description description-primary"> Insira seus dados pessoais </p>
                    <p class="description description-primary"> e comece uma jornada conosco! </p>
                <button id="signup" class="btn btn-primary"> Cadastrar-se </button>
            </div>
            <!-- second column -->
            <div class="second-column">
                <h2 class="title title-second"> Acessar Conta </h2>
                <!-- social media -->
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div>
                <p class="description description-second"> ou use sua conta de e-mail: </p>
                <form class="form" method="POST" accept-charset="utf-8">
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="E-mail" name="email" required>
                    </label>
                
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="password" required>
                    </label>
                    <a class="password" href="#"> Esqueceu sua senha? </a>
                    <input class="btn btn-second" type="submit" name="acao" value="ENVIAR">
                </form>
            </div>
        </div>
    </div>
    <script src="..\scripts\login.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>