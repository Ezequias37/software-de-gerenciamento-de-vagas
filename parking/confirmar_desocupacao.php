<?php
// confirmar_desocupacao.php

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
    die("Falha na conexão: " . mysqli_connect_error());
}

// Atualiza a ocupação com o horário de checkout
$sql = "UPDATE ocupacao SET horario_checkout = NOW() WHERE id_usuario = ? AND id_usuario = ? AND horario_checkout IS NULL";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Falha na preparação: " . $conn->error);
}
$stmt->bind_param("ii", $ocupacaoId, $userId);
if (!$stmt->execute()) {
    die("Falha na execução: " . $stmt->error);
}
$stmt->close();

// Atualiza a vaga como desocupada
$sql = "UPDATE VagasEstacionamento SET vagaocupada = 0 WHERE id = (SELECT id_vaga FROM ocupacao WHERE id_usuario = ? AND id_vaga = ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Falha na preparação: " . $conn->error);
}
$stmt->bind_param("ii", $ocupacaoId, $oc);
if (!$stmt->execute()) {
    die("Falha na execução: " . $stmt->error);
}
$stmt->close();

$conn->close();

header("Location: minhas_ocupacoes.php");
exit();
?>
