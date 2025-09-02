<?php
session_start();

header('Content-Type: application/json');

// Pega o corpo da requisição POST
$json = file_get_contents('php://input');

// Decodifica o JSON para um objeto PHP
$subscription = json_decode($json, true); // true para array associativo

// Verifica se a decodificação foi bem-sucedida
if ($subscription === null) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'JSON inválido.']);
    exit;
}

// Salva o array de subscription na sessão
$_SESSION['push_subscription'] = $subscription;

// Resposta de sucesso
echo json_encode(['success' => true, 'message' => 'Inscrição salva na sessão.']);
?>