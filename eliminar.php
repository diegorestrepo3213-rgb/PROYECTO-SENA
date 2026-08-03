<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$id=$_GET["id"];



$stmt=$conexion->prepare(

"DELETE FROM proveedores

WHERE id_proveedor=?"

);



$stmt->execute([$id]);



header("Location:index.php");

exit();


?>