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

        //selecionar_innerjoin($colunas, $tabelas_a, $tabelas_b, $c_on, $c_where)
        public function verificar_usuario(){
            return parent::selecionar_innerjoin(["*"], ["usuarios"], [$this->tabela], 
                                                ["usuarios.usuario = {$this->tabela}.USUARIOS_usuario"],
                                                ["usuarios.usuario" => $this->usuario, "usuarios.senha" => $this->senha]);
        }

    }