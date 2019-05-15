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

        /**
         *
         * O que faz? -> **SELECT {$colunas} FROM {$tabelas_a]} INNER JOIN {$tabelas_b} ON ({$c_on}) WHERE ({$c_where} = {$c_where_values})**
         * 
         * @param array $colunas Ex: ["usuarios.usuario", "usuarios.email", "motoboys.cpf"]
         * @param array $tabelas_a Ex: ["usuarios"]
         * @param array $tabelas_b Ex: ["motoboys"]
         * @param string $c_on Ex: "usuarios.usuario = usuarios.USUARIOS_usuario"
         * @param array $c_where Ex: ["usuarios.usuario" => "teste", "usuarios.senha" => "123"]
         * 
         */
        public static function selecionar_innerjoin($colunas, $tabelas_a, $tabelas_b, $c_on, $c_where){

            $colunas = implode(", ", $colunas);
            $a = implode(", ", $tabelas_a);
            $b = implode(", ", $tabelas_b);

            $c_where_itens = implode(", ", array_keys($c_where));
            $c_where_valores = [];

            foreach($c_where as $key => $value){
                $c_where_valores += [str_replace(".","x",$key) => $value];
            }

            $where_filtrado = ":".implode(", :", array_keys($c_where_valores));

            $query = "SELECT $colunas FROM ($a) INNER JOIN ($b) ON ($c_on) WHERE ($c_where_itens) = ($where_filtrado);";

            print_r($c_where_valores);
            echo "<br><br> $query <br><br>";
            $resultado = self::preparar($query, $c_where_valores);

            if($resultado){
                return $resultado->fetchAll();
            }

            return false;  
        }

    }