<?php
session_start();

if (!isset($_SESSION["aluno_id"])) {
    header("Location: index.php");
    exit;
}

require "conecta.php";

$resultado = $conexao->query(
    "SELECT id, nome, cpf FROM aluno ORDER BY id"
);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Alunos cadastrados</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
        </tr>

        <?php while ($aluno = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= (int) $aluno["id"] ?></td>
                <td><?= htmlspecialchars(
                    $aluno["nome"], ENT_QUOTES, "UTF-8"
                ) ?></td>
                <td><?= htmlspecialchars(
                    $aluno["cpf"], ENT_QUOTES, "UTF-8"
                ) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>