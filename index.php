<?php
    function navigation(){

        $get = isset($_GET["pg"]) ? $_GET["pg"]: "index";

        switch($get){

            case "login":
                require_once "mj_view/login.php";
                break;

            case "cadastrar":
                require_once "mj_view/login.php#cadastrar";
                break;
            
            case "painel":
                require_once "mj_view/painel.php";
                break;

            default:
                require_once "mj_view/inicio.php";

        }

    }

    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

?>

<!doctype html>
<html lang="pt-br">
    <head>
        
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="src/css/main.css">
        <script src="https://kit.fontawesome.com/07a71e0d04.js"></script>

        <title>MotoJhonson</title>

    </head>
    <body>

        <?php 

            navigation();

        ?>

        <div class="rodape">
            <img src="src/img/logo_preta.svg" style="width: 100px"><br>
            
            <a href="#" target="_BLANK"><i class="fab fa-twitter-square fa-3x"></i></a>
            
            <a href="#" target="_BLANK"><i class="fab fa-facebook-square fa-3x"></i></a>

            <a href="#" target="_BLANK"><i class="fab fa-github fa-3x" class="color: #000"></i></a>

            <p>2019</p>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="src/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>