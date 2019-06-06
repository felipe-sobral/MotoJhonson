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
        situacao ENUM("0","1") DEFAULT "1",
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
        valor_hora VARCHAR(20) DEFAULT "0",
        valor_fixo VARCHAR(20) DEFAULT "0",
        disponivel ENUM("0","1") DEFAULT "1",
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

    CREATE TABLE IF NOT EXISTS propostas(
        id INT NOT NULL AUTO_INCREMENT,
        MOTOBOYS_usuario VARCHAR(100) NOT NULL,
        EMPRESAS_usuario VARCHAR(100) NOT NULL,
        ENDERECOS_id INT NOT NULL,
        valor VARCHAR(20) NOT NULL,
        valor_tipo ENUM("HORA", "FIXO"),
        situacao ENUM("RECUSADA", "ACEITA", "EM ANDAMENTO", "ESPERANDO") DEFAULT "ESPERANDO",
        PRIMARY KEY (id),
        FOREIGN KEY (MOTOBOYS_usuario) REFERENCES motoboys(USUARIOS_usuario) ON DELETE CASCADE,
        FOREIGN KEY (EMPRESAS_usuario) REFERENCES empresas(USUARIOS_usuario) ON DELETE CASCADE,
        FOREIGN KEY (ENDERECOS_id) REFERENCES enderecos(id) ON DELETE CASCADE
    );

    INSERT INTO usuarios (usuario, nome, telefone, senha, email) VALUES
    ("pedro", "Pedro", "00000000000", "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "pedro@gmail.com"),
    ("luan", "Luan", "00000000000", "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "luan@gmail.com"),
    ("felipe", "Felipe S.", "00000000000", "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "felipe@gmail.com"),
    ("lohlanches", "Loh Lanches", "00000000000", "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "lohlanches@gmail.com"),
    ("scooby", "Scooby", "00000000000", "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "scooby@gmail.com");

    INSERT INTO motoboys (USUARIOS_usuario, cpf, veiculo) VALUES 
    ("felipe", "12345678991", "moto_teste"),
    ("luan", "12345678992", "moto_teste"),
    ("pedro", "12345678993", "moto_teste");

    INSERT INTO empresas (USUARIOS_usuario, cnpj) VALUES 
    ("lohlanches", "12345678912341"),
    ("Scooby", "12345678912342");

    INSERT INTO enderecos (USUARIOS_usuario, cep, municipio, bairro, logradouro, numero, uf) VALUES 
    ("lohlanches", "85950000", "Palotina", "Loh Centro", "Principal", "000", "PR"),
    ("Scooby", "85950000", "Palotina", "Rua Scooby", "Principal", "000", "PR");
    
