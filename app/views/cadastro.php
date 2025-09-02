<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuturEdu - Cadastre-se</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="">
    <div class="cadastro">
        <header>
            <img src="assets/img/logo/logo-futuedu-preto.svg" alt="Logo FuturEdu" class="logo">
        </header>
        <a href="login.html" class="backBtn">⮨</a>
        <h1>Cadastre-se</h1>
        <form action="<?= URL_BASE; ?>index.php?url=login/registro" method="post">
            <div class="acesso cadastro-form">
                <div class="cadastro-img"></div>

                <input type="text" name="nome_aluno" id="nome_aluno" placeholder="Nome Completo" class="menuBtn" style="margin-top: 60px;">

                <input type="text" name="nome_social" id="nome_social" placeholder="Nome Social" class="menuBtn">
                <input type="text" name="cpf_aluno" id="cpf_aluno" placeholder="CPF" class="menuBtn">

                <input type="text" name="rg_aluno" id="rg_aluno" placeholder="RG" class="menuBtn">

                <input type="text" name="data_nasc_aluno" id="data_nasc_aluno" placeholder="Data Nasc" class="menuBtn">

                <input type="email" name="email_aluno" id="email_aluno" placeholder="E-Mail" class="menuBtn">

                <input type="password" name="senha_aluno" id="senha_aluno" placeholder="Senha" class="menuBtn">

                <input type="text" name="telefone1_aluno" id="telefone1_aluno" placeholder="Nº Telefone" class="menuBtn">

                <input type="text" name="telefone2_aluno" id="telefone2_aluno" placeholder="Nº Celular" class="menuBtn">

                <input type="text" name="cep_aluno" id="cepInput" placeholder="Cep" class="menuBtn">

                <input type="text" name="endereco_aluno" id="addressInput" placeholder="Endereço" class="menuBtn">

                <input type="text" name="numero_aluno" id="numero_aluno" placeholder="Número" class="menuBtn">

                <input type="text" name="complemento_aluno" id="complemento_aluno" placeholder="Complemento" class="menuBtn">

                <input type="text" name="nome_mae" id="nome_mae" placeholder="Responsável" class="menuBtn">

                <input type="text" name="telefone_mae" id="telefone_mae" placeholder="Nº Telefone Responsável" class="menuBtn">

                <input type="email" name="email_mae" id="email_mae" placeholder="E-mail Responsável" class="menuBtn">

                <button type="submit" class="submit-btn" style="margin-top:20px;cursor:pointer;width:280px;padding:10px;margin-bottom:20px;background:#fff;color:#8E44AD;">
                    Cadastrar
                </button>
            </div>
        </form>

    </div>
    <script src="assets/js/buscarCep.js"></script>
</body>

</html>