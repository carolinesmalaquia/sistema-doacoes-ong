# 🏷️ Sistema de Cadastro de Doações - ONG Esperança

Este é um sistema web simples desenvolvido para registrar doações feitas a uma ONG fictícia chamada **"ONG Esperança"**. O sistema permite cadastrar, visualizar, editar e excluir doações, utilizando as tecnologias HTML, CSS, PHP e MySQL.

---

## 📌 Funcionalidades

- Cadastro de doações com:
  - Nome do doador
  - Tipo da doação (dinheiro, alimentos, roupas, etc.)
  - Valor
  - Descrição
  - Data da doação
- Listagem de todas as doações
- Edição das doações cadastradas
- Exclusão de doações
- Relacionamento com os doadores (pré-cadastrados)

---

## 🛠️ Tecnologias Utilizadas

- HTML5
- CSS3
- PHP
- MySQL
- XAMPP (para ambiente local)

---

## 💾 Estrutura do Banco de Dados

O projeto usa duas tabelas principais:

- **doadores**: armazena os dados dos doadores.
- **doacoes**: armazena as doações realizadas, com chave estrangeira para os doadores.

---

## ⚙️ Como executar localmente

1. Faça o download ou clone este repositório.
2. Extraia os arquivos para a pasta `htdocs` do XAMPP.
3. Inicie o XAMPP (Apache + MySQL).
4. Acesse o `phpMyAdmin` e importe o arquivo `banco_sistema_doacoes.sql`.
5. Acesse o sistema via navegador:  
   `http://localhost/ong_esperanca_doacoes/`

