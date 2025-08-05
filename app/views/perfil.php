<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Perfil</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="perfil-aluno">
        <header>
            <img src="assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
        </header>
        <a href="menu.html" class="backBtn">⮨</a>
        <h2>Perfil do Aluno</h2>
        <div class="perfil">
            <div class="img-space img"></div>
            <div class="info">
                <h3>Nome:</h3>
                <p>José da Silva</p>
            </div>
            <div class="info">
                <h3>Email:</h3>
                <p>jose.dasilva@gmail.com</p>
            </div>
            <div class="info">
                <h3>Telefone:</h3>
                <p>(11) 91234-5678</p>
            </div>
            <div class="info">
                <h3>Data de Nascimento:</h3>
                <p>10/05/2000</p>
            </div>
            <div class="info">
                <h3>Endereço:</h3>
                <p>Rua A, 100 - Centro de São Paulo / SP</p>
            </div>
            <div class="info">
                <h3>Responsável:</h3>
                <p>Maria da Silva - (11) 45674-4567</p>
            </div>
            <button class="editPf"><a href="editar.html">Editar</a></button>
        </div>
        <?php require_once('templates/footer.php');?>
    </div>
</body>
</html> 