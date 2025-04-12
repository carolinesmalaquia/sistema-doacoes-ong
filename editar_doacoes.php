<?php
include_once("../conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar dados da doação
    $sql = "SELECT * FROM doacoes WHERE id = $id";
    $result = $conn->query($sql);
    $doacao = $result->fetch_assoc();

    // Caso a doação não exista
    if (!$doacao) {
        die("Doação não encontrada.");
    }

    // Atualizar dados caso o formulário seja enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $doador_id = $_POST["doador_id"];
        $tipo = $_POST["tipo"];
        $valor = $_POST["valor"];
        $descricao = $_POST["descricao"];
        $data = $_POST["data"];

        $sql_update = "UPDATE doacoes SET doador_id='$doador_id', tipo='$tipo', valor='$valor', descricao='$descricao', data='$data' WHERE id=$id";

        if ($conn->query($sql_update) === TRUE) {
            echo "Doação atualizada com sucesso! <a href='listar.php'>Ver doações</a>";
        } else {
            echo "Erro ao atualizar: " . $conn->error;
        }
    }
}

$sql_d = "SELECT id, nome FROM doadores";
$result_d = $conn->query($sql_d);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Doação</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h2>Editar Doação</h2>
    <form method="POST" action="">
        <label>Doador:</label><br>
        <select name="doador_id" required>
            <option value="">-- Selecione --</option>
            <?php while ($row = $result_d->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>" <?php echo ($doacao['doador_id'] == $row['id']) ? 'selected' : ''; ?>>
                    <?php echo $row['nome']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <label>Tipo de Doação:</label><br>
        <select name="tipo" required>
            <option value="Dinheiro" <?php echo ($doacao['tipo'] == 'Dinheiro') ? 'selected' : ''; ?>>Dinheiro</option>
            <option value="Alimentos" <?php echo ($doacao['tipo'] == 'Alimentos') ? 'selected' : ''; ?>>Alimentos</option>
            <option value="Roupas" <?php echo ($doacao['tipo'] == 'Roupas') ? 'selected' : ''; ?>>Roupas</option>
            <option value="Brinquedos" <?php echo ($doacao['tipo'] == 'Brinquedos') ? 'selected' : ''; ?>>Brinquedos</option>
            <option value="Outros" <?php echo ($doacao['tipo'] == 'Outros') ? 'selected' : ''; ?>>Outros</option>
        </select><br><br>

        <label>Valor (R$):</label><br>
        <input type="number" name="valor" step="0.01" value="<?php echo $doacao['valor']; ?>" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao" rows="3" cols="40"><?php echo $doacao['descricao']; ?></textarea><br><br>

        <label>Data da Doação:</label><br>
        <input type="date" name="data" value="<?php echo $doacao['data']; ?>" required><br><br>

        <button type="submit">Atualizar</button>
        <a href="listar.php">Ver doações</a>
    </form>
</body>
</html>
