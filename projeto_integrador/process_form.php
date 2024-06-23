<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Participantes</title>
    <link rel="stylesheet" href="./process_form.css"> <!-- Link para o arquivo CSS -->
</head>
<body>
<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $atleta = $_POST['Atleta'];
    $data_nascimento = $_POST['data_nascimento'];
    $pace = $_POST['pace'];
    $distancia = implode(", ", $_POST['distancia']);
    $tamanho_camisa = $_POST['tamanho_camisa'];
    $equipe = $_POST['equipe'];
    $forma_pagamento = $_POST['forma_pagamento'];
    $termos_uso = isset($_POST['termos_uso']) ? 1 : 0;

    $sql = "INSERT INTO participantes (nome, sobrenome, email, telefone, atleta, data_nascimento, pace, distancia, tamanho_camisa, equipe, forma_pagamento, termos_uso)
    VALUES ('$nome', '$sobrenome', '$email', '$telefone', '$atleta', '$data_nascimento', '$pace', '$distancia', '$tamanho_camisa', '$equipe', '$forma_pagamento', '$termos_uso')";

if ($conn->query($sql) === TRUE) {
    echo "<center><h1>Registro Inserido com Sucesso</h1>";
    echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
  } else {
    echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
  }
}
?>
