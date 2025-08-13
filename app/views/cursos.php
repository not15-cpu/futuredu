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
        <h2>Cursos Matriculados</h2>
        <div class="cursos">
            <?php foreach($matriculas as $curso): ?>
            <?php $link = $this->gerarLinkCurso($curso['nome_curso']);?>
            <a href="<?=URL_BASE;?>index.php?url=courses/nota/<?=$link;?>">
                <div class="curso">
                    <div class="img-space">
                        <img src="<?=URL_BASE;?>assets/img/curso/<?=$curso['foto_curso'];?>" alt="">
                    </div>
                    <h2><?=$curso['nome_sigla'];?></h2>
                    <h3><?=$curso['nome_curso'];?></h3>
                    <h2>Modalidade: <?=$curso['modalidade_curso'];?></h2>
                    <h2>Carga Horária: <?=$curso['carga_horaria_curso'];?>h</h2>
                </div>
            </a>
            <?php endforeach;?>
        </div>

        <?php require_once('templates/footer.php');?>
    </div>
</body>

</html>