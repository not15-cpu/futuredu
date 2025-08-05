<?php



class HomeController extends Controller{

    public function index(){
        $dados = array();

        $userId = $_SESSION['userId'];

        $url = API_BASE.'api/ListarAlunoId/'.$userId;     

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
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