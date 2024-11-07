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

        // Verifica se os dados foram enviados
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = trim($_POST["nome"]);
            $email = trim($_POST["email"]);
            $cpf = trim($_POST["cpf"]);

            // Validação dos campos vazios
            if (empty($nome) || empty($email) || empty($cpf)) {
                header("Location: cadcliente.php?erro=Todos os campos são obrigatórios.");
                exit();
            }

            // Validação do CPF
            if (strlen($cpf) !== 11) {
                header("Location: cadcliente.php?erro=O CPF deve conter 11 dígitos.");
                exit();
            }

            // Define a data atual do servidor como data de cadastro
            $dataCadastro = date("d/m/Y H:i:s");

            // Exibe os dados enviados se a validação foi bem-sucedida
            echo "<h2>Dados cadastrados com sucesso!</h2>";
            echo "<ul class='list-group'>";
            echo "<li class='list-group-item'><strong>Nome:</strong> " . htmlspecialchars($nome) . "</li>";
            echo "<li class='list-group-item'><strong>Email:</strong> " . htmlspecialchars($email) . "</li>";
            echo "<li class='list-group-item'><strong>CPF:</strong> " . htmlspecialchars($cpf) . "</li>";
            echo "<li class='list-group-item'><strong>Data de Cadastro:</strong> " . htmlspecialchars($dataCadastro) . "</li>";
            echo "</ul>";
            exit();
        }
        else {
            // Redireciona para o formulário se o acesso não foi via POST
            header("Location: cadcliente.php");
            exit();
        }
        ?>
    </div>


</body>
</html>
