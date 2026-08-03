<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$id=$_GET["id"];


$stmt=$conexion->prepare(

"SELECT *

FROM productos

WHERE id_producto=?"

);


$stmt->execute([$id]);


$p=$stmt->fetch();


?>


<h2>

Etiqueta producto

</h2>


<hr>


Código:

<?=$p["codigo"]?>

<br>


Producto:

<?=$p["nombre"]?>

<br>


Precio:

<?=formatoDinero($p["precio"])?>