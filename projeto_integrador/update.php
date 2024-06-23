<?php
require 'config.php';

// Verifica se o ID do participante foi fornecido
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consulta SQL para selecionar o participante pelo ID
    $sql = "SELECT * FROM participantes WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Se o participante for encontrado, preenche o formulário com os dados do participante
        $row = $result->fetch_assoc();
    } else {
        echo "Nenhum registro encontrado!";
    }
}

// Se o formulário for submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
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

    // Consulta SQL para atualizar os dados do participante
    $sql = "UPDATE participantes SET 
            nome='$nome', 
            sobrenome='$sobrenome', 
            email='$email', 
            telefone='$telefone', 
            atleta='$atleta', 
            data_nascimento='$data_nascimento', 
            pace='$pace', 
            distancia='$distancia', 
            tamanho_camisa='$tamanho_camisa', 
            equipe='$equipe', 
            forma_pagamento='$forma_pagamento', 
            termos_uso='$termos_uso' 
            WHERE id=$id";

    // Executa a consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }

    // Redireciona para a página de leitura após a atualização
    header('Location: read.php');
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Corrida - Atualizar</title>
</head>
<body>
    <h1>Atualizar Participante</h1>
    <form action="update.php" method="post">
        <!-- Preenche o formulário com os dados do participante -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <!-- Adicione campos adicionais conforme necessário -->
    </form>
</body>
</html>
