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

        $primeiro_nome = 'primeiro_nome';
        $sobrenome = 'sobrenome';
        $bibli_nome = 'nome';
        $livro_titulo = 'titulo';


        $sql =
            'SELECT leitor.' . $primeiro_nome . ', 
                    leitor.' . $sobrenome . ', 
                    biblioteca.' . $bibli_nome . ',
                    livro.' . $livro_titulo . '
            from biblioteca_livro blivro
            join leitores leitor
            join livros livro
            join biblioteca 
            on (biblioteca.biblioteca_id = blivro.biblioteca_id
            and livro.livro_id = blivro.livro_id
            and leitor.leitor_id = biblioteca.leitor_id);';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $primeiro_nome . '</th>' .
            '        <th>' . $sobrenome . '</th>' .
            '        <th>' . $bibli_nome . ' da biblioteca</th>' .
            '        <th>' . $livro_titulo . ' do livro</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$primeiro_nome] . '</td>' .
                    '<td>' . $registro[$sobrenome] . '</td>' .
                    '<td>' . $registro[$bibli_nome] . '</td>' .
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