<?php//se llama la seguridad del usuario admin
include("seguridad_admin.php"); 
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



<table id="banner" >
<tr>

<div >
<?php include("../diseno/menu_crear_categorias/banneradmin.php") ?>
</div><!-- Se llama al banner -->

</tr>
<tr >

<td rowspan="2"> 
<div>
<?php include("../diseno/menu_crear_categorias/col1.php") ?>
</div><!-- Se llama a la columna izquierda -->
</td>

<td style=" width: 100%;" align="center">
<div >

<?php 

include("conexion.php");// conexion con la base de datos

echo "<table>";// la tabla de tu mujer xd
echo "<tr bgcolor='#fFDDAA'>";
echo "<td>Nombre</td>";
echo "<td>Descripcion</td>";
echo "<td>Codigo Producto</td>";
echo "<td>Estado</td>";
echo "</tr>";


$consulta = "SELECT P.cod_producto, P.producto, P.descripcion, P.fk_id_estado, E.id_estado, E.nombre_estado FROM productos P INNER JOIN estados E ON P.fk_id_estado = E.id_estado";// consulta
    if(!$resultado = $db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }// imprimir los resultados de la consulta
    while($fila = $resultado->fetch_assoc()){
        $bcod_producto=stripslashes($fila["cod_producto"]);
        $bproducto=stripslashes($fila["producto"]);
        $bdescripcion=stripslashes($fila["descripcion"]);
        $bid_producto=stripslashes($fila["id_producto"]);
        $bestado=stripslashes($fila["nombre_estado"]);

        echo "<tr>";
        echo "<td>$bproducto</td>";
        echo "<td>$bdescripcion</td>";
        echo "<td>$bcod_producto</td>";
        echo "<td>$bestado<button><a href='neg_cambio_estado.php?estado=$bid_producto'>cambiar estado</a></button></td>";
        echo "<tr>";

        }
 
    echo "</table>";    

?>
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->

    
</div>
</td >

</tr>
<tr style="background:green; width: 20%;" align="center">
<div >
  <td colspan="2" height="20% ">
  <?php
      include("../diseno/menu_crear_categorias/footer.php");
  ?>
  </td>
</tr>

</table>


</body>
</html>