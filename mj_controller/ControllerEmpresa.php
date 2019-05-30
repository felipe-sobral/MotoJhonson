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

            print_r($_SESSION["mj_login"]);
        }

        public static function logar($cnpj, $senha){

            $empresa = new Empresa;

            $empresa->setCnpj($cnpj);
            $empresa->setSenha(sha1($senha));

            $empresa = $empresa->buscar();

            return !empty($empresa) ? self::criar_sessao_empresa($empresa[0]) : "LOGIN INVÁLIDO";
        }


    }

    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

            case "inserir_empresa":
                echo ControllerEmpresa::nserir_UEE($_POST["usuario"], $_POST["empresa"], $_POST["endereco"]);
                break;

            case "logar":
                echo ControllerEmpresa::logar($_POST["registro"], $_POST["senha"]);
                break;

        }

    }