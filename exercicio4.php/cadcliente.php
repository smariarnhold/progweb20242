<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>
    <h2>Formulário de Cadastro</h2>
    
    <?php
    // Verifica se há mensagens de erro e as exibe
    if (isset($_GET['erro'])) {
        echo "<p style='color:red;'>{$_GET['erro']}</p>";
    }
    ?>

    <form action="dadosform.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>
        <br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
