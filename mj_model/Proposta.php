<?php

    require_once "Model.php";

    class Proposta extends Model{
        private $tabela = "propostas";
        private static $s_tabela = "propostas";
        private $id;
        private $motoboy;
        private $empresa;
        private $endereco;
        private $valor;
        private $valor_tipo; 
        private $situacao;

        public function __construct(){

        }

        public function setMotoboy($valor){
            $this->motoboy = $valor;
        }

        public function setEmpresa($valor){
            $this->empresa = $valor;
        }

        public function setEndereco($valor){
            $this->endereco = $valor;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }

        public function setValor_tipo($valor){
            $this->valor_tipo = $valor;
        }

        public function setSituacao($valor){
            $this->situacao = $valor;
        }

        public function setId($valor){
            $this->id = $valor;
        }

        public function cadastrar(){
            return parent::inserir($this->tabela, [
                "MOTOBOYS_usuario" => $this->motoboy,
                "EMPRESAS_usuario" => $this->empresa,
                "ENDERECOS_id" => $this->endereco,
                "valor" => $this->valor,
                "valor_tipo" => $this->valor_tipo,
                "situacao" => $this->situacao
            ]);
        }

        public static function buscar_propostas($usuario, $tipo, $situacao){
            $tipo = ($tipo == "EMPRESA") ? "EMPRESAS_usuario" : "MOTOBOYS_usuario";
            $situacao = ($situacao == "*") ? [] : ["situacao" => $situacao];

            return parent::selecionar_igual(self::$s_tabela,
            "*",
            [$tipo => $usuario]+$situacao);
        }

        public function buscar_proposta(){
            return parent::innerjoin("*", $this->tabela, "enderecos", "{$this->tabela}.ENDERECOS_id = enderecos.id", ["{$this->tabela}.id" => $this->id]);
        }

        public function alterar_situacao(){
            //public static function editar($tabelas, $parametros, $condicoes){
            $campo = empty($this->motoboy) ? ["EMPRESAS_usuario" => $this->empresa] : ["MOTOBOYS_usuario" => $this->motoboy];   

            return parent::editar($this->tabela, ["situacao" => $this->situacao], ["id" => $this->id]+$campo);
        }

        //public function buscar(){}
        // public function remover(){}
        // public function editar(){}
        
        
    }
