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
        <a href="<?=URL_BASE;?>index.php?url=home" class="backBtn">⮨</a>
        <h2>Minhas Notas</h2>
        <div class="results">
            <a href="nota-curso.html">
                <div class="result">
                    <h2>DEVWEB01</h2>
                    <h3>Desenvolvimento<br> Web</h3>
                    <h2>Nota: 7.8</h2>
                    <h2>Data: 16/05/2025</h2>
                    <h2>Observação<h2>
                    <p>Sua lógica está muito boa, mas pode melhorar a identação.</p>
                </div>
            </a>

            <a href="nota-curso.html">
                <div class="result">
                    <h2>DESGRA-01</h2>
                    <h3>Design Gráfico</h3>
                    <h2>Nota: 0.5</h2>
                    <h2>Data: 26/05/2025</h2>
                    <h2>Observação<h2>
                    <p>Boa lógica mas não desenvolveu.</p>
                </div>
            </a>
        </div>

        <?php require_once('templates/footer.php');?>
    </div>
</body>

</html>