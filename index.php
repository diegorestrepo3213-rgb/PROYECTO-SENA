<?php

require_once "../config/config.php";
require_once "../config/conexion.php";
require_once "../config/sesiones.php";

verificarSesion();

include "../includes/header.php";
?>

<div class="content">

<h2>Registro del Sistema</h2>

<a href="errores.php" class="btn btn-danger">

Errores

</a>

<a href="accesos.php" class="btn btn-success">

Accesos

</a>

<a href="auditoria.php" class="btn btn-primary">

Auditoría

</a>

</div>

<?php include "../includes/footer.php"; ?>