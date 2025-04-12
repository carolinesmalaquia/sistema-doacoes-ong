<?php
include_once("../conexao.php");

// Se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doador_id = $_POST["doador_id"];
    $tipo = $_POST["tipo"];
    $valor = $_POST["valor"];
    $descricao = $_POST["descricao"];
    $data = $_POST["data"];

    $sql = "INSERT INTO doacoes (doador_id, tipo, valor, descricao, data)
            VALUES ('$doador_id', '$tipo', '$valor', '$descricao', '$data')";

    if ($conn->query($sql) === TRUE) {
        echo "Doação cadastrada com sucesso! <a href='listar.php'>Ver doações</a>";
    } else {
        echo "Erro: " . $conn->error;
    }
}

// Puxa os doadores para o <select>
$sql_d = "SELECT id, nome FROM doadores";
$result_d = $conn->query($sql_d);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Doação</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h2>Cadastrar Doação</h2>
    <form method="POST" action="">
        <label>Doador:</label><br>
        <select name="doador_id" required>
            <option value="">-- Selecione --</option>
            <?php while ($row = $result_d->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
            <?php } ?>
        </select><br><br>

        <label>Tipo de Doação:</label><br>
        <select name="tipo" required>
            <option value="Dinheiro">Dinheiro</option>
            <option value="Alimentos">Alimentos</option>
            <option value="Roupas">Roupas</option>
            <option value="Brinquedos">Brinquedos</option>
            <option value="Outros">Outros</option>
        </select><br><br>

        <label>Valor (R$):</label><br>
        <input type="number" name="valor" step="0.01" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao" rows="3" cols="40"></textarea><br><br>

        <label>Data da Doação:</label><br>
        <input type="date" name="data" required><br><br>

        <button type="submit">Cadastrar</button>
        <a href="listar.php">Ver doações</a>
    </form>
</body>
</html>
