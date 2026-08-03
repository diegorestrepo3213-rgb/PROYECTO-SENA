<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$id=$_GET["id"];



if($_POST){


$stmt=$conexion->prepare(

"

INSERT INTO pagos

(id_venta,monto,metodo,fecha)

VALUES(?,?,?,NOW())

"

);


$stmt->execute([


$id,

$_POST["monto"],

$_POST["metodo"]


]);


}



?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Pagos venta #<?=$id?>

</div>


<div class="card-body">


<form method="POST">


<input

class="form-control mb-3"

name="monto"

placeholder="Monto">



<select

class="form-control mb-3"

name="metodo">


<option>

Efectivo

</option>


<option>

Tarjeta

</option>


<option>

Transferencia

</option>


</select>



<button class="btn btn-success">

Registrar pago

</button>


</form>


</div>


</div>


</div>