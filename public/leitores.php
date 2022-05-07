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

        <h2>Leitores</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $primeiro_nome = 'primeiro_nome';
        $sobrenome = 'sobrenome';
        $dataNasc = 'dataNasc';
        $cidade = 'cidade';
        $estado = 'estado';
        $pais = 'pais';


        $sql =
            'SELECT ' . $primeiro_nome .
            '     , ' . $sobrenome .
            '     , ' . $dataNasc .
            '     , ' . $cidade .
            '     , ' . $estado .
            '     , ' . $pais .
            '  FROM leitores';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $primeiro_nome . '</th>' .
            '        <th>' . $sobrenome . '</th>' .
            '        <th> Data de Nascimento </th>' .
            '        <th>' . $cidade . '</th>' .
            '        <th>' . $estado . '</th>' .
            '        <th>' . $pais . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$primeiro_nome] . '</td>' .
                    '<td>' . $registro[$sobrenome] . '</td>' .
                    '<td>' . $registro[$dataNasc] . '</td>' .
                    '<td>' . $registro[$cidade] . '</td>' .
                    '<td>' . $registro[$estado] . '</td>' .
                    '<td>' . $registro[$pais] . '</td>';
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