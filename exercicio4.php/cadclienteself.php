<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <!-- Inclusão do Bootstrap via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous" defer></script>
</head>
<body>
    <div class="container p-5">
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
                echo "<div class='alert alert-danger'>$erro</div>";
            } else {
                // Dados válidos, exibe o resultado 
                $dataCadastro = date("d/m/Y H:i:s");

                echo "<h2>Dados cadastrados com sucesso!</h2>";
                echo "<ul class='list-group'>";
                echo "<li class='list-group-item'><strong>Nome:</strong> " . htmlspecialchars($nome) . "</li>";
                echo "<li class='list-group-item'><strong>Email:</strong> " . htmlspecialchars($email) . "</li>";
                echo "<li class='list-group-item'><strong>CPF:</strong> " . htmlspecialchars($cpf) . "</li>";
                echo "<li class='list-group-item'><strong>Data de Cadastro:</strong> " . htmlspecialchars($dataCadastro) . "</li>";
                echo "</ul>";
                exit(); // Encerra o script para que o formulário não seja exibido novamente
            }
        }
        ?>

        <!-- Formulário para preencher -->
        <h2>Formulário de Cadastro</h2>
        <form action="cadclienteself.php" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required value="<?= isset($nome) ? htmlspecialchars($nome) : '' ?>">
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
            </div>
            
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required value="<?= isset($cpf) ? htmlspecialchars($cpf) : '' ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

</body>
</html>
