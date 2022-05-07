<?php
$my_connection = "10.2.0.3";
mysqli_connect($my_conection, "root", "123456") or die(mysqli_error($my_connection));
echo "Conectado ao MySQL Server!<br />";
