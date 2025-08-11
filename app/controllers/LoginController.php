<?php


class LoginController extends Controller{

    public function index(){
        $dados = array();

        $this->carregarViews('login', $dados);
    }

    public function login(){
        $url = API_BASE . 'LoginAluno';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email_aluno', FILTER_VALIDATE_EMAIL) ??  '';
            $senha = filter_input(INPUT_POST, 'senha_aluno', FILTER_SANITIZE_SPECIAL_CHARS) ??  '';
    
            if (isset($email) && isset($senha)) {
                $postData = [
                    'email_aluno' => $email,
                    'senha_aluno' => $senha
                ];
    
                $ch = curl_init($url);
    
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
    
                // Envia os dados como x-www-form-urlencoded
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/x-www-form-urlencoded',
                    'Accept: application/json'
                ]);
    
                $response = curl_exec($ch);
    
                if (curl_errno($ch)) {
                    echo 'Erro no cURL: ' . curl_error($ch);
                } else {
                    $resultado = json_decode($response, true); // decodifica JSON da resposta
                    if ($resultado['mensagem'] == 'Tudo Certo!') {
                        $_SESSION['userId'] = $resultado['Aluno']['id_aluno'];
                        header("Location:".URL_BASE."home");
                        exit;
                    } else {
                        print_r($resultado['erro']);
                    }
                }
    
                curl_close($ch);
            } else {
                echo "Email ou senha inválidos.";
            }
        }
    }
    
    public function registro()
    {
        $url = API_BASE . 'CadastroAluno';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email_aluno', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
    
            if (isset($email) && isset($senha)) {
                $postData = [
                    'email_aluno' => $email,
                    'senha_aluno' => $senha
                ];
    
                $ch = curl_init($url);
    
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
    
                // Envia os dados como x-www-form-urlencoded
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/x-www-form-urlencoded',
                    'Accept: application/json'
                ]);
    
                $response = curl_exec($ch);
    
                if (curl_errno($ch)) {
                    echo 'Erro no cURL: ' . curl_error($ch);
                } else {
                    $resultado = json_decode($response, true); // decodifica JSON da resposta
                    if ($resultado['mensagem'] == 'Tudo Certo!') {
                        $_SESSION['userId'] = $resultado['Aluno']['id_aluno'];
                        header("Location:".URL_BASE."home");
                        exit;
                    } else {
                        print_r($resultado['erro']);
                    }
                }
    
                curl_close($ch);
            } else {
                echo "Email ou senha inválidos.";
            }
        }
    }

    public function logout(){
        if(session_status() === PHP_SESSION_ACTIVE){
            session_destroy();
            header("Location:" .URL_BASE);
            exit;
        }
    }

}