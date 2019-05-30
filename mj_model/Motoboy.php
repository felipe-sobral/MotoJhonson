<?php

    require_once "Usuario.php";

    class Motoboy extends Usuario{
        private $tabela = "motoboys";
        private $cpf;
        private $veiculo;

        public function __construct(){

        }

        //public funcion setUsuario();

        public function setCpf($valor){
            $this->cpf = $valor;
        }

        public function setVeiculo($valor){
            $this->veiculo = $valor;
        }

        public function cadastrar(){
            parent::inserir($this->tabela, [
                "USUARIOS_usuario" => $this->usuario,
                "cpf" => $this->cpf,
                "veiculo" => $this->veiculo   
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
                    "{$this->tabela}.cpf" => $this->cpf
                ]
            );
        }

    }