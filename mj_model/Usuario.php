<?php

    require_once "Model.php";

    class Usuario extends Model{
        private $tabela = "usuarios";
        protected $usuario;
        protected $senha;
        protected $email;
        protected $telefone; 
        protected $nome;

        public function __construct(){

        }

        public function setUsuario($valor){
            $this->usuario = $valor;
        }

        public function setSenha($valor){
            $this->senha = $valor;
        }

        public function setEmail($valor){
            $this->email = $valor;
        }

        public function setTelefone($valor){
            $this->telefone = $valor;
        }

        public function setNome($valor){
            $this->nome = $valor;
        }

        public function cadastrar(){
            parent::inserir($this->tabela, [
                "usuario" => $this->usuario,
                "senha" => $this->senha,
                "email" => $this->email,
                "telefone" => $this->telefone,
                "nome" => $this->nome
            ]);
        }
        
        public function verificar_usuario(){
            return parent::selecionar_demo($this->usuario, $this->senha);
        }

        public function buscar(){
            return parent::selecionar_igual(
                $this->tabela,
                "*",
                ["usuario" => $this->usuario, "senha" => $this->senha]
            );
        }
        
    }


    