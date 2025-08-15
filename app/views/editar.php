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
        <a href="<?=URL_BASE;?>index.php?url=settings" class="backBtn">⮨</a>
        <h2>Editar Perfil</h2>
        <div class="perfil">
            <div class="img-space img"></div>
            <div class="info">
                <h3>Nome:</h3>
                <input type="text" name="" id="" class="menuBtn" placeholder="<?=$aluno['nome_aluno'];?>">
            </div>
            <div class="info">
                <h3>Email:</h3>
                <input type="text" name="" id="" class="menuBtn" placeholder="<?=$aluno['email_aluno'];?>">
            </div>
            <div class="info">
                <h3>Telefone:</h3>
                <input type="tel" name="" id="" class="menuBtn" placeholder="<?=$aluno['telefone1_aluno'];?>">
            </div>
            <div class="info">
                <h3>Data de Nascimento:</h3>
                <input type="date" name="" class="menuBtn" value="<?=date('d/m/Y', strtotime($aluno['data_nasc_aluno']));?>">
            </div>
            <div class="info">
                <h3>Endereço:</h3>
                <input type="text" name="" id="" class="menuBtn" placeholder="<?=$aluno['endereco_aluno'];?>, <?=$aluno['numero_aluno'];?> - <?=$aluno['bairro_aluno'];?> / <?=$aluno['estado_aluno'];?>">
            </div>
            <div class="info">
                <h3>Responsável:</h3>
                <p><?=$aluno['nome_responsavel'];?> - <?=$aluno['telefone_responsavel'];?></p>
            </div>
            <button class="editPf"><a href="perfil.html">Salvar Alterações</a></button>
        </div>
        <?php require_once('templates/footer.php');?>
    </div>
</body>
</html> 