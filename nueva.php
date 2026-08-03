<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$sql="

INSERT INTO ventas

(

id_cliente,

total,

estado,

fecha

)

VALUES

(?,?,?,NOW())

";


$stmt=$conexion->prepare($sql);


$stmt->execute([


$_POST["cliente"],

$_POST["total"],

"FACTURADA"


]);



$id=$conexion->lastInsertId();



header("Location:facturas.php?id=".$id);

exit();


}



$clientes=$conexion->query(

"SELECT * FROM clientes"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Nueva venta

</div>


<div class="card-body">


<form method="POST">


<select

class="form-control mb-3"

name="cliente">


<?php foreach($clientes as $c): ?>


<option value="<?=$c['id_cliente']?>">

<?=$c['nombre']?>

</option>


<?php endforeach; ?>


</select>



<input

class="form-control mb-3"

name="total"

placeholder="Total venta">



<button class="btn btn-success">

Crear venta

</button>


</form>


</div>

</div>


</div>