<?php

    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

    require_once "../mj_model/Proposta.php";
    require_once "ControllerMotoboy.php";
    require_once "ControllerEmpresa.php";

    class ControllerProposta{


        public static function montar_proposta($motoboy, $empresa){

            $motoboy = ControllerMotoboy::buscar_usuario($motoboy);
            $empresa = ControllerEmpresa::buscarWithEnderecos($empresa);

            echo json_encode([$motoboy[0], [$empresa[0], $empresa[1]]]);

        }

        public static function fazer_proposta($motoboy, $endereco, $valor, $valor_tipo, $empresa){

            $proposta = new Proposta;

            $proposta->setMotoboy($motoboy);
            $proposta->setEmpresa($empresa);
            $proposta->setEndereco($endereco);
            $proposta->setValor($valor);
            $proposta->setValor_tipo($valor_tipo);
            $proposta->setSituacao("ESPERANDO");

            $p = $proposta->cadastrar();

            if($p != 0){
                echo "#true#";
            }      
        }

        public static function listar_propostas($usuario, $tipo, $situacao){

            $p = Proposta::buscar_propostas($usuario, $tipo, $situacao);

            echo json_encode($p);
        }

    }

    isset($_SESSION) ? : session_start();
    $login = isset($_SESSION["mj_login"]) ? $_SESSION["mj_login"] : "unknow";

    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

            case "montar_proposta":      
                ControllerProposta::montar_proposta($_POST["motoboy"], $login["usuario"]);
                break;

            case "listar_propostas":
                ControllerProposta::listar_propostas($login["usuario"], $login["tipo"], $_POST["situacao"]);
                break;

            case "fazer_proposta":        
                ControllerProposta::fazer_proposta($_POST["motoboy"], $_POST["endereco"], $_POST["valor"], $_POST["valor_tipo"], $login["usuario"]);
                break;

        }

    }

    