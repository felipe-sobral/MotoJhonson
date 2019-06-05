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

        public function buscar_usuario(){
            return parent::selecionar_igual(
                [$this->tb_usuarios, $this->tabela],

                "{$this->tb_usuarios}.usuario,
                 {$this->tb_usuarios}.nome,
                 {$this->tb_usuarios}.telefone,
                 {$this->tb_usuarios}.email,
                 {$this->tabela}.cpf,
                 {$this->tabela}.veiculo,
                 {$this->tabela}.valor_hora,
                 {$this->tabela}.valor_fixo,
                 {$this->tabela}.disponivel",

                ["{$this->tb_usuarios}.usuario" => "{$this->tabela}.USUARIOS_usuario",
                 "{$this->tabela}.USUARIOS_usuario" => $this->usuario]
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