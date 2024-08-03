<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../head.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/login.css" rel="stylesheet">

    <title>Error de la base de datos| Pizzas Roca Jed</title>
</head>

<body class="d-flex flex-column h-100">
<header class="navbar navbar-expand-md navbar-light fixed-top shadow-sm mb-auto" style="background-color: #ff8c00;">
<div class="container-fluid mx-4">
            <a href="../index.php">
            <img src="img/roca-jed.png" width="65" class="me-3" alt="Pizzas Roca Jed">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <div class="d-flex text-end"></div>
            </div>
        </div>
    </header>
    <div class="mt-5"></div>
    <div class="container form-signin text-center restricted mt-auto">
            <i class="mt-4 bi bi-hdd-network-fill text-danger h1 display-2"></i>
            <h3 class="mt-2 mb-3 fw-normal text-bold">Error de conexión</h3>
            <p class="mb-3 fw-normal text-bold text-wrap">No se puede conectar a la base de datos de Pizzas Roca Jed en este momento.</p>
            <a class="btn btn-danger btn-sm w-50" href="../index.php">Inténtalo nuevamente.</a>
    </div>

    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">Copyright © 2024 Pizzas Roca Jed. Todos los derechos reservados.   </p>

  </div>
  <!-- Copyright -->
</footer>
</body>

</html>