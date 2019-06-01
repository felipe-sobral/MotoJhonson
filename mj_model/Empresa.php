<?php

    require_once "Usuario.php";

    class Empresa extends Usuario{
        private $tabela = "empresas";
        private $cnpj;

        public function __construct(){

        }

        public function setCnpj($valor){
            $this->cnpj = $valor;
        }

        public function cadastrar(){
            parent::inserir($this->tabela, [
                "USUARIOS_usuario" => $this->usuario,
                "cnpj" => $this->cnpj
            ]);
        }

        public function buscar(){
            $tb_usuarios = "usuarios";

            return parent::selecionar_igual(
                [$tb_usuarios, $this->tabela],
                "*",
                [
                    "$tb_usuarios.usuario" => "{$this->tabela}.USUARIOS_usuario",
                    "$tb_usuarios.senha" => $this->senha,
                    "{$this->tabela}.cnpj" => $this->cnpj
                ]
            );
        }
    }