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

        protected static function criar_sessao($u){
            isset($_SESSION) ? : session_start();

            $_SESSION["mj_login"] = [
                "id" => $u["id"],
                "usuario" => $u["usuario"],
                "carteira" => $u["carteira"],
                "telefone" => $u["telefone"],
                "email" => $u["email"],
                "situacao" => $u["situacao"],
                "nome" => $u["nome"],
                "senha" => $u["senha"]
            ];
        }

        public static function verificar_login(){

            isset($_SESSION) ? : session_start();
            $info = isset($_SESSION["mj_login"]) ? $_SESSION["mj_login"] : false;

            if($info != false){
                
                $usr = new Usuario;

                $usr->setUsuario($info["usuario"]);
                $usr->setSenha($info["senha"]);

                $usr = $usr->buscar();

                if(!empty($usr)){
                    return true;
                }

            }


            return false;
        }

    }

    $controller = new ControllerUsuario;

    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

        }

    }