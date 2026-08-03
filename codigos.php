<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$id=$_GET["id"];



if($_POST){


$conexion->prepare(

"UPDATE productos

SET codigo=?

WHERE id_producto=?"

)->execute([

$_POST["codigo"],

$id

]);


}


?>


<form method="POST">


<input

class="form-control"

name="codigo"


placeholder="Código">


<button class="btn btn-success">

Guardar

</button>


</form>