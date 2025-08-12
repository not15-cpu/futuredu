<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Mensagem</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="cursos-aluno">
        <header>
            <img src="assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
        </header>
        <a href="<?=URL_BASE;?>index.php?url=home" class="backBtn">⮨</a>
        <h2>Contato com a Coordenação</h2>
        <div class="contact">
                <h2>Formas de Contato</h2>
                <h2>Email: coordenacao@futuredu.com.br</h3>
                <h2>Telefone: (11)4002-8922</h2>
                <h2>WhatsApp: (11)98888-7766</h2>
                <h2>Horário Atend: Seg á Sex, 08h ás 17h</h2>
        </div>
        <div class="assunto">
            <label for="assunto">Assunto</label>
            <input type="text" name="" id="" placeholder="Assunto da Mensagem">
        </div>

        <div class="message">
            <label for="mensagem">Mensagem</label>
           <input type="text" name="" placeholder="Digite sua mensagem aqui...">
        </div>

        <button class="submit-contact">Enviar Mensagem</button>

        <?php require_once('templates/footer.php');?>
    </div>
</body>

</html>