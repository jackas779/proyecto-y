
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->

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

<table>
<tr>

<div id="banner"  >
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
echo "<td>ID Categoria</td>";
echo "<td>Categoria</td>";
echo "</tr>";


$consulta = "SELECT * FROM categorias";// consulta
    if(!$resultado = $db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }// imprimir los resultados de la consulta
    while($fila = $resultado->fetch_assoc()){;
        $bid_categoria=stripslashes($fila["id_categoria"]);
        $bcategoria=stripslashes($fila["categoria"]);

        echo "<tr>";
        echo "<td>$bid_categoria</td>";
        echo "<td>$bcategoria</td>";
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