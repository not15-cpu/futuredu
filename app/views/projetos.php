<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Cursos</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="cursos-aluno">
        <header>
            <img src="assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
        </header>
        <a href="<?=URL_BASE;?>index.php?url=home" class="backBtn">⮨</a>
        <h2>Meus Projetos</h2>
        <div class="projetos">
            <?php foreach($projetos as $projeto): ?>
            <div class="projeto">
                <h2 style="margin-top: 5px;"><?=$projeto['titulo_projeto'];?></h2>
                <h3>Professor: <?=$projeto['nome_funcionario'];?></h3>
                <h3>Status: <?=$projeto['status_projeto'];?></h3>
                <h3>Nota: <?=$projeto['nota_projeto'];?></h3>
                <?php setlocale(LC_TIME, 'pt_BR.UTF-8');?>
                <h3>Período: <?=ucfirst(strftime('%b/%Y', strtotime($projeto['data_inicio_projeto'])));?> - <?=ucfirst(strftime('%b/%Y', strtotime($projeto['data_entrega_projeto'])));?></h3>
                <a href="<?=$projeto['url_projeto'];?>" target="_blank">🔗 Acessar Projeto</a>
            </div>
            <?php endforeach;?>
        </div>

        <?php require_once('templates/footer.php');?>
    </div>
</body>

</html>