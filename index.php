<?php

    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

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

?>

<!doctype html>
<html lang="pt-br">
    <head>
        
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="src/css/main.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">

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

        <script src="src/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>