<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();

if($_POST){

$sql="

INSERT INTO notificaciones

(

tipo,

destinatario,

titulo,

mensaje,

estado,

fecha

)

VALUES

(

'WhatsApp',

?,

'',

?,

'Pendiente',

NOW()

)

";

$stmt=$conexion->prepare($sql);

$stmt->execute([

$_POST["telefono"],

$_POST["mensaje"]

]);

}

?>

<?php include "../includes/header.php"; ?>

<div class="content">

<div class="card">

<div class="card-header">

Mensaje WhatsApp

</div>

<div class="card-body">

<form method="POST">

<input

class="form-control mb-3"

name="telefono"

placeholder="Número">

<textarea

class="form-control mb-3"

name="mensaje"

rows="5"

placeholder="Mensaje">

</textarea>

<button class="btn btn-success">

Guardar

</button>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>