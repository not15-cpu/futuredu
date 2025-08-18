<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Configurações</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="settings-aluno">
        <header>
            <img src="assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
        </header>
        <a href="<?=URL_BASE;?>index.php?url=home" class="backBtn back">⮨</a>
        <h2>Configurações</h2>
        <div class="options">
            <button class="settingsBtn"><a href="<?=URL_BASE;?>index.php?url=perfil/editar">👤 Atualização de dados pessoais</a></button>
            <button class="settingsBtn"><a href="<?=URL_BASE;?>index.php?url=messages">🔔 Notificações e Comunicados</a></button>
            <button class="settingsBtn"><a href="<?=URL_BASE;?>index.php?url=login/logout">🚪 Sair</a></button>
        </div>
        <?php require_once('templates/footer.php');?>
    </div>
</body>
</html>