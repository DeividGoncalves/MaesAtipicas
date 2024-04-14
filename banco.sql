CREATE DATABASE usuarios;
USE usuarios;
CREATE TABLE users(
idusers INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
senha VARCHAR(15) NOT NULL
);

CREATE TABLE pacientes(
idpacientes INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
telefone VARCHAR(11),
sexo VARCHAR(10),
datanascimento VARCHAR(8),
endereco VARCHAR(200),
diagnostico VARCHAR(100),
tratamento VARCHAR(100),
precisaneuro CHAR,
precisapac CHAR,
filaapae CHAR,
filaespecialidade VARCHAR(20),
filacaps CHAR
);

-- DROP TABLE pacientes;
SELECT * FROM pacientes;
