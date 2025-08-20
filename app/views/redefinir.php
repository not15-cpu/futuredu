<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Esqueceu a Senha?</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="forget-pass">
        <form action="<?= URL_BASE; ?>index.php?url=login/redefine" method="post">
            <div class="forget">
                <h1>Redefinir Senha</h1>
                <input type="hidden" name="token" value="<?=$token;?>">
                <input style="width: 320px;padding:10px;height:40px;border-radius:15px;border:1px solid;margin-bottom:20px;" type="password" name="nova_senha" id="" placeholder="Digite sua nova senha">
                <button type="submit" class="submit-btn">Salvar Senha</button>
        </form>
        <a href="<?=URL_BASE;?>index.php?url=login">⮨ Voltar para o Login</a>
    </div>
    </div>
</body>

</html>