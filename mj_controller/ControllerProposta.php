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

        public static function abrir_proposta($id){

            $p = new Proposta();
            $p->setId($id);
            $proposta = $p->buscar_proposta();

            echo json_encode($proposta[0]);

        }

        public static function aceitar_proposta($id, $login){

            if($login["tipo"] == "MOTOJHONSON"){

                $p = new Proposta();
                $p->setId($id);
                $p->setMotoboy($login["usuario"]);
                $p->setSituacao("ACEITA");
                if($p->alterar_situacao()){
                    echo "PROPOSTA ACEITA";
                    exit;
                }

            }

            echo "ERROR =(";
        }

        public static function emandamento_proposta($id, $login){
            
            if($login["tipo"] == "EMPRESA"){

                $p = new Proposta();
                $p->setId($id);
                $p->setEmpresa($login["usuario"]);
                $p->setSituacao("EM ANDAMENTO");
                if($p->alterar_situacao()){
                    echo "TUDO PRONTO!";
                    exit;
                }

            }

            echo "ERROR =(";

        }

        public static function finalizar_proposta($id, $login){

            $p = new Proposta();
            $p->setId($id);
            
            if($login["tipo"] == "EMPRESA"){
                $p->setEmpresa($login["usuario"]);
            } else if($login["tipo"] == "MOTOJHONSON"){
                $p->setMotoboy($login["usuario"]);
            }

            $p->setSituacao("FINALIZADA");
            if($p->alterar_situacao()){
                echo "TUDO PRONTO!";
                exit;
            }

            echo "ERROR =(";

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

            case "abrir_proposta":
                ControllerProposta::abrir_proposta($_POST["id"]);
                break;

            case "aceitar_proposta":
                ControllerProposta::aceitar_proposta($_POST["id"], $login);
                break;

            case "emandamento_proposta":
                ControllerProposta::emandamento_proposta($_POST["id"], $login);
                break;

            case "finalizar_proposta":
                ControllerProposta::finalizar_proposta($_POST["id"], $login);
                break;

            case "cancelar_proposta":
                ControllerProposta::finalizar_proposta($_POST["id"], $login);
                break;

        }

    }

    