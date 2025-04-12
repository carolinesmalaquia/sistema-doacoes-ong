<?php
include_once("../conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Deletar doação
    $sql = "DELETE FROM doacoes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Doação excluída com sucesso! <a href='listar.php'>Ver doações</a>";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
} else {
    echo "ID da doação não especificado.";
}
?>
