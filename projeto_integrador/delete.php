<?php
require 'config.php';

// Verifica se o ID do participante foi fornecido
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consulta SQL para excluir o participante pelo ID
    $sql = "DELETE FROM participantes WHERE id=$id";

    // Executa a consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Registro deletado com sucesso";
    } else {
        echo "Erro ao deletar registro: " . $conn->error;
    }

    // Redireciona para a página de leitura após a exclusão
    header('Location: read.php');
}

$conn->close();
?>
