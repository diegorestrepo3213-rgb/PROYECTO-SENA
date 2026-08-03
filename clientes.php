<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();


$clientes=$conexion->query(

"SELECT * FROM clientes"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<h2>

Clientes registrados

</h2>


<table class="table">


<tr>

<th>Nombre</th>
<th>Teléfono</th>
<th>Email</th>

</tr>


<?php foreach($clientes as $c): ?>


<tr>

<td>
<?=$c["nombre"]?>
</td>


<td>
<?=$c["telefono"]?>
</td>


<td>
<?=$c["correo"]?>
</td>


</tr>


<?php endforeach; ?>


</table>


</div>