<?php
include("seguridad_usuario.php"); 
//se llama la seguridad del usuario 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>
<div id="banner">
<?php include("banner.php") ?>
</div><!-- Se llama al banner -->


<div id="col1">
<?php include("col_admin.php") ?>
</div><!-- Se llama a la columna izquierda -->

<div id="cuerpo">

<?php 
@$error=$_GET["error"];// cuando se ingresan mal los datos vote un mensaje de error
if ($error=="error")
{

	echo "<p style='color:red'>El producto no se encontro</p>";
} 
?>
    <form action="neg_reporte.php" name="reporte" id="reporte" method="post">

        <input type="text" id="cod_producto" name="cod_producto">Codigo Producto <br>
        <input type="text" id="descripcion" name="descripcion">descripción <br>
        <input type="submit" value="Enviar">

    </form>
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->

<div id="col2">
<?php include("col2.php") ?>
</div><!-- Se llama a la columna derecha -->

<div id="footer">
<?php include("footer.php") ?>
</div> <!-- Se llama al footer -->

</body>
</html>