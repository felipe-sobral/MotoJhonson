<?php

    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

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
        public function inserir_UEE($usuario, $empresa, $endereco){
            parent::inserir($usuario);
            self::inserir($empresa);
            ControllerEndereco::inserir($endereco);
        }

        public function verificar_login($usuario, $senha){
            $moto = new Empresa;

            $moto->setUsuario($usuario);
            $moto->setSenha($senha);

            $this->criar_sessao($moto->verificar_usuario());
        }


    }

    $controller = new ControllerEmpresa;

    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

            case "inserir_UEE":
                echo $controller->inserir_UEE($_POST["usuario"], $_POST["empresa"], $_POST["endereco"]);
                break;

            case "login":
                $controller->verificar_login($_POST["usuario"], $_POST["senha"]);
                break;

            default:
                print("Acao invalida!");

        }

    }