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
    echo "Nome: " . htmlspecialchars($nome) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "CPF: " . htmlspecialchars($cpf) . "<br>";
    echo "Data de Cadastro: " . htmlspecialchars($dataCadastro) . "<br>";
}
else {
    // Redireciona para o formulário se o acesso não foi via POST
    header("Location: cadcliente.php");
    exit();
}
?>
