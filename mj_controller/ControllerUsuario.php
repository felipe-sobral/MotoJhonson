<?php

    require_once "../mj_model/Usuario.php";

    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

    class ControllerUsuario{

        public static function inserir($dados){
            $usr = new Usuario;

            $usr->setUsuario($dados["usuario"]);
            $usr->setSenha(sha1($dados["senha"]));
            $usr->setTelefone($dados["telefone"]);
            $usr->setEmail($dados["email"]);
            $usr->setNome($dados["nome"]);

            return $usr->cadastrar();
        }

        /*
        protected function criar_sessao($motoboy){

            if(!is_array($motoboy)){
                return false;
            }

            isset($_SESSION) ?  : session_start();

            $_SESSION["mj_login_usuario"] = $motoboy["usuario"] ? : "#unknow#";
            $_SESSION["mj_login_senha"] = $motoboy["senha"] ? : "#unknow#";
            $_SESSION["mj_login_cpf"] = $motoboy["cpf"] ? : "#unknow#";
            $_SESSION["mj_login_cnpj"] = $motobou["cnpj"] ? : "#unknow#";

            print_r($_SESSION); // CONTINUAR AQUI
        }

        public function verificar_login($usuario, $senha){
            $moto = new Motoboy;

            $moto->setUsuario($usuario);
            $moto->setSenha($senha);

            $this->criar_sessao($moto->verificar_usuario());
        }*/

    }

    $controller = new ControllerUsuario;

    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

            default:
                print("Acao invalida!");

        }

    }