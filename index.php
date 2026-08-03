<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();

$total=$conexion->query("SELECT COUNT(*) total FROM notificaciones")->fetch();

$pendientes=$conexion->query("SELECT COUNT(*) total FROM notificaciones WHERE estado='Pendiente'")->fetch();

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

<h2>Notificaciones</h2>

<div class="row">

<div class="col-md-6">

<div class="card bg-success text-white">

<div class="card-body">

<h4>Total</h4>

<h2><?=$total["total"]?></h2>

</div>

</div>

</div>

<div class="col-md-6">

<div class="card bg-warning text-dark">

<div class="card-body">

<h4>Pendientes</h4>

<h2><?=$pendientes["total"]?></h2>

</div>

</div>

</div>

</div>

<div class="card mt-3">

<div class="card-body">

<a href="correo.php" class="btn btn-success">
Correos
</a>

<a href="whatsapp.php" class="btn btn-success">
WhatsApp
</a>

<a href="sistema.php" class="btn btn-success">
Sistema
</a>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>