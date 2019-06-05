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

            echo "#true#";
        }

        public static function logar($cpf, $senha){

            $moto = new Motoboy;

            $moto->setCpf($cpf);
            $moto->setSenha(sha1($senha));

            $motoboy = $moto->buscar();

            return !empty($motoboy) ? self::criar_sessao_motoboy($motoboy[0]) : "LOGIN INVÁLIDO";
        }


        public static function ficar_disponivel($cpf, $usuario, $senha, $disponivel){
            
            $m = new Motoboy;

            $m->setCpf($cpf);
            $m->setSenha($senha);
            $m->setUsuario($usuario);

            if($disponivel == 1 || $disponivel == 0){
                $m->setDisponivel($disponivel);
            } else {
                echo "VALOR INVÁLIDO";
                exit;
            }
            
            $m = $m->disponivel();
        
            $resposta = $m ? "#true#" : "#false#";

            if($resposta == "#true#"){
                isset($_SESSION) ? : session_start();
                $_SESSION["mj_login"]["disponivel"] = $disponivel;
            }

            echo $resposta;
            exit;
        }

        public static function verificar_session(){

            isset($_SESSION) ? : session_start();
            $info = isset($_SESSION["mj_login"]) ? $_SESSION["mj_login"] : false;

            if($info != false){
                $m = new Motoboy;

                $m->setUsuario($info["usuario"]);
                $m->setSenha($info["senha"]);
                $m->setCpf($info["cpf"]);

                $usr = $m->buscar();

                return !empty($usr) ? self::criar_sessao_motoboy($usr[0]) : "LOGIN INVÁLIDO";
            }

            return false;
        }

        public static function buscar_entregadores_disponiveis(){

            $motoboys = Motoboy::buscar_disponivel();

            echo json_encode($motoboys);

        }

        public static function buscar_usuario($usuario){
            $m = new Motoboy;
            $m->setUsuario($usuario);
            
            return $m->buscar_usuario();
        }

        public static function buscar_entregador($usuario){
            $usr = self::buscar_usuario($usuario);

            echo !empty($usr) ? json_encode($usr[0]) : "USUÁRIO INVÁLIDO";
        }

    }

    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

            case "inserir_motoboy":
                echo ControllerMotoboy::inserir_UM($_POST["usuario"], $_POST["motoboy"]);
                break;

            case "logar_motoboy":
                echo ControllerMotoboy::logar($_POST["registro"], $_POST["senha"]);
                break;

            case "ficar_disponivel_session":
                isset($_SESSION) ? : session_start();
                $dados = isset($_SESSION["mj_login"]) ? $_SESSION["mj_login"] : exit;
                echo ControllerMotoboy::ficar_disponivel($dados["cpf"], $dados["usuario"], $dados["senha"], $_POST["disponivel"]);
                break;

            case "verificar_session":
                ControllerMotoboy::verificar_session();
                break;

            case "buscar_entregadores":
                ControllerMotoboy::buscar_entregadores_disponiveis();
                break;

            case "buscar_entregador":
                ControllerMotoboy::buscar_entregador($_POST["usuario"]);
                break;

        }

    }