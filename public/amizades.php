<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border: 1px solid;
        }
    </style>
</head>

<html>

<body>
    <div class="content">
        <h1>Bibliófilo's</h1>

        <h2>Amizades</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $nome_usuario = 'primeiro_nome';
        $nome_amizade = 'primeiro_nome';

        $sql = 'select l1.' . $nome_usuario . ' as usuario, 
        l2.' . $nome_amizade . ' as amizade
            from amizade a
            join leitores l1 on (a.amigo_id1 = l1.leitor_id)
            join leitores l2 on (a.amigo_id2 = l2.leitor_id)
            order by usuario;';

        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }

        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th> Nome do usuário </th>' .
            '        <th> Amigos</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro['usuario'] . '</td>' .
                    '<td>' . $registro['amizade'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>
</body>

</html>