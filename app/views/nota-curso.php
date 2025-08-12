<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Cursos</title>
    <link rel="stylesheet" href="<?=URL_BASE;?>assets/css/styles.css">
</head>

<body>
    <div class="notas-aluno">
        <header>
            <img src="<?=URL_BASE;?>assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
        </header>
        <a href="<?=URL_BASE;?>index.php?url=home" class="backBtn">⮨</a>
        <h2>Notas do Curso<br>DEVWEB01</h2>
        <div class="results">
            <div class="result nota-curso">
                <h1>Avaliação 1</h1>
                <h3>Nota: 7.8</h3>
                <h2>Data: 16/05/2025</h2>
                <h2>Observação<br>Boa estrutura de código, utilize mais comentários.</h2>
            </div>
        </div>

        <?php require_once('templates/footer.php');?>
    </div>
</body>

</html>