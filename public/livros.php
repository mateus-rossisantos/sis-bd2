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

        <h2>Livros</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $titulo = 'titulo';
        $autor = 'autor_id';
        $classificacao = 'classificacao';
        $editora = 'editora';
        $edicao = 'edicao';
        $paginas = 'paginas';


        $sql =
            'SELECT ' . $titulo .
            '     , ' . $autor .
            '     , ' . $classificacao .
            '     , ' . $editora .
            '     , ' . $edicao .
            '     , ' . $paginas .
            '  FROM livros';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $titulo . '</th>' .
            '        <th>' . $autor . '</th>' .
            '        <th>' . $classificacao . '</th>' .
            '        <th>' . $editora . '</th>' .
            '        <th>' . $edicao . '</th>' .
            '        <th> Nro de ' . $paginas . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$titulo] . '</td>' .
                    '<td>' . $registro[$autor] . '</td>' .
                    '<td>' . $registro[$classificacao] . '</td>' .
                    '<td>' . $registro[$editora] . '</td>' .
                    '<td>' . $registro[$edicao] . '</td>' .
                    '<td>' . $registro[$paginas] . '</td>';
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