<?php

function RetornaConexao()
{
  $servername = '10.2.0.3';
  $username = 'root';
  $password = '123456';
  $schema = 'db_app_db2';

  $conexao = mysqli_connect($servername, $username, $password, $schema);

  if (!$conexao) {
    die('Conexão falhou: ' . mysqli_connect_error());
  }

  return $conexao;
}

function FecharConexao($conexao)
{
  mysqli_close($conexao);
}
