<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$empleados=$conexion->query(

"SELECT *

FROM empleados"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<h2>

Reporte empleados

</h2>


<table class="table">


<tr>

<th>Nombre</th>

<th>Cargo</th>

<th>Salario</th>

</tr>


<?php foreach($empleados as $e): ?>


<tr>

<td>
<?=$e["nombre"]?>
</td>


<td>
<?=$e["cargo"]?>
</td>


<td>
<?=formatoDinero($e["salario"])?>
</td>


</tr>


<?php endforeach; ?>


</table>


</div>