<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Editar Perfil</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="cursos-aluno">
        <header>
            <img src="assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
        </header>
        <a href="settings.html" class="backBtn">⮨</a>
        <h2>Editar Perfil</h2>
        <div class="perfil">
            <div class="img-space img"></div>
            <div class="info">
                <h3>Nome:</h3>
                <input type="text" name="" id="" class="menuBtn" placeholder="João da Silva">
            </div>
            <div class="info">
                <h3>Email:</h3>
                <input type="text" name="" id="" class="menuBtn" placeholder="jose.dasilva@gmail.com">
            </div>
            <div class="info">
                <h3>Telefone:</h3>
                <input type="tel" name="" id="" class="menuBtn" placeholder="(11) 91234-5678">
            </div>
            <div class="info">
                <h3>Data de Nascimento:</h3>
                <input type="date" name="" class="menuBtn" value="10/05/2000">
            </div>
            <div class="info">
                <h3>Endereço:</h3>
                <input type="text" name="" id="" class="menuBtn" placeholder="Rua A, 100 - Centro de São Paulo / SP">
            </div>
            <div class="info">
                <h3>Responsável:</h3>
                <p>Maria da Silva - (11) 45674-4567</p>
            </div>
            <button class="editPf"><a href="perfil.html">Salvar Alterações</a></button>
        </div>
        <?php require_once('templates/footer.php');?>
    </div>
</body>
</html> 