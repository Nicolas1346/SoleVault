<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoleVault</title>

     <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
<main>
    <h1>Bem-vindo de volta!</h1>
      <p>Entre na sua conta e continue explorando o melhor 
       <br> do <span class="destaque">streetwear.</span> </p>

        <form action="login.php" method="POST">
             <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

            <label for="senha"> Senha: </label>
            <input type="password" id="senha" name="senha" maxlength="30" placeholder="Digite sua senha" required> 
            <p id="senha-error"></p>

            <button type="submit"> Entrar </button>

        </form>

            <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
</main>

    <aside>

    </aside>

</div>
</body>
</html>
