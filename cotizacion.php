<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$stmt=$conexion->prepare(

"INSERT INTO cotizaciones

(id_cliente,total,fecha)

VALUES(?,?,NOW())"

);


$stmt->execute([


$_POST["cliente"],

$_POST["total"]


]);


}



$clientes=$conexion->query(

"SELECT * FROM clientes"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Crear cotización

</div>


<div class="card-body">


<form method="POST">


<select

class="form-control mb-3"

name="cliente">


<?php foreach($clientes as $c): ?>


<option value="<?=$c['id_cliente']?>">

<?=$c["nombre"]?>

</option>


<?php endforeach; ?>


</select>



<input

class="form-control mb-3"

name="total"

placeholder="Valor cotización">



<button class="btn btn-success">

Guardar cotización

</button>


</form>


</div>


</div>


</div>