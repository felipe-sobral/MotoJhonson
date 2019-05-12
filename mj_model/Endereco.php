<?php

    require_once "Model.php";

    class Endereco extends Model{
        private $tabela = "enderecos";
        private $cep;
        private $uf;
        private $logradouro;
        private $municipio;
        private $rua;
        private $numero;
        private $bairro;
        private $proprietario;

        public function __construct(){
            
        }

        public function setUsuario($valor){
            $this->proprietario = $valor;
        }

        public function setCep($valor){
            $this->cep = $valor;
        }

        public function setLogradouro($valor){
            $this->logradouro = $valor;
        }

        public function setMunicipio($valor){
            $this->municipio = $valor;
        }

        public function setRua($valor){
            $this->rua = $valor;
        }

        public function setNumero($valor){
            $this->numero = $valor;
        }

        public function setBairro($valor){
            $this->bairro = $valor;
        }

        public function setUf($valor){
            $this->uf = $valor;
        }

        public function cadastrar(){
            parent::inserir($this->tabela, [
                "USUARIOS_usuario" => $this->proprietario,
                "cep" => $this->cep,
                "logradouro" => $this->logradouro,
                "municipio" => $this->municipio,
                "rua" => $this->rua,
                "numero" => $this->numero,
                "bairro" => $this->bairro,
                "uf" => $this->uf
            ]);
        }
    }