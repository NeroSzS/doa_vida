CREATE DATABASE doa_vida;

USE doa_vida;

-- Criação da tabela Doadores
CREATE TABLE doadores(
    id_doador INT PRIMARY KEY AUTO_INCREMENT,
    nome_doador VARCHAR(100) NOT NULL,
    cpf VARCHAR(15) NOT NULL UNIQUE,
    rg VARCHAR(15) NOT NULL UNIQUE,
    nome_mae VARCHAR(100) NOT NULL,
    nome_pai VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    sexo ENUM('Masculino', 'Feminino', 'Outros', 'Prefiro não informar') NOT NULL,
    data_nascimento DATE NOT NULL,
    tipo_sanguineo ENUM('A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL
);

-- Criação da tabela Clinicas
CREATE TABLE clinicas(
    id_clinica INT PRIMARY KEY AUTO_INCREMENT,
    razao_clinica VARCHAR (255) NOT NULL,
    cnpj VARCHAR (25) NOT NULL,
    email VARCHAR (255) NOT NULL,
    senha VARCHAR (255) NOT NULL
);


-- Criação da tabela endereço
CREATE TABLE endereco (
    id_endereco INT AUTO_INCREMENT PRIMARY KEY,
    cep VARCHAR(9) NOT NULL,
    estado ENUM('Maranhão', 'Outros') NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    logradouro VARCHAR(255) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    complemento VARCHAR(255),
    bairro VARCHAR(100) NOT NULL
);


-- CRIACAO DA TABELA CAMPANHA
CREATE TABLE campanhas_de_doacoes (
    id_campanhas INT PRIMARY KEY AUTO_INCREMENT,
    hospital VARCHAR(255) NOT NULL,
    nome_campanha VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(255) NOT NULL, 
    tipo_sanguineo ENUM('A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-') NOT NULL,
    imagem_campanha LONGBLOB
);

-- Criação da tabela doador_endereço
CREATE TABLE doador_endereco (
    doador_endereco_id INT AUTO_INCREMENT PRIMARY KEY,
    id_doador INT,
    id_endereco INT,
    FOREiGN KEY (id_doador) REFERENCES doadores (id_doador),
    FOREiGN KEY (id_endereco) REFERENCES endereco (id_endereco)
);

-- Criação da tabela clinica_endereço
CREATE TABLE clinica_endereco (
    id_endereco INT AUTO_INCREMENT PRIMARY KEY,
    cep VARCHAR(9) NOT NULL,
    estado ENUM('Maranhão', 'Outros') NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    logradouro VARCHAR(255) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    complemento VARCHAR(255),
    bairro VARCHAR(100) NOT NULL,
    id_clinica INT,
    FOREIGN KEY (id_clinica) REFERENCES clinicas(id_clinica)
);

CREATE TABLE agendamento(
    id_agendamento INT AUTO_INCREMENT PRIMARY KEY,
    data_doacao DATE NOT NULL,
    id_doador INT,
    id_clinica INT,
    FOREIGN KEY (id_doador) REFERENCES doadores (id_doador),
    FOREIGN KEY (id_clinica) REFERENCES clinicas (id_clinica)
);

CREATE TABLE historico_doacao (
    id_historico INT AUTO_INCREMENT PRIMARY KEY,
    id_agendamento INT,
    FOREIGN KEY (id_agendamento) REFERENCES agendamento (id_agendamento)
);


-- seeds

