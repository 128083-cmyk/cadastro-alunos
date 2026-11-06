<?php
session_start();
require "conecta.php";

$cpf = $_POST["cpf"] ?? "";
$senha = $_POST["senha"] ?? "";

if (!is_string($cpf) || !is_string($senha)
    || !preg_match('/^[0-9]{11}$/', $cpf) || $senha === "") {
    exit('Preencha CPF e senha corretamente. <a href="index.php">Voltar</a>');
}

$sql = "SELECT id, nome FROM aluno WHERE cpf = ? AND senha = ?";
$consulta = $conexao->prepare($sql);
$consulta->bind_param("ss", $cpf, $senha);
$consulta->execute();

$resultado = $consulta->get_result();
$aluno = $resultado->fetch_assoc();

if ($aluno) {
    session_regenerate_id(true);
    $_SESSION["aluno_id"] = $aluno["id"];

    header("Location: lista.php");
    exit;
}

unset($_SESSION["aluno_id"]);
echo 'CPF ou senha incorretos. <a href="index.php">Tentar novamente</a>';