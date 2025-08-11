<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="login-body">
    <form action="<?= URL_BASE; ?>index.php?url=login/login" method="POST">
        <div class="container">
            <img src="assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
            <h1>Login do Aluno</h1>
            <label for="email">E-mail</label>
            <input type="email" name="email_aluno" id="">
            <label for="password">Senha</label>
            <input type="password" name="senha_aluno" id="">
            <button class="submit-btn" type="submit" style="cursor:pointer;">Entrar</button>
    </form>
    <button class="submit-btn" style="margin-top: 10px;"><a href="<?= URL_BASE; ?>register">Cadastrar</a></button>
    <a href="<?= URL_BASE; ?>forgot">Esqueceu a Senha?</a>
</body>
</div>

</html>