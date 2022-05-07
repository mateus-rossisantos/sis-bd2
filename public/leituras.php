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

        <h2>Autores</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $leitor_primeiro_nome = 'primeiro_nome';
        $leitor_sobrenome = 'sobrenome';
        $leitura_data_inicio = 'dataInicio';
        $leitura_data_fim = 'dataFim';
        $nota = 'nota';
        $comentario = 'comentario';
        $livro_titulo = 'titulo';


        $sql =
            'SELECT leitor.' . $leitor_primeiro_nome . ',
                leitor.' . $leitor_sobrenome . ', 
                leitura.' . $leitura_data_inicio . ', 
                leitura.' . $leitura_data_fim . ',
                leitura.' . $nota . ',
                leitura.' . $comentario . ',
                livro.' . $livro_titulo . '
                from leitura leitura
                join leitores leitor
                join livros livro
                on (leitor.leitor_id = leitura.leitor_id
                and livro.livro_id = leitura.livro_id
            );';

        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }

        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $leitor_primeiro_nome . '</th>' .
            '        <th>' . $leitor_sobrenome . '</th>' .
            '        <th> ' . $leitura_data_inicio . ' da leitura </th>' .
            '        <th> ' . $leitura_data_fim . ' da leitura </th>' .
            '        <th> ' . $nota . ' </th>' .
            '        <th>' . $comentario . '</th>' .
            '        <th>' . $livro_titulo . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$leitor_primeiro_nome] . '</td>' .
                    '<td>' . $registro[$leitor_sobrenome] . '</td>' .
                    '<td>' . $registro[$leitura_data_inicio] . '</td>' .
                    '<td>' . $registro[$leitura_data_fim] . '</td>' .
                    '<td>' . $registro[$nota] . '</td>',
                '<td>' . $registro[$comentario] . '</td>',
                '<td>' . $registro[$livro_titulo] . '</td>';
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