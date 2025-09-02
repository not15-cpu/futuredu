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
        <a href="<?= URL_BASE; ?>index.php?url=settings" class="backBtn">⮨</a>
        <h2>Editar Perfil</h2>
        <div class="perfil" style="margin-top:260px;margin-left:785px;">
            <form style="margin-top:20px;" action="<?= URL_BASE; ?>index.php?url=perfil/salvar" method="POST" enctype="multipart/form-data">
                <!-- Área de imagem -->
                <div class="img-space img" style="margin-top:-185px;margin-left:-5px;">
                    <img src="<?=CDN_BASE;?>alunos/<?=$aluno['foto_aluno'];?>" alt="">
                </div>
                <input type="file" name="foto_aluno" id="fotoInput" accept="image/*" style="display:none;">

                <div class="info">
                    <h3>Nome:</h3>
                    <input type="text" name="nome_aluno" class="menuBtn" placeholder="<?= $aluno['nome_aluno']; ?>">
                </div>
                <div class="info">
                    <h3>Email:</h3>
                    <input type="text" name="email_aluno" class="menuBtn" placeholder="<?= $aluno['email_aluno']; ?>">
                </div>
                <div class="info">
                    <h3>Telefone 1:</h3>
                    <input type="tel" name="telefone1_aluno" class="menuBtn" placeholder="<?= $aluno['telefone1_aluno']; ?>">
                </div>
                <div class="info">
                    <h3>Telefone 2:</h3>
                    <input type="tel" name="telefone2_aluno" class="menuBtn" placeholder="<?= $aluno['telefone2_aluno']; ?>">
                </div>
                <div class="info">
                    <h3>Data de Nascimento:</h3>
                    <input type="date" name="data_nasc_aluno" class="menuBtn" value="<?= date('Y-m-d', strtotime($aluno['data_nasc_aluno'])); ?>">
                </div>
                <div class="info">
                    <h3>Endereço:</h3>
                    <input type="text" name="endereco_aluno" class="menuBtn" placeholder="<?= $aluno['endereco_aluno']; ?>">
                </div>
                <div class="info">
                    <h3>Número:</h3>
                    <input type="text" name="numero_aluno" class="menuBtn" placeholder="<?= $aluno['numero_aluno']; ?>">
                </div>
                <div class="info">
                    <h3>Bairro:</h3>
                    <input type="text" name="bairro_aluno" class="menuBtn" placeholder="<?= $aluno['bairro_aluno']; ?>">
                </div>
                <div class="info">
                    <h3>Estado:</h3>
                    <input type="text" name="estado_aluno" class="menuBtn" placeholder="<?= $aluno['estado_aluno']; ?>">
                </div>
                <div class="info">
                    <h3>Responsável:</h3>
                    <p><?= $aluno['nome_responsavel']; ?> - <?= $aluno['telefone_responsavel']; ?></p>
                </div>

                <button type="submit" class="editPf">Salvar Alterações</button>
            </form>
        </div>

        <script>
            const imgSpace = document.getElementById('imgSpace');
            const fotoInput = document.getElementById('fotoInput');

            // Ao clicar na área da imagem, abre o seletor de arquivos
            imgSpace.addEventListener('click', () => {
                fotoInput.click();
            });

            // Mostra preview da imagem selecionada
            fotoInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imgSpace.style.backgroundImage = `url('${e.target.result}')`;
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>
</body>

</html>