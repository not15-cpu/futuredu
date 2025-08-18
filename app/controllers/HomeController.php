<?php



class HomeController extends Controller{

    public function index(){
        $dados = array();

        if(!isset($_SESSION['token_aluno'])){
            header("Location:".URL_BASE."index.php?url=login");
            exit;
        }

        if(isset($_SESSION['aluno'])){
            $userId = $_SESSION['aluno'];
        }else{
            header("Location:".URL_BASE."index.php?url=login");
            exit;
        }

        $url = API_BASE.'ListarAlunoId/'.$userId;     

        $ch = curl_init($url);
        $token = $_SESSION['token_aluno'];
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Bearer '.$token
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
        
        $resultado = json_decode($response, true);
        if($resultado['id_aluno']){
            $dados['aluno'] = $resultado;
        }

            
        $this->carregarViews('menu', $dados);

    }

}