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
        <a href="<?= URL_BASE; ?>index.php?url=home" class="backBtn">⮨</a>
        <h2>Perfil do Aluno</h2>
        <div class="perfil">
            <div class="img-space img">
                <div class="pencil">
                    <button class="penBtn" id="img-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                        </svg>
                    </button>
                </div>
                <img src="<?= CDN_BASE; ?>alunos/<?= $aluno['foto_aluno']; ?>" id="arquivo" alt="<?= $aluno['alt_aluno']; ?>">
                <input type="file" name="foto_aluno" id="foto-input" style="display: none;">
            </div>
            <div class="info">
                <h3>Nome:</h3>
                <p><?= $aluno['nome_aluno']; ?></p>
            </div>
            <div class="info">
                <h3>Email:</h3>
                <p><?= $aluno['email_aluno']; ?></p>
            </div>
            <div class="info">
                <h3>Telefone:</h3>
                <p><?= $aluno['telefone1_aluno']; ?></p>
            </div>
            <div class="info">
                <h3>Data de Nascimento:</h3>
                <p><?= date('d/m/Y', strtotime($aluno['data_nasc_aluno'])); ?></p>
            </div>
            <div class="info">
                <h3>Endereço:</h3>
                <p><?= $aluno['endereco_aluno']; ?>, <?= $aluno['numero_aluno']; ?> - <?= $aluno['bairro_aluno']; ?> / <?= $aluno['estado_aluno']; ?></p>
            </div>
            <div class="info">
                <h3>Responsável:</h3>
                <p><?= $aluno['nome_responsavel']; ?> - <?= $aluno['telefone_responsavel']; ?></p>
            </div>
            <button class="editPf"><a href="<?= URL_BASE; ?>index.php?url=perfil/editar">Editar</a></button>
        </div>
        <?php require_once('templates/footer.php'); ?>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const botao = document.getElementById("img-form");
    const inputFile = document.getElementById("foto-input");
    const imgAtual = document.getElementById("arquivo");

    // Nome do arquivo atual (só o nome, não o caminho)
    let nomeAtual = imgAtual.src.split("/").pop();

    botao.addEventListener("click", function (e) {
        e.preventDefault();
        inputFile.click();
    });

    inputFile.addEventListener("change", function () {
        if (this.files.length > 0) {
            const novoArquivo = this.files[0];
            const novoNome = novoArquivo.name;

            if (novoNome !== nomeAtual) {
                console.log("Arquivo diferente, enviando upload:", novoNome);

                // Preparar dados do upload
                let formData = new FormData();
                formData.append("foto_aluno", novoArquivo);

                // Enviar via AJAX (fetch)
                fetch("<?= URL_BASE; ?>index.php?url=perfil/attFoto", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.sucesso) {
                        alert("Foto atualizada com sucesso!");
                        imgAtual.src = data.nova_foto + "?t=" + new Date().getTime(); // força atualizar imagem
                        nomeAtual = novoNome; // atualiza nome de referência
                    } else {
                        alert("Erro ao atualizar: " + data.erro);
                    }
                })
                .catch(err => {
                    console.error("Erro AJAX:", err);
                });

            } else {
                this.value = ""; // limpa input file
            }
        }
    });
});
    </script>
</body>

</html>