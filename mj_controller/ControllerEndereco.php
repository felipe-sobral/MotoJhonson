<?php

    require_once "../mj_model/Endereco.php";

    class ControllerEndereco{

        public static function inserir($dados){
            $end = new Endereco;

            $end->setUsuario($dados["usuario"]);
            $end->setCep($dados["cep"]);
            $end->setUf($dados["uf"]);
            $end->setLogradouro($dados["logradouro"]);
            $end->setMunicipio($dados["municipio"]);
            $end->setNumero($dados["numero"]);
            $end->setBairro($dados["bairro"]);

            $end->cadastrar();
        }

        public static function buscar_enderecos($usuario){

            $end = new Endereco;

            $end->setUsuario($usuario);
            return $end->buscar();

        }

    }