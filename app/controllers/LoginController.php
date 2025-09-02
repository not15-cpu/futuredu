<?php


class LoginController extends Controller
{

    public function index()
    {
        $dados = array();

        $this->carregarViews('login', $dados);
    }

    public function login()
    {

        $url = API_BASE . 'LoginAluno';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email_aluno', FILTER_VALIDATE_EMAIL) ??  '';
            $senha = filter_input(INPUT_POST, 'senha_aluno', FILTER_SANITIZE_SPECIAL_CHARS) ??  '';

            if (isset($email) && isset($senha)) {
                $postData = http_build_query([
                    'email_aluno' => $email,
                    'senha_aluno' => $senha
                ]);

                $ch = curl_init($url);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);

                // Envia os dados como x-www-form-urlencoded
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);


                $response = curl_exec($ch);

                if (curl_errno($ch)) {
                    echo 'Erro no cURL: ' . curl_error($ch);
                } else {
                    $resultado = json_decode($response, true); // decodifica JSON da resposta
                    if (!is_array($resultado) || empty($resultado['mensagem'])) {
                        $_SESSION['erro_login'] = 'Resposta inválida da API.';
                        header("Location: " . URL_BASE . "index.php?url=login");
                        exit;
                    }

                    if ($resultado['mensagem'] === 'Tudo Certo!') {
                        $_SESSION['sucesso_login'] = 'Conectado com sucesso, redirecionando para o menu.';
                        $_SESSION['aluno'] = $resultado['id_aluno'];
                        $_SESSION['token_aluno'] = $resultado['Token'];

                        header("Location:" . URL_BASE . "index.php?url=home");
                        exit;
                    } else {
                        $_SESSION['erro_login'] = 'Erro ao conectar com o servidor.';
                        header("Location:" . URL_BASE . "index.php?url=login");
                        echo ($resultado['erro']);
                        exit;
                    }
                }

                curl_close($ch);
            } else {
                echo "Email ou senha inválidos.";
                header("Location:" . URL_BASE . "index.php?url=login");
                exit;
            }
        }
    }

    public function registro()
    {
        $dados = array();

        $this->carregarViews('cadastro', $dados);
    }

    public function register()
    {
        $url = API_BASE . 'cadastroAluno';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf = filter_input(INPUT_POST, 'cpf_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $rg = filter_input(INPUT_POST, 'rg_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $dataNasc = filter_input(INPUT_POST, 'data_nasc_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone1 = filter_input(INPUT_POST, 'telefone1_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone2 = filter_input(INPUT_POST, 'telefone2_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email_aluno', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $cep = filter_input(INPUT_POST, 'cep_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $endereco = filter_input(INPUT_POST, 'endereco_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $numero = filter_input(INPUT_POST, 'numero_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $complemento = filter_input(INPUT_POST, 'complemento_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro = filter_input(INPUT_POST, 'bairro_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade = filter_input(INPUT_POST, 'cidade_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $estado = filter_input(INPUT_POST, 'estado_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto = filter_input(INPUT_POST, 'foto_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $alt = $nome ? $nome . ' foto' : null;
            $nomeResponsavel = filter_input(INPUT_POST, 'nome_mae', FILTER_SANITIZE_SPECIAL_CHARS);
            $telResponsavel = filter_input(INPUT_POST, 'telefone_mae', FILTER_SANITIZE_SPECIAL_CHARS);
            $emailResponsavel = filter_input(INPUT_POST, 'email_mae', FILTER_VALIDATE_EMAIL);
    
            if ($email && $senha) {
                $postData = [
                    'nome_aluno' => $nome,
                    'cpf_aluno' => $cpf,
                    'rg_aluno' => $rg,
                    'data_nasc_aluno' => $dataNasc,
                    'telefone1_aluno' => $telefone1,
                    'telefone2_aluno' => $telefone2,
                    'email_aluno' => $email,
                    'senha_aluno' => $senha,
                    'cep_aluno' => $cep,
                    'endereco_aluno' => $endereco,
                    'numero_aluno' => $numero,
                    'complemento_aluno' => $complemento,
                    'bairro_aluno' => $bairro,
                    'cidade_aluno' => $cidade,
                    'estado_aluno' => $estado,
                    'foto_aluno' => $foto,
                    'alt_aluno' => $alt,
                    'nome_mae' => $nomeResponsavel,
                    'telefone_mae' => $telResponsavel,
                    'email_mae' => $emailResponsavel
                ];
    
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/x-www-form-urlencoded',
                    'Accept: application/json'
                ]);
    
                $response = curl_exec($ch);
    
                if (curl_errno($ch)) {
                    echo 'Erro no cURL: ' . curl_error($ch);
                } else {
                    $resultado = json_decode($response, true);
    
                    if (isset($resultado['mensagem']) && $resultado['mensagem'] == 'Aluno cadastrado com sucesso!') {
                        $_SESSION['userId'] = $resultado['aluno_id'];
                        header("Location:" . URL_BASE . "home");
                        exit;
                    } else {
                        echo isset($resultado['erro']) ? $resultado['erro'] : "Erro inesperado.";
                    }
                }
    
                curl_close($ch);
            } else {
                echo "Email ou senha inválidos.";
            }
        }
    }
    

    public function esqueci()
    {
        $dados = array();

        $this->carregarViews('esqueceu', $dados);
    }

    public function pedirEmail()
    {
        $email = $_POST['email_aluno'] ?? null;

        $url = API_BASE . 'recuperarSenhaAluno';

        $postData = [
            'email_aluno' => $email
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
            curl_close($ch);
            return;
        }

        curl_close($ch);

        $resultado = json_decode($response, true);

        // Verifica se conseguiu decodificar o JSON
        if ($resultado === null) {
            header("Location:".URL_BASE."index.php?url=login");
            return;
        }

        if (isset($resultado['mensagem']) && $resultado['mensagem'] === 'E-mail de redefinição enviado com sucesso!') {
            header("Location:" . URL_BASE . "login");
            exit;
        }

        if (isset($resultado['erro'])) {
            print_r($resultado['erro']);
        } else {
            echo "Resposta inesperada: ";
            print_r($resultado);
        }
    }

    public function redefinirSenha($param = null)
{
    $dados = array();
    // Se o parâmetro vier como "token=5"
    if ($param && str_contains($param, '=')) {
        [$chave, $valor] = explode('=', $param, 2);

        if ($chave === 'token') {
            $token = $valor;
        }
    } else {
        $token = $param; // se vier só o valor sem "token="
    }

    if(!empty($token)){
        $dados['token'] = $token;
        $this->carregarViews('redefinir', $dados);
    }
}

    public function redefine()
    {
        $token = $_POST['token'] ?? null;
        $novaSenha = $_POST['nova_senha'] ?? null;

        $url = API_BASE . 'redefinirSenha';

        $postData = [
            'token' => $token,
            'nova_senha' => $novaSenha
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
        curl_close($ch);
        if (curl_errno($ch)) {
            echo 'Erro no cURL: ' . curl_error($ch);
        }
        $resultado = json_decode($response, true);
        if ($resultado['mensagem'] == 'Senha atualizada com sucesso') {
            header("Location:" . URL_BASE . "index.php?url=login");
            exit;
        }else{
            header("Location:" . URL_BASE . "index.php?url=login");
            exit;
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            header("Location:" . URL_BASE . "index.php?url=login");
            session_destroy();
            exit;
        }
    }
}
