<?php
session_start();
include 'conect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Usuário cadastrado com sucesso!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Erro ao cadastrar o usuário.";
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
    header("Location: usuario.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
    <div class="content">
    
        <h2>Cadastro de Usuário</h2>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>
        <form action="cadastro_usuario.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
