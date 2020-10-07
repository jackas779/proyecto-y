<?php
include("seguridad_admin.php"); 
//se llama la seguridad del usuario admin
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
<?php include("col1.php") ?>
</div><!-- Se llama a la columna izquierda -->

<div id="cuerpo">

<?php 
    if(isset($_GET['error'])){
        $err=$_GET['error'];
        if($err=="error"){
            echo "<p style='color:red'>Por favor introduce un codigo de producto</p>";
        }
    }
    if(isset($_GET['ya'])){
        $err=$_GET['ya'];
        if($err=="e"){
            echo "<p style='color:red'>Este producto ya existe</p>";
        }
    }

?>
<form action="neg_crear_productos.php" id="crear_productos" name="crear_productos" method="post" autocomplete="off">

<input type="text" name="cod_producto" id="cod_producto">Cod producto <br>
<input type="text" name="producto" id="producto">Nombre Producto <br>
<input type="text" name="descripcion" id="descripcion">Descripcion <br>
<!-- Las casillas del formulario  -->

<input type="hidden" name="estado" id="estado" value="1"> <br>
<!-- el estado del producto -->

<!-- el select -->
<select name="fk_id_categoria" id="fk_id_categoria" required>
    <option value="">Seleccione:</option>
    <!-- selector multiple -->
<?php
// la consulta de la categorias

include("conexion.php");//la conexion con la base de datos
$consulta = "SELECT * FROM categorias";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los daots no existen vuelve a comprobar !!![' . $db->error . ']');
    }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bid_categoria=stripslashes($fila["id_categoria"]);
        $bcategoria=stripslashes($fila["categoria"]);
        $contador += 1;
        echo "<option value=' $bid_categoria'>$bcategoria</option>";
        // Esta es la consulta de las categorias
    }
?>
</select>

<input type="submit" value="Crear Producto"/> 

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