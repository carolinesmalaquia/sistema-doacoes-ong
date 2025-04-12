<?php
include_once("../conexao.php");

$sql = "SELECT d.id, do.nome AS doador, d.tipo, d.valor, d.descricao, d.data
        FROM doacoes d
        INNER JOIN doadores do ON d.doador_id = do.id
        ORDER BY d.data DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Doações</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h2>Lista de Doações</h2>
    <a href="cadastrar.php">Cadastrar Nova Doação</a><br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Doador</th>
            <th>Tipo</th>
            <th>Valor (R$)</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["doador"]; ?></td>
            <td><?php echo $row["tipo"]; ?></td>
            <td><?php echo number_format($row["valor"], 2, ',', '.'); ?></td>
            <td><?php echo $row["descricao"]; ?></td>
            <td><?php echo date("d/m/Y", strtotime($row["data"])); ?></td>
            <td>
                <a href='editar.php?id=<?php echo $row["id"]; ?>'>Editar</a> |
                <a href='deletar.php?id=<?php echo $row["id"]; ?>' onclick="return confirm('Deseja excluir esta doação?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

