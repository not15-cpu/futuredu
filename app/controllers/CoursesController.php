<?php



class CoursesController extends Controller
{

    public function index()
    {

        if (isset($_SESSION['token_aluno'])) {
            $token = $_SESSION['token_aluno'];
        }

        $dados = array();

        $token = $_SESSION['token_aluno'];

        $payload = AuxiliarToken::validar($token);
        if(!$payload){
            echo 'Token inválido ou expirado. Faça login novamente';
            header("Location:".URL_BASE);
            exit;
        }

        $userId = $payload['id'];

        $url = API_BASE . 'ListarCursosMatriculados/' . $userId;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $resultado = json_decode($response, true);
        $dados['matriculas'] = $resultado;

        $this->carregarViews('cursos', $dados);
    }

    public function notas()
    {
        $dados = array();

        if (!isset($_SESSION['token_aluno'])) {
            header("Location:" . URL_BASE . "login");
            exit;
        }

        $token = $_SESSION['token_aluno'];

        $payload = AuxiliarToken::validar($token);
        if (!$payload) {
            echo 'Token inválido ou expirado. Faça login novamente';
            exit;
        }

        $userId = $payload['id'];

        if (!$userId) {
            echo 'ID do aluno não encontrado';
            exit;
        }

        $url = API_BASE . 'listarMedia/' . $userId;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        $resultado = json_decode($response, true);
        
        if ($resultado && isset($resultado['dados'])) {
            $dados['medias'] = $resultado['dados']; // lista de arrays
        }
            
        $this->carregarViews('notas', $dados);
    }

    public function nota($link)
    {
        $dados = array();

        $url = API_BASE.'ListarCursos';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $resultado = json_decode($response, true);
        // echo '<pre>';
        // print_r($resultado);
        // echo '</pre>';
        // exit;
        foreach($resultado['dados'] as $curso){
            if ($this->gerarLinkCurso($curso['nome_curso']) === $link) {
                if ($link == $this->gerarLinkCurso($link)) {
                    $dados['curso'] = $curso;
                    $this->carregarViews('nota-curso', $dados);
                } else {
                    $this->carregarViews('notas');
                }
            }
        }
    }
    function gerarLinkCurso($link)
    {

        $link = mb_strtolower($link, 'UTF-8');
        $caracter = [


            'á' => 'a',
            'à' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'ä' => 'a',
            'é' => 'e',
            'è' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'í' => 'i',
            'ì' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ó' => 'o',
            'ò' => 'o',
            'õ' => 'o',
            'ô' => 'o',
            'ö' => 'o',
            'ú' => 'u',
            'ù' => 'u',
            'û' => 'u',
            'ü' => 'u',
            'ç' => 'c',
            ' ' => '-',
            '!' => '',
            '"' => '',
            '#' => '',
            '$' => '',
            '%' => '',
            '&' => '',
            "'" => '',
            '(' => '',
            ')' => '',
            '*' => '',
            '+' => '',
            ',' => '',
            '.' => '',
            '/' => '',
            ':' => '',
            ';' => '',
            '<' => '',
            '=' => '',
            '>' => '',
            '?' => '',
            '@' => '',
            '[' => '',
            ']' => '',
            '^' => '',
            '`' => '',
            '{' => '',
            '|' => '',
            '}' => '',
            '~' => '',
            '\\' => '',
            '–' => '-',
            '—' => '-',
            '“' => '',
            '”' => '',
            '´' => '',
        ];

        $link = strtr($link, $caracter);

        return $link;
    }
}
