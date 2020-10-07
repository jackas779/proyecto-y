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

include("conexion.php");// conexion con la base de datos

echo "<table>";// la tabla de tu mujer xd
echo "<tr bgcolor='#fFDDAA'>";
echo "<td>ID Categoria</td>";
echo "<td>Categoria</td>";
echo "<td>Estado</td>";
echo "<td>Acciones</td>";
echo "</tr>";


$consulta = "SELECT C.id_categoria, C.categoria, C.fk_id_estado,
             E.id_estado, E.nombre_estado
             FROM categorias C INNER JOIN estados E
             ON C.fk_id_estado = E.id_estado";// consulta
    if(!$resultado = $db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }// imprimir los resultados de la consulta
    while($fila = $resultado->fetch_assoc()){;
        $bid_categoria=stripslashes($fila["id_categoria"]);
        $bcategoria=stripslashes($fila["categoria"]);
        $bnombre_estado=stripslashes($fila["nombre_estado"]);

        echo "<tr>";
        echo "<td>$bid_categoria</td>";
        echo "<td>$bcategoria</td>";
        echo "<td>$bnombre_estado</td>";
        echo "<td><button><a href='neg_cambio_estado2.php?id=$bid_categoria'>cambiar estado</a></button>";

        //Formulario para editar categorias
        echo "<form action='pre_editar_categorias.php' id='editar_categorias' name='editar_categorias' method='POST' autocomplete='off'>
        <input type='hidden' name='id_categoria' id='id_categoria' value='$bid_categoria'>
        <input type='submit'  value='Editar'>
        </form>";

        //Formulario para eliminar categorias
        echo "<form action='neg_eliminar_categorias.php' id='eliminar_categorias' name='eliminar_categorias' method='POST' autocomplete='off'>
        <input type='hidden' name='id_categoria' id='id_categoria' value='$bid_categoria' />
        <input type='checkbox' name='validar' value='checkbox' required />
        <input type='submit'  value='Elimininar' />
        </form>";
        echo "</td>";

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

</body>
</html>