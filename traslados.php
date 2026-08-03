<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$stmt=$conexion->prepare(

"INSERT INTO traslados

(id_producto,origen,destino,cantidad,fecha)

VALUES(?,?,?,?,NOW())"

);



$stmt->execute([


$_POST["producto"],

$_POST["origen"],

$_POST["destino"],

$_POST["cantidad"]


]);


}



?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Traslado entre sucursales

</div>


<div class="card-body">


<form method="POST">


<input class="form-control mb-3"

name="producto"

placeholder="ID Producto">


<input class="form-control mb-3"

name="origen"

placeholder="Sucursal origen">


<input class="form-control mb-3"

name="destino"

placeholder="Sucursal destino">


<input class="form-control mb-3"

name="cantidad"

placeholder="Cantidad">


<button class="btn btn-success">

Guardar traslado

</button>


</form>


</div>


</div>


</div>