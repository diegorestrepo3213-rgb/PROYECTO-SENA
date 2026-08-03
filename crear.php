<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();



if($_POST){


$password=password_hash(

$_POST["password"],

PASSWORD_DEFAULT

);



$sql="
INSERT INTO usuarios

(
nombre,
usuario,
password,
email,
id_rol,
estado

)

VALUES

(?,?,?,?,?,1)

";



$stmt=$conexion->prepare($sql);



$stmt->execute([


$_POST["nombre"],

$_POST["usuario"],

$password,

$_POST["email"],

$_POST["rol"]


]);



header("Location:index.php");

exit();


}



$roles=$conexion

->query(
"SELECT * FROM roles"
)

->fetchAll();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Crear usuario

</div>


<div class="card-body">


<form method="POST">


<input class="form-control mb-3"

name="nombre"

placeholder="Nombre completo"

required>


<input class="form-control mb-3"

name="usuario"

placeholder="Usuario"

required>


<input class="form-control mb-3"

type="password"

name="password"

placeholder="Contraseña"

required>


<input class="form-control mb-3"

name="email"

placeholder="Correo">


<select class="form-control mb-3"

name="rol">


<?php foreach($roles as $r): ?>

<option value="<?=$r['id_rol']?>">

<?=$r['nombre']?>

</option>

<?php endforeach; ?>


</select>


<button class="btn btn-success">

Guardar

</button>


</form>


</div>

</div>


</div>


<?php include "../includes/footer.php"; ?>