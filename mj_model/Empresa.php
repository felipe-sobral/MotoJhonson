<?php

    require_once "Usuario.php";

    class Empresa extends Usuario{
        private $tabela = "empresas";
        private $tb_usuarios = "usuarios";
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

            return parent::selecionar_igual(
                [$this->tb_usuarios, $this->tabela],
                "*",
                [
                    "{$this->tb_usuarios}.usuario" => "{$this->tabela}.USUARIOS_usuario",
                    "{$this->tb_usuarios}.senha" => $this->senha,
                    "{$this->tabela}.cnpj" => $this->cnpj
                ]
            );
        }

        public function buscar_usuario(){
            return parent::selecionar_igual(
                [$this->tb_usuarios, $this->tabela],

                "{$this->tb_usuarios}.usuario,
                 {$this->tb_usuarios}.nome,
                 {$this->tb_usuarios}.telefone,
                 {$this->tb_usuarios}.email,
                 {$this->tabela}.cnpj",

                ["{$this->tb_usuarios}.usuario" => "{$this->tabela}.USUARIOS_usuario",
                 "{$this->tabela}.USUARIOS_usuario" => $this->usuario]
            );
        }
    }