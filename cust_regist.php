<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start(); include("conn_db.php"); include('head.php');?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet">

    <title>Registro de cliente | Pizzas Roca Jed</title>
</head>

<body class="d-flex flex-column">
<header class="navbar navbar-expand-md navbar-light fixed-top shadow-sm mb-auto" style="background-color: #ff8c00;">
<div class="container-fluid mx-4">
            <a href="index.php">
            <img src="img/roca-jed.png" width="65" class="me-2" alt="Pizza World Logo">
            </a>
        </div>
    </header>
    <div class="container mt-4"></div>
    <div class="container form-signin mt-auto">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Volver
        </a>
        <form method="POST" action="add_cust.php" class="form-floating">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-person-plus me-2"></i>Registrarse</h2>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username"
                    minlength="5" maxlength="45" required>
                <label for="username">Username</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" minlength="8"
                    maxlength="45" required>
                <label for="pwd">Password</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="cfpwd" placeholder="Confirm Password" minlength="8"
                    maxlength="45" name="cfpwd" required>
                <label for="cfpwd">Confirmar Contraseña</label>
                <div id="passwordHelpBlock" class="form-text smaller-font">
                Su contraseña debe tener al menos 8 caracteres.
                </div>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname"
                    required>
                <label for="firstname">Nombre de Pila</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" required>
                <label for="lastname">Apellido</label>
            </div>
            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
                <label for="email">E-mail</label>
            </div>
            <div class="form-floating">
                <select class="form-select mb-2" id="gender" name="gender">
                    <option selected value="-">---</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="N">No-binario</option>
                </select>
                <label for="gender">Tu Género</label>
            </div>
            <div class="form-floating">
                <select class="form-select mb-2" id="type" name="type">
                    <option selected value="-">---</option>
                    <option value="STD">Menos de 15 Años</option>
                    <option value="INS">16 Años - 20 Años</option>
                    <option value="TAS">21 Años - 30 Años</option>
                    <option value="STF">31 Años - 40 Años</option>
                    <option value="GUE">41 Años - 50 Años</option>
                    <option value="OTH">Arriba de 10 Años</option>
                </select>
                <label for="gender">Tu Edad</label>
            </div>
            <div class="form-floating">
                <div class="mb-2 form-check">
                    <input type="checkbox" class="form-check-input " id="tandc" name="tandc" required>
                    <label class="form-check-label small" for="tandc">Acepto los términos y condiciones y la
                    política de privacidad.</label>
                </div>
            </div>
            <button class="w-100 btn btn-success mb-3" type="submit" style="background-color: #ff8c00; border-color: #ff8c00;">
 Registrarme
</button>
        </form>
    </div>
    <div class="container mt-4"></div>
    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">Copyright © 2024 Pizzas Roca Jed. Todos los derechos reservados.  </p>

  </div>
  <!-- Copyright -->
</footer>
</body>

</html>