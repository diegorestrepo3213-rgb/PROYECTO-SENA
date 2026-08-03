<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$conexion->prepare(

"INSERT INTO vacaciones

(id_empleado,

inicio,

fin,

estado)

VALUES(?,?,?,'PENDIENTE')"

)->execute([


$_POST["empleado"],

$_POST["inicio"],

$_POST["fin"]

]);


}



?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Vacaciones

</div>


<div class="card-body">


<form method="POST">


<input class="form-control mb-2"

name="empleado"

placeholder="ID empleado">


<input type="date"

class="form-control mb-2"

name="inicio">



<input type="date"

class="form-control mb-2"

name="fin">



<button class="btn btn-success">

Registrar

</button>


</form>


</div>


</div>


</div>