<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start(); include("conn_db.php"); include('head.php');?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/login.css" rel="stylesheet">

    <title>Iniciar sesión | Pizzas Roca Jed</title>
</head>

<body class="d-flex flex-column h-100">
<header class="navbar navbar-expand-md navbar-light fixed-top shadow-sm mb-auto" style="background-color: #ff8c00;">
<div class="container-fluid mx-4">
            <a href="index.php">
                <img src="img/roca-jed.png" width="65" class="me-2" alt="Pizza World Logo">
            </a>
        </div>
    </header>

    <div class="container form-signin mt-auto">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Volver
        </a>
        <form method="POST" action="check_login.php" class="form-floating">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-door-open me-2"></i>Iniciar Sesión</h2>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-success mb-3" type="submit" style="background-color: #ff8c00; border-color: #ff8c00;">
    Iniciar Sesión 
</button>
            <a class="nav nav-item text-decoration-none text-muted mb-2 small" href="shop/shop_login.php">
                <i class="bi bi-shop me-2"></i>Inicie sesión en su cuenta de la sucursal
            </a>
            <a class="nav nav-item text-decoration-none text-muted mb-2 small" href="cust_forgot_pwd.php">
                <i class="bi bi-key me-2"></i>¿Olvidaste tu contraseña?
            </a>
            <a class="nav nav-item text-decoration-none text-muted mb-2 small" href="cust_regist.php">
                <i class="bi bi-person-plus me-2"></i>Crea tu nueva cuenta.
            </a>
        </form>
    </div>

    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">Copyright © 2024 Pizzas Roca Jed Todos los derechos reservados. </p>

  </div>
  <!-- Copyright -->
</footer>
</body>

</html>