<?php
include_once("../conexao.php");

$sql = "SELECT * FROM doadores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Doadores</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h2>Lista de Doadores</h2>
    <a href="cadastrar.php">Cadastrar Novo Doador</a><br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["nome"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["telefone"]; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a> |
                <a href="deletar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este doador?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
