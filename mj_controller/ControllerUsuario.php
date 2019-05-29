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

        private static function cpf_cnpj($codigo){

            switch(strlen($codigo)){

                case 11:
                    return "CPF";

                case 14:
                    return "CNPJ";

                default:
                    return false;

            }

        }


        public static function logar($cpfnpj, $senha){

            $registro = self::cpf_cnpj($cpfnpj);

            if($registro == "CPF"){
                $url = "ControllerMotoboy.php";
            } elseif ($registro == "CNPJ"){
                $url = "ControllerEmpresa.php";
            } else {
                echo "DADOS INVÁLIDOS";
                exit;
            }
            
            

            /*
                $params=['name'=>'John', 'surname'=>'Doe', 'age'=>36)
                $defaults = array(
                CURLOPT_URL => 'http://myremoteservice/',
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $params,
                );
                $ch = curl_init();
                curl_setopt_array($ch, ($options + $defaults));
             */    

            $valores = ["registro" => $registro, "senha" => $senha, "acao" => "logar"];
            $opcoes = [CURLOPT_URL => $url, CURLOPT_POST => true, CURLOPT_POSTFIELDS => $valores, CURLOPT_RETURNTRANSFER => true];

            $post = curl_init();
            curl_setopt_array($post, $opcoes);
            $test = curl_exec($post);
            curl_close($post);

            print_r($test);


        }

    }

    $controller = new ControllerUsuario;

    if(isset($_POST["acao"])){

        switch($_POST["acao"]){

            case "logar":
                ControllerUsuario::logar($_POST["usuario"], $_POST["senha"]);
                break;

            default:
                print("Acao invalida!");

        }

    }