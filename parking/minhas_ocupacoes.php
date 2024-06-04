<?php
// minhas_ocupacoes.php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$userId = $_SESSION['user_id'];

include 'conect.php'; // Inclui o arquivo de conexão

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Seleciona ocupações ativas
$sql = "SELECT o.id_usuario, o.id_vaga, o.horario_checkin, VagasEstacionamento.vagaocupada 
        FROM ocupacao o 
        JOIN VagasEstacionamento  ON o.id_vaga = VagasEstacionamento.id 
        WHERE o.id_usuario = ? AND o.horario_checkout IS NULL";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Falha na preparação: " . $conn->error);
}
$stmt->bind_param("i", $userId);
if (!$stmt->execute()) {
    die("Falha na execução: " . $stmt->error);
}
$result = $stmt->get_result();
$ocupacoes_ativas = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Seleciona histórico de ocupações
$sql = "SELECT o.id_usuario, o.id_vaga, o.horario_checkin, o.horario_checkout 
        FROM ocupacao o 
        WHERE o.id_usuario = ? AND o.horario_checkout IS NOT NULL";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Falha na preparação: " . $conn->error);
}
$stmt->bind_param("i", $userId);
if (!$stmt->execute()) {
    die("Falha na execução: " . $stmt->error);
}
$result = $stmt->get_result();
$historico_ocupacoes = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Minhas Ocupações</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .vaga-ativa, .vaga-historico {
        background-color: #f8f9fa;
        padding: 15px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .vaga-ativa {
        cursor: pointer;
    }
  </style>

  
</head>
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="home.php" class="logo d-flex align-items-center">
    <span class="d-none d-lg-block">Estacione bem</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

        <span class="d-none d-md-block">Bem-vindo, <?php echo $_SESSION['user_name']; ?>!</span>
      </a><!-- End Profile Iamge Icon -->


  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->
<body>
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">



  <li class="nav-item">
    <a class="nav-link collapsed" href="veiculos.php">
      <i class="bi bi-question-circle"></i>
      <span>Veiculos</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="minhas_ocupacoes.php">
      <i class="bi bi-envelope"></i>
      <span>Minhas reservas</span>
    </a>
  </li><!-- End Contact Page Nav -->

</ul>

</aside><!-- End Sidebar-->


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Minhas Ocupações</h1>
    </div>

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ocupações Ativas</h5>

              <?php if (count($ocupacoes_ativas) > 0): ?>
                <?php foreach ($ocupacoes_ativas as $ocupacao): ?>
                  <div class="vaga-ativa" onclick="desocuparVaga(<?php echo htmlspecialchars($ocupacao['id_vaga']); ?>)">
                    <strong>Vaga ID:</strong> <?php echo htmlspecialchars($ocupacao['id_vaga']); ?><br>
                    <strong>Check-in:</strong> <?php echo htmlspecialchars($ocupacao['horario_checkin']); ?><br>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p>Não há ocupações ativas.</p>
              <?php endif; ?>

              <h5 class="card-title mt-4">Histórico de Ocupações</h5>

              <?php if (count($historico_ocupacoes) > 0): ?>
                <?php foreach ($historico_ocupacoes as $ocupacao): ?>
                  <div class="vaga-historico">
                    <strong>Vaga ID:</strong> <?php echo htmlspecialchars($ocupacao['id_vaga']); ?><br>
                    <strong>Check-in:</strong> <?php echo htmlspecialchars($ocupacao['horario_checkin']); ?><br>
                    <strong>Check-out:</strong> <?php echo htmlspecialchars($ocupacao['horario_checkout']); ?><br>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p>Não há histórico de ocupações.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    function desocuparVaga(ocupacaoId) {
        console.log(`Tentando desocupar vaga com ID: ${ocupacaoId}`);
        fetch(`desocupar_vaga.php?id=${ocupacaoId}`)
            .then(response => {
                console.log('Resposta recebida:', response);
                return response.json();
            })
            .then(data => {
                console.log('Dados recebidos:', data);
                if (data.success) {
                    console.log('Desocupação bem-sucedida');
                    const preco = data.preco;
                    const mensagem = `O preço pela ocupação é de R$${preco.toFixed(2)}. Deseja desocupar a vaga?`;
                    if (confirm(mensagem)) {
                        window.location.href = `confirmar_desocupacao.php?id=${ocupacaoId}`;
                    }
                } else {
                    alert('Erro ao desocupar a vaga.');
                }
            })
            .catch(error => {
                console.error('Erro na requisição:', error);
                alert('Erro ao tentar desocupar a vaga.');
            });
    }
  </script>
</body>
</html>
