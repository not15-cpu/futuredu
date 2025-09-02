<?php


class PerfilController extends Controller
{

    public function index()
    {
        $dados = array();
        if (!isset($_SESSION['token_aluno'])) {
            header("Location:" . URL_BASE . "index.php?url=login");
            exit;
        }

        $userId = $_SESSION['aluno'];

        $url = API_BASE . 'ListarAlunoId/' . $userId;

        $ch = curl_init($url);
        $token = $_SESSION['token_aluno'];
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json',
            'Authorization: Bearer ' . $token
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $resultado = json_decode($response, true);
        if ($resultado['id_aluno']) {
            $dados['aluno'] = $resultado;
        }

        $this->carregarViews('perfil', $dados);
    }

    public function editar()
    {
        $dados = array();
        if (!isset($_SESSION['token_aluno'])) {
            header("Location:" . URL_BASE . "index.php?url=login");
            exit;
        }

        $userId = $_SESSION['aluno'];

        $url = API_BASE . 'ListarAlunoId/' . $userId;

        $ch = curl_init($url);
        $token = $_SESSION['token_aluno'];
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json',
            'Authorization: Bearer ' . $token
        ]);

        $response = curl_exec($ch);
        curl_close($ch);


        $resultado = json_decode($response, true);
        if ($resultado['id_aluno']) {
            $dados['aluno'] = $resultado;
        }

        $this->carregarViews('editar', $dados);
    }

    public function salvar()
    {
        if (!isset($_SESSION['token_aluno'])) {
            header("Location:" . URL_BASE . "index.php?url=login");
            exit;
        }

        $alunoId = $_SESSION['aluno'];
        $url = API_BASE . 'AtualizarAluno/' . $alunoId;

        $dados = [];

        // Adiciona apenas campos que foram alterados
        $campos = [
            'nome_aluno',
            'email_aluno',
            'telefone1_aluno',
            'telefone2_aluno',
            'data_nasc_aluno',
            'endereco_aluno',
            'numero_aluno',
            'bairro_aluno',
            'estado_aluno'
        ];

        foreach ($campos as $campo) {
            if (!empty($_POST[$campo])) {
                $dados[$campo] = $_POST[$campo];
            }
        }

        // Nova senha
        if (!empty($_POST['nova_senha'])) {
            $dados['senha_aluno'] = password_hash($_POST['nova_senha'], PASSWORD_ARGON2ID);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Bearer ' . $_SESSION['token_aluno']
        ]);

        $resposta = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200 || $httpCode == 204) {
            header("Location:" . URL_BASE . "index.php?url=perfil");
            exit;
        } else {
            echo "Erro ao atualizar: " . $resposta;
        }
    }

    public function attFoto()
    {
        if (!isset($_SESSION['token_aluno'])) {
            header("Location:" . URL_BASE . "index.php?url=login");
            exit;
        }

        $token = $_SESSION['token_aluno'];
        $payload = AuxiliarToken::validar($token);

        if (!$payload) {
            echo 'Token inválido ou expirado. Faça login novamente';
            exit;
        }

        $userId = $payload['id'];

        if (!isset($_FILES['foto_aluno']) || $_FILES['foto_aluno']['error'] !== UPLOAD_ERR_OK) {
            echo "Nenhuma foto enviada!";
            exit;
        }

        $url = API_BASE . 'atualizarFoto/' . $userId;

        $dados = [
            'foto_aluno' => new CURLFile(
                $_FILES['foto_aluno']['tmp_name'],
                mime_content_type($_FILES['foto_aluno']['tmp_name']),
                $_FILES['foto_aluno']['name']
            )
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true); // <<< POST, não PATCH
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Bearer ' . $_SESSION['token_aluno']
        ]);
        $resposta = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200) {
            header("Location:" . URL_BASE . "index.php?url=home");
            exit;
        } else {
            echo "Erro ao atualizar: " . $resposta;
        }
    }
}
