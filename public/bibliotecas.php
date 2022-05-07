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

        <h2>Bibliotecas</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $leitor_id = 'leitor_id';
        $biblioteca_nome = 'nome';
        $leitor_primeiro_nome = 'primeiro_nome';
        $leitor_sobrenome = 'sobrenome';
        $pais = 'pais';


        $sql =
            'SELECT leitores.' . $leitor_primeiro_nome . ', leitores.' . $leitor_sobrenome . ', b.' . $biblioteca_nome . '
            FROM biblioteca b 
            join leitores leitores
            on leitores.leitor_id = b.leitor_id;';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $leitor_primeiro_nome . '</th>' .
            '        <th>' . $leitor_sobrenome . '</th>' .
            '        <th>' . $biblioteca_nome . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$leitor_primeiro_nome] . '</td>' .
                    '<td>' . $registro[$leitor_sobrenome] . '</td>' .
                    '<td>' . $registro[$biblioteca_nome] . '</td>';
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