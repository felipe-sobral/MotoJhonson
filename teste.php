<?php

    $dados = ["cnpj" => "000",
             "teste" => "teste"];

    // INSERT INTO tabela (cnpj, teste) VALUES (:cnpj, :teste);
    
    $campos = implode(", ", array_keys($dados));
    $valores = ":".implode(", :", array_keys($dados));

    echo $campos."/".$valores;
    