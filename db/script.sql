    CREATE DATABASE IF NOT EXISTS motojhonson;

    USE motojhonson;

    CREATE TABLE IF NOT EXISTS usuarios(
        id INT NOT NULL AUTO_INCREMENT,
        usuario VARCHAR(100) NOT NULL UNIQUE,
        nome VARCHAR(100),
        telefone VARCHAR(20) NOT NULL,
        carteira FLOAT DEFAULT 0,
        senha VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        situacao BINARY DEFAULT 0,
        PRIMARY KEY (id)
    );

    CREATE TABLE IF NOT EXISTS empresas(
        id INT NOT NULL AUTO_INCREMENT,
        USUARIOS_usuario VARCHAR(100) NOT NULL UNIQUE,
        cnpj VARCHAR(20) NOT NULL UNIQUE,
        PRIMARY KEY (id),
        FOREIGN KEY (USUARIOS_usuario) REFERENCES usuarios(usuario) ON DELETE CASCADE
    );

    CREATE TABLE IF NOT EXISTS motoboys(
        id INT NOT NULL AUTO_INCREMENT,
        USUARIOS_usuario VARCHAR(100) NOT NULL UNIQUE,
        cpf VARCHAR(20) NOT NULL UNIQUE,
        veiculo VARCHAR(100),
        disponivel BINARY DEFAULT 0,
        PRIMARY KEY (id),
        FOREIGN KEY (USUARIOS_usuario) REFERENCES usuarios(usuario) ON DELETE CASCADE
    );

    CREATE TABLE IF NOT EXISTS enderecos(
        id INT NOT NULL AUTO_INCREMENT,
        USUARIOS_usuario VARCHAR(100) NOT NULL,
        cep VARCHAR(30) NOT NULL,
        municipio VARCHAR(100),
        bairro VARCHAR(100),
        logradouro VARCHAR(100),
        numero VARCHAR(10),
        uf VARCHAR(3),
        PRIMARY KEY (id),
        FOREIGN KEY (USUARIOS_usuario) REFERENCES usuarios(usuario) ON DELETE CASCADE
    );



    INSERT INTO usuarios (usuario, nome, telefone, senha, email) VALUES ("pedro", "Pedro", "00000000000", "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "pedro@gmail.com");
    INSERT INTO usuarios (usuario, nome, telefone, senha, email) VALUES ("luan", "Luan", "00000000000", "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "luan@gmail.com");
    INSERT INTO usuarios (usuario, nome, telefone, senha, email) VALUES ("lohlanches", "Loh Lanches", "00000000000", "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "lohlanches@gmail.com");
    INSERT INTO usuarios (usuario, nome, telefone, senha, email) VALUES ("scooby", "Scooby", "00000000000", "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "scooby@gmail.com");

    INSERT INTO motoboys (USUARIOS_usuario, cpf) VALUES ("pedro", "0000000001");
    INSERT INTO motoboys (USUARIOS_usuario, cpf) VALUES ("luan", "0000000002");

    INSERT INTO empresas (USUARIOS_usuario, cnpj) VALUES ("lohlanches", "00000000000001");
    INSERT INTO empresas (USUARIOS_usuario, cnpj) VALUES ("scooby", "00000000000002");

    INSERT INTO enderecos (USUARIOS_usuario, cep, municipio, bairro, logradouro, numero, uf) VALUES ("lohlanches", "859590000", "Palotina", "Centro", "Principal", "000", "PR");
    INSERT INTO enderecos (USUARIOS_usuario, cep, municipio, bairro, logradouro, numero, uf) VALUES ("scooby", "859590000", "Palotina", "Principal", "Centro", "000", "PR");