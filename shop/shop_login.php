<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start(); include("../conn_db.php"); include('../head.php');?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/login.css" rel="stylesheet">

    <title>INICIAR SESIÓN EN LA SUCURSAL | Pizzas Roca Jed</title>
</head>

<body class="d-flex flex-column h-100">
<header class="navbar navbar-expand-md navbar-light fixed-top shadow-sm mb-auto" style="background-color: #ff8c00;">
        <div class="container-fluid mx-4">
            <a href="index.php">
                <img src="../img/roca-jed.png" width="65" class="me-2" alt="EATERIO Logo">
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

    <div class="container form-signin">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Volver
        </a>
        <form method="POST" action="check_shop_login.php" class="form-floating">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-door-open me-2"></i>Iniciar sesión en Sucursal</h2>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                <label for="floatingInput">Nombre de la Sucursal</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <button class="w-100 btn btn-success mb-3" type="submit">Iniciar Sesión </button>
        </form>
    </div>

    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">Copyright © 2024 Pizzas Roca Jed. Todos los derechos reservados.  </p>

  </div>
  <!-- Copyright -->
</footer>
</body>

</html>