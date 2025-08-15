<?php



class ProjectsController extends Controller{

    public function index()
    {
        $dados = array();
        
        if(!isset($_SESSION['token_aluno'])){
            header("Location:".URL_BASE."login");
            exit;
        }

        $alunoId = $_SESSION['id_aluno'];

        $url = API_BASE . "ListarProjetosIncritos/".$alunoId;
        
        $ch = curl_init($url);
        $token = $_SESSION['token_aluno'];
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Bearer '.$token
        ]);
        $response = curl_exec($ch);
        $resultado = json_decode($response, true);
        if(!empty($resultado)){
            $dados['projetos'] = $resultado;
        }

        $this->carregarViews('projetos', $dados);
    }

}