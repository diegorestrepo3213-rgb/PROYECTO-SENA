<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$stmt=$conexion->prepare(

"

INSERT INTO reparaciones

(

id_cliente,

equipo,

marca,

modelo,

imei,

falla,

estado,

fecha

)

VALUES

(?,?,?,?,?,?,?,NOW())

"

);



$stmt->execute([


$_POST["cliente"],

$_POST["equipo"],

$_POST["marca"],

$_POST["modelo"],

$_POST["imei"],

$_POST["falla"],

"RECIBIDO"


]);


header("Location:index.php");

exit();


}



$clientes=$conexion->query(

"SELECT *

FROM clientes"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Recepción equipo

</div>


<div class="card-body">


<form method="POST">


<select

class="form-control mb-2"

name="cliente">


<?php foreach($clientes as $c): ?>


<option value="<?=$c["id_cliente"]?>">

<?=$c["nombre"]?>

</option>


<?php endforeach; ?>


</select>



<input class="form-control mb-2"

name="equipo"

placeholder="Equipo">


<input class="form-control mb-2"

name="marca"

placeholder="Marca">


<input class="form-control mb-2"

name="modelo"

placeholder="Modelo">


<input class="form-control mb-2"

name="imei"

placeholder="IMEI">


<textarea class="form-control mb-2"

name="falla"

placeholder="Falla reportada">

</textarea>


<button class="btn btn-success">

Recibir equipo

</button>


</form>


</div>


</div>


</div>