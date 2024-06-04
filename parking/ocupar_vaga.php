<?php
// ocupar_vaga.php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: home.php");
    exit();
}

$vagaId = $_GET['id'];
$userId = $_SESSION['user_id'];

include 'conect.php'; // Inclui o arquivo de conexão

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Atualiza a vaga para ocupada
$sql = "UPDATE VagasEstacionamento SET vagaocupada = TRUE WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Falha na preparação: " . $conn->error);
}

$stmt->bind_param("i", $vagaId);

if (!$stmt->execute()) {
    die("Falha na execução: " . $stmt->error);
}

$stmt->close();

// Insere na tabela Ocupação
$sql = "INSERT INTO ocupacao (id_vaga, id_usuario, horario_checkin) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Falha na preparação: " . $conn->error);
}

$stmt->bind_param("ii", $vagaId, $userId);

if (!$stmt->execute()) {
    die("Falha na execução: " . $stmt->error);
}

$stmt->close();
$conn->close();

$_SESSION['message'] = 'Vaga ocupada com sucesso!';
$_SESSION['message_type'] = 'success';

header("Location: home.php");
exit();
?>
