<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_start();
        include("../conn_db.php");
        include('../head.php');
        if($_SESSION["utype"]!="shopowner"){
            header("location: ../restricted.php");
            exit(1);
        }
        $s_id = $_SESSION["sid"];
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/menu.css" rel="stylesheet">
    <title>Detalles del menu| Pizzas Roca Jed</title>
</head>

<body class="d-flex flex-column h-100">
    <?php include('nav_header_shop.php')?>

    <?php
        $f_id = $_GET["f_id"];
        $query = "SELECT f.f_name,f.f_price,f.f_todayavail,f.f_preorderavail,f.f_pic FROM food f WHERE f.f_id = $f_id LIMIT 0,1;";
        $result = $mysqli -> query($query);
        $food_row = $result -> fetch_array();
    ?>

    <div class="container px-5 py-4" id="shop-body">
        <a class="nav nav-item text-decoration-none text-muted mb-2" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Volver
        </a>
        <?php
            if(isset($_GET["up_fdt"])){
                if($_GET["up_fdt"]==1){
                    ?>
            <!-- START SUCCESSFULLY UPDATE DETAIL -->
            <div class="row row-cols-1 notibar">
                <div class="col mt-2 ms-2 p-2 bg-success text-white rounded text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-check-circle ms-2" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                    <span class="ms-2 mt-2">Detalle del menú actualizado con éxito.</span>
                </div>
            </div>
            <!-- END SUCCESSFULLY UPDATE DETAIL -->
            <?php }else{ ?>
            <!-- START FAILED UPDATE DETAIL -->
            <div class="row row-cols-1 notibar">
                <div class="col mt-2 ms-2 p-2 bg-danger text-white rounded text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x-circle ms-2" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg><span class="ms-2 mt-2">No se pudo actualizar los detalles del menú.</span>
                </div>
            </div>
            <!-- END FAILED UPDATE DETAIL -->
            <?php }
                }
            ?>
        <div class="container row row-cols-6 row-cols-md-12 g-5 pt-4 mb-4" id="shop-header">
            <div class="rounded-25 col-6" id="shop-img" style="
                    background: url(
                        <?php
                            if(is_null($food_row["f_pic"])){echo "'../img/roca-jed.png'";}
                            else{echo "'../img/{$food_row['f_pic']}'";}
                        ?>
                    ) center; height: 225px;
                    background-size: cover; background-repeat: no-repeat;
                    background-position: center;">
            </div>
            <div class="col-6">
                <h1 class="display-5 strong"><?php echo $food_row["f_name"];?></h1>
                <h3 class="fw-light"><?php echo $food_row["f_price"]?> $.</h3>
                <ul class="list-unstyled">
                    <li class="my-2">
                        <?php
                            if($food_row["f_todayavail"]==1){
                        ?>
                        <span class="badge rounded-pill bg-success">Disponible</span>
                        <?php }else{ ?>
                        <span class="badge rounded-pill bg-danger">Fuera de servicio</span>
                        <?php }
                            if($food_row["f_preorderavail"]==1){
                        ?>
                        <span class="badge rounded-pill bg-success">Pre-orden Disponible</span>
                        <?php }else{ ?>
                        <span class="badge rounded-pill bg-danger">Pre-orden Fuera de servicio</span>
                        <?php } ?>
                    </li>
                </ul>
        <a class="btn btn-sm btn-primary mt-2 mt-md-0" href="shop_menu_edit.php?f_id=<?php echo $f_id?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path
                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd"
                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>
            Actualizar este menú
        </a>
        <a class="btn btn-sm btn-danger mt-2 mt-md-0" href="shop_menu_delete.php?f_id=<?php echo $f_id?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
                viewBox="0 0 16 16">
                <path
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd"
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
            Eliminar este menú        </a>
            </div>
        </div>

        <div class="container">
            <h3 class="border-top pt-3 pb-2 mt-2">Rendimiento de todos los tiempos</h3>
            <div class="row row-cols-2 row-cols-md-4 mb-3 g-2">
                <div class="col">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php
                                    $count_query = "SELECT COUNT(DISTINCT orh.c_id) AS cnt FROM order_header orh INNER JOIN order_detail ord ON orh.orh_id = ord.orh_id
                                    WHERE ord.f_id = {$f_id};";
                                    $count_result = $mysqli -> query($count_query) -> fetch_array();
                                    echo $count_result["cnt"];
                                ?> Gente
                            </h5>
                            <p class="card-text small">Los clientes ordenaron este menú.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <h5 class="card-title"><?php
                                    $count_query = "SELECT COUNT(*) AS cnt FROM order_detail ord WHERE ord.f_id = {$f_id};";
                                    $count_result = $mysqli -> query($count_query) -> fetch_array();
                                    echo $count_result["cnt"];
                                ?> Pedidos</h5>
                            <p class="card-text small">El pedido incluye este menú</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <h5 class="card-title"><?php
                                    $count_query = "SELECT SUM(ord.ord_buyprice*ord.ord_amount) AS prf FROM order_detail ord WHERE ord.f_id = {$f_id};";
                                    $count_result = $mysqli -> query($count_query) -> fetch_array();
                                    if(is_null($count_result["prf"])){echo "0.00";}else{echo $count_result["prf"];}
                                ?> $.</h5>
                            <p class="card-text small"> Obtenido de este menú</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <h5 class="card-title"><?php
                                    $rank_query = "SELECT f.f_id,RANK() OVER (ORDER BY SUM(ord.ord_buyprice*ord.ord_amount) DESC) AS rnk FROM food f
                                    INNER JOIN order_detail ord ON f.f_id = ord.f_id WHERE f.s_id = {$s_id} GROUP BY f.f_id;";
                                    $rank_result = $mysqli -> query($rank_query);
                                    $exists = 0;
                                    while ($row_rank = $rank_result -> fetch_array()){
                                        if($row_rank["f_id"]==$_GET["f_id"]){
                                            echo "#".$row_rank["rnk"];
                                            $exists = 1;
                                            break;
                                        }
                                    }if($exists==0){echo "-";}
                                ?></h5>
                            <p class="card-text small">Ranking del menú en la Sucursal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
        <h3 class="border-top pt-3 mt-2">Pedidos</h3>
            <form class="form-floating mb-3" method="GET" action="shop_menu_detail.php">
                <input type="hidden" name="f_id" value="<?php echo $f_id;?>">
                <div class="row g-2">
                    <div class="col">
                        <select class="form-select" id="c_id" name="c_id">
                            <option selected value="">Nombre del cliente</option>
                            <?php
                                $option_query = "SELECT DISTINCT c.c_id, c.c_firstname,c.c_lastname
                                FROM order_header orh INNER JOIN order_detail ord ON orh.orh_id = ord.orh_id
                                INNER JOIN customer c ON orh.c_id = c.c_id WHERE ord.f_id = {$f_id};";
                                $option_result = $mysqli -> query($option_query);
                                $opt_row = $option_result -> num_rows;
                                if($option_result -> num_rows != 0){
                                    while($option_arr = $option_result -> fetch_array()){
                            ?>
                            <option value="<?php echo $option_arr["c_id"]?>"><?php echo $option_arr["c_firstname"]." ".$option_arr["c_lastname"]?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select" id="utype" name="ut">
                            <?php if(isset($_GET["search"])){?>
                            <option selected value="">Tipo de cliente</option>
                            <option value="STD" <?php if($_GET["ut"]=="STD"){ echo "selected";}?>>Estudiante</option>
                            <option value="INS" <?php if($_GET["ut"]=="INS"){ echo "selected";}?>>Profesor</option>
                            <option value="TAS" <?php if($_GET["ut"]=="TAS"){ echo "selected";}?>>Cliente</option>
                            <option value="STF" <?php if($_GET["ut"]=="STF"){ echo "selected";}?>>Personal</option>
                            <option value="GUE" <?php if($_GET["ut"]=="GUE"){ echo "selected";}?>>Visitante</option>
                            <option value="ADM" <?php if($_GET["ut"]=="ADM"){ echo "selected";}?>>Admin</option>
                            <option value="OTH" <?php if($_GET["ut"]=="OTH"){ echo "selected";}?>>Otros</option>
                            <?php }else{ ?>
                            <option selected value="">Tipo de cliente</option>
                            <option value="STD">Estudiante</option>
                            <option value="INS">Profesor</option>
                            <option value="TAS">Cliente</option>
                            <option value="STF">Personal</option>
                            <option value="GUE">Visitante</option>
                            <option value="ADM">Admin</option>
                            <option value="OTH">Otros</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select" id="orderstatus" name="os">
                            <?php if(isset($_GET["search"])){?>
                            <option selected value="">Estado del pedido</option>
                            <option value="ACPT" <?php if($_GET["os"]=="ACPT"){ echo "selected";}?>>Orden Aceptada</option>
                            <option value="PREP" <?php if($_GET["os"]=="PREP"){ echo "selected";}?>>Preparando pedido</option>
                            <option value="RDPK" <?php if($_GET["os"]=="RDPK"){ echo "selected";}?>>Listo para recojer</option>
                            <option value="FNSH" <?php if($_GET["os"]=="FNSH"){ echo "selected";}?>>Orden Finalizada</option>
                            <?php }else{ ?>
                            <option selected value="">Estado del pedido</option>
                            <option value="ACPT">Orden Aceptada</option>
                            <option value="PREP">Preparando pedido</option>
                            <option value="RDPK">Listo para recojer</option>
                            <option value="FNSH">Orden Finalizada</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" name="search" value="1" class="btn btn-success"
                        <?php if($opt_row==0){echo "disabled";} ?>>Buscar</button>
                        <button type="reset" class="btn btn-danger"
                            onclick="javascript: window.location='shop_menu_detail.php?f_id=<?php echo $f_id?>'">Limpiar</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
            $result -> free_result();
            if(isset($_GET["search"])){
                if($_GET["c_id"]!=''){ $cid_clause = " AND orh.c_id = '{$_GET['c_id']}';"; }else{ $cid_clause = ";";}
                $query = "SELECT orh.orh_id,orh.orh_refcode,orh.orh_ordertime,c.c_firstname,c.c_lastname,orh.orh_orderstatus,ord.ord_amount
                FROM order_header orh INNER JOIN order_detail ord ON orh.orh_id = ord.orh_id INNER JOIN customer c ON orh.c_id = c.c_id
                WHERE ord.f_id = {$f_id} AND c.c_type LIKE '%{$_GET['ut']}%' AND orh.orh_orderstatus LIKE '%{$_GET['os']}%'".$cid_clause;
            }else{
                $query = "SELECT orh.orh_id,orh.orh_refcode,orh.orh_ordertime,c.c_firstname,c.c_lastname,orh.orh_orderstatus,ord.ord_amount
                FROM order_header orh INNER JOIN order_detail ord ON orh.orh_id = ord.orh_id
                INNER JOIN customer c ON orh.c_id = c.c_id WHERE ord.f_id = {$f_id};";
            }
            $result = $mysqli -> query($query);
            $numrow = $result -> num_rows;
            if($numrow > 0){
        ?>
        <div class="container align-items-stretch">
            <!-- GRID EACH MENU -->
            <div class="table-responsive">
            <table class="table rounded-5 table-light table-striped table-hover align-middle caption-top mb-3">
                <caption><?php echo $numrow;?> Pedido(s) <?php if(isset($_GET["search"])){?><br /><a
                        href="admin_food_detail.php?f_id=<?php echo $f_id?>" class="text-decoration-none text-danger">Borrar búsqueda
                        Result</a><?php } ?></caption>
                <thead class="bg-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código Rfc. del pedido</th>
                        <th scope="col">Estado del pedido</th>
                        <th scope="col">Fecha de pedido</th>
                        <th scope="col">Nombre del cliente</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; while($row = $result -> fetch_array()){ ?>
                    <tr>
                        <th><?php echo $i++;?></th>
                        <td><?php echo $row["orh_refcode"];?></td>
                        <td>
                            <?php if($row["orh_orderstatus"]=="ACPT"){ ?>
                                <h5><span class="fw-bold badge bg-info text-dark">Aceptada</span></h5>
                            <?php }else if($row["orh_orderstatus"]=="PREP"){ ?>
                                <h5><span class="fw-bold badge bg-warning text-dark">Preparando</span></h5>
                            <?php }else if($row["orh_orderstatus"]=="RDPK"){ ?>
                                <h5><span class="fw-bold badge bg-primary text-white">Listo para recojer</span></h5>
                            <?php }else if($row["orh_orderstatus"]=="FNSH"){?>
                                <h5><span class="fw-bold badge bg-success text-white">Completado</span></h5>
                            <?php } ?>
                        </td>
                        <td><?php
                        $order_time = (new Datetime($row["orh_ordertime"])) -> format("F j, Y H:i");
                        echo $order_time;
                        ?></td>

                        <td><?php echo $row["c_firstname"]." ".$row["c_lastname"];?></td>
                        <td><?php echo $row["ord_amount"];?></td>
                        <td><a href="shop_order_detail.php?orh_id=<?php echo $row["orh_id"]?>" class="btn btn-sm btn-primary">Ver</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
        <?php }else{ ?>
        <div class="row">
            <div class="col m-2 p-2 bg-danger text-white rounded text-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-x-circle ms-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg><span class="ms-2 mt-2">No se encontró ningún pedido con este menú</span>
                <?php if(isset($_GET["search"])){ ?>
                <a href="admin_food_detail.php?f_id=<?php echo $f_id;?>" class="text-white">Borrar resultado de búsqueda</a>
                <?php } ?>
            </div>
        </div>
        <!-- END GRID SHOP SELECTION -->
        <?php } ?>

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