<?php
include_once("../conexao.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Comando para deletar o doador
    $sql = "DELETE FROM doadores WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Doador excluído com sucesso! <a href='listar.php'>Voltar</a>";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
} else {
    echo "ID do doador não fornecido.";
}
?>
