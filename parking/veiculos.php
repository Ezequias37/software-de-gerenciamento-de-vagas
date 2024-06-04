<?php
session_start();
include 'conect.php';

// Processar o formulário de cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $sql = "INSERT INTO veiculo (placa, cor, modelo, marca, id_usuario) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $placa, $cor, $modelo, $marca, $_SESSION['user_id']);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Veículo cadastrado com sucesso!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Erro ao cadastrar o veículo.";
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
    header("Location: veiculos.php");
    exit();
}
if (isset($_SESSION['user_id'])) {
    $id_usuario = $_SESSION['user_id'];
// Buscar os veículos cadastrados
$sql = "SELECT id, placa, cor, modelo, marca FROM veiculo WHERE id_usuario =  $id_usuario";
$result = $conn->query($sql);
}
$veiculos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $veiculos[] = $row;
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

</head>

<body>

  <!-- ======= Header ======= -->
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
      <h1>Seus veiculos </h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <div class="col-12">
              <div class="card recent-sales overflow-auto">



                <div class="card-body">
                  <h5 class="card-title">Meus véiculos <span></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Placa</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Cor</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($veiculos as $veiculo): ?>
                      <tr>
                        <th scope="row"><a href="#"><?php echo htmlspecialchars($veiculo['placa']); ?></a></th>
                        <td><?php echo htmlspecialchars($veiculo['marca']); ?></td>
                        <td><a href="#" class="text-primary"><?php echo htmlspecialchars($veiculo['modelo']); ?></a></td>
                        <td><?php echo htmlspecialchars($veiculo['cor']); ?></td>
                   
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
            </div>
          </div><!-- End Recent Activity -->

          <div class="content">
    
    <h2>Cadastro de Usuário</h2>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>
    <form action="veiculos.php" method="POST">
        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" required>
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required>
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required>
        <label for="modelo">Cor:</label>
        <input type="text" id="cor" name="cor" required>
        <button type="submit">Cadastrar</button>
    </form>
</div>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>