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
        public function inserir_UM($usuario, $motoboy){
            parent::inserir($usuario);
            self::inserir($motoboy);
        }

        public static function logar($cpf, $senha){

            $moto = new Motoboy;

            $moto->setCpf($cpf);
            $moto->setSenha($senha);

            $motoboy = $moto->buscar();

        }

    }

    $controller = new ControllerMotoboy;

    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

            case "inserir_UM":
                echo $controller->inserir_UM($_POST["usuario"], $_POST["motoboy"]);
                break;

            case "logar":
                echo "123";
                break;

            default:
                print("Acao invalida!");

        }

    }