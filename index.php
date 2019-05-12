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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="src/css/main.css">

        <title>MotoJhonson</title>

    </head>
    <body>

        <?php 

            navigation();

        ?>

        <div class="rodape">
            <img src="src/img/logo_preta.svg" style="width: 100px">
            <ul>
                <li>Twitter</li>
                <li>Github</li>
                <li>Facebook</li>
            </ul>
            <p>2019</p>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="src/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>