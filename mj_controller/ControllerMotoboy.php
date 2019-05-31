<?php
    require_once "ControllerUsuario.php";
    require_once "../mj_model/Motoboy.php";

    class ControllerMotoboy extends ControllerUsuario{

        public static function inserir($dados){
            $moto = new Motoboy;

            $moto->setCpf($dados["cpf"]);
            $moto->setVeiculo($dados["veiculo"]);
            $moto->setUsuario($dados["usuario"]);
            
            $moto->cadastrar();
        }

        //inserir_USUARIO_MOTOBOY
        public static function inserir_UM($usuario, $motoboy){
            parent::inserir($usuario);
            self::inserir($motoboy);
        }

        private static function criar_sessao_motoboy($m){
            
            parent::criar_sessao($m);

            $_SESSION["mj_login"] += [
                "cpf" => $m["cpf"],
                "veiculo" => $m["veiculo"],
                "disponivel" => $m["disponivel"],
                "tipo" => "MOTOJHONSON"
            ];

            print_r($_SESSION["mj_login"]);
        }

        public static function logar($cpf, $senha){

            $moto = new Motoboy;

            $moto->setCpf($cpf);
            $moto->setSenha(sha1($senha));

            $motoboy = $moto->buscar();

            return !empty($motoboy) ? self::criar_sessao_motoboy($motoboy[0]) : "LOGIN INVÁLIDO";
        }

    }

    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

            case "inserir_motoboy":
                echo ControllerMotoboy::inserir_UM($_POST["usuario"], $_POST["motoboy"]);
                break;

            case "logar":
                echo ControllerMotoboy::logar($_POST["registro"], $_POST["senha"]);
                break;

        }

    }