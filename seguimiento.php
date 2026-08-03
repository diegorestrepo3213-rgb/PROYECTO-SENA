<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();


$id=$_GET["id"];



if($_POST){


$conexion->prepare(

"

UPDATE reparaciones SET

estado=?,

observaciones=?

WHERE id_reparacion=?

"

)->execute([


$_POST["estado"],

$_POST["observaciones"],

$id


]);


}



?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Seguimiento reparación

</div>


<div class="card-body">


<form method="POST">


<select

class="form-control mb-3"

name="estado">


<option>

EN REPARACION

</option>


<option>

LISTO

</option>


<option>

ESPERANDO REPUESTO

</option>


</select>



<textarea

class="form-control mb-3"

name="observaciones"

placeholder="Notas técnicas">

</textarea>



<button class="btn btn-success">

Actualizar

</button>


</form>


</div>


</div>


</div>