<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização dos Corredores</title>
    <link rel="stylesheet" href="visualiza.css">
</head>

<body>
    <center>
        <h1>Corredores Cadastrados</h1>

        <table border="1">
            <tr>
                <th>NOME</th>
                <th>SOBRENOME</th>
                <th>E-MAIL</th>
                <th>TELEFONE</th>
                <th>DISTÂNCIA</th>
                <th>TAMANHO DA CAMISA</th>
            </tr>
            <?php
                require("config.php");

                $dados_select = mysqli_query($conn, "SELECT NOME, SOBRENOME, EMAIL, TELEFONE, DISTANCIA, TAMANHO_CAMISA FROM participantes");

                while($dado = mysqli_fetch_array($dados_select)) {
                    echo '<tr>';
                    echo '<td>'.$dado['NOME'].'</td>';
                    echo '<td>'.$dado['SOBRENOME'].'</td>';
                    echo '<td>'.$dado['EMAIL'].'</td>';
                    echo '<td>'.$dado['TELEFONE'].'</td>';
                    echo '<td>'.$dado['DISTANCIA'].'</td>';
                    echo '<td>'.$dado['TAMANHO_CAMISA'].'</td>';
                    echo '</tr>';
                }

                // Fechar conexão
                mysqli_close($conn);
            ?>
        </table>
        <br />
        <a href="index.html"><button>Voltar</button></a>
    </center>
</body>

</html>
