<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Cursos</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="notas-aluno">
        <header>
            <img src="assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
        </header>
        <a href="<?= URL_BASE; ?>index.php?url=home" class="backBtn">⮨</a>
        <h2>Minhas Notas</h2>
        <div class="results">
            <?php if (!empty($medias)): ?>
                <?php foreach ($medias as $media): ?>
                    <?php $link = $this->gerarLinkCurso($media['nome_curso']);?>
                    <a href="<?=URL_BASE;?>course/nota/<?=$link;?>">
                        <div class="result">
                            <h2 class="titulo-principal"><?= $media['nome_sigla']; ?></h2>
                            <h3 class="subtitulo"><?= $media['nome_curso']; ?></h3>
                            <h2 class="info">Nota: <?= number_format($media['media'], 2, '.', ''); ?></h2>
                            <h2 class="info">Data: <?= date('d/m/Y', strtotime($media['data_nota'])); ?></h2>
                            <h2 class="info">Observação<h2>
                            <p class="info"><?= $media['obs_nota']; ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php require_once('templates/footer.php'); ?>
    </div>
</body>

</html>