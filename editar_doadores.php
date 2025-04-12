<?php
include_once("../conexao.php");

// Verifica se foi passado um ID via URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Busca o doador com esse ID
    $sql = "SELECT * FROM doadores WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $doador = $result->fetch_assoc();
    } else {
        echo "Doador não encontrado!";
        exit;
    }
}

// Atualiza os dados se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $sql = "UPDATE doadores SET nome='$nome', email='$email', telefone='$telefone' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Doador atualizado com sucesso! <a href='listar.php'>Voltar</a>";
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Doador</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h2>Editar Doador</h2>

    <form method="POST" action="">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $doador['nome']; ?>" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" name="email" value="<?php echo $doador['email']; ?>" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" value="<?php echo $doador['telefone']; ?>" required><br><br>

        <button type="submit">Atualizar</button>
        <a href="listar.php">Cancelar</a>
    </form>
</body>
</html>
