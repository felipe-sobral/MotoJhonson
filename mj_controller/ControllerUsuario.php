<?php

    require_once "../mj_model/Usuario.php";
    require_once "ControllerMotoboy.php";
    require_once "ControllerEmpresa.php";

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

        public static function deslogar(){
            isset($_SESSION) ? : session_start();

            session_destroy();

            echo "#true#";            
        }

    }


    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

            case "deslogar":
                ControllerUsuario::deslogar();
                break;

            // case "montar_proposta":
            //     isset($_SESSION) ? : session_start();                
            //     ControllerUsuario::montar_proposta($_POST["motoboy"], $_SESSION["mj_login"]["usuario"]);
            //     break;

        }

    }