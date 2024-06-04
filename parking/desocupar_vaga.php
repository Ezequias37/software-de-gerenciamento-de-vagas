<?php
// desocupar_vaga.php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: minhas_ocupacoes.php");
    exit();
}

$ocupacaoId = $_GET['id'];
$userId = $_SESSION['user_id'];

include 'conect.php';

if (!$conn) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Falha na conexão com o banco de dados']);
    exit();
}

// Seleciona a ocupação
$sql = "SELECT id_vaga, horario_checkin FROM ocupacao WHERE id_vaga = ? AND id_usuario = ? AND horario_checkout IS NULL";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Erro na preparação da consulta SQL: ' . $conn->error]);
    exit();
}
$stmt->bind_param("ii", $ocupacaoId, $userId);
if (!$stmt->execute()) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Erro ao executar a consulta SQL: ' . $stmt->error]);
    exit();
}
$result = $stmt->get_result();
$ocupacao = $result->fetch_assoc();
$stmt->close();

if (!$ocupacao) {
    header('Content-Type: application/json');
    http_response_code(404);
    echo json_encode(['success' => false, 'error' => 'Ocupação não encontrada']);
    exit();
}

// Calcula o preço
$checkinTime = new DateTime($ocupacao['horario_checkin']);
$currentTime = new DateTime();
$interval = $checkinTime->diff($currentTime);
$minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
$price = $minutes * 1.00 - 300;

// Atualiza o horário de checkout na tabela ocupacao
$sqlUpdateOcupacao = "UPDATE ocupacao SET horario_checkout = NOW() WHERE id_vaga = ? AND id_usuario = ? AND horario_checkout IS NULL";
$stmtUpdateOcupacao = $conn->prepare($sqlUpdateOcupacao);
if (!$stmtUpdateOcupacao) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Erro na preparação da consulta SQL para atualizar a ocupação: ' . $conn->error]);
    exit();
}
$stmtUpdateOcupacao->bind_param("ii", $ocupacaoId, $userId);
if (!$stmtUpdateOcupacao->execute()) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Erro ao executar a consulta SQL para atualizar a ocupação: ' . $stmtUpdateOcupacao->error]);
    exit();
}
$stmtUpdateOcupacao->close();

// Atualiza a vaga para livre na tabela VagasEstacionamento
$sqlUpdateVaga = "UPDATE VagasEstacionamento SET vagaocupada = 0 WHERE id = ?";
$stmtUpdateVaga = $conn->prepare($sqlUpdateVaga);
if (!$stmtUpdateVaga) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Erro na preparação da consulta SQL para atualizar a vaga: ' . $conn->error]);
    exit();
}
$stmtUpdateVaga->bind_param("i", $ocupacaoId);
if (!$stmtUpdateVaga->execute()) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Erro ao executar a consulta SQL para atualizar a vaga: ' . $stmtUpdateVaga->error]);
    exit();
}
$stmtUpdateVaga->close();

echo json_encode(['success' => true, 'preco' => $price]);
?>
