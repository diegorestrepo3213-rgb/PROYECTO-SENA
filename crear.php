<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){



$sql="

INSERT INTO roles

(

nombre,

descripcion

)

VALUES

(?,?)

";



$stmt=$conexion->prepare($sql);



$stmt->execute([


$_POST["nombre"],


$_POST["descripcion"]


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

Crear rol

</div>



<div class="card-body">


<form method="POST">


<label>

Nombre del rol

</label>


<input

class="form-control mb-3"

name="nombre"

placeholder="Ej: Administrador"

required>



<label>

Descripción

</label>


<textarea

class="form-control mb-3"

name="descripcion">

</textarea>



<button class="btn btn-success">

Guardar

</button>


</form>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>