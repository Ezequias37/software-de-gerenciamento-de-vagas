<?php
// home.php

session_start();
include 'conect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$sql = "SELECT id, vagaocupada FROM VagasEstacionamento";
$result = $conn->query($sql);

$vagas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vagas[] = $row;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reserva de Vagas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    .vaga-livre {
        background-color: green;
        color: white;
        padding: 10px;
        margin: 10px;
        cursor: pointer;
    }
    .vaga-ocupada {
        background-color: red;
        color: white;
        padding: 10px;
        margin: 10px;
        cursor: pointer;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Estacione Bem</span>
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
          </a><!-- End Profile Image Icon -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
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
      <h1>Seus dados</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">


              </div>
            </div>

 
                  <h5 class="card-title">Vagas</h5>
                  <?php foreach ($vagas as $vaga): ?>
                    <div class="vaga <?php echo $vaga['vagaocupada'] ? 'vaga-ocupada' : 'vaga-livre'; ?>" onclick="ocuparVaga(<?php echo htmlspecialchars($vaga['id']); ?>)">
                      <div class="card-body">
                        <h5 class="card-title">Vaga</h5>
                        <div class="">
                          <div class="align-items-left justify-content-center"></div>
                          <div class="ps-3">
                            <span class="text-muted small pt-2 ps-1"><?php echo htmlspecialchars($vaga['id']); ?></span>
                            <span class="text-muted small pt-2 ps-1"><?php echo htmlspecialchars($vaga['vagaocupada'] ? 'Ocupada' : 'Livre'); ?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br/>
                  <?php endforeach; ?>
                </div>
              </div>
      

            <!-- Exibir mensagens -->
            <?php if (isset($_SESSION['message'])): ?>
                <p class="<?php echo $_SESSION['message_type']; ?>"><?php echo $_SESSION['message']; ?></p>
                <?php unset($_SESSION['message']); ?>
                <?php unset($_SESSION['message_type']); ?>
            <?php endif; ?>

          </div>
        </div><!-- End Recent Activity -->

      </div>
    </section>

  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script>
    function ocuparVaga(vagaId) {
        if (confirm('Você deseja ocupar esta vaga?')) {
            window.location.href = `ocupar_vaga.php?id=${vagaId}`;
        }
    }
  </script>
</body>
</html>