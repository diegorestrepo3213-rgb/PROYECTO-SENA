<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$sql="

INSERT INTO proveedores

(

nombre,

nit,

contacto,

telefono,

email,

direccion,

estado

)

VALUES

(?,?,?,?,?,?,1)

";



$stmt=$conexion->prepare($sql);



$stmt->execute([


$_POST["nombre"],

$_POST["nit"],

$_POST["contacto"],

$_POST["telefono"],

$_POST["email"],

$_POST["direccion"]


]);



header("Location:index.php");

exit();


}


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Crear proveedor

</div>



<div class="card-body">


<form method="POST">



<input

class="form-control mb-3"

name="nombre"

placeholder="Nombre empresa"

required>



<input

class="form-control mb-3"

name="nit"

placeholder="NIT">



<input

class="form-control mb-3"

name="contacto"

placeholder="Persona contacto">



<input

class="form-control mb-3"

name="telefono"

placeholder="Teléfono">



<input

class="form-control mb-3"

name="email"

placeholder="Correo">



<input

class="form-control mb-3"

name="direccion"

placeholder="Dirección">



<button class="btn btn-success">

Guardar proveedor

</button>


</form>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>