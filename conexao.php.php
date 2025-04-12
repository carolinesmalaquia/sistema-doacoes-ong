<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "sistema_doacoes";

// Criar conexão
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
