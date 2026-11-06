<?php
require __DIR__ . '/../config-banco.php';

$conexao = new mysqli($host, $usuario, $senha, $banco);
$conexao->set_charset("utf8mb4");