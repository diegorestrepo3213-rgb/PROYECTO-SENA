<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();


$id=$_GET["id"];



$conexion->prepare(

"

UPDATE reparaciones SET

estado='ENTREGADO',

fecha_entrega=NOW()


WHERE id_reparacion=?

"

)->execute([$id]);



header("Location:index.php");

exit();

?>