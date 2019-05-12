<?php

    class Model{

        private static function conectar(){
            include_once "../db/connect.php";
        }

        private static function preparar($query, $dados){
            self::conectar();

            $sql = $conn->prepare($query);
            if($sql->execute($dados)){
                return true;
            }
            
            return false;
        }

        public static function inserir($tabela, array $dados){

            $campos = implode(", ", array_keys($dados));
            $valores = ":".implode(", :", array_keys($dados));

            $query = "INSERT INTO $tabela ($campos) VALUES ($valores)";

            if(self::preparar($query, $dados)){
                return true;
            }

            return false;
        }

    }