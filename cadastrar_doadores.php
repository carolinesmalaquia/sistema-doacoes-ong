<?php
include_once("../conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $sql = "INSERT INTO doadores (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";

    if ($conn->query($sql) === TRUE) {
        echo "Doador cadastrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Doador</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h2>Cadastrar Doador</h2>
    <form method="POST" action="">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" name="email" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
