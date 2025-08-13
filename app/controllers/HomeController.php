<?php



class HomeController extends Controller{

    public function index(){
        $dados = array();

        if(!isset($_SESSION['aluno'])){
            header("Location:".URL_BASE."index.php?url=login");
            exit;
        }else{
            $aluno = $_SESSION['aluno'];
        }

        $userId = $aluno['id_aluno'];

        $url = API_BASE.'ListarAlunoId/'.$userId;     

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $resultado = json_decode($response, true);
        if($resultado['id_aluno']){
            $dados['aluno'] = $resultado;
        }

            
        $this->carregarViews('menu', $dados);

    }

}