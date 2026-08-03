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

diagnostico=?,

costo=?,

estado='DIAGNOSTICO'


WHERE id_reparacion=?

"

)->execute([


$_POST["diagnostico"],

$_POST["costo"],

$id


]);


}



?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Diagnóstico técnico

</div>


<div class="card-body">


<form method="POST">


<textarea

class="form-control mb-3"

name="diagnostico"

placeholder="Diagnóstico">

</textarea>



<input

class="form-control mb-3"

name="costo"

placeholder="Costo reparación">



<button class="btn btn-success">

Guardar diagnóstico

</button>


</form>


</div>


</div>


</div>