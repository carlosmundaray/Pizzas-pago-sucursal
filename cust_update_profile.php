<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_start();
        include("conn_db.php");

        if(!isset($_SESSION["cid"])){
            header("location: restricted.php");
            exit(1);
        }
        if(isset($_POST["upd_confirm"])){
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $gender = $_POST["gender"];
            $type = $_POST["type"];

            $query = "UPDATE customer SET c_firstname = '{$firstname}', c_lastname = '{$lastname}', c_email = '{$email}', c_gender = '{$gender}', c_type = '{$type}' WHERE c_id = {$_SESSION['cid']}";
            $result = $mysqli -> query($query);
            if($result){
                $_SESSION["firstname"] = $firstname;
                $_SESSION["lastname"] = $lastname;
                header("location: cust_profile.php?up_prf=1");
            }else{
                header("location: cust_profile.php?up_prf=0");
            }
            exit(1);
        }
        include('head.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <title>Actualizar Perfil | Pizzas Roca Jed</title>
</head>

<body class="d-flex flex-column h-100">
    <?php include('nav_header.php')?>

    <div class="container form-signin mt-auto w-50">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Volver
        </a>
        <?php
            //Select customer record from database
            $query = "SELECT c_firstname,c_lastname,c_email,c_gender,c_type FROM customer WHERE c_id = {$_SESSION['cid']} LIMIT 0,1";
            $result = $mysqli ->query($query);
            $row = $result -> fetch_array();
        ?>
        <form method="POST" action="cust_update_profile.php" class="form-floating">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-pencil-square me-2"></i>Actualizar Perfil</h2>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname"
                value="<?php echo $row["c_firstname"];?>" required>
                <label for="firstname">Nombre de pila</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="lastname" placeholder="Last Name" value="<?php echo $row["c_lastname"];?>" name="lastname" required>
                <label for="lastname">Apellido </label>
            </div>
            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="<?php echo $row["c_email"];?>" required>
                <label for="email">E-mail</label>
            </div>
            <div class="form-floating">
                <select class="form-select mb-2" id="gender" name="gender">
                    <option value="M" <?php if($row["c_gender"]=="M"){echo "selected";}?>>Masculino</option>
                    <option value="F" <?php if($row["c_gender"]=="F"){echo "selected";}?>>Femenino</option>
                    <option value="N" <?php if($row["c_gender"]=="N"){echo "selected";}?>>No-binario</option>
                </select>
                <label for="gender">Tu género</label>
            </div>
            <div class="form-floating">
                <select class="form-select mb-2" id="type" name="type">
                    <option value="STD" <?php if($row["c_type"]=="STD"){echo "selected";}?>>Estudiante</option>
                    <option value="INS" <?php if($row["c_type"]=="INS"){echo "selected";}?>>Profesor</option>
                    <option value="TAS" <?php if($row["c_type"]=="TAS"){echo "selected";}?>>Cliente</option>
                    <option value="STF" <?php if($row["c_type"]=="STF"){echo "selected";}?>>Personal</option>
                    <option value="GUE" <?php if($row["c_type"]=="GUE"){echo "selected";}?>>Visitante</option>
                    <option value="OTH" <?php if($row["c_type"]=="OTH"){echo "selected";}?>>Otros</option>
                </select>
                <label for="gender">Tu rol</label>
            </div>
            <button class="w-100 btn btn-success mb-3" name="upd_confirm" type="submit">Actualizar Perfil</button>
        </form>
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