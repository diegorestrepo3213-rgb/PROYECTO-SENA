<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();


$datos=$conexion->query(

"SELECT * FROM proveedores"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<h2>

Proveedores

</h2>


<table class="table">

<tr>

<th>Nombre</th>

<th>Teléfono</th>

</tr>


<?php foreach($datos as $p): ?>


<tr>

<td>
<?=$p["nombre"]?>
</td>


<td>
<?=$p["telefono"]?>
</td>


</tr>


<?php endforeach; ?>


</table>


</div>