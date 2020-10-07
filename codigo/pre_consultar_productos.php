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


<div id="general">

<div id="col1">
<?php include("col1.php") ?>
</div><!-- Se llama a la columna izquierda -->

<div id="cuerpo">
<?php 

if(isset($_GET['ed'])){
    $edd=$_GET['ed'];
    if($edd="y"){
        echo "<p style='color:green'>Se edito correctamente el producto</p>";
    }
}
if(isset($_GET['el'])){
    $edd=$_GET['el'];
    if($edd="yy"){
        echo "<div id='cierre'>";
        echo "<p style='color:green'>Se elimino correctamente el producto</p>";
        echo "<input type='button' value='x' onclick='cerrar();'>";  
        echo "</div>";
    }
}

?>    
<?php 

include("conexion.php");// conexion con la base de datos

echo "<table>";// la tabla de tu mujer xd
echo "<tr bgcolor='#fFDDAA'>";
echo "<td>Nombre</td>";
echo "<td>Descripcion</td>";
echo "<td>Codigo Producto</td>";
echo "<td>Estado</td>";
echo "<td>Editar</td>";
echo "<td>Eliminar</td>";
echo "<td>Categoria</td>";
echo "</tr>";


$consulta = "SELECT P.id_producto, P.cod_producto, P.producto, P.descripcion, P.fk_id_categoria, P.fk_id_estado, E.id_estado, E.nombre_estado, C.id_categoria, C.categoria FROM productos P INNER JOIN estados E ON P.fk_id_estado = E.id_estado INNER JOIN categorias C ON P.fk_id_categoria = C.id_categoria";// consulta
    if(!$resultado = $db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }// imprimir los resultados de la consulta
    while($fila = $resultado->fetch_assoc()){
        $bcod_producto=stripslashes($fila["cod_producto"]);
        $bproducto=stripslashes($fila["producto"]);
        $bdescripcion=stripslashes($fila["descripcion"]);
        $bid_producto=stripslashes($fila["id_producto"]);
        $bestado=stripslashes($fila["nombre_estado"]);
        $bcategoria=stripslashes($fila["categoria"]);

        echo "<tr>";
        echo "<td>$bproducto</td>";
        echo "<td>$bdescripcion</td>";
        echo "<td>$bcod_producto</td>";
        echo "<td>$bestado<button><a href='neg_cambio_estado.php?id=$bid_producto'>cambiar estado</a></button></td>";

        echo "<td>";
        //Formulario para editar productos
        echo "<form action='pre_editar_productos.php' id='editar_productos' name='editar_productos' method='POST' autocomplete='off'>
        <input type='hidden' name='id_producto' id='id_producto' value='$bid_producto'>
        <input type='submit'  value='Editar'>
        </form>";
        echo "</td>";

        echo "<td>";
        //Formulario para eliminar productos
        echo "<form action='neg_eliminar_productos.php' id='eliminar_productos' name='eliminar_productos' method='POST' autocomplete='off'>
        <input type='hidden' name='id_producto' id='id_producto' value='$bid_producto' />
        <input type='checkbox' name='validar' value='checkbox' required />
        <input type='submit'  value='Elimininar' />
        </form>";
        echo "</td>";

        echo "<td>$bcategoria</td>";
        echo "<tr>";

        }
 
    echo "</table>";    

?>
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->

<div id="col2">
<?php include("col2.php") ?>
</div><!-- Se llama a la columna derecha -->

</div>
<div id="footer">
<?php include("footer.php") ?>
</div> <!-- Se llama al footer -->

<script type="text/javascript" src="../js/cierre.js">

</script>

</body>
</html>