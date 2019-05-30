<?php

    class Model{

        private static function preparar($query, $dados){
            include "../db/connect.php";

            $sql = $conn->prepare($query);
            if($sql->execute($dados)){
                
                return $sql;
            }
            
            return false;
        }

        // INSERT INTO {$tabela} ({$dados[keys]}) VALUES ({$dados[values]})
        public static function inserir($tabela, $dados){
            $campos = implode(", ", array_keys($dados));
            $valores = ":".implode(", :", array_keys($dados));

            $query = "INSERT INTO $tabela ($campos) VALUES ($valores)";

            if(self::preparar($query, $dados)){
                return true;
            }

            return false;
        }

        // SELECT {colunas} FROM {$tabela}
        public static function selecionar($tabela, $colunas){
            $colunas = implode(", ", $colunas);

            $query = "SELECT $colunas FROM $tabela";

            $resultado = self::preparar($query, null);

            if($resultado){
                return $resultado->fetchAll();
            }

            return false;
        }

        // SELECT * FROM usuarios, motoboys WHERE motoboys.USUARIOS_usuario = usuarios.usuario AND motoboys.cpf = "0000000001" AND usuarios.senha = "40bd001563085fc35165329ea1ff5c5ecbdbbeef";
        public static function selecionar_igual($tabelas, $colunas, $parametros){
            $tabelas = is_array($tabelas) ? implode(", ", $tabelas) : $tabelas;
            $colunas = is_array($colunas) ? implode(", ", $colunas) : $colunas;
            $chaves = is_array($parametros) ? implode(", ", array_keys($parametros)) : "fail";
            $valores = is_array($parametros) ? ":".implode(", :", array_keys($parametros)) : "fail";

            $query = "SELECT $colunas FROM $tabelas WHERE ($chaves) = ($valores)";

            $resultado = self::preparar($query, $parametros);

            if($resultado){
                return $resultado->fetchAll();
            }

            return false;
        }

    }
