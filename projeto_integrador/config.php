<?php
$servername = "localhost";
$username = "root";
$password = "";  // insira sua senha do MySQL se houver
$dbname = "minha_corrida";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
