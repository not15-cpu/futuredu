<?php



class ProjectsController extends Controller{

   public function index()
{
    $dados = array();

    if(!isset($_SESSION['token_aluno']) || !isset($_SESSION['aluno'])){
        header("Location:".URL_BASE."index.php?url=login");
        exit;
    }

    $alunoId = $_SESSION['aluno'];
    $url = API_BASE . "ListarProjetosIncritos/" . $alunoId;

    $ch = curl_init($url);
    $token = $_SESSION['token_aluno'];

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if(curl_errno($ch)) {
        $dados['projetos'] = [];
        $dados['mensagem'] = 'Erro na conexão com a API: ' . curl_error($ch);
        curl_close($ch);
        $this->carregarViews('projetos', $dados);
        return;
    }

    curl_close($ch);

    $resultado = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        $dados['projetos'] = [];
        $dados['mensagem'] = 'Erro ao decodificar resposta da API';
    } elseif ($httpCode != 200) {
        $dados['projetos'] = [];
        // Se o retorno da API for erro no JSON, tenta pegar mensagem
        if (isset($resultado['erro'])) {
            $dados['mensagem'] = $resultado['erro'];
        } else {
            $dados['mensagem'] = 'Erro ao buscar projetos (HTTP ' . $httpCode . ')';
        }
    } elseif (!empty($resultado)) {
        $dados['projetos'] = $resultado;
        $dados['mensagem'] = '';
    } else {
        $dados['projetos'] = [];
        $dados['mensagem'] = 'Nenhum projeto encontrado.';
    }

    $this->carregarViews('projetos', $dados);
}



}