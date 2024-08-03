<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start(); include("../conn_db.php"); include('../head.php');?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../css/login.css" rel="stylesheet">
    <link href="../img/roca-jed.png" rel="icon">
    <title>Iniciar sesion</title>
</head>

<body class="d-flex flex-column h-100">
<header class="navbar navbar-expand-md navbar-light fixed-top shadow-sm mb-auto" style="background-color: #ff8c00;">
<div class="container-fluid mx-4">
            <a href="../index.php">
                <img src="../img/roca-jed.png" width="65" class="me-2" alt="EATERIO Logo">
            </a>
        </div>
    </header>

    <div class="container form-signin mt-auto">
        <form method="POST" action="check_admin_login.php" class="form-floating">
            <h2 class="mt-5 mb-3 fw-normal text-bold"><i class="bi bi-door-open me-2"></i> Iniciar Sesión como Admin</h2>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
                <label for="floatingInput">Nombre de usuario</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd" required>
                <label for="floatingPassword">Contraseña</label>
            </div>
            <button class="w-100 btn btn-success mb-3" type="submit">Iniciar Sesion</button>
        </form>
    </div>

    <footer
        class="footer d-flex flex-wrap justify-content-between align-items-center px-5 py-3 mt-auto bg-secondary text-light">
        <span class="smaller-font">&copy; 2024 Pizzas Roca Jed<br /><span class="xsmall-font">Todos los derechos reservados.</span></span>
        <ul class="nav justify-content-end list-unstyled d-flex">
    <li class="ms-3 d-flex align-items-center">
        <a class="text-light d-flex align-items-center" target="_blank" href="https://www.facebook.com/profile.php?id=877826532319875&_rdr" style="text-decoration: none; color: #f8f9fa;">
            <i class="bi bi-facebook" style="font-size: 2rem; margin-right: 0.5rem;"></i>
            Síguenos en nuestra página de Facebook
        </a>
    </li>
</ul>

</body>

</html>