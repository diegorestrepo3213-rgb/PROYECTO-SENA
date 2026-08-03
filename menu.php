<ul class="menu">


<li>
<a href="<?=URL_BASE?>dashboard/index.php">

📊 Dashboard

</a>
</li>


<li>

<a href="<?=URL_BASE?>usuarios/index.php">

👤 Usuarios

</a>

</li>


<li>

<a href="<?=URL_BASE?>clientes/index.php">

👥 Clientes

</a>

</li>


<li>

<a href="<?=URL_BASE?>productos/index.php">

📦 Productos

</a>

</li>


<li>

<a href="<?=URL_BASE?>inventario/index.php">

🏬 Inventario

</a>

</li>



<li>

<a href="<?=URL_BASE?>compras/index.php">

🛒 Compras

</a>

</li>



<li>

<a href="<?=URL_BASE?>ventas/index.php">

💰 Ventas

</a>

</li>



<li>

<a href="<?=URL_BASE?>caja/index.php">

💵 Caja

</a>

</li>



<li>

<a href="<?=URL_BASE?>contabilidad/index.php">

📚 Contabilidad

</a>

</li>



<?php if(esAdministrador()): ?>


<li>

<a href="<?=URL_BASE?>empresa/index.php">

⚙ Empresa

</a>

</li>


<?php endif; ?>


</ul>