<?php

    require_once "ControllerUsuario.php";
    require_once "ControllerEndereco.php";
    require_once "../mj_model/Empresa.php";

    class ControllerEmpresa extends ControllerUsuario{

        public static function inserir($dados){
            $empresa = new Empresa;

            $empresa->setCnpj($dados["cnpj"]);
            $empresa->setUsuario($dados["usuario"]);

            $empresa->cadastrar();
        }

        //inserir_USUARIO_EMPRESA_ENDEREÇO
        public static function inserir_UEE($usuario, $empresa, $endereco){
            parent::inserir($usuario);
            self::inserir($empresa);
            ControllerEndereco::inserir($endereco);
        }

        private static function criar_sessao_empresa($e){
            
            parent::criar_sessao($e);

            $_SESSION["mj_login"] += [
                "cnpj" => $e["cnpj"],
                "tipo" => "EMPRESA"
            ];

            echo "#true#";
        }

        public static function logar($cnpj, $senha){
            $empresa = new Empresa;

            $empresa->setCnpj($cnpj);
            $empresa->setSenha(sha1($senha));

            $empresa = $empresa->buscar();

            return !empty($empresa) ? self::criar_sessao_empresa($empresa[0]) : "LOGIN INVÁLIDO";
        }

        public static function verificar_session(){

            isset($_SESSION) ? : session_start();
            $info = isset($_SESSION["mj_login"]) ? $_SESSION["mj_login"] : false;

            if($info != false){

                $m = new Empresa;

                $m->setUsuario($info["usuario"]);
                $m->setSenha($info["senha"]);
                $m->setCnpj($info["cnpj"]);

                $usr = $m->buscar();

                return !empty($usr) ? self::criar_sessao_empresa($usr[0]) : "LOGIN INVÁLIDO";
            }

            return false;
        }

        public static function buscar_usuario($usuario){
            $m = new Empresa;
            $m->setUsuario($usuario);
            
            return $m->buscar_usuario();
        }

        public static function buscarWithEnderecos($usuario){
            $empresa = self::buscar_usuario($usuario);
            $enderecos = ControllerEndereco::buscar_enderecos($usuario);

            return [$empresa[0], $enderecos];

        }

    }

    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

            case "inserir_empresa":
                echo ControllerEmpresa::inserir_UEE($_POST["usuario"], $_POST["empresa"], $_POST["endereco"]);
                break;

            case "logar_empresa":
                echo ControllerEmpresa::logar($_POST["registro"], $_POST["senha"]);
                break;

            case "verificar_session":
                ControllerEmpresa::verificar_session();
                break;
        

        }

    }