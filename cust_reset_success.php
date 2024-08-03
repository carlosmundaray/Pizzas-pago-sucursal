<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start(); include("conn_db.php"); include('head.php');?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet">

    <title>Restablecida exitosamente | Pizzas Roca Jed</title>
</head>

<body class="d-flex flex-column h-100">
<header class="navbar navbar-expand-md navbar-light fixed-top shadow-sm mb-auto" style="background-color: #ff8c00;">
        <div class="container-fluid mx-4">
            <a href="index.php">
                <img src="img/roca-jed.png" width="65" class="me-2" alt="Pizza World Logo">
            </a>
        </div>
    </header>
    <div class="mt-5"></div>
    <div class="container form-signin text-center reg-success mt-auto">
            <i class="mt-4 bi bi-check-circle text-success h1 display-2"></i>
            <h3 class="mt-2 mb-3 fw-normal text-bold">¡Su contraseña se ha restablecido correctamente!</h3>
            <p class="mb-3 fw-normal text-bold">Inicie sesión en su cuenta con una nueva contraseña.</p>
            <a class="btn btn-success btn-sm w-50" href="index.php">Volver al inicio</a>
    </div>

    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">Copyright © 2024 Pizzas Roca Jed Todos los derechos reservados.  </p>

  </div>
  <!-- Copyright -->
</footer>
</body>

</html>