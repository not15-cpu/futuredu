<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Menu</title>
    <link rel="stylesheet" href="<?=URL_BASE;?>assets/css/styles.css">
</head>
<body class="menu-body">
    <div class="menu-aluno">
        <header>
            <img src="<?=URL_BASE;?>assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
        </header>
        <button class="fonte-menor" tabindex="0" onclick="diminuirFonte()" data-tts="Diminuir Fonte">-</button>
        <button class="fonte-maior" tabindex="0" onclick="aumentarFonte()" data-tts="Aumentar Fonte">+</button>
        
        <?php
        $nomeCompleto = $aluno['nome_aluno'] ?? '';
        $nomeAluno = explode(' ', $nomeCompleto);
        ?>
        <h1 data-tts="Olá, <?=$nomeAluno[0];?>!">Olá, <?=$nomeAluno[0] ?? 'Aluno';?>!</h1>
        <h2 data-tts="O que você deseja fazer hoje?">O que você deseja fazer hoje?</h2>
        <div class="acesso">
            <h2>Acesso Rápido</h2>
            <button class="menuBtn" data-tts="Meus Cursos"><a href="<?=URL_BASE;?>index.php?url=courses">📚 Meus Cursos</a></button>
            <button class="menuBtn" data-tts="Minhas Notas"><a href="<?=URL_BASE;?>courses/notas">📝 Minhas Notas</a></button>
            <button class="menuBtn" data-tts="Meus Projetos"><a href="<?=URL_BASE;?>projects">📁 Meus Projetos</a></button>
            <button class="menuBtn" data-tts="Enviar Mensagem"><a href="<?=URL_BASE;?>messages">📨 Enviar Mensagem</a></button>
            <button class="menuBtn" data-tts="Configurações"><a href="<?=URL_BASE;?>settings">⚙️ Configurações</a></button>
        </div>
        <?php require_once('templates/footer.php');?>
    </div>
    <script src="<?=URL_BASE;?>assets/js/script.js"></script>
</body>
</html>