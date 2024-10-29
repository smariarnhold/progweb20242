<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>
    <?php
    // Define o fuso horário para o Brasil
    date_default_timezone_set('America/Sao_Paulo');

    // Função para validar os dados e exibir mensagens de erro
    function validarDados($nome, $email, $cpf) {
        if (empty($nome) || empty($email) || empty($cpf)) {
            return "Todos os campos são obrigatórios.";
        }

        if (strlen($cpf) !== 11) {
            return "O CPF deve conter 11 dígitos.";
        }

        return null;
    }

    // Se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = trim($_POST["nome"]);
        $email = trim($_POST["email"]);
        $cpf = trim($_POST["cpf"]);

        // Valida os dados
        $erro = validarDados($nome, $email, $cpf);

        if ($erro) {
            // Exibe o formulário novamente com a mensagem de erro
            echo "<p style='color:red;'>$erro</p>";
        } else {
            // Dados válidos, exibe o resultado
            $dataCadastro = date("d/m/Y H:i:s");

            echo "<h2>Dados cadastrados com sucesso!</h2>";
            echo "Nome: " . htmlspecialchars($nome) . "<br>";
            echo "Email: " . htmlspecialchars($email) . "<br>";
            echo "CPF: " . htmlspecialchars($cpf) . "<br>";
            echo "Data de Cadastro: " . htmlspecialchars($dataCadastro) . "<br>";
            exit(); // Encerra o script para que o formulário não seja exibido novamente
        }
    }
    ?>

    <!-- Exibe o formulário se os dados não foram enviados ou se houver erros -->
    <h2>Formulário de Cadastro</h2>
    <form action="cadclienteself.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required value="<?= isset($nome) ? htmlspecialchars($nome) : '' ?>">
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
        <br><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required value="<?= isset($cpf) ? htmlspecialchars($cpf) : '' ?>">
        <br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
