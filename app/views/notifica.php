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
            <?php foreach($notifics as $notific): ?>
            <div class="notific">
                <h2><?=$notific['title_notificacao'];?></h2>
                <h3><?=$notific['desc_notificacao'];?></h3>
                <p><?=date('d/m/Y H:i:s', strtotime($notific['criado_em']));?></p>
            </div>
            <?php endforeach;?>
        </div>

        <?php require_once('templates/footer.php');?>
    </div>
</body>

</html>