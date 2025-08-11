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
                <p><?=$aluno['nome_aluno'];?></p>
            </div>
            <div class="info">
                <h3>Email:</h3>
                <p><?=$aluno['email_aluno'];?></p>
            </div>
            <div class="info">
                <h3>Telefone:</h3>
                <p><?=$aluno['telefone1_aluno'];?></p>
            </div>
            <div class="info">
                <h3>Data de Nascimento:</h3>
                <?php date('d-m-Y');?>
                <p><?=$aluno['data_nasc_aluno'];?></p>
            </div>
            <div class="info">
                <h3>Endereço:</h3>
                <p><?=$aluno['endereco_aluno'];?>, <?=$aluno['numero_aluno'];?> - <?=$aluno['bairro_aluno'];?> / <?=$aluno['estado_aluno'];?></p>
            </div>
            <div class="info">
                <h3>Responsável:</h3>
                <p><?=$aluno['nome_responsavel'];?> - <?=$aluno['telefone_responsavel'];?></p>
            </div>
            <button class="editPf"><a href="editar.html">Editar</a></button>
        </div>
        <?php require_once('templates/footer.php');?>
    </div>
</body>
</html> 