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

        //SELECT {$colunas} FROM {$valores} WHERE ({$itens}) = ({$valores})
        public static function selecionar_valorigual($tabela, $colunas, $condicoes){
            $colunas = implode(", ", $colunas);
            $itens = implode(", ", array_keys($condicoes));
            $valores = ":".implode(", :", array_keys($condicoes));

            $query = "SELECT $colunas FROM $tabela WHERE ($itens) = ($valores)";

            $resultado = self::preparar($query, $condicoes);

            if($resultado){
                return $resultado->fetchAll();
            }

            return false;
        }

        public static function selecionar_demo($usuario, $senha){

            $query = "SELECT (usuarios.usuario), (usuarios.senha),
                             (SELECT cnpj FROM empresas WHERE USUARIOS_usuario = '$usuario'),
                             (SELECT cpf FROM motoboys WHERE USUARIOS_usuario = '$usuario')
                      FROM (usuarios) WHERE (usuario, senha) = ('$usuario', '$senha')";

            print_r($query);

            $resultado = self::preparar($query, null);

            if($resultado){
                return $resultado->fetchAll();
            }

            return false;

        }

        /*
        set @usuario = 'felipe';
set @senha = '40bd001563085fc35165329ea1ff5c5ecbdbbeef';

SELECT 
	(usuarios.usuario), (usuarios.senha),
    (SELECT cnpj FROM empresas WHERE (USUARIOS_usuario = @usuario)),
    (SELECT cpf FROM motoboys WHERE (USUARIOS_usuario = @usuario))
FROM (usuarios) WHERE (usuario, senha) = (@usuario, @senha);
*/

    }
