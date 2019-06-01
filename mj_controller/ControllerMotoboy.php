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


        public static function ficar_disponivel($cpf, $senha, $disponivel){
            
            $m = new Motoboy;

            $m->setCpf($cpf);

            if($disponivel == 1 || $disponivel == 0){
                $m->setDisponivel($disponivel);
            } else {
                echo "VALOR INVÁLIDO";
                exit;
            }
            
            $m = $m->disponivel();
            

            $resposta = $m ? "#true#" : "#false#";

            echo $resposta;
            exit;
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

            // case "ficar_disponivel":
            //     echo ControllerMotoboy::ficar_disponivel($_POST["cpf"], $_POST["senha"], $_POST["disponivel"]);
            //     break;

            case "ficar_disponivel_session":
                isset($_SESSION) ? : session_start();
                $dados = isset($_SESSION["mj_login"]) ? $_SESSION["mj_login"] : exit;
                echo ControllerMotoboy::ficar_disponivel($dados["cpf"], $dados["senha"], $_POST["disponivel"]);
                break;

        }

    }