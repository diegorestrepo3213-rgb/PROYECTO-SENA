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

'Correo',

?,

?,

?,

'Pendiente',

NOW()

)

";

$stmt=$conexion->prepare($sql);

$stmt->execute([

$_POST["correo"],

$_POST["asunto"],

$_POST["mensaje"]

]);

}

?>

<?php include "../includes/header.php"; ?>

<div class="content">

<div class="card">

<div class="card-header">

Nuevo Correo

</div>

<div class="card-body">

<form method="POST">

<input

class="form-control mb-3"

name="correo"

placeholder="Correo destinatario">

<input

class="form-control mb-3"

name="asunto"

placeholder="Asunto">

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