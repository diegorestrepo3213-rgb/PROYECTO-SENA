<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$stmt=$conexion->prepare(

"

INSERT INTO ventas_devoluciones

(id_venta,motivo,fecha)

VALUES(?,?,NOW())

"

);



$stmt->execute([


$_POST["venta"],

$_POST["motivo"]


]);


}


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Devoluciones

</div>


<div class="card-body">


<form method="POST">


<input

class="form-control mb-3"

name="venta"

placeholder="ID venta">



<textarea

class="form-control mb-3"

name="motivo"

placeholder="Motivo devolución">

</textarea>



<button class="btn btn-danger">

Registrar

</button>


</form>


</div>


</div>


</div>