<?php
require "conexao.php";

$erros = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";
    $confirmar = $_POST["confirmar"] ?? "";

    if (mb_strlen($nome) < 3) {
        $erros[] = "Nome muito curto.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "E-mail inválido.";
    }

    if (strlen($senha) < 8) {
        $erros[] = "A senha precisa ter 8 caracteres ou mais.";
    }

    if ($senha !== $confirmar) {
        $erros[] = "As senhas não coincidem.";
    }

    if (empty($erros)) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha_hash) VALUES (:nome, :email, :senha_hash)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':nome'       => $nome,
                ':email'      => $email,
                ':senha_hash' => $senhaHash
            ]);

            echo "Cadastrado!";
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() === "23000") {
                $erros[] = "Este e-mail já está cadastrado.";
            } else {
                error_log($e->getMessage());
                $erros[] = "Não foi possível cadastrar. Tente novamente.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta | SoleVault</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
    <main>
        <h1>Crie sua conta</h1>

        <form action="cadastro.php" method="POST">

            <?php foreach ($erros as $erro): ?>
                <p><?= htmlspecialchars($erro) ?></p>
            <?php endforeach; ?>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
            <p id="nome-error"></p> 

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
            <p id="email-error"></p>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" maxlength="30" placeholder="Digite sua senha" required>
            <p id="senha-error"></p>

            <label for="confirmar">Confirmar Senha:</label>
            <input type="password" id="confirmar" name="confirmar" maxlength="30" placeholder="Repita sua senha" required>
            <p id="confirmar-error"></p>

            <button type="submit">Cadastrar</button>

        </form>

        <p>Já tem uma conta? <a href="login.php">Faça o login</a></p>
    </main>

    <aside>
    </aside>
</div>

<script src="js/validacao.js"></script>
</body>
</html>
