<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos</title>
</head>
<body>
    <h1>Login do Aluno</h1>

    <form action="login.php" method="post">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf"
               maxlength="11" pattern="[0-9]{11}"
               placeholder="Somente números" required>

        <br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>