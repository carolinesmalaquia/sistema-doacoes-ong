
CREATE DATABASE IF NOT EXISTS sistema_doacoes;
USE sistema_doacoes;

-- Tabela de Doadores
CREATE TABLE IF NOT EXISTS doadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telefone VARCHAR(20)
);

-- Tabela de Doações
CREATE TABLE IF NOT EXISTS doacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doador_id INT NOT NULL,
    tipo VARCHAR(50),
    valor DECIMAL(10,2),
    descricao TEXT,
    data DATE,
    FOREIGN KEY (doador_id) REFERENCES doadores(id)
);

-- Inserindo alguns doadores
INSERT INTO doadores (nome, email, telefone) VALUES
('Ana Beatriz Silva', 'ana.b@gmail.com', '(51) 91234-5678'),
('Carlos Henrique', 'carlos.h@gmail.com', '(51) 99876-5432'),
('Mariana Costa', 'mariana.c@hotmail.com', '(51) 98765-1234'),
('Roberto Lima', 'roberto.l@gmail.com', '(51) 97654-3210'),
('Fernanda Souza', 'fernanda.souza@gmail.com', '(51) 96543-7890');
