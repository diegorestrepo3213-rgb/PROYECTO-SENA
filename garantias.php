<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$conexion->prepare(

"

INSERT INTO garantias

(

id_reparacion,

tiempo,

descripcion,

fecha

)

VALUES(?,?,?,NOW())

"

)->execute([


$_POST["reparacion"],

$_POST["tiempo"],

$_POST["descripcion"]

]);


}



?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Garantías

</div>


<div class="card-body">


<form method="POST">


<input

class="form-control mb-3"

name="reparacion"

placeholder="ID reparación">



<input

class="form-control mb-3"

name="tiempo"

placeholder="Días garantía">



<textarea

class="form-control mb-3"

name="descripcion"

placeholder="Descripción">

</textarea>



<button class="btn btn-success">

Registrar garantía

</button>


</form>


</div>


</div>


</div>