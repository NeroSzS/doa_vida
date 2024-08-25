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
    e_clinica BOOLEAN NOT NULL DEFAULT TRUE,
    razao_clinica VARCHAR (255) NOT NULL,
    nome_fantasia VARCHAR (255) NOT NULL,
    cnpj VARCHAR (25) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
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
-- Inserindo Doadores
INSERT INTO doadores (nome_doador, cpf, rg, nome_mae, nome_pai, telefone, sexo, data_nascimento, tipo_sanguineo, email, senha) VALUES
('João Silva', '123.456.789-00', 'MG-12.345.678', 'Maria Silva', 'José Silva', '(98) 91234-5678', 'Masculino', '1985-05-15', 'O+', 'joao.silva@mail.com', '$2y$10$8NVSNENrzGTJv4b7YmsTuOT3HusnZmA/2yZNxwlAayavDlOA5fYze'),
('Ana Souza', '987.654.321-00', 'SP-98.765.432', 'Clara Souza', 'Carlos Souza', '(98) 98765-4321', 'Feminino', '1990-08-20', 'A-', 'ana.souza@mail.com', '$2y$10$8NVSNENrzGTJv4b7YmsTuOT3HusnZmA/2yZNxwlAayavDlOA5fYze'),
('Pedro Oliveira', '456.789.123-00', 'RJ-45.678.912', 'Laura Oliveira', 'Paulo Oliveira', '(98) 94567-8912', 'Masculino', '1982-12-10', 'B+', 'pedro.oliveira@mail.com', '$2y$10$8NVSNENrzGTJv4b7YmsTuOT3HusnZmA/2yZNxwlAayavDlOA5fYze'),
('Mariana Lima', '321.654.987-00', 'RS-32.165.498', 'Fernanda Lima', 'Roberto Lima', '(98) 93216-5498', 'Feminino', '1995-03-25', 'AB-', 'mariana.lima@mail.com', '$2y$10$8NVSNENrzGTJv4b7YmsTuOT3HusnZmA/2yZNxwlAayavDlOA5fYze'),
('Lucas Pereira', '789.123.456-00', 'BA-78.912.345', 'Juliana Pereira', 'Ricardo Pereira', '(98) 97891-2345', 'Masculino', '1988-07-30', 'O-', 'lucas.pereira@mail.com', '$2y$10$8NVSNENrzGTJv4b7YmsTuOT3HusnZmA/2yZNxwlAayavDlOA5fYze');

-- Inserindo Endereços dos Doadores
INSERT INTO endereco (cep, estado, cidade, logradouro, numero, complemento, bairro) VALUES
('65000-000', 'Maranhão', 'São Luís', 'Rua A', '100', 'Apto 101', 'Centro'),
('65000-001', 'Maranhão', 'São Luís', 'Rua B', '200', 'Casa 2', 'Cohab'),
('65000-002', 'Outros', 'São Paulo', 'Avenida C', '300', 'Sala 303', 'Jardim Paulista'),
('65000-003', 'Outros', 'Rio de Janeiro', 'Praça D', '400', 'Loja 404', 'Copacabana'),
('65000-004', 'Maranhão', 'Imperatriz', 'Rua E', '500', NULL, 'Bela Vista');

-- Associando Doador ao seu Endereço
INSERT INTO doador_endereco (id_doador, id_endereco) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- Inserindo Clinicas
INSERT INTO clinicas (e_clinica, razao_clinica, nome_fantasia, cnpj, telefone, email, senha)
VALUES (1, 'EMPRESA MARANHENSE DE SERVICOS HOSPITALARES - EMSERH', 'Hemomar', '18519709000163', '9832161100', 'contato@hemomar.com.br', '$2y$10$8NVSNENrzGTJv4b7YmsTuOT3HusnZmA/2yZNxwlAayavDlOA5fYze');

-- Inserindo Endereços dos Doadores
INSERT INTO clinica_endereco (cep, estado, cidade, logradouro, numero, complemento, bairro, id_clinica)
VALUES ('65040-450', 'Maranhão', 'São Luís', 'Rua 5 de Janeiro', 'S/N', '', 'Jordoa', 1);

-- Inserindo Campanhas
INSERT INTO campanhas_de_doacoes (hospital, nome_campanha, descricao, data_inicio, data_fim, email, telefone, tipo_sanguineo, imagem_campanha) VALUES
('Hospital São Luís', 'Doe Sangue, Salve Vidas', 'Campanha para aumentar o estoque de sangue do hospital.', '2024-09-01', '2024-09-30', 'contato@saoluis.com', '(98) 91234-5678', 'O+', 0xFFD8FFE000104A46494600010101006000600000FFD8FFE000104A46494600010101006000600000),
('Hospital Santa Maria', 'Doe Sangue, Doe Vida', 'Campanha de doação de sangue para pacientes em tratamento.', '2024-10-01', '2024-10-31', 'contato@santamaria.com', '(98) 98765-4321', 'A-', 0xFFD8FFE000104A46494600010101006000600000FFD8FFE000104A46494600010101006000600000),
('Hospital Universitário', 'Sangue é Vida', 'Campanha para incentivar a doação de sangue entre universitários.', '2024-11-01', '2024-11-30', 'contato@universitario.com', '(98) 94567-8912', 'B+', 0xFFD8FFE000104A46494600010101006000600000FFD8FFE000104A46494600010101006000600000),
('Hospital Central', 'Doe Sangue, Doe Amor', 'Campanha para aumentar o número de doadores regulares.', '2024-12-01', '2024-12-31', 'contato@central.com', '(98) 93216-5498', 'AB-', 0xFFD8FFE000104A46494600010101006000600000FFD8FFE000104A46494600010101006000600000),
('Hospital Regional', 'Doe Sangue, Doe Esperança', 'Campanha para sensibilizar a população sobre a importância da doação de sangue.', '2024-08-01', '2024-08-31', 'contato@regional.com', '(98) 97891-2345', 'O-', 0xFFD8FFE000104A46494600010101006000600000FFD8FFE000104A464);
