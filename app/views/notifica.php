<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Cursos</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="notificacoes-aluno">
        <header>
            <img src="assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
        </header>
        <a href="<?=URL_BASE;?>index.php?url=settings" class="backBtn">⮨</a>
        <h2>Notificações & Comunicados</h2>
        <div class="notifics">
            <div class="notific">
                <h2>Nota Lançada</h2>
                <h3>Sua nota da Avaliação 2 de desenvolvimento web foi atualizada.</h3>
                <p>15/07/2025 14:00</p>
            </div>
            <div class="notific">
                <h2>Evento: Feira Tecnológica</h2>
                <h3>Participe da feira tecnológica no dia 20/08 no nosso campus principal.</h3>
                <p>15/07/2025 14:57</p>
            </div>
            <div class="notific">
                <h2>Atualização de Dados</h2>
                <h3>Verifique e atualize seus dados pessoas no menu configurações ou na guia perfil.</h3>
                <p>15/07/2025 16:40</p>
            </div>
        </div>

        <?php require_once('templates/footer.php');?>
    </div>
</body>

</html>