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

        public function verificar_usuario(){
            return parent::selecionar_innerjoin(["*"], ["usuarios"], [$this->tabela], 
                                                ["usuarios.usuario = {$this->tabela}.USUARIOS_usuario"],
                                                ["usuarios.usuario" => $this->usuario, "usuarios.senha" => $this->senha]);
        }

    }