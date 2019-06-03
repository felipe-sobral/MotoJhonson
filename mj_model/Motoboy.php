<?php

    require_once "Usuario.php";

    class Motoboy extends Usuario{
        private $tb_usuarios = "usuarios";
        private $tabela = "motoboys";
        private static $s_tabela = "motoboys";
        private $cpf;
        private $veiculo;
        private $disponivel;

        public function __construct(){

        }

        //public funcion setUsuario();

        public function setCpf($valor){
            $this->cpf = $valor;
        }

        public function setVeiculo($valor){
            $this->veiculo = $valor;
        }

        public function setDisponivel($valor){
            $this->disponivel = $valor;
        }

        public function cadastrar(){
            parent::inserir($this->tabela, [
                "USUARIOS_usuario" => $this->usuario,
                "cpf" => $this->cpf,
                "veiculo" => $this->veiculo   
            ]);
        }

        public function buscar(){
            return parent::selecionar_igual(
                [$this->tb_usuarios, $this->tabela],
                "*",
                [
                    "{$this->tb_usuarios}.usuario" => "{$this->tabela}.USUARIOS_usuario",
                    "{$this->tb_usuarios}.senha" => $this->senha,
                    "{$this->tabela}.cpf" => $this->cpf
                ]
            );
        }

        public static function buscar_disponivel(){

            return parent::selecionar_igual(
                self::$s_tabela,
                "*",
                ["disponivel" => 1]
            );

        }

        public function disponivel(){

            return parent::editar(
                [$this->tb_usuarios, $this->tabela],
                ["{$this->tabela}.disponivel" => $this->disponivel],
                ["{$this->tabela}.cpf" => $this->cpf, "{$this->tb_usuarios}.usuario" => $this->usuario, "{$this->tb_usuarios}.senha" => $this->senha]
            );

        }

    }