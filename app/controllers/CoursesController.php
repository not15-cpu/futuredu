<?php



class CoursesController extends Controller{

    public function index(){
        $dados = array();

        $aluno = $_SESSION['aluno'];

        $userId = $aluno['id_aluno'];

        $url = API_BASE."ListarCursosMatriculados/".$userId;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);
        
        $resultado = json_decode($response, true);
        $dados['matriculas'] = $resultado;

        $this->carregarViews('cursos', $dados);
    }

    public function notas(){
        $dados = array();

        $this->carregarViews('notas', $dados);
    }

    public function nota($link){
        $dados = array();

        if(isset($link)){
            if($link == $this->gerarLinkCurso($link)){
                $dados['curso'] = 'Desenvolvimento Web';
                $this->carregarViews('nota-curso', $dados);
            }else{
                $this->carregarViews('notas');
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