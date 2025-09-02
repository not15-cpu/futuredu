<?php


class MessagesController extends Controller{

    public function index()
    {
        $dados = array();

        if(!isset($_SESSION['token_aluno'])){
            header("Location:".URL_BASE."index.php?url=login");
            exit;
        }

        $token = $_SESSION['token_aluno'];

        $payload = AuxiliarToken::validar($token);
        if(!$payload){
            echo 'Token inválido ou expirado. Faça login novamente';
            exit;
        }

        $userId = $payload['id'];

        if(!$userId){
            echo 'ID do aluno não encontrado';
            exit;
        }

        $url = API_BASE . 'listarNotifics/'.$userId;
        $ch = curl_init($url);
        $token = $_SESSION['token_aluno'];
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Bearer '.$token
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        if($result['dados']){
            $dados['notifics'] = $result['dados'];
        }

        $this->carregarViews('notifica', $dados);
    }

}