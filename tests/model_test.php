<?php
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);


    include_once "../mj_model/Model.php";

    //selecionar_igual($tabelas, $colunas, $parametros)
    //SELECT * FROM usuarios INNER JOIN motoboys WHERE (usuarios.usuario, usuarios.senha, motoboys.cpf) = (motoboys.USUARIOS_usuario, "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "0000000002");
    //SELECT * FROM usuarios, motoboys WHERE (usuarios.usuario, usuarios.senha, motoboys.cpf) = (motoboys.USUARIOS_usuario, "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "0000000002");
    
    function teste($teste, $nome_do_teste){

        echo "
        
            =========================<br>
            $nome_do_teste<br>
            =========================<br>
            ".print_r($teste)."

            <br><br>
        
        ";

    }
    

    teste(Model::selecionar_igual(
        ["usuarios", "motoboys"],
        "*",
        [
            "usuarios.usuario" => "motoboys.USUARIOS_usuario",
            "usuarios.senha" => "40bd001563085fc35165329ea1ff5c5ecbdbbeef",
            "motoboys.cpf" => "00000000000"
        ]
    ), "Selecionar Igual");

    //print_r(Model::editar("motoboys", ["disponivel" => 0], ["cpf" => "00000000000"]));