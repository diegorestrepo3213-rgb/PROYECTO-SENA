<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();


$suc=$conexion->query(

"SELECT * FROM sucursales"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<h2>

Sucursales

</h2>


<table class="table">


<tr>

<th>Nombre</th>

<th>Dirección</th>

</tr>


<?php foreach($suc as $s): ?>


<tr>

<td>
<?=$s["nombre"]?>
</td>


<td>
<?=$s["direccion"]?>
</td>


</tr>


<?php endforeach; ?>


</table>


</div>